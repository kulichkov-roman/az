<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!function_exists("showFilePropertyField"))
{
    function showFilePropertyField($name, $property_fields, $values, $max_file_size_show=50000)
    {
        $res = "";

        if (!is_array($values) || empty($values))
            $values = array(
                "n0" => 0,
            );

        if ($property_fields["MULTIPLE"] == "N")
        {
            $res = "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[0]\" id=\"".$name."[0]\"></label>";
        }
        else
        {
            $res = '
			<script type="text/javascript">
				function addControl(item)
				{
					var current_name = item.id.split("[")[0],
						current_id = item.id.split("[")[1].replace("[", "").replace("]", ""),
						next_id = parseInt(current_id) + 1;

					var newInput = document.createElement("input");
					newInput.type = "file";
					newInput.name = current_name + "[" + next_id + "]";
					newInput.id = current_name + "[" + next_id + "]";
					newInput.onchange = function() { addControl(this); };

					var br = document.createElement("br");
					var br2 = document.createElement("br");

					BX(item.id).parentNode.appendChild(br);
					BX(item.id).parentNode.appendChild(br2);
					BX(item.id).parentNode.appendChild(newInput);
				}
			</script>
			';

            $res .= "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[0]\" id=\"".$name."[0]\"></label>";
            $res .= "<br/><br/>";
            $res .= "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[1]\" id=\"".$name."[1]\" onChange=\"javascript:addControl(this);\"></label>";
        }

        return $res;
    }
}

if(!function_exists("resortPropsForm"))
{
    function resortPropsForm($arSource)
    {
        $arOrderSort = array(ORDER_GROUP_BUYER_SORT, ORDER_GROUP_DELIVERY_SORT);
        $arSourceTmp = $arSource;

        unset($arSource);

        $arSource = array();

	    foreach($arOrderSort as $value)
        {
            foreach ($arSourceTmp as $arProperties)
            {
                if($arProperties["GROUP_SORT"] == $value)
                {
	                $arSource[$value][] = $arProperties;
                }
            }
        }
        return $arSource;
    }
}

