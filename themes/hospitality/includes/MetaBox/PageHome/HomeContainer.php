<?php

namespace ResidenceTheme\MetaBox\PageHome;

use Carbon_Fields\Container;
use ResidenceTheme\MetaBox\PageHome\Tabs\AboutTab;
use ResidenceTheme\MetaBox\PageHome\Tabs\HeroTab;
use ResidenceTheme\MetaBox\PageHome\Tabs\PartnersTab;
use ResidenceTheme\MetaBox\PageHome\Tabs\ProjectsTab;
use ResidenceTheme\MetaBox\PageHome\Tabs\ServicesTab;

defined('ABSPATH') || exit;

final class HomeContainer
{
    /**
     * Boot Home Page metabox
     */
    public static function boot(): void
    {
        // include tabs (dependency của Home)
        require_once __DIR__ . '/Tabs/HeroTab.php';
        require_once __DIR__ . '/Tabs/AboutTab.php';
        require_once __DIR__ . '/Tabs/ServicesTab.php';
        require_once __DIR__ . '/Tabs/ProjectsTab.php';
        require_once __DIR__ . '/Tabs/PartnersTab.php';

        self::register();
    }

    /**
     * Register Carbon Fields container
     */
    protected static function register(): void
    {
        Container::make(
            'post_meta',
            esc_html__('Home Page Options', 'hospitality')
        )
            ->where('post_type', '=', 'page')
            ->where('post_template', '=', 'templates/page-home.php')
            ->add_tab(
                esc_html__('Hero', 'hospitality'),
                HeroTab::fields()
            )->add_tab(
                esc_html__('Giới thiệu', 'hospitality'),
                AboutTab::fields()
            )->add_tab(
                esc_html__('Dịch vụ', 'hospitality'),
                ServicesTab::fields()
            )->add_tab(
                esc_html__('Dự án', 'hospitality'),
                ProjectsTab::fields()
            )->add_tab(
                esc_html__('Đối tác', 'hospitality'),
                PartnersTab::fields()
            );
    }
}
