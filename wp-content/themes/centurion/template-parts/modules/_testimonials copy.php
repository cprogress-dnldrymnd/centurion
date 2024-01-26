<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$SVG = new SVG;
$disable_module = $module['disable_module'];
$testimonials = $GetData->get_posts_ids('testimonials');
?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('testimonials background-gray md-padding', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <?php if (current_user_can('administrator')) { ?>
            <div class="edit-holder" style="margin-top: 50px;"><a target="_blank" href="/wp-admin/edit.php?post_type=testimonials" class="edit-contents"> Manage Testimonial </a></div>
        <?php } ?>

        <div class="container" data-aos="flip-up">
            <?php
            $DisplayData->heading(array(
                'heading' => get__theme_option('testimonial_heading')
            ), 'small-heading text-center mb-5');
            ?>
            <div class="testimonial-box position-relative mb-md-5">
                <div class="swiper mySwiper-Testimonial">
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $key =>  $testimonial) { ?>
                            <div class="swiper-slide ">
                                <div class="swiper-holder h-100">
                                    <div class="rating-box d-flex justify-content-between mb-3">
                                        <div class="stars ">
                                            <div class="stars-holder d-flex align-items-center">
                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <span><?= $SVG->star; ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="day small-text fw-light light-color">
                                            <?= get_date_diff($key) ?>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <?php
                                        $DisplayData->heading(array(
                                            'heading' => get__post_meta_by_id($key, 'testimonial_title'),
                                            'tag' => 'h4'
                                        ), 'fw-semibold');
                                        $DisplayData->description(array(
                                            'description' => get__post_meta_by_id($key, 'testimonial_content'),
                                        ), 'medium-text mb-3');
                                        ?>
                                        <div class="author-box light-color small-text">
                                            <span><?= $testimonial ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="swiper-buttons">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <?php
            $DisplayData->description(array(
                'description' => get__theme_option('testimonial_description')
            ), 'bottom-text text-center d-none d-md-block');
            ?>
        </div>
    </section>
<?php } ?>