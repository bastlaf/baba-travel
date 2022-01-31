<?php get_header(); ?>

<main>
    <section class="hero">
        <h1>Prêt à voyager ?</h1>

        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                <?php 
                    $args = array(  
                        'post_type' => 'Destination'
                    );                        
                    // Query CPT
                    $query = new WP_Query( $args ); 
                    if ($query->have_posts()) :
                        while ( $query->have_posts() ) : $query->the_post(); 
                ?>

                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>">
                        <div class="card">
                            <img src="<?php the_post_thumbnail( 'large' ); ?>" alt="">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a> 
                </div>

                <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
                <?php wp_reset_postdata();?> 

                    
            </div>
        
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->          
        </div>
    </section>
</main>

<?php get_footer(); ?>









