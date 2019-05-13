<?php

?>
<?php get_header() ?>
<?php $currentFlat = getFlatById($_GET['flat_id']) ?>
<?php $nearestFlat = getNearestFlats($_GET['flat_id']) ?>

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
                        <p class="appartment__description"><?php echo $currentFlat['description']; ?></p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 appartment__rs">
                    <h2 class="appartment__title"><?php echo $currentFlat['location']['locality-name']; ?>
                        ,<br> <?php echo $currentFlat['location']['address']; ?></h2>
                    <div class="appartment__id-wrapper">
                        <span>ID <span><?php echo $currentFlat['@attributes']['internal-id']; ?></span></span><a
                            class="appartment__rooms"><?php echo $currentFlat['rooms']; ?> комнатная</a></div>
                    <strong class="appartment__price"><?php echo $currentFlat['price']['value']; ?> &#8381;</strong>
                    <div class="appartment__info-wr"><span
                            class="appartment__info-title">Район: </span><?php echo $currentFlat['location']['sub-locality-name']; ?>
                    </div>
                    <div class="appartment__info-wr"><?php echo $currentFlat['location']['address']; ?></div>
                    <div class="appartment__info-block-wr">
                      <div class="appartment__info-area"><span
                                class="appartment__info-block-title appartment__info-area-title">Общая площадь</span><strong
                                class="appartment__info-block-desc appartment__info-area-desc"><?php echo $currentFlat['area']['value']; ?>
                          м<sup>2</sup></strong></div>
                        <div class="appartment__info-block"><span
                                class="appartment__info-block-title">Жилая</span><strong
                                class="appartment__info-block-desc"><?php echo $currentFlat['living-space']['value']; ?>
                                м<sup>2</sup></strong></div>
                        <div class="appartment__info-block"><span
                                class="appartment__info-block-title">Кухня</span><strong
                                class="appartment__info-block-desc"><?php echo $currentFlat['kitchen-space']['value']; ?>
                                м<sup>2</sup></strong></div>
                    </div>
                    <div class="appartment__info-block"><span
                            class="appartment__info-block-title">Этажность</span><strong
                            class="appartment__info-block-desc"><?php echo $currentFlat['floor']; ?>
                            /<?php echo $currentFlat['floors-total']; ?></strong></div>
                    <div class="appartment__feedback">
                        <img class="appartment__feedback-img"
                             src="<?php bloginfo('template_url') ?>/images/feedback.jpg" alt="Звоните">
                        <div class="appartment__feedback-wr">
                            <h3 class="appartment__feedback-title">Звоните, я на связи!</h3>
                            <a class="appartment__feedback-call" href="tel:89377311515">8937-731-1515</a>
                            <button class="appartment__feedback-btn" type="button" data-toggle="modal"
                                    data-target="#modal-offer">Вам подобрать другую квартиру?
                            </button>
                        </div>
                    </div>
                    <div class="appartment__mortgage">
                        <a href="<?php echo get_page_link(7112); ?>" class="appartment__mortgage-link">
                            <span class="appartment__mortgage-text">Подать заявку в банк</span>
                            <span class="appartment__mortgage-text">на ипотеку</span>
                        </a>
                    </div>
                    <button class="appartment__btn" type="button" data-toggle="modal" data-target="#modal-offer"><span
                            class="appartment__btn-text">Предложить свою на обмен</span></button>
                    <button class="appartment__btn appartment__btn--offer" type="button" data-toggle="modal"
                            data-target="#modal-offer-price"><span class="appartment__btn-text">Предложить свою стоимость</span>
                    </button>
                    <div class="appartment__change-app-wrapper">
                        <a class="appartment__change-app" href="javascript:history.back();"><i
                                class="fa fa-chevron-left"></i><span
                                class="appartment__change-app-text">Назад</span></a>
                        <a class="appartment__change-app"
                           href="<?php echo get_page_link(7) . '&flat_id=' . getFlatForNextButtonByFlatId($_GET['flat_id']) ?>"><span
                                class="appartment__change-app-text">Следующий объект</span><i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
          <div id="map">
            <p class="map__title">Объект расположен</p>
            <div class="appartment-coord d-none"><span
                      class="appartment-coord__x"><?php echo $currentFlat['Latitude']; ?></span><span
                      class="appartment-coord__y"><?php echo $currentFlat['Longitude']; ?></span></div>
          </div>

            <div class="proposals__item-list row">
                <?php $nearestFlat ? $result = 'Похожие квартиры по вашему запросу' : $result = 'Похожих квартир по вашему запросу не найдено' ?>
                <h2 class="proposals__title col-12"><?php echo $result ?></h2>
                <?php foreach ($nearestFlat as $flat) : ?>
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


    </main>

  <div class="modal modal-offer" id="modal-offer">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Предложить свою на обмен</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <?php echo do_shortcode('[contact-form-7 id="42" title="offer apartment"]'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-offer" id="modal-offer-price">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Предложить свою стоимость</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <?php echo do_shortcode('[contact-form-7 id="7174" title="offer own price"]'); ?>
        </div>
      </div>
    </div>
  </div>

    <script src="//api-maps.yandex.ru/2.1/?b6b2830b-172f-4e65-926c-93cdbba909f6&lang=ru-RU"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            if ($("#map" < 0)) {
                var map = $("#map");
                if (map) {
                    var mapCoordX = +($(".appartment-coord__x").text());
                    var mapCoordY = +($(".appartment-coord__y").text());
                    ymaps.ready(init);

                    function init() {
                        var myMap = new ymaps.Map('map', {
                            center: [mapCoordX, mapCoordY],
                            zoom: 16
                        });
                        var myPlacemark = new ymaps.Placemark(
                            [mapCoordX, mapCoordY], {
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