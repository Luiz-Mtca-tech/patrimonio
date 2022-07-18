<?php
/**
* @author: Luiz Henrique da Mota Couto
* @date: 11/07/2022
* Time: 16:06
*/
/*ob_start();
require "../vendor/autoload.php";
ob_clean();
use Patrimonio\WWW\db\MysqlDataBase;

$location = filter_input(INPUT_POST, "location", FILTER_VALIDATE_INT);
echo $location;

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

$data = $db->findAll("patrimonio", "WHERE pat_loca = $location");
*/
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
            <td><a class="action-alt" href="#" title="Alt"><i class="fa-solid fa-file-pen table-icon"></i></a></td>
            <td><a class="" href="#" title="Ficha"><i class="fa-solid fa-file-lines table-icon"></i></a></td>
            <td><a class="" href="#" title="Baixa"><i class="fa-solid fa-arrow-down-long table-icon"></i></a></td>
            <td><a class="" href="#" title="Tranferência"><i class="fa-solid fa-arrow-right-arrow-left table-icon"></i></a></td>
        </tr>
    <?
    }
    ?></table><?
}