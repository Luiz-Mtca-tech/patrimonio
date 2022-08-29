<?
require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;
use Patrimonio\WWW\alter\FillFormAlter;

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");
$form = new FillFormAlter();
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$item = $db->find("patrimonio", "id = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transfer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/inputs.css">
    <link rel="stylesheet" href="../css/text.css">
    <title>Tranferencia</title>
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
            <a class="button-menu-back" href="../table/table.php">Voltar</a>
        </div>
    </nav>
</header>
<main>
    <section>
        <h1 class="h1-search">Tranferencia de Patrimonio</h1>
        <article>
            <p class="hidden-p"></p>
           <p class="hidden-p">Patrimonio: <?echo $item["pat_desc"]?> - Numero: <?echo $item["pat_num"]?></p>
        </article>
    </section>
    <hr>
    <form action="add_transf.php" method="post">
        <section class="form-session">
            <label for="date">Data de Trasferência</label>
            <div class="input-text" id="date">
                <input class="hidden-input-text" type="date" name="date">
            </div>
        </section>
        <section class="form-session">
            <label for="">Patrimonio:</label>
            <select class="input-text" name="id" id="">
                <? $form->getSelect("patrimonio", $id, ["id", "pat_desc"])?>
            </select>
        </section>
        <section class="form-session">
            <label for="setor">Escolha um Novo Setor: </label>
            <select class="input-text" name="sector" id="setor">
                <? $form->getSelect("setor", $id, ["set_cod", "set_des"])?>
            </select>
            
        </section>
        <section class="form-section">
            <label for="local">Escolha um novo Local: </label>
            <select class="input-text" name="local" id="local">
            <?$form->getSelect("local", $id, ["id", "loc_des"])?>
            </select>
        </section>

        
        
        <div class="textarea-div">
            <!-- cols="40" rows="10" -->
            <label style="display: block; text-align: center;">Motivo:</label>
            <textarea class="textarea-input" name="reason" id=""></textarea>
        </div>

        <div class="submit">
            <input class="button1" type="submit" name="" id="" value="Enviar">
        </div>
    </form>
</main>
</body>
</html>