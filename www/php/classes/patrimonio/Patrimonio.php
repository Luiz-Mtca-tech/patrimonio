<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*/

namespace Patrimonio\WWW\patrimonio;

require "../../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

class Patrimonio extends MysqlDataBase {
    function __construct($db_name, $host_name, $user, $password)
    {
        parent::__construct($db_name, $host_name, $user, $password);
    }

    public function add()
    {

    }
    public function delete()
    {

    }

    public function edit(){

    }
}