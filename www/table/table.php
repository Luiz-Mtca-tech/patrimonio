<?
require "../vendor/autoload.php";
//importing the function to generate the table
require "../php/generatetable.php";

use Patrimonio\WWW\db\MysqlDataBase;

session_start();

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

//$campos = array('id', "pat_foto", "pat_seto", "pat_cod", "pat_desc");
if($_SESSION["local"] == '0' || $_SESSION["local"] == 0) {
    if (!empty(filter_input(INPUT_POST, "location", FILTER_SANITIZE_NUMBER_INT))){
        $local = filter_input(INPUT_POST, "location", FILTER_SANITIZE_NUMBER_INT);
        $_SESSION["local"] = $local;
        $data = $db->findAll("patrimonio", "pat_loca = $local");

    } else {
        $data = $db->findAll("patrimonio");
    }
    
} else {
    $data = $db->findAll("patrimonio", "pat_loca = ".$_SESSION['local']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/inputs.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9eddd44c51.js" crossorigin="anonymous"></script>
    <title>Patrimonio</title>
</head>
<body>
    <header>
        <nav>
            <div id="left">
                <h1 class="menu-title">Sistcon</h1>
                <!--<img class="header-img" src="images/logoipa.jpg" alt="ipas's icon">
                <img class="header-main-img" src="images/logotipo.jpg" alt="sistcon's icon">-->
                <!--<img class="header-img" src="images/foto_usu3.jpg" alt="user's photo">-->
            </div>
            <div class="center" id="header-text-area">
                <p><strong>Unidade:</strong> 02-ipa-int-previdencia-Angélica -
                <strong>Usuários:</strong> Paulo de Oliveira</p>
                <h1>Cadastro de Patrimonio</h1>
            </div>
            <div id="right">
                <a class="button-menu" href="../cadastro/cadastro_patrimonio.html">Adicionar</a>
                <a class="button-menu" href="#">Listar</a>
                <a class="button-menu-back" href="../index.html ">Voltar</a>
                <!-- <button id="adicionar"  class="button-menu">Adicionar</button>
                <button  class="button-menu" >Listar</button>
                <button id="voltar" class="button-menu-back">Voltar</button> -->
            </div>
        </nav>
    </header>
    <main id="main-area">
        <section id="search-area">
            <h1 class="h1-search">Pesquisa</h1>
            <article id="inputs-search-area">
                <span id="search-input" class="input-text">
                    <i class="fa-solid fa-magnifying-glass icon"></i>
                    <input class="hidden-input-text" type="text">
                </span>
                <span id="submit-area">
                    <input class="button1" type="submit" value="Enviar">
                </span>
                
            </article>
        </section>
        <article id="table-area" style="overflow-x: auto;">
            <? generateTable($data)?>
            <!-- <table>
                <tr class="table-header">
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Setor</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th colspan="4">options</th>
                </tr>
                <tr class="table-row">
                    <td>1</td>
                    <td>
                        <a href="images/foto_usu3.jpg" target="_blank">Imagem</a>
                    </td>
                    
                    <td>Sala de Recepção</td>
                    <td>1-000001</td>
                    <td>Ar-condicionado</td>
                    <td><a class="action-alt" href="#" title="Alt"><i class="fa-solid fa-file-pen table-icon"></i></a></td>
                    <td><a class="" href="#" title="Ficha"><i class="fa-solid fa-file-lines table-icon"></i></a></td>
                    <td><a class="" href="#" title="Baixa"><i class="fa-solid fa-arrow-down-long table-icon"></i></a></td>
                    <td><a class="" href="#" title="Tranferência"><i class="fa-solid fa-arrow-right-arrow-left table-icon"></i></a></td>
                </tr>
            </table> -->
        </article>
    </main>
    <script src="../js/index.js"></script>
</body>
</html>