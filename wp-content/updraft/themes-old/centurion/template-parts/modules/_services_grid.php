<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$services = $module['services'];
$disable_module = $module['disable_module'];


if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('grid-section', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container-fluid gx-0">
            <div class="row g-3 p-3 justify-content-center">
                <?php foreach ($services as $key => $service) { ?>
                    <?php
                    $image = get__post_meta_by_id($service['id'], 'grid_image') ? get__post_meta_by_id($service['id'], 'grid_image') : get_post_thumbnail_id($service['id']);
                    ?>
                    <div class="col-4">
                        <div class="column-holder h-100 background-primary" data-aos="fade-left" <?= $Helpers->data_aos_delay(3, $key) ?>>
                            <div class="grid-box h-100 position-relative text-center">
                                <div class="grid-inner h-100 d-flex flex-column justify-content-center justify-content-lg-end">
                                    <a href="<?= get_permalink($service['id']) ?>" class="link"></a>
                                    <?php
                                    $DisplayData->image(
                                        array(
                                            'image_id' => $image,
                                            'size'     => 'large'
                                        ),
                                        'background-image'
                                    );
                                    $DisplayData->heading(
                                        array(
                                            'heading' => get_the_title($service['id'])
                                        ),
                                        'mb-lg-4 text-white small-heading'
                                    );
                                    ?>
                                    <div class="button-group-box justify-content-center">
                                        <div class="button-box button-primary medium-text d-none d-lg-block">
                                            <a href="/eco-4/">
                                                <span class="text">Get free grant</span>
                                            </a>
                                        </div>
                                        <div class="button-box button-accent medium-text d-none d-lg-block">
                                            <a href="<?= get_permalink($service['id']) ?>">
                                                <span class="text">Learn More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>