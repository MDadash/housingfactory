<?php
/*
Template Name: item
*/
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
   <!--                  <?php foreach (getFlatById($_GET['flat_id'])['Images']['Image'] as $img) : ?>
                        <img src="<?php echo $img['@attributes']['url']?>">
                    <?php endforeach;?> -->
                    <p class="appartment__description"><?php echo getFlatById($_GET['flat_id'])['Description']; ?></p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 appartment__rs">
                <h2 class="appartment__title"><?php echo getFlatById($_GET['flat_id'])['City']; ?>,<br> <?php echo getFlatById($_GET['flat_id'])['Street']; ?></h2>
                <div class="appartment__id-wrapper"><span>ID<span><?php echo getFlatById($_GET['flat_id'])['Id']; ?></span><a class="appartment__rooms"><?php echo getFlatById($_GET['flat_id'])['Rooms']; ?> комнатная</a></div>
                <strong class="appartment__price"><?php echo getFlatById($_GET['flat_id'])['Price']; ?> &#8381;</strong>
                <div class="appartment__info-wr"><span class="appartment__info-title">Район:</span><?php echo getFlatById($_GET['flat_id'])['District']; ?></div>
<!--                <div class="appartment__info-wr"><span class="appartment__info-title">Ул:</span>8-ой Воздушной Армии, дом 6 Б</div>-->
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
                        <a class="appartment__feedback-call" href="tel:8 900 78-33-71">8 900 78-33-71 </a>
                        <button class="appartment__feedback-btn" type="button" data-toggle="modal" data-target="#modal-offer">Подобрать другую вам квартиру?</button>
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
            <?php foreach (getNearestFlats($_GET['flat_id']) as $flat) : ?>
                <div class="proposals__item col-sm-6 col-lg-4">
                    <div class="proposals__img-wrapper">
                        <a class="proposals__link"
                           href="<?php echo get_page_link(7) . '&flat_id=' . $flat['Id']; ?>">Посмотреть</a>
                        <?php if (!is_array($flat['Images']['Image'])) : ?>
                            <img class="proposals__img" src="<?php bloginfo('template_url') ?>/images/noimage.jpg"
                                 alt="<?php echo $flat->Street; ?>">
                            <!--                                <span class="proposals__sale">Скидки</span>-->
                            <?php if (!stristr($flat['Description'], 'ипотек')) : ?>
                                <span class="proposals__mortgage">Ипотека</span>
                            <?php endif ?>
                            <span class="proposals__rooms"><?php echo $flat['Rooms']; ?> комнаты</span>
                        <?php else : ?>
                            <img class="proposals__img"
                                 src="<?php echo $flat['Images']['Image'][0]['@attributes']['url']; ?>"
                                 alt="<?php echo $flat->Street; ?>">
                            <!--                                <span class="proposals__sale">Скидки</span>-->
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
                        <!--                        <span class="proposals__price-last">6 500 000 &#8381;</span>-->
                        <span class="proposals__price-new"><?php echo $flat['Price']; ?> &#8381;</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


<!--         <div class="row">
            <div class="application__map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A36329de59be7854ce8be36767a9332a8a2289974a709541966d21f0cb4958656&amp;width=100%25&amp;height=400&amp;lang=uk_UA&amp;scroll=true"></script>
            </div>
        </div> -->
    </section> 
</main>

<div class="modal" id="modal-offer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Предложить свою на обмен</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form class="modal-sell__form" method="post" action="">
                  <div class="form-group">
                    <label for="name">Ваше имя:</label> 
                    <input class="form-control"  id="name" name="name" type="text" required>
                  </div>
                  <div class="form-group">
                    <label for="text">Номер телефона</label> 
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">+7</div>
                      </div> 
                      <input class="form-control"  id="text" name="tel" type="text"required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="rooms">Количество комнат</label> 
                    <div>
                      <select class="custom-select" id="rooms" name="rooms" required="required">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select">Район</label> 
                    <div>
                      <select class="custom-select" id="select" name="select" required="required">
                        <option value="Кировский">Кировский</option>
                        <option value="Кировский">Кировский</option>
                        <option value="Кировский">Кировский</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="adrress">Адрес объекта:</label> 
                    <input id="adrress" name="adrress" type="text" class="form-control">
                  </div> 
                  <div class="form-group">
                    <button class="btn" name="submit" type="submit">Отправить</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-offer-price">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Предложить свою стоимость</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form class="modal-sell__form" method="post" action="">
                  <div class="form-group">
                    <label for="name">Ваше имя:</label> 
                    <input class="form-control"  id="name" name="name" type="text" required>
                  </div>
                  <div class="form-group">
                    <label for="text">Номер телефона</label> 
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">+7</div>
                      </div> 
                      <input class="form-control"  id="text" name="tel" type="text"required>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="name">Ваше цены:</label> 
                        <input class="form-control"  id="name" name="name" type="text" required>
                  </div>

                  <div class="form-group">
                    <button class="btn" name="submit" type="submit">Отправить</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>