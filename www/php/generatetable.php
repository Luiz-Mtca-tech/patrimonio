<?php
/**
* @author: Luiz Henrique da Mota Couto
* @date: 11/07/2022
* Time: 16:06
*/
require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

if (filter_input(INPUT_POST, "location", FILTER_SANITIZE_NUMBER_INT) != null){
    $local = filter_input(INPUT_POST, "location", FILTER_SANITIZE_NUMBER_INT);
    if($local == "0"){
        $_SESSION["local"] = "0";
        $data = $db->findAll('patrimonio');
    } else {
        $_SESSION["local"] = $local;
        $data = $db->findAll("patrimonio", "pat_loca = $local");
    }

} else {
    if(!isset($_SESSION["local"]) || $_SESSION["local"] == "0") {
        $data = $db->findAll('patrimonio');
    } else {
        $local = $_SESSION["local"];
        $data = $db->findAll("patrimonio", "pat_loca = $local");
    }
    
}

function generateTable($data){
    ?>
    <table>
        <tr class="table-header">
            <th>Id</th>
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
            <td><?echo $item["id"] ?></td>
            <td>
                <a href="images/foto_usu3.jpg" target="_blank">Imagem</a>
            </td>
            
            <td><?echo $item["pat_seto"] ?></td>
            <td><?echo $item["pat_cod"] ?></td>
            <td><?echo $item["pat_desc"] ?></td>
            <td><a class="action-alt" href="../add/alter/alter.php?id=<? echo $item['id']?>"  title="Alt"><i class="fa-solid fa-file-pen table-icon"></i></a></td>
            <td><a class="" href="#" title="Ficha"><i class="fa-solid fa-file-lines table-icon"></i></a></td>
            <td><a class="" href="#" title="Baixa"><i class="fa-solid fa-arrow-down-long table-icon"></i></a></td>
            <td><a class="" href="#" title="Tranferência"><i class="fa-solid fa-arrow-right-arrow-left table-icon"></i></a></td>
        </tr>
    <?
    }
    ?></table><?
    //onclick="$.post('../add/alter/alter.php', {id: <?php echo $item['id']})"
}