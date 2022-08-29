<?
/**
* @author: Luiz Henrique da Mota Couto
* @date: 23/08/2022
* Time: 09:55
*/

require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

$data["pat_loca"] = filter_input(INPUT_POST, "local", FILTER_VALIDATE_INT);
$data["pat_motiv"] = filter_input(INPUT_POST, "reason", FILTER_SANITIZE_SPECIAL_CHARS);
$data["pat_dttra"] = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
$data["pat_seto"] = filter_input(INPUT_POST, "sector", FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

if($db->updateDatas("patrimonio", $id, $data)){
    header("Location: ../table/table.php");
}