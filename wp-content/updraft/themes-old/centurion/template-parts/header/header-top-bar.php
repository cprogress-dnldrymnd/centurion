<?php
$Theme_Options = new Theme_Options;
$DisplayData = new DisplayData;
$SVG = new SVG;
$top_bar_text = get__post_meta('top_bar_text');
?>


<div class="top-bar background-black ">
  <div class="container">
    <div class="row row-main justify-content-between">
      <div class="col py-3 ">
        <div class="description-box d-none d-lg-block">
          <?= wpautop($top_bar_text) ?>
        </div>
        <div class="row flex-nowrap gy-3 align-items-center ">
          <div class="col">

          </div>


        </div>
      </div>
      <div class="col-auto col-buttons">
        <div class="button-group-box h-100 d-flex justify-content-end">

          <div class="button-box button-white h-100 m-0 text-end">
            <a href="<?= $Theme_Options->phone_number_url ?>" class="h-100 w-100">
              <span class="icon"><?= $SVG->phone ?></span>
              <span class="text">0303 1000 465</span>
            </a>
          </div>
          <div class="button-box button-accent h-100 text-end me-0">
            <a href="#" class="h-100 w-100">
              <span class="text">Emergency Contact Form</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>