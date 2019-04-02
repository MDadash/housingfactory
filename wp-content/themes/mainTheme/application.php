<?php
/*
Template Name: application
*/
?>
<?php get_header() ?>

<main>
    <section class="container container--application">
        <div class="row application__top">
            <div class="col-md-10">
                <h2>Подать заявку в банк на ипотеку</h2>
                <p class="application__top--text">Мы поможем Вам собрать всё необходимое</p>
            </div>
            <div class="col-md-2 application__btn--box">
                <a href="javascript:history.back();" class="application__btn"><span>Назад</span></a>
            </div>
        </div>
        <div class="application__main">
            <div>
                <embed height="0" src="<?php bloginfo('template_url') ?>/images/123.mp3">
            </div>
            <h3 class="application__main--head">Хотите взять ипотеку или узнать какую Вам сумму одобрит банк? </h3>
            <div class="row">
                <div class="col-md-6 application__main--one">
                    <p><span  class="color-span">1</span>Придите к нам в офис и заполните анкетные данные. Далее, оставьте копию паспорта и копию справки 2 НДФЛ о доходах за последние 6 месяцев.</p>
                </div>
                <div class="col-md-6 application__main--two">
                    <p><span class="color-span">2</span> Подождите 2 дня и получите одобрение. Всё! Приступайте к выбору квартир!</p>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-6 ">
                        <p class="application__main--three">Мы являемся <span class="text-brown">официальными партнерами</span> <span class="text-green">Сбербанка России</span> через нас - Вашу заявку рассматривают быстрее, бесплатные консультации от наших специалистов, прямая помощь менеджеров Сбербанк России, шансов одобрения Вашей заявки больше, лучшие предложения дешевых квартир под Вашу ипотеку.</p>
                </div>
                <div class="col-md-6 application__main--four">
                    <p><span  class="color-span">3</span>Если вы получаете ипотеку через наш офис. Получаете в подарок помощь профессионального риелтора по выбору квартиры под ипотеку и оформление документов - абсолютно бесплатно!</p>
                </div>
            </div>
            <h3 class="application__main--head">Свяжитесь со специалистом или приходите к нам в офис </h3>
        </div>
        <div>
            <div class="row">
                <div class="col-md-8">
                    <h6 class="application__contact application__contact--location">Мы находимся</h6>
                    <p class="application__contact--text">Город Волгоград, Кировский район, улица 64-й Армии ул. 71 а, остановка Химтехникум. Мы находимся в трех этажном, офисном здании, на втором этаже. </p>
                </div>
                <div class="col-md-4">
                    <a href="tel: +89176480611" class="application__contact application__contact--phone">8 917-648-06-11</a> <span class="phone-span">Звоните по всем вопросам</span>
                </div>
            </div>
            <h6 class="application__contact application__contact--call">Мы можем перезвонить сами</h6>
        </div>
       <div class="service-form clearfix">
           <?php echo do_shortcode('[contact-form-7 id="42" title="Contact form 1"]'); ?> 
        </div>
        <div class="application__map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A36329de59be7854ce8be36767a9332a8a2289974a709541966d21f0cb4958656&amp;width=100%25&amp;height=400&amp;lang=uk_UA&amp;scroll=true"></script>
        </div>

        


                 
    </section>    
</main>


<?php get_footer() ?>