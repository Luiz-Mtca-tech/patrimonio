<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*/
namespace Patrimonio\WWW\alter;

use Patrimonio\WWW\db\MysqlDataBase;

class FillFormAlter extends MysqlDataBase{

    public function __construct(
        $db_name = "sistcon",
        $host_name = "mysql",
        $user_name = "root",
        $password = "031957"
    )
    {
        parent::__construct($db_name, $host_name, $user_name, $password);
    
    }
    // function to bring the <select> options
    
    
    public function getSelect(
        string $table,//$table which table to search for data.

        int $comp,//$comp any number or data to make a comparation to mark as selected.

        array $field //$field which data do you want to show in the <option>
        // first is the value, second is the label.
        )
        {
        $list = parent::findAll($table);
        foreach($list as $item){

            ?>
                <option value="<?echo $item[$field[0]]?>" <? echo $item["id"] == $comp ? 'selected': ''?>>
                    <? echo $item[$field[1]]?>
                </option>
            <?
        }


    }
}
