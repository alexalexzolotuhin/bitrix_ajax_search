<?

Class ftask_search_ajax extends CModule
{
    var $MODULE_ID = "ftask.search.ajax";//id �� bitrix �������
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function ftask_search_ajax()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = "ftask.search.ajax � ������ � �����������";
        $this->MODULE_DESCRIPTION = "����� ��������� �� ������� ������������ ����������� ftask:search.ajax";
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/ftask.search.ajax/install/components",
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
        RegisterModule("ftask.search.ajax");
        $APPLICATION->IncludeAdminFile("��������� ������ ftask.search.ajax", $DOCUMENT_ROOT."/bitrix/modules/ftask.search.ajax/install/step.php");
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallFiles();
        UnRegisterModule("ftask.search.ajax");
        $APPLICATION->IncludeAdminFile("������������� ������ ftask.search.ajax", $DOCUMENT_ROOT."/bitrix/modules/ftask.search.ajax/install/unstep.php");
    }
}
?>