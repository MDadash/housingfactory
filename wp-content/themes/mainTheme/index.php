<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mainTheme
 */
?>
<?php get_header(); ?>
<?php $lastTwelveFlats = getLasTwelveFlats(); ?>
    <main class="main_page">
        <section class="services container">
            <h2 class="visually-hidden">Услуги</h2>
            <ul class="services__list row">
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-ac"
                                                                href="<?php echo get_permalink(64); ?>"><span
                            class="services__link-text">Обмен<br>недвижимости</span></a></li>
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-as"
                                                                href="<?php echo get_page_link(11); ?>"><span
                            class="services__link-text">Услуги<br>недвижимости</span></a></li>
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-ss"
                                                                href="<?php echo get_page_link(11); ?>"><span
                            class="services__link-text">Услуги<br>риэлтора</span></a></li>
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-m"
                                                                href="<?php echo get_page_link(7112); ?>"><span
                            class="services__link-text">Военная<br>ипотека</span></a></li>
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-ca"
                                                                href="<?php echo get_permalink(69); ?>"><span
                            class="services__link-text">Обмен<br>квартир</span></a></li>
                <li class="services__item col-md-3 col-lg-2"><a class="services__link services__link-ra"
                                                                href="<?php echo get_permalink(115); ?>"><span
                            class="services__link-text">Регистрация прав<br>недвижимости</span></a></li>
            </ul>
        </section>
        <section class="proposals container">
            <div class="proposals__wrapper col-sm-12">
                <div class="row">
                    <h2 class="proposals__main-title proposals__main-title--new">Новые предложения</h2>
                    <a href="<?php echo get_page_link(7112); ?>" class="request request--morg"><span
                            class="request__text request__text--morg">Подать заявку в банк на ипотеку</span></a>
                    <button class="request request--sell" type="button" data-toggle="modal"
                            data-target="#modal-sale"><span
                            class="request__text">Продать свою квартиру</span></button>
                </div>
            </div>
            <div class="proposals__item-list row">
                <?php foreach ($lastTwelveFlats as $flat) : ?>
                    <div class="col-sm-6 col-lg-4">
                        <a class="proposals__item"
                           href="<?php echo get_page_link(7) . '&flat_id=' . $flat['@attributes']['internal-id']; ?>">
                            <div class="proposals__img-wrapper">
                                <span class="proposals__link">Посмотреть</span>
                                <?php if (!is_array($flat['image']) && !is_string($flat['image'])) : ?>
                                    <img class="proposals__img"
                                         src="<?php bloginfo('template_url') ?>/images/noimage.jpg"
                                         alt="<?php echo $flat['location']['address']; ?>">
                                <?php else : ?>
                                    <img class="proposals__img" src="<?php echo is_string($flat['image']) ? $flat['image'] : $flat['image'][0]; ?>"
                                         alt="<?php echo $flat['location']['address']; ?>">
                                <?php endif; ?>
                                <?php if ($flat['mortgage']) : ?>
                                    <span class="proposals__mortgage">Ипотека</span>
                                <?php endif ?>
                                <span class="proposals__rooms"><?php echo $flat['rooms']; ?> комнаты</span>
                            </div>
                            <div class="proposals__info-wrapper">
                                <h3 class="proposals__title"><?php echo $flat['location']['address']; ?></h3>
                                <table class="proposals__info">
                                    <tr>
                                        <td class="proposals__field">Этаж:</td>
                                        <td class="proposals__value"><?php echo $flat['floor'] . '/' . $flat['floors-total']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="proposals__field">Комнат</td>
                                        <td class="proposals__value"><?php echo $flat['rooms']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="proposals__field">Площадь</td>
                                        <td class="proposals__value"><?php echo $flat['area']['value']; ?>m<sup>2</sup>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="proposals__price-wrapper">
                                <span class="proposals__price-new"><?php echo $flat['price']['value']; ?> &#8381;</span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!--         <section class="proposals proposals--disc container">
                    <h2 class="proposals__main-title proposals__main-title--disc">Скидки</h2>
                    </div>
                </section> -->
        <section class="advantages container">
            <h2 class="advantages__main-title">Почему покупают у нас ?</h2>
            <ul class="advantages__list row">
                <li class="advantages__item advantages__item-bb col-sm-6 col-md-4 col-lg-3">
                    <h3 class="advantages__title">Большая база<br>недвижемости</h3>
                    <p class="advantages__descr">У нас большая база по городу Волгоград</p>
                </li>
                <li class="advantages__item advantages__item-ah col-sm-6 col-md-4 col-lg-3">
                    <h3 class="advantages__title">Помощь в оформлении ипотеки</h3>
                    <p class="advantages__descr">Мы помагаем оформить ипотеку абсолютно бесплатно
                    <p>
                </li>
                <li class="advantages__item advantages__item-lh col-sm-6 col-md-4 col-lg-3">
                    <h3 class="advantages__title">Юридическое сопровождение</h3>
                    <p class="advantages__descr">Мы сопровождаем сделку от поиска до покупки</p>
                </li>
                <li class="advantages__item advantages__item-lc col-sm-6 col-md-4 col-lg-3">
                    <h3 class="advantages__title">Низкая<br> комиссия</h3>
                    <p class="advantages__descr">Комиссия на наши услуги для Вас будет не ощутима</p>
                </li>
            </ul>
        </section>
        <section class="info container">
            <div class="info__wrapper">

                <?php $the_query = new WP_Query('p=7078'); ?>
                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                  <h2 class="info__title"><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                <?php endwhile; ?>

                <?php $the_query = new WP_Query('p=7082'); ?>
                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                    <h2 class="info__title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>

                <?php $the_query = new WP_Query('p=7084'); ?>
                <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
                    <h2 class="info__title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>

