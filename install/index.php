<?

Class ftask_searchajax extends CModule
{
    var $MODULE_ID = "ftask.searchajax";//id из bitrix системы
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function ftask_searchajax()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        $this->PARTNER_NAME = "ftask";
        $this->PARTNER_URI = "http://ftask.ru/";

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = GetMessage("FTASK_SEARCHAJAX_MODULE_NAME");
        $this->MODULE_DESCRIPTION = GetMessage("FTASK_SEARCHAJAX_MODULE_DESCRIPTION");
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/ftask.searchajax/install/components",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/bitrix/components/ftask");
        return true;
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->InstallFiles();
        RegisterModule("ftask.searchajax");
        $APPLICATION->IncludeAdminFile(GetMessage("FTASK_SEARCHAJAX_INSTALL_TITLE"), $DOCUMENT_ROOT."/bitrix/modules/ftask.searchajax/install/step.php");
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallFiles();
        UnRegisterModule("ftask.searchajax");
        $APPLICATION->IncludeAdminFile(GetMessage("FTASK_SEARCHAJAX_UNINSTALL_TITLE"), $DOCUMENT_ROOT."/bitrix/modules/ftask.searchajax/install/unstep.php");
    }
}
?>