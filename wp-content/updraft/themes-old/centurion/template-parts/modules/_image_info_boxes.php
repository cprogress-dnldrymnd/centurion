<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$SVG = new SVG;
$items = $module['items'];
$disable_module = $module['disable_module'];
?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('image-info-boxes lg-padding', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container text-center">
            <?php
            $DisplayData->heading(array(
                'heading' => $heading
            ), 'small-heading-static main-heading mb-5', 'fade-up');
            ?>
            <div class="row mb-lg-5">
                <?php foreach ($items as $key => $item) { ?>
                    <?php
                    $icon_type = $item['icon_type'];
                    ?>
                    <div class="col-4">
                        <div class="column-holder" data-aos="flip-right" <?= $Helpers->data_aos_delay(3, $key) ?>>
                            <div class="image-info-box mb-5 mb-lg-0">
                                <?php
                                if ($icon_type == 'image') {
                                    $DisplayData->image(array(
                                        'image_id' => $item['icon_image'],
                                    ), 'top-icon text-start mb-5');
                                } else {
                                    if ($item['icon_svg']) {
                                        $DisplayData->svg(array(
                                            'svg' => $item['icon_svg'],
                                        ), 'top-icon text-start mb-5');
                                    }
                                }
                                ?>
                                <?php
                                $DisplayData->image(array(
                                    'image_id' => $item['image'],
                                    'size' => 'medium'
                                ), 'main-image');
                                $DisplayData->heading(array(
                                    'heading' => $item['heading'],
                                    'tag' => 'h3'
                                ), 'mb-4');
                                $DisplayData->description(array(
                                    'description' => $item['description']
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            if ($module['info_box_button_type']) {
                $DisplayData->button(
                    $module['info_box_button_text'],
                    $module['info_box_' . $module['info_box_button_type']],
                    $module['info_box_button_action'],
                    $module['info_box_button_icon'],
                    'button-accent button-big',
                    'fade-up'
                );
            }
            ?>
        </div>
    </section>
<?php } ?>