<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class CompanyScaleTab
{
    private const META_KEY = 'home_company_scale';

    private const TITLE = self::META_KEY . '_title';
    private const NUMBER = self::META_KEY . '_number';
    private const UNIT = self::META_KEY . '_unit';
    private const DESC = self::META_KEY . '_desc';

    /**
     * @return Field[]
     */
    public static function fields(): array
    {
        return [
            Field::make(
                'separator',
                'sep_company_scale',
                esc_html__('Quy mô doanh nghiệp', 'extend-site')
            ),

            Field::make(
                'text',
                self::TITLE,
                esc_html__('Tiêu đề', 'extend-site')
            ),

            Field::make(
                'text',
                self::NUMBER,
                esc_html__('Số liệu nổi bật', 'extend-site')
            )->set_help_text(
                esc_html__('Ví dụ: 300', 'extend-site')
            ),

            Field::make(
                'text',
                self::UNIT,
                esc_html__('Đơn vị', 'extend-site')
            )->set_help_text(
                esc_html__('Ví dụ: con người, nhân sự', 'extend-site')
            ),

            Field::make(
                'textarea',
                self::DESC,
                esc_html__('Mô tả', 'extend-site')
            ),
        ];
    }

    /**
     * Get data
     */
    public static function get(int $post_id): array
    {
        return [
            'title'  => carbon_get_post_meta($post_id, self::TITLE),
            'number' => carbon_get_post_meta($post_id, self::NUMBER),
            'unit'   => carbon_get_post_meta($post_id, self::UNIT),
            'desc'   => carbon_get_post_meta($post_id, self::DESC),
        ];
    }
}