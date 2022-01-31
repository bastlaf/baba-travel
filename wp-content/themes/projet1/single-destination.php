<?php get_header(); ?>

<main>
    <section class="heroSingle">
        <div class="boxTitleSingle">
            <h1><?php the_title(); ?></h1>
        </div>
        <img src="<?php echo get_field('single-hero')['sizes']['fullpage']; ?>"> 
    </section>

    <section class="section1Single">
        <div class="boxSection1Single">
            <div class="boxTextSingle">
                <?php the_field('texte_single'); ?>    
            </div>
            <div class="boxImageSingle">
            <img class="testimg" src="<?php echo get_field('img_single')['sizes']['large']; ?>"> 
            </div>
        </div>
    </section>



</main>



<?php get_footer(); ?>
