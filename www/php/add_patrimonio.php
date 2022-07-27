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

use Patrimonio\WWW\db\MysqlDataBase;

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");
$id_credor = filter_input(INPUT_POST, 'credor', FILTER_VALIDATE_INT);
$cnpj_credor = $db->find("credor", "id = $id_credor", ["cpf_cnpj"]);

// getting the values from the form
// preparing the fields and data to be send to the data base
$data = ["pat_num"   => filter_input(INPUT_POST, "number", FILTER_SANITIZE_NUMBER_INT),
         "pat_desc"  => filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_tipo"  => filter_input(INPUT_POST, "type", FILTER_SANITIZE_NUMBER_INT),
         "pat_seto"  => filter_input(INPUT_POST, "sector", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_loca"  => filter_input(INPUT_POST, "local", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_situ"  => filter_input(INPUT_POST, "situacion", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_dtaq"  => filter_input(INPUT_POST, "acquisition", FILTER_DEFAULT),
         "pat_cred"  => filter_input(INPUT_POST, "credor", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_cara"  => filter_input(INPUT_POST, "feature", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_emp"   => filter_input(INPUT_POST, "empenho", FILTER_SANITIZE_SPECIAL_CHARS),
         "pat_nfs"   => filter_input(INPUT_POST, "nota-fiscal", FILTER_SANITIZE_NUMBER_INT),
         "pat_vlin"  => floatval(filter_input(INPUT_POST, "aqcuisicion-value", FILTER_SANITIZE_NUMBER_INT)),
         "pat_vlat"  => floatval(filter_input(INPUT_POST, "actual_value", FILTER_SANITIZE_NUMBER_FLOAT)),
         "pat_foto"  => filter_input(INPUT_POST, "picture", FILTER_DEFAULT),
         "pat_unid"  => $_SESSION["unidade"],
         "pat_dtbai" => date("Y-m-d", intval("00-00-0000")),
         "pat_motiv" => "",
         "pat_cod"   => "",
         "pat_dttra" => date("Y-m-d", intval("00-00-0000")),
         "pat_vlco"  => "0.00",
         "pat_vldp"  => "0.00",
         "pat_cnpj"  => $cnpj_credor[0],
         "pat_mov"   => "",
         "pat_vlat2" => floatval(filter_input(INPUT_POST, "actual_value", FILTER_SANITIZE_NUMBER_FLOAT))
        ];

// executing the query
if($db->registerDatas("patrimonio", $data)){
    ob_clean();
    //going back
    header("Location: ../cadastro/cadastro_patrimonio.html");
} else {
    echo "something went wrong";
}