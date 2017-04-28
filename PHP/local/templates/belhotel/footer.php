<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
$curDir = $APPLICATION->GetCurDir();
$curPage = $APPLICATION->GetCurPage(true);
?>
<?if(preg_match('#^/rooms/.?#',$curDir) || $curPage == "/index.php"):?>
<!--map-->
<div class="yandex-map-wrapper">
    <div id="map"></div>
    <div class="container">
        <div class="map-label">
            <div class="map-label__content">
                <div class="map-label__ttl">Контакты</div>
                <div class="map-label__items">
                    <div class="map-label__item map-label__item_point">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_RECURSIVE" => "Y",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include/map_addr",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/map_addr"
                            )
                        );?>
                    </div>
                    <div class="map-label__item map-label__item_tel">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_RECURSIVE" => "Y",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include/map_tel",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/map_tel"
                            )
                        );?>
                    </div>
                    <div class="map-label__item map-label__item_mail">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_RECURSIVE" => "Y",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include/map_mail",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/map_mail"
                            )
                        );?></div>
                </div>
            </div>
            <div class="map-label__button-wrapper"><a href="#callback" class="button-call-request js-open-callback">Заказать звонок</a></div>
        </div>
    </div>
</div>
<!--end map-->
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
<?endif;?>
</div>
<!--end workarea-->
</div>
<!--end content-->
<!--popup-->
<div id="callback">
    <div class="callback-inner"><span id="callback__close"></span>
		<?$APPLICATION->IncludeComponent(
	"f5:main.feedback", 
	".default", 
	array(
		"EMAIL_TO" => "semenova.7oa@yandex.ru",
		"EVENT_MESSAGE_ID" => array(
			0 => "7",
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "TELL",
		),
		"USE_CAPTCHA" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
    </div>
</div>
<div id="callback__overlay"></div>
<!--end popup-->
<!--footer-->
<footer class="footer">
    <div class="container">
        <div class="copyright">© Беломорская гостиница</div><a href="http://f5-studio.ru" target="_blank" class="developers"></a>
    </div>
</footer>
<!--end footer-->
</div>
<!--end wrapper-->
<!--recaptcha-->
<!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
	var onloadCallback = function() {
		grecaptcha.render('f-callback', {
			'sitekey' : '<?=RE_SITE_KEY?>',
		});
		grecaptcha.render('f-reserv', {
			'sitekey' : '<?=RE_SITE_KEY?>',
		});
	};
</script>
<!--end recaptcha-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter44332513 = new Ya.Metrika({
					id:44332513,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true,
					webvisor:true
				});
			} catch(e) { }
		});

		var n = d.getElementsByTagName("script")[0],
			s = d.createElement("script"),
			f = function () { n.parentNode.insertBefore(s, n); };
		s.type = "text/javascript";
		s.async = true;
		s.src = "https://mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else { f(); }
	})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44332513" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
	(function(){ var widget_id = 'cbYn1zr9P4';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>