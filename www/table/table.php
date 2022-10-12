<?

use Patrimonio\WWW\alter\FillFormAlter;

session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../index.html");

} 
require "../php/generatetable.php";
require "../php/classes/alter/FillFormAlter.php";

 $fillform = new FillFormAlter();
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
                <p><strong>Unidade:</strong> <? echo $_SESSION['unidade']?>
                <strong>Usuário: </strong><? echo $_SESSION['login']?>a</p>
                <h1>Cadastro de Patrimonio</h1>
            </div>
            <div id="right">
                <a class="button-menu" href="../add/add.php">Adicionar</a>
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
           <section id="hide-search">
               <!--  <i class="fa-solid fa-sort-down hide-icon"></i> -->
               <i class="fa-solid fa-angle-down hide-icon"></i>
                <h3 class="title-search">Pesquisar</h3>
           </section>
           <article id="inputs-search-area">
               <span class="input-area">
                    <span id="search-input" class="input-text">
                        <i class="fa-solid fa-magnifying-glass icon"></i>
                        <input id="into-search-input" class="hidden-input-text" type="number" placeholder="Num. Patrimonio" maxlength="6">
                    </span>
                    <span id="submit-area">
                        <input id="send-search" class="button1" type="submit" value="Enviar">
                    </span>
                </span>
                <span class="space"></span>
                
                <span class="input-area" id="local-search">
                    <label for="">Local:</label>
                    <select class="input-text" id="select-local">
                            <option value="0">nenhum</option>
                            <? $fillform->getSelect("local", 0, ["id", "loc_des"])?>
                        </select>
                    </span>
                </span>

                
            </article>
        </section>
        <article id="table-area" style="overflow-x: auto;">
            <? generateTable($data)?>
        </article>
    </main>
    <script src="../js/table.js"></script>
</body>
</html>