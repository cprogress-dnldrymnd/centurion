<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Quote Tool
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header(); ?>
<?php
$Modules = new Modules();
$SVG = new SVG;
$hide_page_banner = carbon_get_the_post_meta('hide_page_banner');
?>
<main id="main" class="page-components">
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="page-title" role="banner">
            <h1><?php the_title() ?></h1>
        </div>

        <?php
        if (!$hide_page_banner) {
            get_template_part('template-parts/section/content', 'banner');
        }
        get_template_part('template-parts/section/content', 'after-banner');
        $Modules->modules_section(get_the_ID());
        ?>
    <?php } ?>


    <section class="formstack">
        <div class="container medium-container">
            <div class="formstack-box nice-transition">
                <script type="text/javascript" src="https://financialadvisoruk.formstack.com/forms/js.php/cctvguys_quote_tool?nojquery=1&nojqueryui=1&nomodernizr=1&no_style=1&no_style_strict=1"></script><noscript><a href="https://financialadvisoruk.formstack.com/forms/cctvguys_quote_tool" title="Online Form">Online Form - CCTVGuys Quote Tool</a></noscript>
                <script type='text/javascript'>
                    if (typeof $ == 'undefined' && jQuery) {
                        $ = jQuery
                    }
                </script>

            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>

<script>
    jQuery(document).ready(function($) {
        page_number();
        current_progress();
        button_click();
        fsPage_Wrapper();
        page_progress();
    });

    function fsPage_Wrapper() {
        jQuery('<div class="fsPageWrapper" style="--transform: 0" current_page="1"></div>').appendTo('.fsForm');
        jQuery('.fsPage').appendTo('.fsPageWrapper');
        jQuery('<button type="button" class="fsPreviousButton fake-fsPreviousButton" aria-label="Previous">Back</button>').appendTo('.fsPagination');
        jQuery('.fsPagination').insertAfter('.fsPageWrapper');

    }

    function button_click() {
        jQuery('.fsImageOptionFieldContainer button').click(function(e) {
            $value = jQuery(this).attr('alt');
            $parent = jQuery(this).parents('.fsPage');


            if ($value == 'Domestic CCTV') {
                $next = jQuery('#fsPage4939864-3');
            } else {
                $next = jQuery('.fsPage:not(.fsHiddenPage)').next();

            }

            $next.removeClass('fsHiddenPage');
            $next_page = $next.attr('page');
            $parent.addClass('fsHiddenPage');

            setTimeout(function() {
                jQuery('.fsNextButton').click();
            }, 300);

            current_progress();
        });


        jQuery(document).on("click", '.fake-fsPreviousButton', function(event) {
            $current_page = jQuery('.fsPage:not(.fsHiddenPage)');
            $current_page.addClass('fsHiddenPage')

            if ($current_page.attr('page') == 3) {
                jQuery('.fsPage[page="1"]').removeClass('fsHiddenPage');
            } else {
                $current_page.prev().removeClass('fsHiddenPage');
            }
            current_progress();
        });

    }

    function current_progress() {
        $current_page = jQuery('.fsPage:not(.fsHiddenPage)');
        $current_progress = $current_page.attr('progress');
        $page = $current_page.attr('page');
        $transform = $current_page.attr('transform');
        jQuery('.fsPageWrapper').css('--transform', '-' + $transform + '%');
        jQuery('.fsPageWrapper').attr('current_page', $page);
        jQuery('.current-page').text($page);
        jQuery('.quote-navigation').css('--progress', $current_progress);
    }

    function page_number() {
        var $page_length = jQuery('.fsPage').length;
        var $key = 1;
        var $transform = 0;
        jQuery('.fsPage').each(function(index, element) {
            $progress = 100 / $page_length;
            jQuery(this).attr('page', $key);
            jQuery(this).attr('transform', $transform * 100);
            $key++;
            $transform++;
        });

    }

    function page_progress() {
        var $page_length = jQuery('.fsPage:not(#fsPage4939864-2)').length;
        var $key = 1;
        jQuery('.fsPage:not(#fsPage4939864-2)').each(function(index, element) {
            $progress = 100 / $page_length;
            jQuery(this).attr('progress', $progress * $key + '%');
            $key++;
        });

        jQuery('.fsPage[page="2"]').attr('progress', '100%');
    }
</script>