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
                esc_html__('Tiêu đề Section', 'extend-site')
            )
                ->set_default_value(__('Dự Án Nổi Bật', 'extend-site')),

            Field::make(
                'complex',
                self::META_LIST,
                esc_html__('Danh sách dự án', 'extend-site')
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'image', esc_html__('Ảnh dự án', 'extend-site')),
                    Field::make('text', 'title', esc_html__('Tên dự án', 'extend-site')),
                    Field::make('textarea', 'desc', esc_html__('Mô tả ngắn', 'extend-site'))
                        ->set_rows(3),
                    Field::make(
                        'text',
                        'link',
                        esc_html__('Liên kết tùy chỉnh', 'extend-site')
                    )->set_help_text(
                        esc_html__('Nhập Link cho từng dự án. Ví dụ: /du-an-noi-bat hoặc https://example.com', 'extend-site')
                    ),
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
