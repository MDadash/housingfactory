<?php

?>
<?php get_header() ?>

<main> 

    <section class="appartment container">
        <div class="row">
            <div class="col-md-6 col-lg-8 appartment__rs">
                <div class="slider__wrapper">
                    <ul id="slider">
                    </ul>
                </div>
                <div>
                    <h2 class="appartment__title">Описание квартиры</h2>
                    <p class="appartment__description"><?php echo getFlatById($_GET['flat_id'])['Description']; ?></p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 appartment__rs">
                <h2 class="appartment__title"><?php echo getFlatById($_GET['flat_id'])['City']; ?>,<br> <?php echo getFlatById($_GET['flat_id'])['Street']; ?></h2>
                <div class="appartment__id-wrapper"><span>ID<span><?php echo getFlatById($_GET['flat_id'])['Id']; ?></span></span><a class="appartment__rooms"><?php echo getFlatById($_GET['flat_id'])['Rooms']; ?> комнатная</a></div>
                <strong class="appartment__price"><?php echo getFlatById($_GET['flat_id'])['Price']; ?> &#8381;</strong>
                <div class="appartment__info-wr"><span class="appartment__info-title">Район:</span><?php echo getFlatById($_GET['flat_id'])['District']; ?></div>
                <div class="appartment__info-wr"><?php echo getFlatById($_GET['flat_id'])['Street']; ?></div>
                <div class="appartment__info-block-wr">
                    <div class="appartment__info-block"><span class="appartment__info-block-title">Жилая</span><strong class="appartment__info-block-desc"><?php echo getFlatById($_GET['flat_id'])['LivingSpace']; ?> м<sup>2</sup></strong></div>
                    <div class="appartment__info-block"><span class="appartment__info-block-title">Кухня</span><strong class="appartment__info-block-desc"><?php echo getFlatById($_GET['flat_id'])['KitchenSpace']; ?> м<sup>2</sup></strong></div>
                </div>
                <div class="appartment__info-block"><span class="appartment__info-block-title">Этажность</span><strong class="appartment__info-block-desc"><?php echo getFlatById($_GET['flat_id'])['Floor']; ?>/<?php echo getFlatById($_GET['flat_id'])['Floors']; ?></strong></div>
                <div class="appartment__feedback">
                    <img class="appartment__feedback-img" src="<?php bloginfo('template_url') ?>/images/feedback.jpg" alt="Звоните">
                    <div class="appartment__feedback-wr">
                        <h3 class="appartment__feedback-title">Звоните, я на связи!</h3>
                        <a class="appartment__feedback-call" href="tel:89377311515">8937-731-1515</a>
                        <button class="appartment__feedback-btn" type="button" data-toggle="modal" data-target="#modal-offer">Вам подобрать другую квартиру?</button>
                    </div>
                </div>
                <div class="appartment__mortgage">
                    <a href="<?php echo get_page_link( 9 ); ?>" class="appartment__mortgage-link">
                        <span class="appartment__mortgage-text">Подать заявку в банк</span>
                        <span class="appartment__mortgage-text">на ипотеку</span>
                    </a>
                </div>
                <button class="appartment__btn" type="button" data-toggle="modal" data-target="#modal-offer"><span class="appartment__btn-text">Предложить свою на обмен</span></button>
                <button class="appartment__btn appartment__btn--offer" type="button" data-toggle="modal" data-target="#modal-offer-price"><span class="appartment__btn-text">Предложить свою стоимость</span></button>
                <div class="appartment__change-app-wrapper">
                    <a class="appartment__change-app" href="javascript:history.back();"><i class="fa fa-chevron-left"></i><span class="appartment__change-app-text">Назад</span></a>
                    <a class="appartment__change-app" href="<?php echo get_page_link(7) . '&flat_id=' . getFlatForNextButtonByFlatId($_GET['flat_id'])?>"><span class="appartment__change-app-text">Следующий объект</span><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="proposals__item-list row">
            <h2 class="proposals__title col-12">Похожие квартиры по вашему запросу</h2> 
            <?php foreach (getNearestFlats($_GET['flat_id']) as $flat) : ?>
                <a class="proposals__item col-sm-6 col-lg-4" href="<?php echo get_page_link(7) . '&flat_id=' . $flat['Id']; ?>">
                    <div class="proposals__img-wrapper">
                        <span class="proposals__link" >Посмотреть</span>
                        <?php if (!is_array($flat['Images']['Image'])) : ?>
                            <img class="proposals__img" src="<?php bloginfo('template_url') ?>/images/noimage.jpg"
                                 alt="<?php echo $flat->Street; ?>">
                            <?php if (!stristr($flat['Description'], 'ипотек')) : ?>
                                <span class="proposals__mortgage">Ипотека</span>
                            <?php endif ?>
                            <span class="proposals__rooms"><?php echo $flat['Rooms']; ?> комнаты</span>
                        <?php else : ?>
                            <img class="proposals__img"
                                 src="<?php echo $flat['Images']['Image'][0]['@attributes']['url']; ?>"
                                 alt="<?php echo $flat->Street; ?>">
                            <?php if (!stristr($flat['Description'], 'ипотек')) : ?>
                                <span class="proposals__mortgage">Ипотека</span>
                            <?php endif ?>
                            <span class="proposals__rooms"><?php echo $flat['Rooms']; ?> комнаты</span>
                            <?php if (count($flat['Images']['Image']) >= 8) : ?>
                                <span class="proposals__reccommend"></span>
                            <?php endif ?>
                        <?php endif; ?>
                    </div>
                    <div class="proposals__info-wrapper">
                        <h3 class="proposals__title"><?php echo $flat['Street']; ?></h3>
                        <table class="proposals__info">
                            <tr>
                                <td class="proposals__field">Этаж:</td>
                                <td class="proposals__value"><?php echo $flat['Floor']; ?>
                                    /<?php echo $flat['Floors']; ?></td>
                            </tr>
                            <tr>
                                <td class="proposals__field">Комнат</td>
                                <td class="proposals__value"><?php echo $flat['Rooms']; ?></td>
                            </tr>
                            <tr>
                                <td class="proposals__field">Площадь</td>
                                <td class="proposals__value"><?php echo $flat['Square']; ?>m<sup>2</sup></td>
                            </tr>
                        </table>
                    </div>
                    <div class="proposals__price-wrapper">
                        <span class="proposals__price-new"><?php echo $flat['Price']; ?> &#8381;</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <div id="map">
        <div class="appartment-coord d-none"><span class="appartment-coord__x">55.757741</span><span class="appartment-coord__y"> 37.624725</span></div>
    </div>

</main>

<script src="//api-maps.yandex.ru/2.1/?b6b2830b-172f-4e65-926c-93cdbba909f6&lang=ru-RU" type="text/javascript"></script>
<script>
    $( document ).ready(function() {
       if ($("#map" < 0)) {
            var map = $("#map");
            if (map) {
                var mapCoordX = +($(".appartment-coord__x").text());
                var mapCoordY= +($(".appartment-coord__y").text());
                    ymaps.ready(init);
                    function init () {
                           var myMap = new ymaps.Map('map', {
                                center: [mapCoordX, mapCoordY],  
                                zoom: 16
                            });
                            var myPlacemark = new ymaps.Placemark(
                                [mapCoordX,mapCoordY] , {
                                hintContent: 'Нам сюда'                
                            }, {
                                iconImageSize: [45, 45],                                 
                                iconImageOffset: [-70, -40]                            
                                });     
                            myMap.geoObjects.add(myPlacemark);

                    }        
            }
        }
    });
</script>
<?php get_footer() ?>