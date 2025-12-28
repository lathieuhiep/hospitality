<?php
/**
 * Home Projects section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\ProjectsTab;

defined('ABSPATH') || exit;

$projects = hospitality_get_opt(ProjectsTab::class)?->get(get_the_ID()) ?? [];
$items    = $projects['items'] ?? [];

if (empty($projects['title']) && empty($items)) {
    return;
}
?>

<section class="section sec-homeDuAn" id="id-duan">
    <svg width="0" height="0" viewBox="0 0 800 817" fill="none" xmlns="http://www.w3.org/2000/svg">
        <clipPath id="homeDuAn-mask" clipPathUnits="objectBoundingBox" transform="scale(0.00125 0.00122399021)">
            <path d="M800 22.0422L800 794.966C800 807.087 790.071 817 777.931 817L428.599 817C424.449 817 420.477 815.352 417.541 812.428L400.004 794.919L382.459 812.428C379.524 815.352 375.552 817 371.401 817H22.0693C9.92883 817 0 807.087 0 794.966L0.000236511 22.0422C0.000236511 9.92094 9.93685 0 22.0773 0H777.923C790.064 0 800 9.92095 800 22.0422Z"/>
        </clipPath>
    </svg>

    <div class="item-wrap wow fadeInUp">
        <div class="item-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                        <div class="item-head">
                            <?php if (!empty($projects['title'])): ?>
                                <h2 class="item-title wow fadeInUp titlebox__title">
                                    <?php echo esc_html($projects['title']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-content" wow-down-xl="fadeInUp">
                <div class="duanBox-scroll">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            <?php foreach ($items as $i => $item): ?>
                                <div class="swiper-slide">
                                    <div
                                        class="duanBox wow fadeInUp"
                                        <?php if ($i > 0): ?>
                                            data-wow-delay=".<?php echo esc_attr($i); ?>s"
                                        <?php endif; ?>
                                    >
                                        <div class="duanBox__img">
                                            <?php
                                            if (!empty($item['image'])) {
                                                echo wp_get_attachment_image(
                                                    $item['image'],
                                                    'full',
                                                    false,
                                                    ['loading' => 'lazy']
                                                );
                                            }
                                            ?>
                                        </div>
                                        <div class="duanBox__body">
                                            <?php if (!empty($item['title'])): ?>
                                                <h3><?php echo esc_html($item['title']); ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($item['desc'])): ?>
                                                <p><?php echo esc_html($item['desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="swiper-btn">
                            <div class="btn-prev">
                                <svg width="100%" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="27" cy="27" r="27" transform="rotate(-180 27 27)" fill="#8EA496"/>
                                    <path d="M15.688 28.6108L30.5483 40.1316C32.0731 41.4609 34.57 40.4557 34.57 38.5126L34.57 15.4695C34.57 13.5264 32.0748 12.5212 30.5483 13.8505L15.688 25.3713C14.6821 26.2481 14.6821 27.734 15.688 28.6108Z" fill="#F5F5F5"/>
                                </svg>
                            </div>

                            <div class="btn-next">
                                <svg width="100%" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="27" cy="27" r="27" fill="#8EA496"/>
                                    <path d="M38.315 25.3892L23.4546 13.8684C21.9298 12.5391 19.433 13.5443 19.433 15.4874V38.5305C19.433 40.4736 21.9282 41.4788 23.4546 40.1495L38.315 28.6287C39.3208 27.7519 39.3208 26.266 38.315 25.3892Z" fill="#F5F5F5"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="g-dot d-none d-xl-block"></div>
        <div class="g-dot d-none d-xl-block"></div>
        <div class="g-dot d-none d-xl-block"></div>
        <div class="g-dot d-none d-xl-block"></div>
    </div>
</section>
