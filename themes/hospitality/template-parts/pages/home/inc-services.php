<?php
/**
 * Home Services section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\ServicesTab;

defined('ABSPATH') || exit;

$services = hospitality_get_opt(ServicesTab::class)?->get(get_the_ID()) ?? [];

$items = $services['items'] ?? [];

// Không có dữ liệu → không render
if (
    empty($services['title']) &&
    empty($services['desc']) &&
    empty($items)
) {
    return;
}
?>

<section class="section sec-dichVu">
    <div class="item-headWrap">
        <div class="item-fixSticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                        <div class="item-head">
                            <?php if (!empty($services['title'])): ?>
                                <h2 class="item-title wow fadeInUp titlebox__title">
                                    <?php echo nl2br(esc_html($services['title'])); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if (!empty($services['desc'])): ?>
                                <div class="item-text wow fadeInUp">
                                    <?php echo wpautop(esc_html($services['desc'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="item-content">
        <div class="item-sticky">
            <!-- Box text (fixed – chỉ dùng cho desktop XL) -->
            <div class="item-box item-box-text effect-in d-none d-xl-flex" data-index="0" wow-down-xl="fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                            <div class="item-head" style="opacity: 0;">
                                <?php if (!empty($services['title'])): ?>
                                    <h2 class="item-title titlebox__title">
                                        <?php echo nl2br(esc_html($services['title'])); ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if (!empty($services['desc'])): ?>
                                    <div class="item-text">
                                        <?php echo wpautop(esc_html($services['desc'])); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $items = array_values($items);

            // đảm bảo đủ 5 item
            if (count($items) < 5) {
                return;
            }
            ?>

            <!-- ITEM 1 -->
            <div class="item-box item-box-1" data-index="1" wow-down-xl="fadeInUp">
                <div class="t-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 offset-xl-1">
                                <div class="t-img">
                                    <div class="t-img__box">
                                        <?php echo wp_get_attachment_image($items[0]['image'], 'full', false, ['loading' => 'lazy']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 offset-3 col-md-4 col-xl-2 offset-md-1">
                                <div class="t-body">
                                    <span class="t-num">1.</span>
                                    <h2 class="t-title"><?php echo esc_html($items[0]['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="item-box item-box-2" data-index="2" wow-down-xl="fadeInUp">
                <div class="t-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-xl-7 offset-md-1 order-md-2">
                                <div class="t-img">
                                    <div class="t-img__box">
                                        <?php echo wp_get_attachment_image($items[1]['image'], 'full', false, ['loading' => 'lazy']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 col-md-3 col-xl-2 offset-xl-1 order-md-1">
                                <div class="t-body">
                                    <span class="t-num">2.</span>
                                    <h2 class="t-title"><?php echo esc_html($items[1]['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="item-box item-box-3" data-index="3" wow-down-xl="fadeInUp">
                <div class="t-content">
                    <div class="container">
                        <div class="row align-items-end align-items-md-center">
                            <div class="col-6 col-md-5 offset-md-1 col-xl-4 offset-xl-2">
                                <div class="t-img">
                                    <div class="t-img__box">
                                        <?php echo wp_get_attachment_image($items[2]['image'], 'full', false, ['loading' => 'lazy']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2 offset-md-1">
                                <div class="t-body">
                                    <span class="t-num">3.</span>
                                    <h2 class="t-title"><?php echo esc_html($items[2]['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ITEM 4 (LẶP LAYOUT ITEM 1 – ĐÚNG HTML GỐC) -->
            <div class="item-box item-box-1" data-index="4" wow-down-xl="fadeInUp">
                <div class="t-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 offset-xl-1">
                                <div class="t-img">
                                    <div class="t-img__box">
                                        <?php echo wp_get_attachment_image($items[3]['image'], 'full', false, ['loading' => 'lazy']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 offset-3 col-md-4 offset-md-1 col-xl-2">
                                <div class="t-body">
                                    <span class="t-num">4.</span>
                                    <h2 class="t-title"><?php echo esc_html($items[3]['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ITEM 5 -->
            <div class="item-box item-box-4" data-index="5" wow-down-xl="fadeInUp">
                <div class="t-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-9 col-md-5 offset-md-1 offset-3 col-xl-4 offset-xl-1 order-md-2">
                                <div class="t-img">
                                    <div class="t-img__box">
                                        <?php echo wp_get_attachment_image($items[4]['image'], 'full', false, ['loading' => 'lazy']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 col-md-4 offset-md-2 col-xl-3 offset-xl-3 order-md-1">
                                <div class="t-body">
                                    <span class="t-num">5.</span>
                                    <h2 class="t-title"><?php echo esc_html($items[4]['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Dot navigation -->
        <?php for ($i = 0; $i <= count($items); $i++): ?>
            <div class="n-dot n-dot-<?php echo esc_attr($i); ?>" data-index="<?php echo esc_attr($i); ?>"></div>
        <?php endfor; ?>
    </div>
</section>