if (!function_exists("PrintPropsForm"))
{
    function PrintPropsForm($arSource = array(), $locationTemplate = ".default", $arResult)
    {
        if (!empty($arSource))
        {
	        //pre($arSource);

	        $arSource = resortPropsForm($arSource);

	        //pre($arSource);

            foreach($arSource as $key => $arSplitSource)
            {
				if($key == ORDER_GROUP_BUYER_SORT)
                {
                    $class = '_buyer';
                    $name = ORDER_GROUP_BUYER_NAME;
                }
                elseif($key == ORDER_GROUP_DELIVERY_SORT)
                {
                    $class = '_deliver';
                    $name = ORDER_GROUP_DELIVERY_NAME;
                }
                ?>
                <div class="forming__box <?=$class?>">
                    <div class="forming__header"><?=$name?></div>
						<?if($name == ORDER_GROUP_DELIVERY_NAME){?>

						    <?
						    if (is_array($arResult["ORDER_PROP"]["USER_PROFILES"]) && !empty($arResult["ORDER_PROP"]["USER_PROFILES"])):
						        ?>
							 	   <div class="forming__field-wrapper _address">
							            <p class="forming__field-text">Мои адреса:</p>
							            <?
							            $bChecked = false;
							            foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles){?>
								            <label class="forming__check-wrap">
								                <input type="radio" name="PROFILE_ID" value="<?= $arUserProfiles["ID"] ?>" <?if ($arUserProfiles["CHECKED"]=="Y"){ echo " checked"; $bChecked = true;}?> onChange="SetContact(this.value)" class="forming__check validation-success"><span class="forming__check-text"><?=$arUserProfiles["NAME"]?></span>
								            </label>
							            <?}?>
										<label class="forming__check-wrap">
							                <input type="radio" name="PROFILE_ID" value="0" onChange="SetContact(this.value)" <?if(!$bChecked){ echo " checked";}?>  class="forming__check validation-success"><span class="forming__check-text">другой адрес</span>
								        </label>
							        </div>
						        <?
						    endif;
						    ?>
						                    <?/*<select name="PROFILE_ID" id="ID_PROFILE_ID" onChange="SetContact(this.value)">
						                    <option value="0"><?=GetMessage("SOA_TEMPL_PROP_NEW_PROFILE")?></option>
						                    <?
						                    foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
						                    {
						                        ?>
						                        <option value="<?= $arUserProfiles["ID"] ?>"<?if ($arUserProfiles["CHECKED"]=="Y") echo " selected";?>><?=$arUserProfiles["NAME"]?></option>
						                        <?
						                    }
						                    ?>
						                </select>*/?>
						<?}?>
                    <?
                    foreach ($arSplitSource as $arProperties)
                    {
                        if(CSaleLocation::isLocationProMigrated())
                        {
                            $propertyAttributes = array(
                                'type' => $arProperties["TYPE"],
                                'valueSource' => $arProperties['SOURCE'] == 'DEFAULT' ? 'default' : 'form'
                            );

                            if(intval($arProperties['IS_ALTERNATE_LOCATION_FOR']))
                                $propertyAttributes['isAltLocationFor'] = intval($arProperties['IS_ALTERNATE_LOCATION_FOR']);

                            if(intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']))
                                $propertyAttributes['altLocationPropId'] = intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']);

                            if($arProperties['IS_ZIP'] == 'Y')
                                $propertyAttributes['isZip'] = true;
                        }
                        ?>
                        <div data-property-id-row="<?=intval(intval($arProperties["ID"]))?>">
                            <?
                            if ($arProperties["TYPE"] == "CHECKBOX")
                            {
                                ?>
                                <input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">

                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r1x3 pt8">
                                    <input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" value="Y"<?if ($arProperties["CHECKED"]=="Y") echo " checked";?>>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>

                                <div style="clear: both;"></div>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "TEXT")
                            {
                                if($arProperties["CODE"] != "STREET"){?>
                                <div class="forming__field-wrapper">
                                    <p class="forming__field-text"><?=$arProperties["NAME"]?></p>
                                    <input type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" class="forming__field"/>
                                </div>
                                <?} else {?>
                                	<div class="forming__field-wrapper">
                                    <p class="forming__field-text">Адрес доставки</p>
                                    	<textarea class="forming__area"  name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>
                                	</div>
                                <?}?>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "SELECT")
                            {
                                ?>
                                <br/>
                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r3x1">
                                    <select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
                                        <?
                                        foreach($arProperties["VARIANTS"] as $arVariants):
                                            ?>
                                            <option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
                                        <?
                                        endforeach;
                                        ?>
                                    </select>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>
                                <div style="clear: both;"></div>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "MULTISELECT")
                            {
                                ?>
                                <br/>
                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r3x1">
                                    <select multiple name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
                                        <?
                                        foreach($arProperties["VARIANTS"] as $arVariants):
                                            ?>
                                            <option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
                                        <?
                                        endforeach;
                                        ?>
                                    </select>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>
                                <div style="clear: both;"></div>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "TEXTAREA")
                            {
                                $rows = ($arProperties["SIZE2"] > 10) ? 4 : $arProperties["SIZE2"];
                                ?>
                                <br/>
                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r3x1">
                                    <textarea rows="<?=$rows?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>
                                <div style="clear: both;"></div>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "LOCATION")
                            {
                                ?>
                                <div class="forming__field-wrapper">
                                    <p class="forming__field-text"><?=$arProperties["NAME"]?></p>
                                </div>

                                <div class="bx_block r3x1">

                                    <?
                                    $value = 0;
                                    if (is_array($arProperties["VARIANTS"]) && count($arProperties["VARIANTS"]) > 0)
                                    {
                                        foreach ($arProperties["VARIANTS"] as $arVariant)
                                        {
                                            if ($arVariant["SELECTED"] == "Y")
                                            {
                                                $value = $arVariant["ID"];
                                                break;
                                            }
                                        }
                                    }

                              /*  $GLOBALS["APPLICATION"]->IncludeComponent(
                                    "bitrix:sale.ajax.locations",
                                    $locationTemplate,
                                    array(
                                        "AJAX_CALL" => "N",
                                        "COUNTRY_INPUT_NAME" => "COUNTRY",
                                        "REGION_INPUT_NAME" => "REGION",
                                        "CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
                                        "CITY_OUT_LOCATION" => "Y",
                                        "LOCATION_VALUE" => $value,
                                        "ORDER_PROPS_ID" => $arProperties["ID"],
                                        "ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
                                        "SIZE1" => $arProperties["SIZE1"],
                                    ),
                                    null,
                                    array('HIDE_ICONS' => 'Y')
                                );*/

                                    // here we can get '' or 'popup'
                                    // map them, if needed
                                   if(CSaleLocation::isLocationProMigrated())
                                    {
                                        $locationTemplate = $locationTemplate == 'popup' ? 'search' : 'steps';
                                        $locationTemplate = $_REQUEST['PERMANENT_MODE_STEPS'] == 1 ? 'steps' : $locationTemplate; // force to "steps"
                                    }
                                    ?>

                                    <?if($locationTemplate == 'steps'):?>
                                        <input type="hidden" id="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" name="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" value="<?=($_REQUEST['LOCATION_ALT_PROP_DISPLAY_MANUAL'][intval($arProperties["ID"])] ? '1' : '0')?>" />
                                    <?endif?>

                                    <?CSaleLocation::proxySaleAjaxLocationsComponent(array(
                                            "AJAX_CALL" => "N",
                                            "COUNTRY_INPUT_NAME" => "COUNTRY",
                                            "REGION_INPUT_NAME" => "REGION",
                                            "CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
                                            "CITY_OUT_LOCATION" => "Y",
                                            "LOCATION_VALUE" => $value,
                                            "ORDER_PROPS_ID" => $arProperties["ID"],
                                            "ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
                                            "SIZE1" => $arProperties["SIZE1"],
                                        ),
                                        array(
                                            "ID" => $value,
                                            "CODE" => "",
                                            "SHOW_DEFAULT_LOCATIONS" => "Y",

                                            // function called on each location change caused by user or by program
                                            // it may be replaced with global component dispatch mechanism coming soon
                                            "JS_CALLBACK" => "submitFormProxy", //($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitFormProxy" : "",

                                            // function window.BX.locationsDeferred['X'] will be created and lately called on each form re-draw.
                                            // it may be removed when sale.order.ajax will use real ajax form posting with BX.ProcessHTML() and other stuff instead of just simple iframe transfer
                                            "JS_CONTROL_DEFERRED_INIT" => intval($arProperties["ID"]),

                                            // an instance of this control will be placed to window.BX.locationSelectors['X'] and lately will be available from everywhere
                                            // it may be replaced with global component dispatch mechanism coming soon
                                            "JS_CONTROL_GLOBAL_ID" => intval($arProperties["ID"]),

                                            "DISABLE_KEYBOARD_INPUT" => 'Y',
                                            "PRECACHE_LAST_LEVEL" => "Y",
                                        ),
                                        $locationTemplate,
                                        true,
                                        'location-block-wrapper'
                                    )?>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>

                                </div>
                                <div style="clear: both;"></div>
                                <script type="text/javascript">
    function fShowStore(id, showImages, formWidth, siteId)
    {
        var strUrl = '<?=$templateFolder?>' + '/map.php';
        var strUrlPost = 'delivery=' + id + '&showImages=' + showImages + '&siteId=' + siteId;

        var storeForm = new BX.CDialog({
            'title': '<?=GetMessage('SOA_ORDER_GIVE')?>',
            head: '',
            'content_url': strUrl,
            'content_post': strUrlPost,
            'width': formWidth,
            'height':450,
            'resizable':false,
            'draggable':false
        });

        var button = [
            {
                title: '<?=GetMessage('SOA_POPUP_SAVE')?>',
                id: 'crmOk',
                'action': function ()
                {
                    GetBuyerStore();
                    BX.WindowManager.Get().Close();
                }
            },
            BX.CDialog.btnCancel
        ];
        storeForm.ClearButtons();
        storeForm.SetButtons(button);
        storeForm.Show();
    }

    function GetBuyerStore()
    {
        BX('BUYER_STORE').value = BX('POPUP_STORE_ID').value;
        //BX('ORDER_DESCRIPTION').value = '<?=GetMessage("SOA_ORDER_GIVE_TITLE")?>: '+BX('POPUP_STORE_NAME').value;
        BX('store_desc').innerHTML = BX('POPUP_STORE_NAME').value;
        BX.show(BX('select_store'));
    }

    function showExtraParamsDialog(deliveryId)
    {
        var strUrl = '<?=$templateFolder?>' + '/delivery_extra_params.php';
        var formName = 'extra_params_form';
        var strUrlPost = 'deliveryId=' + deliveryId + '&formName=' + formName;

        if(window.BX.SaleDeliveryExtraParams)
        {
            for(var i in window.BX.SaleDeliveryExtraParams)
            {
                strUrlPost += '&'+encodeURI(i)+'='+encodeURI(window.BX.SaleDeliveryExtraParams[i]);
            }
        }

        var paramsDialog = new BX.CDialog({
            'title': '<?=GetMessage('SOA_ORDER_DELIVERY_EXTRA_PARAMS')?>',
            head: '',
            'content_url': strUrl,
            'content_post': strUrlPost,
            'width': 500,
            'height':200,
            'resizable':true,
            'draggable':false
        });

        var button = [
            {
                title: '<?=GetMessage('SOA_POPUP_SAVE')?>',
                id: 'saleDeliveryExtraParamsOk',
                'action': function ()
                {
                    insertParamsToForm(deliveryId, formName);
                    BX.WindowManager.Get().Close();
                }
            },
            BX.CDialog.btnCancel
        ];

        paramsDialog.ClearButtons();
        paramsDialog.SetButtons(button);
        //paramsDialog.adjustSizeEx();
        paramsDialog.Show();
    }

    function insertParamsToForm(deliveryId, paramsFormName)
    {
        var orderForm = BX("ORDER_FORM"),
            paramsForm = BX(paramsFormName);
        wrapDivId = deliveryId + "_extra_params";

        var wrapDiv = BX(wrapDivId);
        window.BX.SaleDeliveryExtraParams = {};

        if(wrapDiv)
            wrapDiv.parentNode.removeChild(wrapDiv);

        wrapDiv = BX.create('div', {props: { id: wrapDivId}});

        for(var i = paramsForm.elements.length-1; i >= 0; i--)
        {
            var input = BX.create('input', {
                    props: {
                        type: 'hidden',
                        name: 'DELIVERY_EXTRA['+deliveryId+']['+paramsForm.elements[i].name+']',
                        value: paramsForm.elements[i].value
                    }
                }
            );

            window.BX.SaleDeliveryExtraParams[paramsForm.elements[i].name] = paramsForm.elements[i].value;

            wrapDiv.appendChild(input);
        }

        orderForm.appendChild(wrapDiv);

        BX.onCustomEvent('onSaleDeliveryGetExtraParams',[window.BX.SaleDeliveryExtraParams]);
    }
</script>

<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult["BUYER_STORE"]?>" />
<?if(!empty($arResult["DELIVERY"])) {?>
	<div class="forming__field-wrapper">
	    <p class="forming__field-text">Вид доставки</p>
<?foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery) {
	        	if (count($arDelivery["STORE"]) > 0) {
                    $clickHandler = "onClick = \"fShowStore('" . $arDelivery["ID"] . "','" . $arParams["SHOW_STORES_IMAGES"] . "','" . $width . "','" . SITE_ID . "')\";";
                } else {
                    $clickHandler = "onClick = \"BX('ID_DELIVERY_ID_" . $arDelivery["ID"] . "').checked=true;submitForm();\"";
                }
                ?>
                <label for="ID_DELIVERY_ID_<?=$arDelivery["ID"]?>" <?=$clickHandler?> class="forming__check-wrap">
                    <input type="radio"
                           id="ID_DELIVERY_ID_<?=$arDelivery["ID"]?>"
                           name="<?=htmlspecialcharsbx($arDelivery["FIELD_NAME"])?>"
                           value="<?=$arDelivery["ID"] ?>"<?if ($arDelivery["CHECKED"]=="Y") echo " checked";?>
                           onclick="submitForm();"
                           class="forming__check"
                    />
                    <span class="forming__check-text"><?=$arDelivery["NAME"];?></span>
                    <span class="forming__check-ph"><?=($arDelivery["DESCRIPTION"] <> "" ? '('.$arDelivery["DESCRIPTION"].')' : '')?></span>
                </label>
	        	<?
	        }
            ?>
	</div>
    <?
}
?>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "RADIO")
                            {
                                ?>
                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r3x1">
                                    <?
                                    if (is_array($arProperties["VARIANTS"]))
                                    {
                                        foreach($arProperties["VARIANTS"] as $arVariants):
                                            ?>
                                            <input
                                                type="radio"
                                                name="<?=$arProperties["FIELD_NAME"]?>"
                                                id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"
                                                value="<?=$arVariants["VALUE"]?>" <?if($arVariants["CHECKED"] == "Y") echo " checked";?> />

                                            <label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"><?=$arVariants["NAME"]?></label></br>
                                        <?
                                        endforeach;
                                    }
                                    ?>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>
                                <div style="clear: both;"></div>
                            <?
                            }
                            elseif ($arProperties["TYPE"] == "FILE")
                            {
                                ?>
                                <br/>
                                <div class="bx_block r1x3 pt8">
                                    <?=$arProperties["NAME"]?>
                                    <?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
                                        <span class="bx_sof_req">*</span>
                                    <?endif;?>
                                </div>

                                <div class="bx_block r3x1">
                                    <?=showFilePropertyField("ORDER_PROP_".$arProperties["ID"], $arProperties, $arProperties["VALUE"], $arProperties["SIZE1"])?>

                                    <?
                                    if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
                                        ?>
                                        <div class="bx_description">
                                            <?=$arProperties["DESCRIPTION"]?>
                                        </div>
                                    <?
                                    endif;
                                    ?>
                                </div>
                                <div style="clear: both;"></div><br/>
                            <?}?>
                        </div>
                        <?if(CSaleLocation::isLocationProEnabled()) {?>
                            <script>
                                (window.top.BX || BX).saleOrderAjax.addPropertyDesc(
                                    <?=CUtil::PhpToJSObject(
                                        array(
                                            'id' => intval($arProperties["ID"]),
                                            'attributes' => $propertyAttributes
                                        )
                                    )?>
                                );
                            </script>
                        <?}
                    }?>
                </div>
            <?}
        }
    }
}
?>