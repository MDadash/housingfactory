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
                    <!--  <li class="assistance__item">
                        <a class="assistance__link assistance__link--aa" href=""><span>Оценка недвижимости</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ba" href=""><span>Покупка недвижимости</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ao" href=""><span>Объекты недвижимости online</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--co" href=""><span>Обмен недвижимости</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--sera" href=""><span>Управление недвижимостью</span></a>
                    </li>    
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ban" href=""><span>Обмен квартир</span></a>
                    </li>    
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--banew" href=""><span>Купить квартиру в новостройке</span></a>
                    </li>         
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--assb" href=""><span>Оформление сертификата сбербанка</span></a>
                    </li>                    
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--als" href=""><span>Оформление жилищного сертификата</span></a>
                    </li>                                     
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--am" href=""><span>Оформление ипотеки</span></a>
                    </li>                    
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--amc" href=""><span>Оформление военной ипотеки</span></a>
                    </li>                    
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ams" href=""><span>Оформление материнского капитала</span></a>
                    </li>     -->                
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
<!--                     <li class="assistance__item">
                        <a class="assistance__link assistance__link--rri" href=""><span>Оформление прав на квартиру</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--rri" href=""><span>Оформление наследства на квартиру</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--rau" href=""><span>Перевод квартиры в нежилое помещение</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ga" href=""><span>Дарение квартиры (дарственная)</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--rd" href=""><span>Регистрация сделок</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--rrh" href=""><span>Регистрация прав на имущество</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--ra" href=""><span>Оформление квартиры</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--da" href=""><span>Сделки с недвижимостью</span></a>
                    </li>
                    <li class="assistance__item">
                        <a class="assistance__link assistance__link--rdd" href=""><span>Регистрация недвижимости</span></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
