<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*/

require "../vendor/autoload.php";

use Patrimonio\WWW\patrimonio\Patrimonio;

$patrimonio = new Patrimonio("sistcon", "mysql", "root", "031957");

$list = $patrimonio->findAll("local"); 
foreach($list as $item){
    ?>
        <option value="<?echo $item["id"]?>"> <? echo $item["loc_des"]?></option>
    <?
}