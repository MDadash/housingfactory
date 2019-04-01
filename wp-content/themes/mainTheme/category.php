<?php
/*
Template Name: category
*/
?>
<?php get_header() ?>

<main class="category_page">

    <section class="category__filter">
        <div class="container container--articles">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">

                    <div class="row">
                        <h2 class="filter__heading col-12 px-1">Количество комнат</h2>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href=""
                                                                                          class="filter__option">Комната</a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href=""
                                                                                          class="filter__option">1
                                комнатная</a></div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href=""
                                                                                          class="filter__option">2
                                комнатная</a></div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href=""
                                                                                          class="filter__option">3
                                комнатная</a></div>
                        <div class="col-12 col-md-6 col-lg-3 col-xl px-1 my-1 my-lg-0"><a href=""
                                                                                          class="filter__option">4 и
                                более комнатная</a></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="row">
                        <h2 class="filter__heading col-12 px-1">Район</h2>
                        <select name="select-district" id="select-district"
                                class="filter__select px-1 my-1 my-lg-0 mx-1">
                            <option value="">- Выберите район -</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category__additionaltext">
        <div class="container">
            <div class="row">
                <h2 class="col-12 additionaltext__heading">Студии в Кировском районе</h2>
                <p class="col-12">Когда вам необходимо продать, обменять или купить квартиру или дом, в этом вопросе вам
                    необходимо найти для себя настоящего специалиста. Этим специалистом, дающим весь комплекс услуг
                    является наше агентство недвижимости в Волгограде «Фабрика Жилья».</p>
            </div>
        </div>
    </section>

    <main class="main_page">
        <section class="proposals container">
            <div class="proposals__wrapper col-sm-12">
                <div class="row">
                    <h2 class="proposals__main-title proposals__main-title--new">Новые предложения</h2>
                    <a href="<?php echo get_page_link(9); ?>" class="request request--morg"><span
                            class="request__text request__text--morg">Подать заявку в банк на ипотеку</span></a>
                    <button class="request request--sell" type="button" data-toggle="modal" data-target="#modal-sale">
                        <span class="request__text">Продать свою квартиру</span></button>
                </div>
            </div>
            <div class="proposals__item-list row">

            </div>
        </section>

        <section class="category__additionaltext">
            <div class="container">
                <div class="row">
                    <h2 class="col-12 additionaltext__heading">Мы помогаем вам приобрести мечту</h2>
                    <p class="col-12">Наши риелторы, юристы, оценщики – проведут вас от самого начало пути, до
                        заключения сделки. К нам обращаются собственники недвижимости, для быстрой и безопасной их
                        реализации. Мы знаем в нашем регионе и мы всегда подстраиваемся под требования наших
                        клиентов.</p>
                </div>
            </div>
        </section>

        <a class="btn-scroll">Наверх</a>

    </main>

    <?php get_footer() ?>
