<?php
/*
Template Name: category
*/
?>
<?php get_header() ?>

<main class="main_page">
    <section class="proposals container">
        <div class="proposals__wrapper col-sm-12">
            <div class="row">
                <h2 class="proposals__main-title proposals__main-title--new">Новые предложения</h2>
                <a href="<?php echo get_page_link( 9 ); ?>" class="request request--morg" ><span class="request__text request__text--morg">Подать заявку в банк на ипотеку</span></a>
                <button class="request request--sell" type="button" data-toggle="modal" data-target="#modal-sale"><span class="request__text">Продать свою квартиру</span></button>
            </div>
        </div>
        <div class="proposals__item-list row">
            <?php foreach (getOnlyFlats() as $flat) : ?>
                <div class="proposals__item col-sm-6 col-lg-4">
                    <div class="proposals__img-wrapper">
                        <a class="proposals__link" href="<?php echo get_page_link( 7 ) . '&flat_id=' . $flat['Id']; ?>">Посмотреть</a>
                        <!--                        <img class="proposals__img" src="--><?php //bloginfo('template_url') ?><!--/images/app-1.jpg" alt="--><?php //echo $flat->Street;?><!--">-->
                        <img class="proposals__img" src="<?php echo $flat['Images']['Image'][0]['@attributes']['url']; ?>" alt="<?php echo $flat->Street;?>">
                        <span class="proposals__sale">Скидки</span>
                        <span class="proposals__mortgage">Ипотека</span>
                        <span class="proposals__rooms"><?php echo $flat['Rooms'];?> комнаты</span>
                        <?php if(count($flat['Images']['Image']) >= 8) : ?>
                            <span class="proposals__reccommend"></span>
                        <?php endif ?>
                    </div>
                    <div class="proposals__info-wrapper">
                        <h3 class="proposals__title"><?php echo $flat['Street'];?></h3>
                        <table class="proposals__info">
                            <tr>
                                <td class="proposals__field">Этаж:</td>
                                <td class="proposals__value"><?php echo $flat['Floor'];?>/<?php echo $flat['Floors'];?></td>
                            </tr>
                            <tr>
                                <td class="proposals__field">Комнат</td>
                                <td class="proposals__value"><?php echo $flat['Rooms'];?></td>
                            </tr>
                            <tr>
                                <td class="proposals__field">Площадь</td>
                                <td class="proposals__value"><?php echo $flat['Square'];?>m<sup>2</sup></td>
                            </tr>
                        </table>
                    </div>
                    <div class="proposals__price-wrapper">
                        <!--                        <span class="proposals__price-last">6 500 000 &#8381;</span>-->
                        <span class="proposals__price-new"><?php echo $flat['Price'];?> &#8381;</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <a class="btn-scroll">Наверх</a>

</main>

<?php get_footer() ?>
