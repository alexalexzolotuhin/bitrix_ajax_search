<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
    "PARAMETERS" => array(
        "FILE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FTASK_IMG"),
            "TYPE" => "FILE",
            "FD_EXT" => "png,gif,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array(
                'image',
            ),
            "DEFAULT" => ""
        ),
        "SKILLS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FTASK_PARAM1"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT" => null,
        ),
        "SKILLS_PER" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FTASK_PARAM2"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT" => null,
        )
    ),
);
?>
