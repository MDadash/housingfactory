<?php
/*
Template Name: services
*/
?>
<?php get_header(); ?>
    <section class="assistance container">
        <div class="row">
            <div class="col-md-6">
                <div class="assistance__wr assistance__wr--seller">
                    <h2 class="assistance__title"><?php echo get_cat_name( 4 ) ?></h2>
                    <!-- <h2 class="assistance__title">Риэлторские услуги</h2> -->
                    <small class="assistance_tiny">Перечень риэлторских услуг</small>
                </div>
                <ul class="assistance__list">
                    <?php 
                        $query = new WP_Query( array( 'category_name' => 'realtor-services' ) );
                            while ( $query->have_posts() ) { $query->the_post(); ?>  
                            <li class="assistance__item">
                                <a class="assistance__link assistance__link--sa" href="<?php echo get_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                    <span><?php the_title(); ?></span></a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="assistance__wr assistance__wr--lawyer">
                    <h2 class="assistance__title"><?php echo get_cat_name( 5 ) ?></h2>
                    <!-- <h2 class="assistance__title">Юридические услуги</h2> -->
                    <small class="assistance_tiny">Перечень Юридических услуг</small>
                </div>
                <ul class="assistance__list assistance__list--lawyer">
                    <?php 
                        $query = new WP_Query( array( 'category_name' => 'legal-services' ) );
                            while ( $query->have_posts() ) { $query->the_post(); ?>  
                                <li class="assistance__item">
                                    <a class="assistance__link assistance__link--rra" href="<?php echo get_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                        <span><?php the_title(); ?></span></a>
                                </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
