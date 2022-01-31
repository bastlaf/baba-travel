<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>

    <?php acf_form_head(); ?>    
    <?php wp_head(); ?>
</head>

<?php wp_body_open(); ?>
<body <?php body_class(); ?>>
    
<header>
    <?php 
        $buttonCarteService1 = get_field('headerlink', 'option');
        if( $buttonCarteService1 ): 
            $buttonCarteService1_url = $buttonCarteService1['url'];
            $buttonCarteService1_title = $buttonCarteService1['title'];
    ?>
    <a href="<?php echo esc_url( $buttonCarteService1_url ); ?>"><?php echo esc_html( $buttonCarteService1_title ); ?></a>
    <?php endif; ?>
    <!-- <p>Bastien</p> -->
</header>