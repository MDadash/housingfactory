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
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href="javascript:void(0);"
                                                                                          class="filter__option" data-rooms="room">Комната</a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href="javascript:void(0);"
                                                                                          class="filter__option" data-rooms="1">1
                                комнатная</a></div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href="javascript:void(0);"
                                                                                          class="filter__option" data-rooms="2">2
                                комнатная</a></div>
                        <div class="col-12 col-sm-6 col-lg col-xl-2 px-1 my-1 my-lg-0"><a href="javascript:void(0);"
                                                                                          class="filter__option" data-rooms="3">3
                                комнатная</a></div>
                        <div class="col-12 col-md-6 col-lg-3 col-xl px-1 my-1 my-lg-0"><a href="javascript:void(0);"
                                                                                          class="filter__option" data-rooms="4">4 и
                                более комнатная</a></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="row">
                        <h2 class="filter__heading col-12 px-1">Район</h2>
                        <select name="select-district" id="select-district"
                                class="filter__select px-1 my-1 my-lg-0 mx-1">
<!--                            <option value="">- Выберите район -</option>-->
                          <option value="Ворошиловский" data-district-id="0">Ворошиловский</option>
                          <option value="Дзержинский" data-district-id="1">Дзержинский</option>
                          <option value="Кировский" data-district-id="2">Кировский</option>
                          <option value="Красноармейский" data-district-id="3">Красноармейский</option>
                          <option value="Краснооктябрьский" data-district-id="4">Краснооктябрьский</option>
                          <option value="Советский" data-district-id="5">Советский</option>
                          <option value="Тракторозаводский" data-district-id="6">Тракторозаводский</option>
                          <option value="Центральный" data-district-id="7">Центральный</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 text-center">
                  <button type="button" id="searchButton" class="search-button mt-3">Поиск</button>
                  <p class="filter__message">Выберите, пожалуйста, количество комнат</p>
                </div>
            </div>
        </div>
    </section>

    <section class="category__additionaltext">
        <div class="container">
            <div class="row">
                <?php
                $query = new WP_Query(array('category_name' => 'text-for-samples'));
                while ($query->have_posts()) {
                    $query->the_post();
                    $field_name = $_GET['roomsquantity'] . '_' . $_GET['district'];
                    $field = get_field_object($field_name);
                    ?>
                  <h2 class="col-12 additionaltext__heading"><?php echo $field['label']; ?></h2>
                  <p class="col-12"><?php the_field($field_name) ?></p>
                <?php } ?>

            </div>

        </div>
    </section>

<!--    <main class="main_page">-->
        <section class="proposals container">
            <div class="proposals__wrapper col-sm-12">
                <div class="row">
<!--                    <h2 class="proposals__main-title proposals__main-title--new">Новые предложения</h2>-->
                    <a href="<?php echo get_page_link(7112); ?>" class="request request--morg"><span
                            class="request__text request__text--morg">Подать заявку в банк на ипотеку</span></a>
                    <button class="request request--sell" type="button" data-toggle="modal" data-target="#modal-sale">
                        <span class="request__text">Продать свою квартиру</span></button>
                </div>
            </div>
            <div class="proposals__item-list row">


              <div class="col-12 proposals__noitem">
                <p class="proposals__noitem--text">В нашей базе нет квартир с такими параметрами</p>
              </div>
            </div>

          <div class="col-12 text-center">
            <button type="button" id="showMore" class="show-more"><span class="show-more--border">Показать еще</span></button>
          </div>
        </section>

        <section class="category__additionaltext">
            <div class="container">
                <div class="row">
                    <?php $the_query = new WP_Query('p=7170'); ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                      <h2 class="col-12 additionaltext__heading"><?php the_title(); ?></h2>
                      <p class="col-12"><?php the_content(); ?></p>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>

        <a class="btn-scroll">Наверх</a>
    </main>

    <?php get_footer() ?>
