<?php
/**
 * Home Company Scale
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\CompanyScaleTab;

defined('ABSPATH') || exit;

$scale = hospitality_get_opt(CompanyScaleTab::class)?->get(get_the_ID()) ?? [];

if ( empty($scale['title']) && empty($scale['number']) ) {
    return;
}
?>

<div class="container">
    <div class="item-headFirst">
        <div class="row">
            <div class="col-md-7 col-xl-5 offset-xl-1">
                <?php if (!empty($scale['title'])) : ?>
                    <h2 class="titlebox__title wow fadeInUp">
                        <?php echo wp_kses_post(nl2br($scale['title'])); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="col-md-5 col-xl-4 offset-xl-1">
                <div class="titlebox__text">
                    <?php if (!empty($scale['number'])) : ?>
                        <div class="f-num wow fadeInUp">
                            <span><?php echo esc_html($scale['number']); ?></span>
                            <?php if (!empty($scale['unit'])) : ?>
                                <?php echo esc_html($scale['unit']); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($scale['desc'])) : ?>
                        <div class="f-text wow fadeInUp">
                            <?php echo wpautop($scale['desc']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>