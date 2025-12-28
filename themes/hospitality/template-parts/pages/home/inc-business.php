<?php
/**
 * Home Business Activities section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\BusinessActivitiesTab;

defined('ABSPATH') || exit;

$activities = hospitality_get_opt(BusinessActivitiesTab::class)?->get(get_the_ID()) ?? [];

if ( empty($activities['items']) ) {
    return;
}
?>
<!--SVG MASK (STATIC)-->
<svg width="0" height="0" viewBox="0 0 800 817" fill="none"
     xmlns="http://www.w3.org/2000/svg"
     style="position: absolute; pointer-events: none;">
    <clipPath id="homeDuAn-mask" clipPathUnits="objectBoundingBox"
              transform="scale(0.00125 0.00122399021)">
        <path d="M800 31.5275V818L0 818V31.5272C2.37237 29.7213 4.13533 26.7188 5.72417 24.2819C7.20418 22.0191 8.57537 19.7128 9.8595 17.3629C12.9066 11.7929 15.5184 5.96167 17.8037 0L782.153 0.000236882C784.438 5.96191 787.05 11.7714 790.097 17.3632C791.381 19.713 792.752 22.0193 794.211 24.2822C795.799 26.7191 797.584 29.6999 799.956 31.5058L800 31.5275Z"
              fill="black" fill-opacity="0.2"/>
    </clipPath>
</svg>

<!--Business Activities-->
<div class="item-wrap wow fadeInUp">
    <div class="item-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                    <?php if (!empty($activities['title'])) : ?>
                        <h2 class="item-titleMin wow fadeInUp">
                            <?php echo wp_kses_post(nl2br($activities['title'])); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="item-content" wow-down-xl="fadeInUp">
            <div class="duanBox-scroll">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($activities['items'] as $index => $item) : ?>
                            <div class="swiper-slide">
                                <div class="duanBox wow fadeInUp" data-wow-delay="<?php echo esc_attr( ($index + 1)  * 0.1); ?>s">
                                    <div class="duanBox__img">
                                        <?php
                                        if (!empty($item['image'])) {
                                            echo wp_get_attachment_image(
                                                $item['image'],
                                                'large',
                                                false,
                                                ['loading' => 'lazy']
                                            );
                                        }
                                        ?>
                                    </div>

                                    <div class="duanBox__body">
                                        <div class="duanBox__title">
                                            <?php if (!empty($item['title'])) : ?>
                                                <h3><?php echo esc_html($item['title']); ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($item['subtitle'])) : ?>
                                                <p><?php echo esc_html($item['subtitle']); ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <?php if (!empty($item['list'])) : ?>
                                            <ul class="duanBox__list">
                                                <?php foreach ($item['list'] as $row) : ?>
                                                    <li><p><?php echo esc_html($row); ?></p></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Swiper Buttons (STATIC) -->
                    <div class="swiper-btn">
                        <div class="btn-prev wow fadeInUp">
                            <svg width="100%" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="27" cy="27" r="27" transform="rotate(-180 27 27)" fill="#242424"/>
                                <path d="M15.688 28.6108L30.5483 40.1316C32.0731 41.4609 34.57 40.4557 34.57 38.5126L34.57 15.4695C34.57 13.5264 32.0748 12.5212 30.5483 13.8505L15.688 25.3713C14.6821 26.2481 14.6821 27.734 15.688 28.6108Z" fill="#F5F5F5"/>
                            </svg>
                        </div>

                        <div class="btn-next wow fadeInUp">
                            <svg width="100%" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="27" cy="27" r="27" fill="#242424"/>
                                <path d="M38.315 25.3892L23.4546 13.8684C21.9298 12.5391 19.433 13.5443 19.433 15.4874V38.5305C19.433 40.4736 21.9282 41.4788 23.4546 40.1495L38.315 28.6287C39.3208 27.7519 39.3208 26.266 38.315 25.3892Z" fill="#F5F5F5"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative dots (STATIC) -->
    <div class="g-dot d-none d-xl-block"></div>
    <div class="g-dot d-none d-xl-block"></div>
    <div class="g-dot d-none d-xl-block"></div>
    <div class="g-dot d-none d-xl-block"></div>
</div>