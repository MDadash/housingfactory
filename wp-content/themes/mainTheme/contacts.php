<?php
/*
Template Name: contacts
*/
?>
<?php get_header() ?>

<main>
 <section class="container container--contacts">
        <div class="row application__top">
            <div class="col-md-9 col-lg-10 col-sm-8">
                <h2>Контакты</h2>
                <p class="contacts__top--text">Мы очень рады, что вы проявили интерес</p>
            </div>
            <div class="col-md-3 col-lg-2 col-sm-4 application__btn--box">
                <a href="javascript:history.back();" class="application__btn"><span>Назад</span></a>
            </div>
        </div>
        <div class="contacts__main">
            <div class="row">
                <div class="col-md-4 contacts__main--one">
                    <a href="tel: +<?php echo get_option('my_phone'); ?>" class="application__contact application__contact--phone"><?php echo get_option('my_phone'); ?></a><span class="phone-span">Звоните по всем вопросам</span>
                </div>
                <div class="col-md-4 contacts__main--two">
                    <a  href="tel: +<?php echo get_option('my_second_phone'); ?>" class="application__contact application__contact--phone"><?php echo get_option('my_second_phone'); ?></a>
                    <span class="contacts__request application__contact"><a href="javascript:void(0);" class="contacts__request-call" data-toggle="modal" data-target="#modal-callback">Заказать звонок</a></span>
                    
                </div>
                <div class="col-md-4 contacts__main--three">
                    <a href="<?php echo get_page_link(7112); ?>" class="contacts__btn--request">
                    <span class="contacts__btn-request--text">Подать заявку в банк</span>
                    <span class="contacts__btn-request--text">на ипотеку</span>
                </a>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4 contacts__main--four">
                <a href="mailto:<?php echo get_option('email'); ?>" class="application__contact contacts__mail"><?php echo get_option('email'); ?></a> <span class="phone-span">Электронный адрес</span>
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
                    <p class="application__contact--text"><?php echo get_option('address'); ?><br> г. Волгоград, Кировский район, улица 64-й Армии ул. 71 а, остановка Химтехникум. Мы находимся в трех этажном, офисном здании, на втором этаже.  остановка Химтехникум. Мы находимся в трех этажном, офисном здании, на втором этаже.</p>
                </div>
       
            </div>

        </div>

        <div class="application__map">
          <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adde6636c085d65515e8674cca551991c77d2a38e968fda3da0b0c42cc0148201&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
                
    </section>    
</main>



<?php get_footer() ?>