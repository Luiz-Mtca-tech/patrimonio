<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:19/07/2022
* Time: 14:57
*
* Add new patrimonio in the data base
*/
ob_start();
require "../vendor/autoload.php";

session_start();

use Patrimonio\WWW\patrimonio\Patrimonio;

//getting credor id form the form
$id_credor = filter_input(INPUT_POST, 'credor', FILTER_VALIDATE_INT);

//creating connection with data base
$patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");
//finding credor
$cnpj_credor = $patrimonio->find("credor", "id = $id_credor", ["cpf_cnpj"]);
//getting all of the data from the form
$data = $patrimonio->getData($cnpj_credor);

//adding data to DB
$patrimonio->add($data);