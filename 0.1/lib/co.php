<?
function toracommu_start() {
	require_once($GLOBALS["plugin_root"]."lib/toracommu_calss.php");
	$toracommu_calssObj=new toracommu_calss();
	$mode=$_POST['toracommu_mode'];
	if($mode==NULL || $mode==""){
		$mode="default";
	}
	
	switch($mode){
		case "default":
			$csvLines=$toracommu_calssObj->toracommu_getData($GLOBALS["torracommu_path"]);
			require_once($GLOBALS["plugin_root"]."page/default.php");
		break;
		case "add_data":
			list($error_flg,$error_strings,$addData)=$toracommu_calssObj->toracommu_chk_value($_POST);
			if($error_flg){
				list($error_flg,$error_strings)=$toracommu_calssObj->toracommu_addData($addData,$GLOBALS["torracommu_path"]);
			}
			$csvLines=$toracommu_calssObj->toracommu_getData($GLOBALS["torracommu_path"]);
			require_once($GLOBALS["plugin_root"]."page/default.php");
		break;
		case "edit_data":
			list($error_flg,$error_strings,$addData)=$toracommu_calssObj->toracommu_chk_value($_POST);
			if($error_flg){
				list($error_flg,$error_strings)=$toracommu_calssObj->toracommu_editData($addData,$GLOBALS["torracommu_path"],$_POST["toracommu_num"]);
			}
			$csvLines=$toracommu_calssObj->toracommu_getData($GLOBALS["torracommu_path"]);
			require_once($GLOBALS["plugin_root"]."page/default.php");
		break;
		case "delete_data":
			list($error_flg,$error_strings)=$toracommu_calssObj->toracommu_deleteData($GLOBALS["torracommu_path"],$_POST["toracommu_num"]);
			$csvLines=$toracommu_calssObj->toracommu_getData($GLOBALS["torracommu_path"]);
			require_once($GLOBALS["plugin_root"]."page/default.php");
		break;
	}
}
?>