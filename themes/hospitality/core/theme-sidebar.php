<?php
/**
 * Register a formatted sidebar with default HTML structure.
 *
 * @param string $name The name of the sidebar.
 * @param string $id The unique ID of the sidebar.
 * @param string $description The sidebar's description.
 * @return void
 */
function hospitality_register_formatted_sidebar(string $name, string $id, string $description = ''): void
{
    register_sidebar([
        'name'          => $name,
        'id'            => $id,
        'description'   => $description,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}

/**
 * Register all theme sidebars.
 *
 * @return void
 */
function hospitality_register_multiple_sidebars(): void
{
    // Register the main sidebar.
    hospitality_register_formatted_sidebar(
        esc_html__('Sidebar chính', 'hospitality'),
        'sidebar-main',
        esc_html__('Thêm widget sử dụng cho sidebar', 'hospitality')
    );
}

// Hook to register the sidebars.
add_action('widgets_init', 'hospitality_register_multiple_sidebars');