<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$description = $module['description'];
$disable_module = $module['disable_module'];
$background_color = $module['background_color'];
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('cta cta-bar sm-padding ' . $background_color, $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container text-center text-lg-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="column-holder" data-aos="fade-left">
                        <?php
                        $DisplayData->heading(
                            array(
                                'heading' => $heading,
                                'tag' => 'h3'
                            )
                        );
                        $DisplayData->description(
                            array(
                                'description' => $description
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="column-holder" data-aos="fade-right">
                        <div class="button-group-box justify-content-center justify-content-lg-end">
                            <?php
                            $DisplayData->button(
                                $module['cta_button_text'],
                                $module['cta_button_link'],
                                'button-secondary button-big',
                                $module['cta_button_icon']
                            );
                            ?>

                            <?php
                            $DisplayData->button(
                                $module['cta_2_button_text'],
                                $module['cta_2_button_link'],
                                'button-bordered button-big',
                                $module['cta_2_button_icon']
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>