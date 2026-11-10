<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ThemeManager
{
    /**
     * In-memory cached theme settings.
     *
     * @var array<string, string>|null
     */
    protected ?array $cachedSettings = null;

    /**
     * Default theme settings matching Vocabot's native design aesthetics.
     *
     * @var array<string, string>
     */
    protected array $defaults = [
        'primary_color' => '#7c3aed',
        'accent_color' => '#a855f7',
        'background_color' => '#070313',
        'text_color' => '#ffffff',
        'font_family' => 'Plus Jakarta Sans',
        'logo' => 'images/logo2.webp',
        'button_style' => 'pill',
        'layout_mode' => 'boxed',
        'navbar_style' => 'sticky',
        'custom_css' => '',
    ];

    /**
     * Retrieve all active theme settings for Vocabot from CodeBaseHub database.
     * Falls back seamlessly to default aesthetic values if database is unreachable.
     *
     * @return array<string, string>
     */
    public function getSettings(): array
    {
        if ($this->cachedSettings !== null) {
            return $this->cachedSettings;
        }

        $settings = $this->defaults;

        try {
            // 1. Locate Vocabot website record in CodeBaseHub
            $website = DB::connection('codebasehub')
                ->table('websites')
                ->where('website_name', 'Vocabot')
                ->orWhere('domain', 'vocabot.ai')
                ->orWhere('domain', 'like', '%vocabot%')
                ->first();

            if ($website) {
                // 2. Identify the active theme
                $activeThemeRow = DB::connection('codebasehub')
                    ->table('website_theme_settings')
                    ->where('website_id', $website->id)
                    ->where('setting_key', 'active_theme')
                    ->first();

                $themeId = $activeThemeRow?->theme_id;

                // If no active theme record, pick first theme from themes table
                if (! $themeId) {
                    $firstTheme = DB::connection('codebasehub')
                        ->table('themes')
                        ->where('status', 1)
                        ->first();
                    $themeId = $firstTheme?->id;
                }

                // 3. Load default appearance from the theme definition if present
                if ($themeId) {
                    $theme = DB::connection('codebasehub')
                        ->table('themes')
                        ->where('id', $themeId)
                        ->first();

                    if ($theme && ! empty($theme->appearance)) {
                        $appearance = is_string($theme->appearance)
                            ? json_decode($theme->appearance, true)
                            : (array) $theme->appearance;

                        if (is_array($appearance)) {
                            foreach ($appearance as $k => $v) {
                                if ($v !== null && $v !== '') {
                                    $settings[$k] = (string) $v;
                                }
                            }
                        }
                    }

                    // 4. Load website-specific custom settings for this theme
                    $rows = DB::connection('codebasehub')
                        ->table('website_theme_settings')
                        ->where('website_id', $website->id)
                        ->where('theme_id', $themeId)
                        ->get();

                    foreach ($rows as $row) {
                        if ($row->setting_value !== null && $row->setting_value !== '') {
                            $settings[$row->setting_key] = (string) $row->setting_value;
                        }
                    }
                }
            }
        } catch (Throwable $e) {
            // Log for diagnostics and continue cleanly with defaults
            Log::debug('Vocabot ThemeManager fallback: '.$e->getMessage());
        }

        $this->cachedSettings = $settings;

        return $this->cachedSettings;
    }

    /**
     * Get a single theme setting by key.
     */
    public function get(string $key, ?string $default = null): ?string
    {
        $settings = $this->getSettings();

        return $settings[$key] ?? $default;
    }

    /**
     * Resolve the proper logo URL for web assets.
     */
    public function getLogoUrl(): string
    {
        $logo = $this->get('logo', 'images/logo2.webp');

        if (empty($logo)) {
            return asset('images/logo2.webp');
        }

        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
            return $logo;
        }

        return asset($logo);
    }

    /**
     * Clear cached settings.
     */
    public function clearCache(): void
    {
        $this->cachedSettings = null;
    }
}
