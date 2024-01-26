<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$description = $module['description'];
$icon_type = $module['icon_type'];
$icon_svg = $module['icon_svg'];
$icon_image = $module['icon_image'];
$disable_module = $module['disable_module'];
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('cta lg-padding cta-icon', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container text-center text-lg-start">
            <div class="title-container title-container-v2 background-primary text-center" data-aos="flip-left">
                <?php
                if ($icon_type == 'image') {
                    $DisplayData->image(array(
                        'image_id' => $icon_image,
                    ), 'mb-3');
                } else {
                    if ($icon_svg) {
                        $DisplayData->svg(array(
                            'svg' => $icon_svg,
                        ), 'mb-4');
                    }
                }
                $DisplayData->heading(array(
                    'heading' => $heading
                ), 'small-heading');
                $DisplayData->description(array(
                    'description' => $description
                ), 'mb-4"');
                ?>
                <div class="button-group-box justify-content-center">
                    <?php
                    $DisplayData->button(
                        $module['cta_button_text'],
                        $module['cta_' . $module['cta_button_type']],
                        $module['cta_button_action'],
                        $module['cta_button_icon'],
                        'button-accent medium-text',
                    );
                    $DisplayData->button(
                        $module['cta_2_button_text'],
                        $module['cta_2_' . $module['cta_2_button_type']],
                        $module['cta_2_button_action'],
                        $module['cta_2_button_icon'],
                        'button-bordered medium-text',
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>