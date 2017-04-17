<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
//prnt($arResult);
?>
<div class="callback-wrapper">
    <?/*if(!empty($arResult["ERROR_MESSAGE"]))
    {
        foreach($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
    }*/
    if(strlen($arResult["OK_MESSAGE"]) > 0){?>
        <script>
            $("#callback").addClass("flip");
        </script>
    <?}?>
    <form class="callback-form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
        <?=bitrix_sessid_post()?>
        <div class="callback-form__ttl">Заказать звонок</div>
        <div class="callback-form__content">
            <div class="input">
                <input type="text" placeholder="Ваше имя" name="user_name" class="callback-form__input" data-req="y" value="<?=$arResult["AUTHOR_NAME"]?>">
            </div>
            <div class="input">
                <input type="text" placeholder="Телефон" name="user_tell" class="callback-form__input" data-req="y" value="<?=$arResult["AUTHOR_TELL"]?>">
            </div>
            <div class="textarea">
                <textarea placeholder="Комментарий" name="MESSAGE" class="callback-form__textarea"><?=$arResult["MESSAGE"]?></textarea>
            </div>
            <div class="input-submit">
                <input type="submit" name="submit" value="Отправить" class="callback-form__submit js-callback-submit">
            </div>
        </div>
    </form>
    <div class="callback-message">
        <?if(strlen($arResult["OK_MESSAGE"]) > 0):?>
            <div class="callback-message__ttl">Спасибо!</div>
            <div class="callback-message__text">
                <p>Ваши контактные данные успешно переданы. Мы свяжемся с Вами в ближайшее время</p>
                <p>Обратите внимание на блок<br><a href="/information-kak-peredvigatsya-po-gorodu/" target="_blank">полезной информации</a></p>
            </div>
        <?endif;?>
    </div>
</div>