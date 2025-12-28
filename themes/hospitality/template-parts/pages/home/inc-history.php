<?php
/**
 * Home History section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\HistoryTab;

defined('ABSPATH') || exit;

$history = hospitality_get_opt(HistoryTab::class)?->get(get_the_ID()) ?? [];

// Không có gì để hiển thị → bỏ block
if ( empty($history['title']) && empty($history['items']) ) {
    return;
}
?>

<section class="section sec-homeLichSu">
    <div class="item-wrap">
        <div class="item-sticky">
            <div class="item-group">
                <!-- ================= Title ================= -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <?php if (!empty($history['title'])) : ?>
                                <h2 class="titlebox__title wow fadeInUp">
                                    <?php echo wp_kses_post(nl2br($history['title'])); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- ================= Timeline ================= -->
                <?php if (!empty($history['items'])) : ?>
                    <div class="item-list" id="homeLichSu-container">
                        <div class="item-list__scroll" id="homeLichSu-list">
                            <?php foreach ($history['items'] as $item) : ?>
                                <div class="f-year">
                                    <div class="f-year__wrap">
                                        <!-- Background image -->
                                        <?php
                                        $bg_style = '';
                                        if (!empty($item['bg_image'])) {
                                            $bg_url  = wp_get_attachment_url($item['bg_image']);
                                            $bg_style = $bg_url
                                                ? 'style="background-image: url(' . esc_url($bg_url) . ');"'
                                                : '';
                                        }
                                        ?>
                                        <div class="f-year__bg" <?php echo $bg_style; ?>></div>

                                        <div class="f-year__body">
                                            <?php if (!empty($item['year'])) : ?>
                                                <span class="f-year__num">
                                                    <?php echo esc_html($item['year']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php if (!empty($item['content'])) : ?>
                                                <div class="f-year__text">
                                                    <?php echo wpautop($item['content']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>