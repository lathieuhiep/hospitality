<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class BusinessActivitiesTab
{
    private const META_KEY = 'home_business_activities';

    private const TITLE = self::META_KEY . '_title';
    private const ITEMS = self::META_KEY . '_items';

    /**
     * @return Field[]
     */
    public static function fields(): array
    {
        return [
            Field::make(
                'separator',
                'sep_business_activities',
                esc_html__('Lĩnh vực hoạt động', 'extend-site')
            ),

            Field::make(
                'text',
                self::TITLE,
                esc_html__('Tiêu đề khối', 'extend-site')
            )->set_help_text(
                esc_html__('Ví dụ: Lĩnh Vực Hoạt Động', 'extend-site')
            ),

            Field::make(
                'complex',
                self::ITEMS,
                esc_html__('Danh sách lĩnh vực', 'extend-site')
            )
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make(
                        'image',
                        'image',
                        esc_html__('Hình ảnh', 'extend-site')
                    ),

                    Field::make(
                        'text',
                        'title',
                        esc_html__('Tiêu đề', 'extend-site')
                    ),

                    Field::make(
                        'text',
                        'subtitle',
                        esc_html__('Tiêu đề phụ', 'extend-site')
                    ),

                    Field::make(
                        'complex',
                        'list',
                        esc_html__('Danh sách nội dung', 'extend-site')
                    )
                        ->set_layout('tabbed-vertical')
                        ->add_fields([
                            Field::make(
                                'text',
                                'text',
                                esc_html__('Tiêu đề', 'extend-site')
                            ),
                        ])->set_header_template('
                            <% if (text) { %>
                                <%- text %>
                            <% } %>
                        '),
                ])
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %>
                    <% } %>
                '),
        ];
    }

    /**
     * Get data
     */
    public static function get(int $post_id): array
    {
        $items_raw = carbon_get_post_meta($post_id, self::ITEMS);

        $items = [];

        if (is_array($items_raw)) {
            foreach ($items_raw as $item) {
                $list = [];

                if (!empty($item['list']) && is_array($item['list'])) {
                    foreach ($item['list'] as $row) {
                        if (!empty($row['text'])) {
                            $list[] = $row['text'];
                        }
                    }
                }

                $items[] = [
                    'image' => $item['image'] ?? 0,
                    'title' => $item['title'] ?? '',
                    'subtitle' => $item['subtitle'] ?? '',
                    'list' => $list,
                ];
            }
        }

        return [
            'title' => carbon_get_post_meta($post_id, self::TITLE),
            'items' => $items,
        ];
    }
}