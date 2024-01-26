<?php
$Theme_Options = new Theme_Options;
$DisplayData = new DisplayData;

$heading = get__post_meta('heading');
$subheading = get__post_meta('subheading');
$description = get__post_meta('description');
$contact_form = get__post_meta('contact_form');
$text_bar_heading = get__post_meta('text_bar_heading');
$text_bar_description = get__post_meta('text_bar_description');
$logo = get__post_meta('logo');
$video_url = get__post_meta('video_url');
$video_image = get__post_meta('video_image');
$background_image = (get__post_meta('background_image')) ? wp_get_attachment_image_url(get__post_meta('background_image'), 'full') : $Theme_Options->default_page_banner;


?>
<section class="form-section background-primary md-padding-top sm-padding-bottom overflow-visible" id="form">
  <div class="background-image bg-image " style="background-image: url(<?= $background_image ?>)">
  </div>
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="column-holder left-col content-margin color-white" data-aos="fade-left">
          <?php
          if ($logo) {
            $DisplayData->image(
              array(
                'image_id'    => $logo,
              ),
            );
          }

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
            'checklist-ul fw-light'
          );

          ?>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="column-holder" data-aos="fade-right">
          <div class="video-box">
            <a href="<?= $video_url ?>" data-fancybox>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z" />
              </svg>
              <img src="<?= wp_get_attachment_image_url($video_image, 'large') ?>" alt="video thumbnail">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>