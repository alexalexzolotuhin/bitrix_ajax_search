<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?php

global $APPLICATION;
//$APPLICATION->SetAdditionalCss("/js/script.js");

if($arParams['USE_JQUERY']=='Y'){
    $this->addExternalJs('/bitrix/components/ftask/search.ajax/js/jquery-3.1.1.min.js');
    $this->addExternalJs('/bitrix/components/ftask/search.ajax/js/jquery-migrate-1.4.1.min.js');
}
$this->addExternalJs('/bitrix/components/ftask/search.ajax/js/slimscroll.min.js');
$this->addExternalJs('/bitrix/components/ftask/search.ajax/js/script.js');

if(!isset($_REQUEST['FTASK_SEARCH_AJAX'])){
?>

<div class="ftask_search">
    <form action="<?=$arResult["FORM_ACTION"]?>" method="get">
    <input type="text" name="q" value="" class="input left"  autocomplete="off" placeholder="<?=GetMessage("FTASK_SEARCH_INPUT_REQUEST")?>">
    <button type="submit" class="submit_btn left"><?=$arParams["NAME_SEARCH_BUTTON"]?></button>
    <div class="clear"></div>
    <div class="tips">
    <div class="scroll">
    </div>
    </div>
    </form>
</div>
<?php
}
else
{
    //очищаем буфер (вывод битиркса до этого момента)
    $GLOBALS['APPLICATION']->RestartBuffer();
    foreach ($arResult['ITEMS'] as  $item){
        ?>
        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="tip">
            <div class="thumb">
                <img style="width:100%" src="<?=$item['PREVIEW_PICTURE']?>"  alt="">
            </div>
            <div class="info">
                <div class="name"><?=$item['NAME']?></div>
            </div>
            <div class="link"><?=$arParams['NAME_SEARCH_BUTTON_LIST']?></div>
        </a>
        <?php
    }
    if(empty($arResult['ITEMS'])){
        ?><div><?=GetMessage("FTASK_SEARCH_NO_SEARCH")?></div>
        <?php
    }

     die();
}




?>