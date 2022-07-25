<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:19/07/2022
* Time: 14:57
*
* Add new patrimonio in the data base
*/
require "../vendor/autoload.php";

session_start();

use Patrimonio\WWW\db\MysqlDataBase;

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
         "pat_cod"   => ""
        ];

// executing the query
$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

if($db->registerDatas("patrimonio", $data)){
    header("Location: ../cadastro/cadastro_patrimonio.php");
} else {
    echo "something went wrong";
}