<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$SVG = new SVG;
$heading = $module['heading'];
$description = $module['description'];
$accordion_items = $module['accordion_items'];
$disable_module = $module['disable_module'];
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('accordion-section lg-padding background-gray', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="column-holder" data-aos="fade-left">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $heading
                        ), 'small-heading mb-3');
                        $DisplayData->description(array(
                            'description' => $description
                        ), 'medium-text mb-4');
                        if ($module['accordion_button_type']) {
                            $DisplayData->button(
                                $module['accordion_button_text'],
                                $module['accordion_' . $module['accordion_button_type']],
                                $module['accordion_button_action'],
                                $module['accordion_button_icon'],
                                'button-accent',
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="column-holder">
                        <div class="accordion-box">
                            <div class="accordion accordion-flush" id="accordionRight-<?= $section_id ?>">
                                <?php foreach ($accordion_items as $key => $accordion_item) { ?>
                                    
                                    <div class="accordion-item" data-aos="fade-left" <?= $Helpers->data_aos_delay(count($accordion_items), $key) ?>>
                                        <h2 class="accordion-header" id="flush-heading<?= $key ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $key ?>" aria-expanded="<?= $key == 0 ? 'true' : 'false'?>" aria-controls="flush-collapse<?= $key ?>">
                                                <span class="icon"><?= $SVG->check_circle ?></span>
                                                <span><?= $accordion_item['heading'] ?></span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse<?= $key ?>" class="accordion-collapse collapse <?= $key == 0 ? 'show' : ''?>" aria-labelledby="flush-heading<?= $key ?>" data-bs-parent="#accordionRight-<?= $section_id ?>">
                                            <?php
                                            $DisplayData->description(array(
                                                'description' => $accordion_item['description']
                                            ), 'accordion-body medium-text');
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>