<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*/
namespace Patrimonio\WWW\alter;
require "../../../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;
use Patrimonio\WWW\form\Form;
ob_start();
session_start();

class Update extends MysqlDataBase {

    function __construct(
        $db_name = "sistcon",
        $host_name = "mysql",
        $user_name = "root",
        $password = "031957"
    )
    {
        parent::__construct($db_name, $host_name, $user_name, $password);
        $id_credor = filter_input(INPUT_POST, 'credor', FILTER_VALIDATE_INT);
        $this->cnpj_credor = parent::find("credor", "id = $id_credor", ["cpf_cnpj"]);
        
        $this->alterData();
    }
    private function alterData()
    {
        $data = $this->getData();
        echo "<br><br>: ".$_SESSION["id"]."<br><br>";
        echo $data["pat_vlat"]." : ". $data["pat_vlin"];
        
        if(parent::updateDatas("patrimonio", $_SESSION["id"], $data)){
            ob_clean();
            header("Location: ../../../table/table.php");
        }else {
            //header("Location: #?id=");
        }
    }

    private function getData()
    {
        $data = [
         "pat_num"   => filter_input(INPUT_POST, "number", FILTER_SANITIZE_NUMBER_INT),
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
         "pat_vlin"  => number_format(filter_input(INPUT_POST, "pat-initial-value", FILTER_SANITIZE_NUMBER_FLOAT), 2, ".", ""),
         "pat_vlat"  =>number_format(filter_input(INPUT_POST, "actual-value", FILTER_SANITIZE_NUMBER_FLOAT), 2, ".", ""),
         "pat_foto"  => filter_input(INPUT_POST, "picture", FILTER_DEFAULT),
         "pat_unid"  => $_SESSION["unidade"],
         "pat_dtbai" => date("Y-m-d", intval("00-00-0000")),
         "pat_motiv" => "",
         "pat_cod"   => "",
         "pat_dttra" => date("Y-m-d", intval("00-00-0000")),
         "pat_vlco"  => "0.00",
         "pat_vldp"  => "0.00",
         "pat_cnpj"  => $this->cnpj_credor,
         "pat_mov"   => "",
         "pat_vlat2" => floatval(filter_input(INPUT_POST, "actual_value", FILTER_SANITIZE_NUMBER_FLOAT))
        ];

        return $data;
    }
}

if(isset($_POST)){
    new Update();
}