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
     * Test social metatags for Facebook, Instagram, LinkedIn, and X (Twitter).
     */
    public function test_social_metatags_for_facebook_instagram_linkedin_and_x(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            // Open Graph (Facebook, Instagram, LinkedIn)
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:site_name"]/@content')->length, "Missing og:site_name on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:locale"]/@content')->length, "Missing og:locale on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:image:secure_url"]/@content')->length, "Missing og:image:secure_url on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:image:width"]/@content')->length, "Missing og:image:width on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:image:height"]/@content')->length, "Missing og:image:height on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@property="og:image:alt"]/@content')->length, "Missing og:image:alt on $route");

            // X (Twitter)
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:card"]/@content')->length, "Missing twitter:card on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:site"]/@content')->length, "Missing twitter:site on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:creator"]/@content')->length, "Missing twitter:creator on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:title"]/@content')->length, "Missing twitter:title on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:description"]/@content')->length, "Missing twitter:description on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:image"]/@content')->length, "Missing twitter:image on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:domain"]/@content')->length, "Missing twitter:domain on $route");
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="twitter:url"]/@content')->length, "Missing twitter:url on $route");

            // Author
            $this->assertGreaterThan(0, $xpath->query('//meta[@name="author"]/@content')->length, "Missing author meta tag on $route");
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

    /**
     * Test each page has exactly one H1 heading.
     */
    public function test_each_page_has_exactly_one_h1_heading(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $h1Nodes = $xpath->query('//h1');
            $this->assertCount(1, $h1Nodes, "Page $route should have exactly one <h1>, found {$h1Nodes->length}");
            $this->assertNotEmpty(trim($h1Nodes->item(0)->textContent), "Page $route has an empty <h1>");
        }
    }

    /**
     * Test heading hierarchy has no skipped levels (e.g. h1 to h3 without h2).
     */
    public function test_heading_hierarchy(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $headings = $xpath->query('//h1 | //h2 | //h3 | //h4 | //h5 | //h6');
            $currentLevel = 0;
            foreach ($headings as $h) {
                $level = (int) substr($h->nodeName, 1);
                $this->assertNotEmpty(trim($h->textContent), "Empty <{$h->nodeName}> found on $route");
                if ($currentLevel > 0) {
                    $this->assertLessThanOrEqual(
                        $currentLevel + 1,
                        $level,
                        "Heading level skipped on $route: jumped from h{$currentLevel} to h{$level} ('".trim($h->textContent)."')"
                    );
                }
                $currentLevel = $level;
            }
        }
    }

    /**
     * Test all images have non-empty alt attributes.
     */
    public function test_all_images_have_alt_attributes(): void
    {
        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $images = $xpath->query('//img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                $alt = $img->getAttribute('alt');
                $this->assertTrue($img->hasAttribute('alt'), "Image missing alt attribute on $route: $src");
                $this->assertNotEmpty(trim($alt), "Image has empty alt attribute on $route: $src");
            }
        }
    }

    /**
     * Test all local CSS and JS assets referenced exist on disk.
     */
    public function test_local_assets_referenced_in_pages_exist(): void
    {
        $checkedAssets = 0;

        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            // Check CSS links
            $cssLinks = $xpath->query('//link[@rel="stylesheet"]/@href');
            foreach ($cssLinks as $css) {
                $href = $css->textContent;
                $host = parse_url($href, PHP_URL_HOST);
                if ($host === null || $host === 'localhost' || $host === 'vocabot.ai') {
                    $path = parse_url($href, PHP_URL_PATH);
                    $localPath = public_path(ltrim($path, '/'));
                    $this->assertFileExists($localPath, "Referenced CSS file does not exist: $href on $route");
                    $checkedAssets++;
                }
            }

            // Check JS scripts
            $scripts = $xpath->query('//script/@src');
            foreach ($scripts as $script) {
                $src = $script->textContent;
                $host = parse_url($src, PHP_URL_HOST);
                if ($host === null || $host === 'localhost' || $host === 'vocabot.ai') {
                    $path = parse_url($src, PHP_URL_PATH);
                    $localPath = public_path(ltrim($path, '/'));
                    $this->assertFileExists($localPath, "Referenced script file does not exist: $src on $route");
                    $checkedAssets++;
                }
            }
        }

        $this->assertGreaterThan(0, $checkedAssets, 'No local assets were found and checked across pages');
    }

    /**
     * Test all internal links across pages resolve to valid responses.
     */
    public function test_all_internal_links_resolve(): void
    {
        $checkedUrls = [];

        foreach ($this->routes as $route) {
            $response = $this->get($route);
            $html = $response->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $links = $xpath->query('//a/@href');
            foreach ($links as $link) {
                $href = $link->textContent;
                if (empty($href) || str_starts_with($href, '#') || str_starts_with($href, 'mailto:') || str_starts_with($href, 'tel:') || str_starts_with($href, 'javascript:')) {
                    continue;
                }

                $parsed = parse_url($href);
                $host = $parsed['host'] ?? null;
                if ($host === null || $host === 'localhost' || $host === 'vocabot.ai') {
                    $path = $parsed['path'] ?? '/';
                    if (! isset($checkedUrls[$path])) {
                        $linkResp = $this->get($path);
                        $this->assertContains(
                            $linkResp->getStatusCode(),
                            [200, 301, 302],
                            "Broken internal link found on $route: $href (status: {$linkResp->getStatusCode()})"
                        );
                        $checkedUrls[$path] = true;
                    }
                }
            }
        }

        $this->assertGreaterThan(5, count($checkedUrls), 'Expected at least 5 unique internal links checked');
    }
}
