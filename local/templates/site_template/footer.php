<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
				</div>
				<div class="sidebar floatright">
					<div class="sidebar-item">
						<div class="sr-title">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_how_to_get_title.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_how_to_get_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="sidebar-item">
						<div class="sr-title">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_rating_title.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_rating_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="sidebar-item">
						<div class="sr-title">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_faq_title.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_faq_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="sidebar-item">
						<div class="sr-title">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_news_title.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_news_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="sidebar-item">
						<div class="sr-banner">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_banner.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<div class="footer">
			<div class="inner-section">
				<div class="footer-row clearfix">
					<div class="inner-block floatleft">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_menu_col1.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="inner-block floatleft">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_menu_col2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="inner-block floatleft">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_menu_col3.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="inner-block floatleft">
						<div class="subscribe">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/ft_subscribe.php',
									'EDIT_TEMPLATE' => ''
								),
								false
							);?>
						</div>
						<div class="social-block">
							<div class="sb-title">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/ft_social_title.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
							<div class="sb-inner">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/ft_social_list.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
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
								'PATH' => '/local/include/site_templates/ft_copyright.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="footer-developer">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_developer.php',
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
