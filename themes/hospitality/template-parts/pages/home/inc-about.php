<?php
/**
 * Home About section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\AboutTab;

defined('ABSPATH') || exit;

$about = hospitality_get_opt(AboutTab::class)?->get(get_the_ID()) ?? [];

// Không có intro thì bỏ cả block
if ( empty($about['intro']['title']) && empty($about['intro']['desc']) ) {
    return;
}
?>

<section class="section sec-homeAbout" id="id-gioithieu">
    <div class="container">

        <!-- ================= Intro ================= -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-xl-6 offset-xl-3">
                <div class="item-body">
                    <?php if (!empty($about['intro']['title'])) : ?>
                        <h2 class="item-title wow fadeInUp titlebox__title">
                            <?php echo wp_kses_post(nl2br($about['intro']['title'])); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($about['intro']['desc'])) : ?>
                        <div class="item-text wow fadeInUp">
                            <?php echo wpautop($about['intro']['desc']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="item-cauchuyen">
            <h3 class="titlebox__title wow fadeInUp">
                <?php esc_html_e('Câu Chuyện', 'extend-site'); ?><br>
                <?php esc_html_e('Thương Hiệu', 'extend-site'); ?>
            </h3>

            <!-- ================= Story 1 ================= -->
            <div class="row">
                <div class="col-6 col-md-3 offset-md-1 col-xl-2 offset-xl-2">
                    <div class="f-img f-img-1 wow fadeInUp">
                        <?php
                        if (!empty($about['story_1']['images']['img_1'])) {
                            echo wp_get_attachment_image($about['story_1']['images']['img_1'], 'full');
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6 offset-md-1 col-xl-5 offset-xl-1">
                    <div class="f-img f-img-2 wow fadeInUp">
                        <?php
                        if (!empty($about['story_1']['images']['img_2'])) {
                            echo wp_get_attachment_image($about['story_1']['images']['img_2'], 'full');
                        }
                        ?>
                    </div>

                    <div class="f-text f-text-1 wow fadeInUp">
                        <?php if (!empty($about['story_1']['title'])) : ?>
                            <h3 class="n-title">
                                <?php echo esc_html($about['story_1']['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($about['story_1']['desc'])) : ?>
                            <div class="n-entry">
                                <?php echo wpautop($about['story_1']['desc']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ================= Transition Image ================= -->
            <?php if (!empty($about['transition']['image'])) : ?>
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                        <div class="f-img f-img-3 wow fadeInUp">
                            <?php echo wp_get_attachment_image($about['transition']['image'], 'full'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- ================= Story 2 ================= -->
            <div class="row row-1">
                <div class="col-6 col-md-5 offset-md-2 col-xl-4 offset-xl-3">
                    <div class="f-text f-text-2 wow fadeInUp">
                        <?php if (!empty($about['story_2']['title'])) : ?>
                            <h3 class="n-title">
                                <?php echo esc_html($about['story_2']['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($about['story_2']['desc'])) : ?>
                            <div class="n-entry">
                                <?php echo wpautop($about['story_2']['desc']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-xl-3">
                    <div class="f-img f-img-4 wow fadeInUp">
                        <?php
                        if (!empty($about['story_2']['image'])) {
                            echo wp_get_attachment_image($about['story_2']['image'], 'full');
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- ================= Story 3 (CTA) ================= -->
            <div class="row align-items-xl-center row-2">
                <div class="col-md-5 col-xl-6">
                    <div class="f-img f-img-5 wow fadeInUp">
                        <?php
                        if (!empty($about['story_3']['image'])) {
                            echo wp_get_attachment_image($about['story_3']['image'], 'full');
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6 offset-md-1 col-xl-4 offset-xl-1">
                    <div class="f-text f-text-3 wow fadeInUp">
                        <?php if (!empty($about['story_3']['title'])) : ?>
                            <h3 class="n-title">
                                <?php echo esc_html($about['story_3']['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($about['story_3']['desc'])) : ?>
                            <div class="n-entry">
                                <?php echo wpautop($about['story_3']['desc']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($about['story_3']['link'])) : ?>
                            <div class="n-btn wow fadeInUp">
                                <a href="<?php echo esc_url($about['story_3']['link']); ?>" class="btn-box">
                                    <?php esc_html_e('Xem Thêm', 'extend-site'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>