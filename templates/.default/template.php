<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?php

global $APPLICATION;
$APPLICATION->SetAdditionalCss("/js/script.js");
/*
if($arParams['INCLUDE_CSS'] == 'Y') {
    $this->addExternalCss($templateFolder . '/theme/' . $arParams['THEME'] . '/style.css');
} */
$this->addExternalJs('/local/components/ftask/search.ajax/js/jquery-3.1.1.min.js');
$this->addExternalJs('/local/components/ftask/search.ajax/js/jquery-migrate-1.4.1.min.js');
$this->addExternalJs('/local/components/ftask/search.ajax/js/script.js');
?>

<div class="search">
<form action="">
<input type="text" name="" value="" class="input left" placeholder="Введите запрос">
<button type="submit" class="submit_btn left"></button>
<div class="clear"></div>

<div class="tips">
<div class="scroll">


</div>
</div>
</form>
</div>
<?php


foreach ($arResult as  $item){
        //пок
    ?>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="tip">
        <div class="thumb">
            <img style="width:100%" src="<?=$item['PREVIEW_PICTURE']?>"  alt="">
        </div>

        <div class="info">
            <!-- <div class="cat">Мебель для ванной</div>-->
            <div class="name"><?=$item['NAME']?></div>
        </div>

        <div class="link">Перейти к товару</div>
    </a>
<?php
}
?>