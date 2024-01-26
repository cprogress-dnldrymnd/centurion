<?php
$Modules = new Modules;
get_template_part('template-parts/section/content', 'landing-form');
?>

<div class="landing-page-modules">

  <div class="overlay-slant d-none d-lg-block"></div>

  <?php

  $Modules->modules_section(get_the_ID());

  ?>

</div>
