<?php
/*
Template Name: contacts
*/
?>
<?php get_header() ?>

<main>
 <section class="container container--contacts">
        <div class="row application__top">
            <div class="col-md-9 col-lg-10 col-sm-12">
                <h2>Контакты</h2>
                <p class="contacts__top--text">Мы очень рады, что вы проявили интерес</p>
            </div>
            <div class="col-md-3 col-lg-2 col-sm-12 application__btn--box">
                <a href="#" class="application__btn"><span>Назад</span></a>
            </div>
        </div>
        <div class="contacts__main">
            <div class="row">
                <div class="col-md-4 contacts__main--one">
                    <a href="tel: +89176480611" class="application__contact application__contact--phone">8 917-648-06-11</a><span class="phone-span">Звоните по всем вопросам</span>
                </div>
                <div class="col-md-4 contacts__main--two">
                    <a  href="tel: +89375316677" class="application__contact application__contact--phone">8 937-531-66-77</a>
                    <span class="contacts__request application__contact"><a href="javascript:void(0);" class="contacts__request-call" data-toggle="modal" data-target="#modal-callback">Заказать звонок</a></span>
                    
                </div>
                <div class="col-md-4 contacts__main--three">
                    <a href="<?php echo get_page_link( 9 ); ?>" class="contacts__btn--request">
                    <span class="contacts__btn-request--text">Подать заявку в банк</span>
                    <span class="contacts__btn-request--text">на ипотеку</span>
                </a>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4 contacts__main--four">
                <a href="mailto:floesdesign@gmail.com" class="application__contact contacts__mail"> floesdesign@gmail.com</a> <span class="phone-span">Электронный адрес</span>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 contacts__main--five">
                <button class="request request--sell request--wider" type="button"data-toggle="modal" data-target="#modal-sale">
                    <span class="request__text">Продать свою квартиру</span>
                </button>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <h6 class="application__contact application__contact--location">Мы находимся</h6>
                    <p class="application__contact--text">Город Волгоград, Кировский район, улица 64-й Армии ул. 71 а , остановка Химтехникум. Мы находимся в трех этажном, офисном здании, на втором этаже. </p>
                </div>
       
            </div>

        </div>

        <div class="application__map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A36329de59be7854ce8be36767a9332a8a2289974a709541966d21f0cb4958656&amp;width=100%25&amp;height=400&amp;lang=uk_UA&amp;scroll=true"></script>
        </div>
                
    </section>    
</main>
<div class="modal" id="modal-sale">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Продать квартиру</h2>
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
<div class="modal" id="modal-callback">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Заказать звонок</h2>
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
                    <button class="btn" name="submit" type="submit">Отправить</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>