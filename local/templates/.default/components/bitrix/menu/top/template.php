<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
	<ul class="clearfix">
		<?
		$index = 0;
		foreach($arResult as $key => $arItem){?>
			<li>
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<span style="background-image: url(/local/images/menu/m1.jpg)"></span>
				<?if($arItem["CHILDREN"]){?>
					<ul class="sub-menu">
						<?foreach($arItem["CHILDREN"] as $arChildrenChunkDL1){?>
							<li>
								<a href="<?=$arChildrenChunkDL1['LINK']?>"><?=$arChildrenChunkDL1['TEXT']?></a>
							</li>
						<?}?>
					</ul>
				<?}?>
			</li>
			<?
			$index++;
		}
		?>
	</ul>
<?}?>
