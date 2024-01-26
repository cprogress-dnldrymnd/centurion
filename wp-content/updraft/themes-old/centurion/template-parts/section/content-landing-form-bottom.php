<?php
$Theme_Options = new Theme_Options;
$DisplayData = new DisplayData;

$heading = get__post_meta('heading_form');
$subheading = get__post_meta('subheading_form');
$description = get__post_meta('description_form');
$contact_form = get__post_meta('contact_form');
$text_bar_heading = get__post_meta('text_bar_heading');
$text_bar_description = get__post_meta('text_bar_description');
$background_image = get__post_meta('background_image') ? wp_get_attachment_image_url(get__post_meta('background_image'), 'full') : $Theme_Options->default_page_banner;


?>
<section class="form-section form-section-bottom background-accent lg-padding ">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="column-holder left-col content-margin color-white" data-aos="fade-left">
          <?php

          $DisplayData->heading(
            array(
              'heading'    => $heading,
              'subheading' => $subheading
            ),
            'main-heading'
          );


          $DisplayData->description(
            array(
              'description' => $description,
            ),
            'checklist-ul fw-semibold'
          );

          ?>

          <div class="contact-box small-heading content-margin">
            <div class="heading-box">
              <h3>Contact Us</h3>
            </div>
            <?= do_shortcode('[contact_details]') ?>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="column-holder" data-aos="fade-right">
          <div class="form-box background-white p-4 color-primary position-relative d-inline-block">
            <?= do_shortcode($contact_form) ?>
            <div class="decoration decoration-1"></div>
            <div class="decoration decoration-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>