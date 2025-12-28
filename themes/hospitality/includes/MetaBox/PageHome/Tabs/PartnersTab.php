<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class PartnersTab
{
    private const META_KEY = 'home_partners';

    private const META_TITLE = self::META_KEY . '_title';
    private const META_LIST  = self::META_KEY . '_list';

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

            Field::make(
                'complex',
                self::META_LIST,
                esc_html__('Partners logos', 'extend-site')
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'logo_pc', esc_html__('Logo PC', 'extend-site')),
                    Field::make('image', 'logo_mb', esc_html__('Logo Mobile', 'extend-site')),
                ])
                ->set_header_template('Logo'),
        ];
    }

    public static function get(int $post_id): array
    {
        return [
            'title' => carbon_get_post_meta($post_id, self::META_TITLE),
            'items' => carbon_get_post_meta($post_id, self::META_LIST) ?: [],
        ];
    }
}
