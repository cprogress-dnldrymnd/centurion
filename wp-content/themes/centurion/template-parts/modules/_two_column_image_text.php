<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$image = $module['image'];
$heading = $module['heading'];
$description = $module['description'];
$disable_module = $module['disable_module'];
$reverse_column = $module['reverse_column'];
$with_decoration = $module['with_decoration'];
$before_after_image = $module['before_after_image'];
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('two-column-image-text lg-padding', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container">
            <div class="row align-items-center <?= $reverse_column ? 'flex-row-reverse' : '' ?>">
                <div class="col-lg-6">
                    <div class="column-holder" data-aos="flip-up" data-aos-offset="200">

                        <div class="image-box image-box-before-after <?= $with_decoration ?>">
                            <?php foreach ($before_after_image as $beforeafter) { ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="inner position-relative">
                                            <div class="text-before-after">BEFORE</div>
                                            <?php
                                            $DisplayData->image(array(
                                                'image_id' => $beforeafter['before_image'],
                                                'size' => 'medium',
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="inner position-relative">
                                            <div class="text-before-after">AFTER</div>
                                            <?php
                                            $DisplayData->image(array(
                                                'image_id' => $beforeafter['after_image'],
                                                'size' => 'medium',
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                            <div class="decoration decoration-1"></div>
                            <div class="decoration decoration-2"></div>
                        </div>
                        <?php
                        $DisplayData->image(array(
                            'image_id' => $image,
                            'size' => 'large',
                            'with_decoration' => $with_decoration
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="column-holder" data-aos="flip-down" data-aos-offset="200">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $heading
                        ), 'small-heading mb-3');
                        $DisplayData->description(array(
                            'description' => $description
                        ), 'mb-4');

                        ?>
                        <div class="button-group-box">
                            <?php
                            $DisplayData->button(
                                $module['two_col_button_text'],
                                $module['two_col_button_link'],
                                'button-secondary button-big',
                                $module['two_col_button_icon']
                            );
                            ?>
                            <?php
                            $DisplayData->button(
                                $module['two_col_2_button_text'],
                                $module['two_col_2_button_link'],
                                'button-bordered button-big',
                                $module['two_col_2_button_icon']

                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>