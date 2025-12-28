<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class ServicesTab
{
    private const META_KEY = 'home_services';

    private const META_TITLE = self::META_KEY . '_title';
    private const META_DESC  = self::META_KEY . '_desc';
    private const META_LIST  = self::META_KEY . '_list';

    /**
     * Fields definition
     *
     * @return array<Field>
     */
    public static function fields(): array
    {
        return [
            Field::make(
                'textarea',
                self::META_TITLE,
                esc_html__('Title', 'extend-site')
            )
                ->set_rows(3)
                ->set_help_text(
                    esc_html__('Cho phép xuống dòng bằng Enter (sẽ render bằng <br>)', 'extend-site')
                ),

            Field::make(
                'textarea',
                self::META_DESC,
                esc_html__('Description', 'extend-site')
            )
                ->set_rows(4),

            Field::make(
                'complex',
                self::META_LIST,
                esc_html__('Services List', 'extend-site')
            )
                ->set_max(5)
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make(
                        'image',
                        'image',
                        esc_html__('Image', 'extend-site')
                    ),
                    Field::make(
                        'text',
                        'title',
                        esc_html__('Service Title', 'extend-site')
                    ),
                ])
                ->set_header_template('<%- title ? title : "Service item" %>'),
        ];
    }

    /**
     * Get data
     */
    public static function get(int $post_id): array
    {
        return [
            'title' => carbon_get_post_meta($post_id, self::META_TITLE),
            'desc'  => carbon_get_post_meta($post_id, self::META_DESC),
            'items' => carbon_get_post_meta($post_id, self::META_LIST) ?: [],
        ];
    }
}