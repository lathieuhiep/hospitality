<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class HeroTab
{
    private const META_KEY = 'home_hero';
    private const META_BG_PC  = self::META_KEY . '_bg_pc';
    private const META_BG_MB  = self::META_KEY . '_bg_mb';
    private const META_LOGO   = self::META_KEY . '_logo';

    /**
     * Fields definition
     * return array<Field>
     */
    public static function fields(): array
    {
        return [
            Field::make('image', self::META_BG_PC, esc_html__('Background PC', 'extend-site')),
            Field::make('image', self::META_BG_MB, esc_html__('Background Mobile', 'extend-site')),
            Field::make('image', self::META_LOGO, esc_html__('Logo', 'extend-site')),
        ];
    }

    /**
     * Get data
     */
    public static function get(int $post_id): array
    {
        return [
            'bg_pc' => carbon_get_post_meta($post_id, self::META_BG_PC),
            'bg_mb' => carbon_get_post_meta($post_id, self::META_BG_MB),
            'logo'  => carbon_get_post_meta($post_id, self::META_LOGO),
        ];
    }
}