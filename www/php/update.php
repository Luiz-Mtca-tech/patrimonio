<?
/**
* @author: Luiz Henrique da Mota Couto
* @date: 01/09/2022
* Time: 9:34
*/

require "../vendor/autoload.php";

use Patrimonio\WWW\patrimonio\Patrimonio;
ob_start();
session_start();

$patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");

$id = filter_input(INPUT_POST, "credor", FILTER_SANITIZE_NUMBER_INT);
$cnpj = $patrimonio->find("credor", "id = $id", ["cpf_cnpj"]);

$data = $patrimonio->getData($cnpj);
print_r($data);
ob_clean();
$patrimonio->edit($_SESSION["id"], $data);