<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];


$arComponentParameters = array(
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FTASK_IBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FTASK_IBLOCK_NAME"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "REFRESH" => "Y",
        ),
        "USE_JQUERY" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("FTASK_SEARCH_USE_JQUERY"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ),
        "PAGE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME" => GetMessage("FTASK_SEARCH_FORM_PAGE"),
            "TYPE" => "STRING",
            "DEFAULT" => "#SITE_DIR#search/index.php",
        ),
        "NAME_SEARCH_BUTTON" => array(
            "NAME" => GetMessage("FTASK_NAME_SEARCH_BUTTON"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("FTASK_NAME_SEARCH_BUTTON_DEFAULT"),
        ),
        "NAME_SEARCH_BUTTON_LIST" => array(
            "NAME" => GetMessage("FTASK_NAME_SEARCH_BUTTON_LIST"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("FTASK_NAME_SEARCH_BUTTON_LIST_DEFAULT"),
        ),


    ),
);
?>
