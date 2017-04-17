<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Гостиница Беломорская - Контакты");
$APPLICATION->SetTitle("Контакты");
?>

    <!--contact-wrapper-->
    <div class="contact-wrapper">
        <!--panorama-->
        <div class="panorama"><iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sru!2sru!4v1490784111939!6m8!1m7!1sBFjuxX-w9ngRX49I7Jr-gw!2m2!1d64.54245030673368!2d40.56833433169359!3f255!4f0!5f0.7820865974627469" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        <!--end panorama-->
        <!--contact-content-->
        <div class="contact-content">
            <!--contact-content__col 1-->
            <div class="contact-content__col">
                <div class="contact-content__text">
                    <div class="contact-content__block">
                        <!-- Как добраться-->
                        <div class="contact-content__ttl">Как добраться</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "include/how_toget",
								"EDIT_TEMPLATE" => "",
								"PATH" => "include/how_toget"
							)
						);?>
                        <!-- end Как добраться-->
                    </div>
                    <div class="contact-content__block">
                        <!--Как связаться-->
                        <div class="contact-content__ttl">Как связаться</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "include/how_connect",
								"EDIT_TEMPLATE" => "",
								"PATH" => "include/how_connect"
							)
						);?>
                        <!-- end Как связаться-->
                    </div>
                </div>
            </div>
            <!--end contact-content__col 1-->
            <!--contact-content__col 2-->
            <div class="contact-content__col">
                <div class="contact-map">
                    <div id="map"></div>
                    <!--map script-->
                    <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&amp;lang=ru-RU" type="text/javascript"></script>
                    <script>
						ymaps.ready(init);
						function init () {
							var map = new ymaps.Map("map", {
								center: [64.5422580573521,40.567459999999954],
								zoom: 17
							});
							var placemark = new ymaps.Placemark([64.54225574861084,40.56746536441798], {
								balloonContent: '163 000, Росcия, г.Архангельск, ул.Тимме, д.3',
							}, {
								iconImageHref: '<?=SITE_TEMPLATE_PATH?>/images/balloon.png',
								iconImageSize: [182, 182],
								iconImageOffset: [-118,-110]
							});
							map.geoObjects.add(placemark);
						}
                    </script>
                    <!--end map script-->
                </div>
            </div>
            <!--end contact-content__col 2-->
        </div>
        <!--end contact-content-->
    </div>
    <!--end contact-wrapper-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>