<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*/

namespace Patrimonio\WWW\patrimonio;

//require "../../vendor/autoload.php";

use Patrimonio\WWW\alter\Update;
use Patrimonio\WWW\db\MysqlDataBase;

class Patrimonio extends MysqlDataBase {
    function __construct($db_name, $host_name, $user, $password)
    {
        parent::__construct($db_name, $host_name, $user, $password);
    }

    public function add(array $data)
    {
        
        //$cnpj_credor = parent::find("credor", "id = $id_credor", ["cpf_cnpj"]);
        //$data = $this->getData(filter_input(INPUT_POST, "credor", FILTER_SANITIZE_NUMBER_INT));
        if(parent::registerDatas("patrimonio" , $data)){
            header("Location: ../table/table.php");
        } else {

        }
    }
    public function delete()
    {

    }

    public function edit(){

    }
    public static function getData($cnpj_credor)
    {
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
         "pat_vlin"  => filter_input(INPUT_POST, "aqcuisicion-value", FILTER_SANITIZE_NUMBER_INT),
         "pat_vlat"  => filter_input(INPUT_POST, "actual-value", FILTER_SANITIZE_NUMBER_INT),
         "pat_foto"  => filter_input(INPUT_POST, "picture", FILTER_DEFAULT),
         "pat_unid"  => $_SESSION["unidade"],
         "pat_dtbai" => date("Y-m-d", intval("00-00-0000")),
         "pat_motiv" => "",
         "pat_cod"   => "",
         "pat_dttra" => date("Y-m-d", intval("00-00-0000")),
         "pat_vlco"  => "0.00",
         "pat_vldp"  => "0.00",
         "pat_cnpj"  => $cnpj_credor["cpf_cnpj"],
         "pat_mov"   => "",
         "pat_vlat2" => floatval(filter_input(INPUT_POST, "actual_value", FILTER_SANITIZE_NUMBER_FLOAT))
        ];
           return $data;
    }
}

/*switch (filter_input(INPUT_GET, "mode", FILTER_VALIDATE_INT)) {
    case 1:
        $patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");
        $patrimonio->add(filter_input(INPUT_POST, "credor", FILTER_SANITIZE_NUMBER_INT));
        break;
    case 2:
        $patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");

        break;
    case 3:
        $patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");

        break;
    case 4:
        $patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");

        break;

}*/