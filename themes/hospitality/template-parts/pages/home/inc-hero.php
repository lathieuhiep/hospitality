<?php
/**
 * Home Hero section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\HeroTab;

defined('ABSPATH') || exit;

$hero = hospitality_get_opt(HeroTab::class)?->get(get_the_ID()) ?? [];

// Nếu không có gì để hiển thị → bỏ qua hero
if ( empty($hero['bg_pc']) && empty($hero['bg_mb']) && empty($hero['logo']) ) {
    return;
}
?>

<section class="section sec-hero">
    <div class="item-wrap"
         data-bg-pc="<?php echo esc_url(wp_get_attachment_url($hero['bg_pc'])); ?>"
         data-bg-mb="<?php echo esc_url(wp_get_attachment_url($hero['bg_mb'])); ?>"
    >
        <div class="item-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-xl-4 offset-xl-4">
                        <div class="item-body">
                            <div class="item-logo wow fadeInUp">
                                <?php
                                if ($hero['logo']) {
                                    echo wp_get_attachment_image(
                                        $hero['logo'],
                                        'full',
                                        false,
                                        ['loading' => 'lazy']
                                    );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>