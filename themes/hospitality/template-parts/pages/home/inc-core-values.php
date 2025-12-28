<?php
/**
 * Home Core Values section
 */

use ResidenceTheme\MetaBox\PageHome\Tabs\CoreValuesTab;

defined('ABSPATH') || exit;

$core_values = hospitality_get_opt(CoreValuesTab::class)?->get(get_the_ID()) ?? [];

// Không có dữ liệu → bỏ block
if ( empty($core_values['title']) && empty($core_values['items']) ) {
    return;
}
?>

<section class="section sec-homegTri">
    <div class="container">
        <div class="row">
            <!-- ================= Title ================= -->
            <div class="col-md-4 col-xl-3 offset-xl-1">
                <?php if (!empty($core_values['title'])) : ?>
                    <h2 class="titlebox__title wow fadeInUp">
                        <?php echo wp_kses_post(nl2br($core_values['title'])); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <!-- ================= Accordion ================= -->
            <div class="col-md-8 col-xl-7 offset-xl-1">
                <?php if (!empty($core_values['items'])) : ?>
                    <div class="accordion">
                        <?php foreach ($core_values['items'] as $index => $item) : ?>
                            <?php
                            // Item đầu tiên mở mặc định
                            $is_active = ($index === 0);
                            ?>
                            <div class="accordion__panel wow fadeInUp <?php echo $is_active ? 'active show' : ''; ?>">
                                <!-- Accordion title -->
                                <div class="accordion__title">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <?php if (!empty($item['title'])) : ?>
                                                <h3 class="f-title">
                                                    <?php echo esc_html($item['title']); ?>
                                                </h3>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-xl-7">
                                            <?php if (!empty($item['info'])) : ?>
                                                <div class="f-info">
                                                    <p><?php echo esc_html($item['info']); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion content -->
                                <div class="accordion__content">
                                    <div class="row">
                                        <div class="col-xl-7 offset-xl-5">
                                            <?php if (!empty($item['content'])) : ?>
                                                <div class="f-entry">
                                                    <?php echo wpautop($item['content']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>