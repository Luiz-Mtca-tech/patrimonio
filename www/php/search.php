<?
/**
* @author: Luiz Henrique da Mota Couto
* @date:18/07/2022
* Time: 16:03
*
* Receive the data from index.html and send them to table.php
*/
require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;
    
session_start();

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

$filter = filter_input(INPUT_POST, "number", FILTER_SANITIZE_NUMBER_INT);

if ($filter == ""){
    if(isset($_SESSION["local"])){
        $data = $db->findAll("patrimonio", "pat_loca = ".$_SESSION["local"]);
    }
} else {
    $data = $db->findAll("patrimonio", "pat_num LIKE '%".$filter."%'");
}
?>
<table>
<tr class="table-header">
    <th>Número</th>
    <th>Foto</th>
    <th>Setor</th>
    <th>Código</th>
    <th>Descrição</th>
    <th colspan="4">Opções</th>
</tr>
<?
foreach ($data as $item){
?>
<tr class="table-row">
    <td><?echo $item["pat_num"] ?></td>
    <td>
        <a href="images/foto_usu3.jpg" target="_blank">Imagem</a>
    </td>
    
    <td><?echo $item["pat_seto"] ?></td>
    <td><?echo $item["pat_cod"] ?></td>
    <td><?echo $item["pat_desc"] ?></td>
    <td><a class="action-alt" href="../add/alter/alter.php?id=<? echo $item['id']?>" title="Alt"><i class="fa-solid fa-file-pen table-icon"></i></a></td>
    <td><a class="" href="../show/show.php?id=<? echo $item['id']?>" title="Ficha"><i class="fa-solid fa-file-lines table-icon"></i></a></td>
    <td><a class="" href="../delete/delete.php?id=<?echo $item['id']?>" title="Baixa"><i class="fa-solid fa-arrow-down-long table-icon"></i></a></td>
    <td><a class="" href="#" title="Tranferência"><i class="fa-solid fa-arrow-right-arrow-left table-icon"></i></a></td>
</tr>
<?
}
?></table>