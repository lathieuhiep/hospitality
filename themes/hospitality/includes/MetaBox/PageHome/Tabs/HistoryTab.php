<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class HistoryTab
{
    private const META_KEY = 'home_history';

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

            // Timeline items
            Field::make(
                'complex',
                self::ITEMS,
                esc_html__('Danh sách mốc thời gian', 'hospitality')
            )
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make(
                        'text',
                        'year',
                        esc_html__('Năm', 'hospitality')
                    )->set_help_text(
                        'Ví dụ: 1999, 2000, 2024'
                    ),
                    Field::make(
                        'textarea',
                        'content',
                        esc_html__('Nội dung', 'hospitality')
                    ),
                    Field::make(
                        'image',
                        'bg_image',
                        'Ảnh nền'
                    ),
                ])->set_header_template('
                    <% if (year) { %>
                        <%- year %>
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
                    empty($row['year']) &&
                    empty($row['content']) &&
                    empty($row['bg_image'])
                ) {
                    continue;
                }

                $items[] = [
                    'year' => $row['year'] ?? '',
                    'content' => $row['content'] ?? '',
                    'bg_image' => (int)($row['bg_image'] ?? 0),
                ];
            }
        }

        return [
            'title' => carbon_get_post_meta($post_id, self::TITLE),
            'items' => $items,
        ];
    }
}