<script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/lightgallery.js"></script>
<script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/lightslider.js"></script>
<script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/jquery.nice-select.min.js"></script>
<?php wp_enqueue_script("jquery"); ?>


<?php wp_head() ?>
<!--<script type="text/javascript"-->
<!--   src="--><?php //bloginfo("template_url"); ?><!--/js/scripts.js"></script>-->
<!--<script type="text/javascript"-->
<!--        src="--><?php //bloginfo("template_url"); ?><!--/js/category.js"></script>-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="">
  <meta name="author" content="">
</head>
<body>

	<header>
		<div class="container header-info">
			<div class="row">
				<div class="col-12 col-sm-5 col-md-3 text-center text-sm-left">
					<a href="<?php echo get_home_url(); ?>">
						<img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="logo">
					</a>
				</div>
				<div class="col-12 col-sm-4 col-md-3 offset-sm-3 offset-md-0 mt-3 pl-3  text-center text-sm-left">
					<a href="tel:89371234567" class="phonenumber link-phone"><?php echo get_option('my_phone'); ?></a>
					<p class="mt-2 p-color-grey d-none d-md-block">У нас есть покупатель на вашу квартиру</p>
				</div>
				<div class="col-12 col-sm-4 col-md-3 offset-sm-8 offset-md-0 mt-1 mt-sm-0 mt-md-3 text-center text-sm-left mt-negative-40">
					<a href="tel:89371234567" class="phonenumber"><?php echo get_option('my_second_phone'); ?></a> <br>
					<a href="javascript:void(0);" class="link-modal link-modal--call" data-toggle="modal" data-target="#modal-callback">Заказать звонок</a>
				</div>
				<div class="col-sm-3 mt-3 pl-0 d-none d-md-block">
					<p class="p-color-grey"><?php echo get_option('address2'); ?></p>
					<a href="<?php echo get_page_link( 15 ); ?>" class="link-modal link-modal--map">На карте</a>
				</div>
			</div>
		</div>

	
		<nav class="navbar navbar-expand-md navbar-dark navbar--header pb-md-0">
			<div class="container header-menu-container">
<!-- 				<a class="navbar-brand d-md-none" href="#">Navigation</a> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php wp_nav_menu( array(
					'menu'            => 'navbar', 
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNav',
					'menu_class'      => 'navbar-nav',
					'menu_id'         => ' '
					) ); ?>
			</div>
		</nav>
	</header>
  <?php echo do_shortcode('[contact-form-7 id="7106" title="callback"]'); ?>    
<!-- 	<div class="modal" id="modal-callback">
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
</div> -->
