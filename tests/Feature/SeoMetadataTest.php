<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class SeoMetadataTest extends TestCase
{
    /**
     * Public routes to test.
     *
     * @var array<string>
     */
    protected array $routes = [
        '/',
        '/product',
        '/how-it-works',
        '/solutions',
        '/integrations',
        '/contact',
        '/policy',
    ];

    /**
     * Test all pages have unique titles and descriptions.
     */
    public function test_all_pages_have_unique_titles_and_descriptions(): void
    {
        $titles = [];
        $descriptions = [];

        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);

            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $titleNodes = $xpath->query('//title');
            $this->assertGreaterThan(0, $titleNodes->length, "Missing title on $route");
            $title = trim($titleNodes->item(0)->textContent);
            $this->assertNotEmpty($title, "Empty title on $route");
            $this->assertNotContains($title, $titles, "Duplicate title found on $route: $title");
            $titles[] = $title;

            $descNodes = $xpath->query('//meta[@name="description"]/@content');
            $this->assertGreaterThan(0, $descNodes->length, "Missing meta description on $route");
            $description = trim($descNodes->item(0)->textContent);
            $this->assertNotEmpty($description, "Empty meta description on $route");
            $this->assertNotContains($description, $descriptions, "Duplicate description found on $route: $description");
            $descriptions[] = $description;
        }
    }

    /**
     * Test canonical URL and Open Graph metadata exist across all pages.
     */
    public function test_canonical_and_open_graph_metadata(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $canonical = $xpath->query('//link[@rel="canonical"]/@href');
            $this->assertGreaterThan(0, $canonical->length, "Missing canonical on $route");
            $this->assertNotEmpty($canonical->item(0)->textContent, "Empty canonical on $route");

            $ogTitle = $xpath->query('//meta[@property="og:title"]/@content');
            $this->assertGreaterThan(0, $ogTitle->length, "Missing og:title on $route");

            $ogDesc = $xpath->query('//meta[@property="og:description"]/@content');
            $this->assertGreaterThan(0, $ogDesc->length, "Missing og:description on $route");

            $ogUrl = $xpath->query('//meta[@property="og:url"]/@content');
            $this->assertGreaterThan(0, $ogUrl->length, "Missing og:url on $route");

            $ogImage = $xpath->query('//meta[@property="og:image"]/@content');
            $this->assertGreaterThan(0, $ogImage->length, "Missing og:image on $route");
        }
    }

    /**
     * Test JSON-LD structured data is present and valid JSON.
     */
    public function test_json_ld_structured_data_validity(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $scripts = $xpath->query('//script[@type="application/ld+json"]');
            $this->assertGreaterThan(0, $scripts->length, "Missing JSON-LD script on $route");

            foreach ($scripts as $script) {
                $json = trim($script->textContent);
                $this->assertNotEmpty($json, "Empty JSON-LD on $route");
                $data = json_decode($json, true);
                $this->assertNotNull($data, "Invalid JSON-LD on $route: ".json_last_error_msg());
            }
        }
    }

    /**
     * Test subpages have BreadcrumbList schema.
     */
    public function test_subpages_have_breadcrumb_schema(): void
    {
        $subpages = ['/product', '/how-it-works', '/solutions', '/integrations', '/contact', '/policy'];

        foreach ($subpages as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $this->assertStringContainsString('"BreadcrumbList"', $html, "Missing BreadcrumbList schema on $route");
        }
    }

    /**
     * Test FAQ schema exists on pages with FAQs.
     */
    public function test_faq_schema_on_home_and_product(): void
    {
        $this->get('/')->assertSee('"FAQPage"', false);
        $this->get('/product')->assertSee('"FAQPage"', false);
    }

    /**
     * Test robots meta tag is explicitly indexing and following.
     */
    public function test_robots_meta_tag_on_all_pages(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $response->assertSee('<meta name="robots" content="index, follow, max-image-preview:large">', false);
        }
    }

    /**
     * Test robots.txt and sitemap.xml files are valid.
     */
    public function test_robots_and_sitemap_configuration(): void
    {
        $this->assertFileExists(public_path('robots.txt'));
        $robotsContent = file_get_contents(public_path('robots.txt'));
        $this->assertStringContainsString('Sitemap: https://vocabot.ai/sitemap.xml', $robotsContent);
        $this->assertStringContainsString('User-agent: *', $robotsContent);

        $this->assertFileExists(public_path('sitemap.xml'));
        $sitemapContent = file_get_contents(public_path('sitemap.xml'));
        $this->assertStringContainsString('https://vocabot.ai/', $sitemapContent);
        $this->assertStringContainsString('<lastmod>', $sitemapContent);

        $xml = simplexml_load_string($sitemapContent);
        $this->assertNotFalse($xml, 'Sitemap XML is invalid');
        $this->assertCount(7, $xml->url, 'Sitemap does not contain exactly 7 public URLs');
    }

    /**
     * Test optimized WebP and favicon assets exist and are valid.
     */
    public function test_optimized_assets_exist_and_are_valid(): void
    {
        $this->assertFileExists(public_path('favicon.ico'));
        $this->assertGreaterThan(500, filesize(public_path('favicon.ico')));

        $webpImages = ['s1.webp', 's2.webp', 's3.webp', 's4.webp'];
        foreach ($webpImages as $img) {
            $path = public_path("images/$img");
            $this->assertFileExists($path);
            $this->assertGreaterThan(1000, filesize($path));
            $this->assertLessThan(150000, filesize($path), "$img should be compressed under 150KB");
        }
    }
}
