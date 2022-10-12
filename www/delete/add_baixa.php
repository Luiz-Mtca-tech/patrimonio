<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:17/08/2022
* Time: 10:08
*/

require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../index.html");

}
$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");
$id = filter_input(INPUT_POST, "patrimonio", FILTER_VALIDATE_INT);
$data = $db->find("patrimonio" , "id = ". $id);

$data["pat_dtbai"] = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
$data["pat_motiv"] = filter_input(INPUT_POST, "reason", FILTER_SANITIZE_SPECIAL_CHARS);


$db->updateDatas("patrimonio" , $id, $data);
$_SESSION["id"] = "";
header("Location: ../table/table.php");

