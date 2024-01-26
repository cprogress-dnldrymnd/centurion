<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$SVG = new SVG;
$disable_module = $module['disable_module'];
$testimonials = $GetData->get_posts_ids('testimonials');
?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('testimonials background-white md-padding', $module_id, $template_class) ?>>
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
            ), 'small-heading text-center mb-3');
            ?>
            <?php
            $DisplayData->description(array(
                'description' => get__theme_option('testimonial_description')
            ), 'bottom-text mb-5 text-center');
            ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="google-reviews text-center">
                        <h4>5 Star Rated</h4>
                        <div class="stars d-inline-flex align-items-center mb-2">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <span class="mx-1"><?= $SVG->star; ?></span>
                            <?php } ?>
                        </div>
                        <p>
                            Based on <strong>51 reviews</strong>
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="122.052" height="40.108" viewBox="0 0 122.052 40.108">
                            <g id="_937b312ac452484" data-name="937b312ac452484" transform="translate(-0.744 -0.259)">
                                <path id="Path_187" data-name="Path 187" d="M449.036,60.584l3.4,2.265a9.921,9.921,0,0,1-8.3,4.41,9.74,9.74,0,0,1-9.878-9.952c0-5.93,4.261-9.952,9.4-9.952,5.17,0,7.7,4.112,8.522,6.332l.447,1.132-13.32,5.513a5.047,5.047,0,0,0,4.827,3.01,5.67,5.67,0,0,0,4.9-2.756Zm-10.444-3.591,8.895-3.695a3.862,3.862,0,0,0-3.695-2.116,5.47,5.47,0,0,0-5.2,5.811Z" transform="translate(-329.83 -35.832)" fill="#ff302f" />
                                <path id="Path_188" data-name="Path 188" d="M407.407,4.931H411.7V34.073h-4.291V4.931Z" transform="translate(-309.403 -3.555)" fill="#20b15a" />
                                <path id="Path_189" data-name="Path 189" d="M331.634,48.081h4.142v17.7c0,7.345-4.336,10.37-9.461,10.37a9.479,9.479,0,0,1-8.82-5.885l3.8-1.579a5.516,5.516,0,0,0,5.021,3.546c3.293,0,5.319-2.041,5.319-5.855v-1.43h-.149a6.836,6.836,0,0,1-5.244,2.265,9.969,9.969,0,0,1,0-19.92,6.944,6.944,0,0,1,5.244,2.22h.149v-1.43Zm.3,9.208c0-3.516-2.339-6.079-5.319-6.079a5.763,5.763,0,0,0-5.542,6.079,5.71,5.71,0,0,0,5.542,5.989c2.98.015,5.319-2.518,5.319-5.989Z" transform="translate(-240.394 -35.784)" fill="#3686f7" />
                                <path id="Path_190" data-name="Path 190" d="M154.895,57.072a9.952,9.952,0,1,1-9.952-9.967,9.811,9.811,0,0,1,9.952,9.967Zm-4.35,0a5.617,5.617,0,1,0-11.2,0,5.617,5.617,0,1,0,11.2,0Z" transform="translate(-102.139 -35.642)" fill="#ff302f" />
                                <path id="Path_191" data-name="Path 191" d="M245.784,57.306a9.952,9.952,0,1,1-9.952-9.952,9.811,9.811,0,0,1,9.952,9.952Zm-4.366,0a5.617,5.617,0,1,0-11.2,0,5.617,5.617,0,1,0,11.2,0Z" transform="translate(-171.29 -35.832)" fill="#ffba40" />
                                <path id="Path_192" data-name="Path 192" d="M16.492,27.062A11.135,11.135,0,0,1,5.363,15.784,11.135,11.135,0,0,1,16.492,4.505,10.827,10.827,0,0,1,24.135,7.53L27.13,4.535A14.776,14.776,0,0,0,16.492.259,15.746,15.746,0,0,0,.744,15.784,15.746,15.746,0,0,0,16.492,31.308a14.23,14.23,0,0,0,10.832-4.35,14,14,0,0,0,3.665-9.923,16.777,16.777,0,0,0-.253-2.786H16.492v4.142H26.638a9,9,0,0,1-2.324,5.572,10.322,10.322,0,0,1-7.822,3.1Z" transform="translate(0 0)" fill="#3686f7" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonial-box position-relative mb-md-5">
                        <div class="row">
                            <?php foreach ($testimonials as $key =>  $testimonial) { ?>
                                <div class="col-md-4 ">
                                    <div class="author-box d-flex align-items-center small-text mb-2">
                                        <div class="avatar">
                                            <?= substr($testimonial, 0, 1); ?>
                                        </div>
                                        <div class="author-date">
                                            <strong><span><?= $testimonial ?></span></strong>
                                            <div class="day small-text fw-light light-color">
                                                <?= get_date_diff($key) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-box d-flex justify-content-between mb-3">
                                        <div class="stars ">
                                            <div class="stars-holder d-flex align-items-center">
                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <span><?= $SVG->star; ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="inner">
                                        <?php
                                        $DisplayData->description(array(
                                            'description' => get__post_meta_by_id($key, 'testimonial_content'),
                                        ), 'medium-text mb-3');
                                        ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
<?php } ?>