<?php

namespace ResidenceTheme\MetaBox\PageHome\Tabs;

use Carbon_Fields\Field;

defined('ABSPATH') || exit;

final class AboutTab
{
    private const META_KEY = 'home_about';

    // Intro
    private const TITLE    = self::META_KEY . '_title';
    private const DESC     = self::META_KEY . '_desc';

    // Story images
    private const IMG_1    = self::META_KEY . '_img_1';
    private const IMG_2    = self::META_KEY . '_img_2';
    private const IMG_3    = self::META_KEY . '_img_3';
    private const IMG_4    = self::META_KEY . '_img_4';
    private const IMG_5    = self::META_KEY . '_img_5';

    // Story texts
    private const T1_TITLE = self::META_KEY . '_t1_title';
    private const T1_DESC  = self::META_KEY . '_t1_desc';

    private const T2_TITLE = self::META_KEY . '_t2_title';
    private const T2_DESC  = self::META_KEY . '_t2_desc';

    private const T3_TITLE = self::META_KEY . '_t3_title';
    private const T3_DESC  = self::META_KEY . '_t3_desc';
    private const T3_LINK  = self::META_KEY . '_t3_link';

    /**
     * Fields definition
     */
    public static function fields(): array
    {
        return [
            // Intro
            Field::make('separator', 'sep_intro', esc_html__('Giới thiệu', 'extend-site')),
            Field::make('text', self::TITLE, esc_html__('Tiêu đề chính', 'extend-site'))
                ->set_help_text(__('Có thể xuống dòng bằng Enter', 'extend-site')),
            Field::make('textarea', self::DESC, esc_html__('Mô tả', 'extend-site')),

            // Story 1
            Field::make('separator', 'sep_story_1', esc_html__('Câu chuyện – Thai Hoang Hospitality', 'extend-site')),
            Field::make('image', self::IMG_1, esc_html__('Ảnh minh họa 1', 'extend-site')),
            Field::make('image', self::IMG_2, esc_html__('Ảnh minh họa 2', 'extend-site')),
            Field::make('text', self::T1_TITLE, esc_html__('Tiêu đề', 'extend-site')),
            Field::make('textarea', self::T1_DESC, esc_html__('Nội dung', 'extend-site')),

            // image separator
            Field::make('separator', 'sep_story_image', esc_html__('Ảnh chuyển đoạn', 'extend-site')),
            Field::make('image', self::IMG_3, esc_html__('Ảnh toàn cảnh', 'extend-site')),

            // Story 2
            Field::make('separator', 'sep_story_2', esc_html__('Câu chuyện – Thai Hoang Land', 'extend-site')),
            Field::make('text', self::T2_TITLE, esc_html__('Tiêu đề', 'extend-site')),
            Field::make('textarea', self::T2_DESC, esc_html__('Nội dung', 'extend-site')),
            Field::make('image', self::IMG_4, esc_html__('Ảnh minh họa', 'extend-site')),

            // Story 3
            Field::make('separator', 'sep_story_3', esc_html__('Câu chuyện – Hospitality', 'extend-site')),
            Field::make('image', self::IMG_5, esc_html__('Ảnh minh họa', 'extend-site')),
            Field::make('text', self::T3_TITLE, esc_html__('Tiêu đề', 'extend-site')),
            Field::make('textarea', self::T3_DESC, esc_html__('Nội dung', 'extend-site')),
            Field::make('text', self::T3_LINK, esc_html__('Link CTA', 'extend-site'))
                ->set_help_text(__('Ví dụ: /hospitality', 'extend-site')),

        ];
    }

    /**
     * Get data
     */
    public static function get(int $post_id): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Intro – Giới thiệu
            |--------------------------------------------------------------------------
            */
            'intro' => [
                'title' => carbon_get_post_meta($post_id, self::TITLE),
                'desc'  => carbon_get_post_meta($post_id, self::DESC),
            ],

            /*
            |--------------------------------------------------------------------------
            | Story 1 – Thai Hoang Hospitality
            |--------------------------------------------------------------------------
            | IMG 1 + IMG 2 + Text
            */
            'story_1' => [
                'images' => [
                    'img_1' => carbon_get_post_meta($post_id, self::IMG_1),
                    'img_2' => carbon_get_post_meta($post_id, self::IMG_2),
                ],
                'title' => carbon_get_post_meta($post_id, self::T1_TITLE),
                'desc'  => carbon_get_post_meta($post_id, self::T1_DESC),
            ],

            /*
            |--------------------------------------------------------------------------
            | Transition Image – Ảnh chuyển đoạn
            |--------------------------------------------------------------------------
            | IMG 3 (ảnh lớn giữa block)
            */
            'transition' => [
                'image' => carbon_get_post_meta($post_id, self::IMG_3),
            ],

            /*
            |--------------------------------------------------------------------------
            | Story 2 – Thai Hoang Land
            |--------------------------------------------------------------------------
            | Text + IMG 4
            */
            'story_2' => [
                'title' => carbon_get_post_meta($post_id, self::T2_TITLE),
                'desc'  => carbon_get_post_meta($post_id, self::T2_DESC),
                'image' => carbon_get_post_meta($post_id, self::IMG_4),
            ],

            /*
            |--------------------------------------------------------------------------
            | Story 3 – Hospitality (CTA)
            |--------------------------------------------------------------------------
            | IMG 5 + Text + Link
            */
            'story_3' => [
                'image' => carbon_get_post_meta($post_id, self::IMG_5),
                'title' => carbon_get_post_meta($post_id, self::T3_TITLE),
                'desc'  => carbon_get_post_meta($post_id, self::T3_DESC),
                'link'  => carbon_get_post_meta($post_id, self::T3_LINK),
            ],
        ];
    }
}
