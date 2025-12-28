<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class CoreValuesTab
{
    private const META_KEY = 'home_core_values';

    private const TITLE = self::META_KEY . '_title';
    private const ITEMS = self::META_KEY . '_items';

    /**
     * @return Field[]
     */
    public static function fields(): array
    {
        return [
            // Section title
            Field::make(
                'text',
                self::TITLE,
                esc_html__('Tiêu đề', 'hospitality')
            ),

            // Accordion items
            Field::make(
                'complex',
                self::ITEMS,
                esc_html__('Danh sách giá trị', 'hospitality')
            )
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make(
                        'text',
                        'title',
                        esc_html__('Tên giá trị', 'hospitality')
                    )->set_help_text(
                        'Ví dụ: IDEALISTIC, INNOVATIVE...'
                    ),
                    Field::make(
                        'text',
                        'info',
                        esc_html__('Thông tin ngắn', 'hospitality')
                    ),
                    Field::make(
                        'textarea',
                        'content',
                        esc_html__('Nội dung', 'hospitality')
                    ),
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
            foreach ($items_raw as $row) {
                // Bỏ qua item rỗng hoàn toàn
                if (
                    empty($row['title']) &&
                    empty($row['info']) &&
                    empty($row['content'])
                ) {
                    continue;
                }

                $items[] = [
                    'title' => $row['title'] ?? '',
                    'info' => $row['info'] ?? '',
                    'content' => $row['content'] ?? '',
                ];
            }
        }

        return [
            'title' => carbon_get_post_meta($post_id, self::TITLE),
            'items' => $items,
        ];
    }

}
