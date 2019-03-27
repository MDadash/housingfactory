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
						<li><a href="">Кваритры</a></li>
						<li><a href="">Комнаты</a></li>
						<li><a href="">Дома и коттеджи</a></li>
						<li><a href="">Коммерческая недвижимость</a></li>
					</ul>
					<ul class="footer-menu">
						<li><a href="">О компании</a></li>
						<li><a href="">Контакты</a></li>
						<li><a href="">Услуги</a></li>
						<li><a href="">Партнеры</a></li>
					</ul>
					<p class="footer-copyright">© Агенство недвижимости - Фабрика Жилья.<br>
					Все права защищены</p>
				</div>
				<div class="col-12 col-md-3 col-lg-3">
					<div>
						<div class="footer-counter"></div>
<!-- 						<div class="footer-counter"></div> -->
					</div>
					<a href="https://vk.com/" target="_blank" class="vk-link">
						<img src="<?php bloginfo('template_url') ?>/images/vk.png" alt="Vkontakte">
						Группа vk.com
						<span>присоединяйтесь</span>
					</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	

<?php wp_footer(); ?>

<div class="modal modal-sell" id="modal-sale">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Продать квартиру</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
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
            <button class="btn" name="submit" type="submit">Отправить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
