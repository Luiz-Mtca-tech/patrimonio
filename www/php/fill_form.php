<?
/**
* @author: Luiz Henrique da Mota Couto
* @date: 26/07/2022
* Time: 16:03

* This file will return the page with a html code, to fill
* the <select> input fields in the form
*/

require "../vendor/autoload.php";
use Patrimonio\WWW\db\MysqlDataBase;

class FillForm extends MysqlDataBase{

    function __construct(int $which)
    {
        // connecting with data base
        parent::__construct("sistcon", "mysql", "root", "031957");

        //verifing wich input will get the response
        switch($which){
            case 1:
                $this->local();
                break;
            case 2:
                $this->credor();
                break;
            case 3:
                $this->setor();
                break;
        }
       
    }

    private function local()
    {
        $list = parent::findAll("local"); 
        foreach($list as $item){
            ?>
                <option value="<?echo $item["id"]?>"> <? echo $item["loc_des"]?></option>
            <?
        }
    }

    private function credor()
    {
        $list = parent::findAll("credor"); 
        foreach($list as $item){
            ?>
                <option value="<?echo $item["id"]?>"> <? echo $item["razao_social"]?></option>
            <?
        }
    }

    private function setor()
    {
        $list = parent::findAll("setor"); 
        foreach($list as $item){
            ?>
                <option value="<?echo $item["id"]?>"> <? echo $item["set_des"]?></option>
            <?
        }
    }
}

new FillForm(filter_input(INPUT_POST, "item", FILTER_VALIDATE_INT));
