<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$contact_form = $module['contact_form'];
$disable_module = $module['disable_module'];
?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('contact-form md-padding', $module_id, $template_class) ?> data-aos="flip-up">
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container small-container">
            <?php
            $DisplayData->heading(array(
                'heading' => $heading
            ), 'text-center mb-5');
            ?>

            <div class="contact-form-box">
                <?= do_shortcode($contact_form) ?>
            </div>
          
        </div>
    </section>
<?php } ?>