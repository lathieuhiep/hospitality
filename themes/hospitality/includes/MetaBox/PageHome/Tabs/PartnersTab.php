<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class PartnersTab
{
    private const META_KEY = 'home_partners';

    private const META_TITLE = self::META_KEY . '_title';
    private const META_GALLERY  = self::META_KEY . '_gallery';

    /**
     * @return array<Field>
     */
    public static function fields(): array
    {
        return [
            Field::make(
                'text',
                self::META_TITLE,
                esc_html__('Section title', 'extend-site')
            )
                ->set_default_value(esc_html__('Đối Tác Của Chúng Tôi', 'extend-site')),

            // media gallery
            Field::make( 'media_gallery', self::META_GALLERY, esc_html__( 'Đối tác', 'extend-site' ) ),
        ];
    }

    public static function get(int $post_id): array
    {
        return [
            'title' => carbon_get_post_meta($post_id, self::META_TITLE),
            'items' => carbon_get_post_meta($post_id, self::META_GALLERY) ?: [],
        ];
    }
}
