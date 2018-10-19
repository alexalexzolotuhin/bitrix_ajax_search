<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["FILE"] = $arParams["FILE"];
$arResult["SKILLS"] = $arParams["SKILLS"];
$arResult["SKILLS_PER"] = $arParams["SKILLS_PER"];



//мой код , получаем данные из инфоблока ,
\Bitrix\Main\Loader::includeModule('iblock');

//http://bitrix.test/novaya-stranitsa.php?clear_cache=Y

$text=$_REQUEST['text'];


$dbItems = \Bitrix\Iblock\ElementTable::getList(array(
    'select' => array('ID', 'NAME', 'IBLOCK_ID' , 'PREVIEW_PICTURE', ), //,'DETAIL_PAGE_URL'
    'filter' => array('IBLOCK_ID' => 1 ,'NAME'=>'%'.strip_tags($text).'%'),
    'limit'=>10
));
$arResult=array();


while ($arItem = $dbItems->fetch()){
    //DETAIL_PAGE_URL d7 не выводит!!!

    $el_res= CIBlockElement::GetByID( $arItem['ID'] );
    if ( $el_arr= $el_res->GetNext() ) {
        $arItem['DETAIL_PAGE_URL']= $el_arr[ 'DETAIL_PAGE_URL' ];
        $arItem['PREVIEW_PICTURE']=  CFile::GetPath( $el_arr[ 'PREVIEW_PICTURE' ]  ) ;
    }
    // debug($arItem);
    $arResult[]=$arItem;
}


$this -> includeComponentTemplate();
?>