<?php
/**
* @author: Luiz Henrique da Mota Couto
* @date: 14/07/2022
* Time: 16:47
*/

require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

$data = $db->findAll("local", "" );
?>
<option value="0">nenhum</option>
<?
foreach($data as $item){
?>
<option value="<?echo $item['loc_cod']?>"><? echo $item["loc_des"] ?></option>
<?
}