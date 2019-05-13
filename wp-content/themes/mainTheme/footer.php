<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mainTheme
 */

?>
	<footer class="footer">
		<div class="container">
			<div class="row text-center text-md-left">
				<div class="col-12 col-md-3 col-lg-4 footer-logo">
					<a href="<?php echo get_home_url(); ?>">
						<img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="logo">
					</a>	
				</div>
				<div class="col-12 col-md-6 col-lg-5 footer-md">
					<ul class="footer-menu">
						<li><a href="<?php echo get_page_link( 7053 ); ?>">Квартиры</a></li>
<!-- 						<li><a href="<?php echo get_page_link( 7053 ); ?>">Комнаты</a></li> -->
						<li><a href="<?php echo get_page_link( 9 ); ?>">Дома и коттеджи</a></li>
<!-- 						<li><a href="">Коммерческая недвижимость</a></li> -->
					</ul>
					<ul class="footer-menu">
						<li><a href="<?php echo get_page_link( 5 ); ?>">О компании</a></li>
						<li><a href="<?php echo get_page_link( 15 ); ?>">Контакты</a></li>
						<li><a href="<?php echo get_page_link( 11 ); ?>">Услуги</a></li>
					</ul>
					<p class="footer-copyright">© Агенство недвижимости - Фабрика Жилья.<br>
					Все права защищены</p>
				</div>
				<div class="col-12 col-md-3 col-lg-3">
					<div>
<!--						<div class="footer-counter"></div>-->
<!-- 						<div class="footer-counter"></div> -->
					</div>
					<a href="https://vk.com/rieltorvlg" target="_blank" class="vk-link">
						<img src="<?php bloginfo('template_url') ?>/images/vk.png" alt="Vkontakte">
						Группа vk.com
						<span>присоединяйтесь</span>
					</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

<script>
    jQuery(document).ready(function(){
        jQuery('.phone').mask('0(000)-000-0000');
        jQuery('.phone-nocode').mask('(000)-000-0000');
    });
</script>


	

  <?php wp_footer(); ?>

</body>
</html>
