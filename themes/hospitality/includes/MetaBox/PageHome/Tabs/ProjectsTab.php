<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class ProjectsTab
{
    private const META_KEY = 'home_projects';

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
                ->set_default_value(__('Dự Án Nổi Bật', 'extend-site')),

            Field::make(
                'complex',
                self::META_LIST,
                esc_html__('Projects list', 'extend-site')
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'image', esc_html__('Image', 'extend-site')),
                    Field::make('text', 'title', esc_html__('Project title', 'extend-site')),
                    Field::make('textarea', 'desc', esc_html__('Description', 'extend-site'))
                        ->set_rows(3),
                ])
                ->set_header_template('<%- title ? title : "Project item" %>'),
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