<!--                <h2 class="info__title">Агентство недвижимости Волгограда "Фабрика Жилья"</h2>-->
<!--                <p class="info__text">Когда вам необходимо продать, обменять или купить квартиру или дом, в этом вопросе-->
<!--                    вам необходимо найти для себя настоящего специалиста. Этим специалистом, дающим весь комплекс услуг-->
<!--                    является наше агентство недвижимости в Волгограде «Фабрика Жилья». Наши риелторы, юристы, оценщики –-->
<!--                    проведут вас от самого начало пути, до заключения сделки. К нам обращаются собственники-->
<!--                    недвижимости, для быстрой и безопасной их реализации. Мы знаем в нашем регионе и мы всегда-->
<!--                    подстраиваемся под требования наших клиентов.</p>-->
<!--                <p class="info__text">Обращаясь к нам в агентство недвижимости вы приобретаете:</p>-->
<!--                <h2 class="info__title">Для покупателей:</h2>-->
<!--                <ol class="info__list">-->
<!--                    <li class="info__item">Наши специалисты - самостоятельно осмотрят выбранную вами недвижимость под-->
<!--                        видом покупателей.-->
<!--                    </li>-->
<!--                    <li class="info__item">Обеспечим полную юридическую проверку документации.</li>-->
<!--                    <li class="info__item">Наши клиенты покупают квартиры намного дешевле, так как мы знаем как вести-->
<!--                        торги, а также выбираем самые недорогие объекты-->
<!--                    </li>-->
<!--                    <li class="info__item">Проверим биографию владельцев квартиры, которых вы её приобретаете, чтобы в-->
<!--                        дальнейшем сделку не могли признать не законной-->
<!--                    </li>-->
<!--                    <li class="info__item">Осуществим оценку квартиры с получением необходимого результата.</li>-->
<!--                    <li class="info__item">Проведем сделку быстро, без рисков и трудозатрат для Вас. Нужно будет только-->
<!--                        Ваше присутствие.-->
<!--                    </li>-->
<!--                    <li class="info__item">При желании оформим ипотеку и подберем для вас жильё.</li>-->
<!--                </ol>-->
<!--                <h2 class="info__title">Для продавцов квартир:</h2>-->
<!--                <ol class="info__list">-->
<!--                    <li class="info__item">Подготовим вашу квартиру к продаже (визуально и юридически).</li>-->
<!--                    <li class="info__item">Произведем оценку — и дадим несколько рекомендаций по формированию цены.</li>-->
<!--                    <li class="info__item">Ваша квартира будет рекламироваться в лучших источниках нашего региона, как-->
<!--                        печатных изданиях, так и сети интернет. Дополнительно, размещаем на нашем сайте-->
<!--                        http://rieltor-vlg.ru-->
<!--                    </li>-->
<!--                    <li class="info__item">Предложим Вашу недвижимость уже имеющимся клиентам и партнерским-->
<!--                        агентствам.-->
<!--                    </li>-->
<!--                    <li class="info__item">Сопроводим на протяжении всех этапов: от приема задатка за квартиру и-->
<!--                        закрытию лицевых счетов, до проведения сделки купли-продажи.-->
<!--                    </li>-->
<!--                </ol>-->
            </div>
        </section>
    </main>

    <a class="btn-scroll">Наверх</a>

<?php

get_footer();
