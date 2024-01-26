<?php
$GetData = new GetData();
$DisplayData = new DisplayData();
$category = $GetData->get_terms_details('equipment_category', true, 'DESC');
?>
<section class="equipment-archive md-padding">
    <div class="container medium-container">
        <?php foreach ($category as $key => $cat) { ?>
            <div class="equipment-category">
                <div class="title-container background-gray text-center">
                    <div class="inner">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $cat['name'],
                        ), false, false);
                        $DisplayData->description(array(
                            'description' => $cat['description'],
                        ), false, false);
                        ?>
                    </div>
                </div>
                <div class="equipment-list">
                    <?php
                    $tax_query = array(
                        'taxonomy' => 'equipment_category',
                        'field'    => 'id',
                        'terms'    => $key,
                    );
                    $posts = $GetData->get_posts_details('equipments', -1, 'publish', $tax_query);
                    ?>

                    <?php foreach ($posts as $post) { ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="column-holder">

                                    <?php
                                    $DisplayData->image(array(
                                        'image_id' => $post['thumbnail'],
                                        'size' => 'large'
                                    ), false, false);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="column-holder">
                                    <?php
                                    $DisplayData->heading(array(
                                        'heading' => $post['name'],
                                        'tag' => 'h3'
                                    ), 'small-heading mb-4', false);
                                    $DisplayData->description(array(
                                        'description' => $post['description'],
                                    ), 'checklist-ul medium-text', false);
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>