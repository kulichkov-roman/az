<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
		<!-- Footer -->
		<div class="footer">
			<div class="inner-section">
				<div class="footer-row clearfix">
					<div class="inner-block floatleft">
						<ul>
							<li>
								<a href="#0">Займы онлайн</a>
							</li>
							<li>
								<a href="#0">Экспресс займы</a>
							</li>
							<li>
								<a href="#0">Займы без отказа</a>
							</li>
							<li>
								<a href="#0">Под 0%</a>
							</li>
							<li>
								<a href="#0">Рейтинг займов</a>
							</li>
						</ul>
					</div>
					<div class="inner-block floatleft">
						<ul>
							<li>
								<a href="#0">Рейтинг займов</a>
							</li>
							<li>
								<a href="#0">Вопрос ответ</a>
							</li>
							<li>
								<a href="#0">Статьи</a>
							</li>
							<li>
								<a href="#0">Новости</a>
							</li>
							<li class="on-tb-mb">
								<a href="#0">Обратная связь</a>
							</li>
							<li class="on-tb-mb">
								<a href="#0">Карта сайта</a>
							</li>
						</ul>
					</div>
					<div class="inner-block floatleft">
						<ul>
							<li>
								<a href="#0">Обратная связь</a>
							</li>
							<li>
								<a href="#0">Карта сайта</a>
							</li>
						</ul>
					</div>
					<div class="inner-block floatleft">
						<div class="subscribe">
							<form id="subscribe-form">
								<div class="sb-title">Подписаться на рассылку:</div>
								<div class="sub-field">
									<input type="text" name="email" placeholder="ваш e-mail" />
									<button type="submit" class="sub-btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
								</div>
							</form>
						</div>
						<div class="social-block">
							<div class="sb-title">Мы в социальных сетях:</div>
							<div class="sb-inner">
								<a href="#0" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#0" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
								<a href="#0" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
								<a href="#0" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-row clearfix">
					<div class="all">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_footer_copyright.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						© 2016 Allzaims.ru  — все о микрозаймах и МФО. Содержание сайта не является рекомендацией или офертой и носит информационно-справочный характер. Копирование материалов разрешено только при указании индексируемой ссылки на данный портал.
					</div>
					<div class="footer-developer">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_footer_developer.php',
								'EDIT_TEMPLATE' => ''
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
