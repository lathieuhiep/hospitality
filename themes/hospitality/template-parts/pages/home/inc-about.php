<?php
/**
 * Home About section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\AboutTab;

defined('ABSPATH') || exit;

$about = hospitality_get_opt(AboutTab::class)?->get(get_the_ID()) ?? [];

// Không có dữ liệu → không render
if (
        empty($about['title']) &&
        empty($about['desc']) &&
        empty($about['image'])
) {
    return;
}
?>

<section class="section sec-homeAbout" id="id-gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                <div class="item-body">

                    <?php if (!empty($about['title'])): ?>
                        <h2 class="item-title wow fadeInUp titlebox__title">
                            <?php
                            // Cho phép xuống dòng bằng Enter
                            echo nl2br(esc_html($about['title']));
                            ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($about['desc'])): ?>
                        <div class="item-text wow fadeInUp">
                            <?php echo wpautop(esc_html($about['desc'])); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($about['image'])): ?>
                        <div class="item-img wow fadeInUp">
                            <?php
                            echo wp_get_attachment_image(
                                    $about['image'],
                                    'full',
                                    false,
                                    ['loading' => 'lazy']
                            );
                            ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
