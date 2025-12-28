<?php
/**
 * Home Partners section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\PartnersTab;

defined('ABSPATH') || exit;

$partners = hospitality_get_opt(PartnersTab::class)?->get(get_the_ID()) ?? [];
$items    = $partners['items'] ?? [];

if (empty($partners['title']) && empty($items)) {
    return;
}
?>

<section class="section sec-homeDoiTac">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                <div class="item-head">
                    <?php if (!empty($partners['title'])): ?>
                        <h2 class="item-title wow fadeInUp titlebox__title">
                            <?php echo esc_html($partners['title']); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($items)): ?>
        <div class="item-logo">
            <div class="f-wrap">

                <?php foreach ($items as $item): ?>
                    <div class="f-logo">
                        <img
                            src=""
                            alt=""
                            <?php if (!empty($item['logo_pc'])): ?>
                                data-img-pc="<?php echo esc_url(wp_get_attachment_url($item['logo_pc'])); ?>"
                            <?php endif; ?>
                            <?php if (!empty($item['logo_mb'])): ?>
                                data-img-mb="<?php echo esc_url(wp_get_attachment_url($item['logo_mb'])); ?>"
                            <?php endif; ?>
                        >
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>
</section>