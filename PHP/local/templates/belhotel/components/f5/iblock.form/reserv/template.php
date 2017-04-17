<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//prnt($arResult)?>
<div class="reserv-wrapper">
    <div class="reserv-ttl">
        <div class="reserv-minittl">бронирование номера</div>
        <h1><?=$arResult["ROOM"]["NAME"]?></h1>
    </div>

    <!--reserv-form-->
    <form class="reserv-form" <?=$arResult['FORM_ATTRIBUTES']?>>
        <input type="hidden" name="<?=$arResult["FIELDS"]["PROPERTY_ROOM"]["INPUT_NAME"]?>" value="<?=$arResult["ROOM"]["NAME"]?>">
        <!--информация о бронировании-->
        <div class="reserv-info">
            <div class="reserv-minittl">информация о бронировании</div>
            <!--reserv-info-wrapper-->
            <div class="reserv-info-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Дата заезда</div>
                            <div class="select-date">
                                <div class="select-date__arrow"></div>
                                <div id="formatDate" class="label-date-first"><span class="dd"></span><span class="mm"></span></div>
                                <input id="js-firstDate" type="text" name="<?=$arResult["FIELDS"]["PROPERTY_DATE_FROM"]["INPUT_NAME"]?>" class="select-date-input">
                                <input id="r-from" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Дата выезда</div>
                            <div class="select-date">
                                <div class="select-date__arrow"></div>
                                <div class="label-date-first"><span class="dd"></span><span class="mm"></span></div>
                                <input id="js-secondDate" type="text" name="<?=$arResult["FIELDS"]["PROPERTY_DATE_TO"]["INPUT_NAME"]?>" class="select-date-input">
                                <input id="r-to" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Количество номеров</div>
                            <div class="select-guest-wrapper">
                                <div class="select-guest-wrapper__count js-count">1</div>
                                <input type="text" id="r-count" value="1" name="<?=$arResult["FIELDS"]["PROPERTY_ROOM_COUNT"]["INPUT_NAME"]?>" class="select-guest-input js-count-input">
                                <div class="select-guest-wrapper__plus js-plus"></div>
                                <div class="select-guest-wrapper__minus js-minus"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Взрослые</div>
                            <div class="select-guest-wrapper">
                                <div class="select-guest-wrapper__count js-count">1</div>
                                <input type="text" id="r-pep" value="1" name="<?=$arResult["FIELDS"]["PROPERTY_PEOPLE_COUNT"]["INPUT_NAME"]?>" class="select-guest-input js-count-input" data-cost1="<?=$arResult["ROOM"]["PROPERTY_PRICE_1_VALUE"]?>" data-cost2="<?=$arResult["ROOM"]["PROPERTY_PRICE_2_VALUE"]?>">
                                <div class="select-guest-wrapper__plus js-plus"></div>
                                <div class="select-guest-wrapper__minus js-minus"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Дети</div>
                            <div class="select-guest-wrapper">
                                <div class="select-guest-wrapper__count js-count">0</div>
                                <input id="r-kids" type="text" value="0" name="<?=$arResult["FIELDS"]["PROPERTY_KIDS_COUNT"]["INPUT_NAME"]?>" class="select-guest-input js-count-input" data-cost="<?=$arResult["ROOM"]["PROPERTY_PRICE_KIDS_VALUE"]?>">
                                <div class="select-guest-wrapper__plus js-plus"></div>
                                <div class="select-guest-wrapper__minus js-minus"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="reserv-select-date">
                            <div class="reserv-small-parametrs-item__ttl">Стоимость, руб</div>
                            <div class="select-guest-wrapper sum-wrapper">
                                <div class="select-guest-wrapper__sum js-sum"></div>
                                <input type="text" id="r-sum" value="" name="<?=$arResult["FIELDS"]["PROPERTY_COST"]["INPUT_NAME"]?>" class="select-guest-input js-count-input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end reserv-info-wrapper-->
        </div>
        <!--end информация о бронировании-->
        <!--Информация о госте-->
        <div class="reserv-guest">
            <div class="reserv-minittl">Информация о госте</div>
            <!--reserv-guest-wrapper-->
            <div class="reserv-guest-wrapper">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="reserv-guest-info">
                            <div class="input">
                                <input type="text" placeholder="ФИО Гостя*" data-req="y" name="<?=$arResult["FIELDS"]["NAME"]["INPUT_NAME"]?>" class="callback-form__input">
                            </div>
                            <div class="input">
                                <input type="text" placeholder="Телефон*" data-req="y" name="<?=$arResult["FIELDS"]["PROPERTY_TEL"]["INPUT_NAME"]?>" class="callback-form__input">
                            </div>
                            <div class="input">
                                <input type="email" placeholder="E-mail" name="<?=$arResult["FIELDS"]["PROPERTY_EMAIL"]["INPUT_NAME"]?>" class="callback-form__input">
                            </div>
                            <div class="textarea">
                                <textarea placeholder="Комментарий" style="height: 230px;" name="<?=$arResult["FIELDS"]["PREVIEW_TEXT"]["INPUT_NAME"]?>" class="callback-form__textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="reserv-guest-check">
                            <div class="radioline">
                                <div class="radioline-ttl">Цель поездки:</div>
                                <div class="radioline-radio">
                                    <div class="radioline-radio__item">
                                        <input type="radio" calss="radio" name="line1" id="radio1" value="Отдых" checked>
                                        <label for="radio1">Отдых</label>
                                    </div>
                                    <div class="radioline-radio__item">
                                        <input type="radio" calss="radio" name="line1" value="Работа" id="radio2">
                                        <label for="radio2">Работа</label>
                                    </div>
                                    <input type="hidden" data-name="line1" value="Отдых" name="<?=$arResult["FIELDS"]["PROPERTY_PURPOSE"]["INPUT_NAME"]?>">
                                </div>
                            </div>
                            <div class="radioline">
                                <div class="radioline-ttl">Вид расчета:</div>
                                <div class="radioline-radio">
                                    <div class="radioline-radio__item">
                                        <input type="radio" calss="radio" name="line2" id="radio3" value="Наличный">
                                        <label for="radio3">Наличный</label>
                                    </div>
                                    <div class="radioline-radio__item">
                                        <input type="radio" calss="radio" name="line2" id="radio4" value="Безналичный" checked>
                                        <label for="radio4">Безналичный</label>
                                    </div>
                                    <input type="hidden" data-name="line2" value="Безналичный" name="<?=$arResult["FIELDS"]["PROPERTY_CALC_TYPE"]["INPUT_NAME"]?>">
                                </div>
                            </div>
                            <div class="checkline">
                                <input type="checkbox" id="checkbox" class="checkbox">
                                <label for="checkbox">Согласие с
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_RECURSIVE" => "Y",
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "include/reserv",
											"EDIT_TEMPLATE" => "",
											"PATH" => "/include/reserv"
										)
									);?></label>
                            </div>
                            <div class="captcha">
                                <div class="g-recaptcha" data-sitekey="<?=RE_SITE_KEY?>"></div>
                            </div>
                            <input type="submit" name="<?=$arResult["FORM"]["SUBMIT_INPUT_NAME"]?>" value="Забронировать" class="button-reserv button-reserv_wide js-reserv-subm">
                        </div>
                    </div>
                </div>
            </div>
            <!--end reserv-guest-wrapper-->

            <?if($arResult['RESULT']['SUCCESS']):?>
                <div class="request_form_success">Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.</div>
            <?endif;?>

            <?if($arResult['RESULT']['FAIL']):?>
                <div class="request_form_fail">Были допущены ошибки при заполнении формы.</div>
            <?endif;?>

        </div>
        <!--end Информация о госте-->
    </form>
    <!--end reserv-form-->
</div>