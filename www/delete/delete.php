<?
  /* 
  *  (c) redxam llc and affiliates. Confidential and proprietary.
  *
  *  @oncall dev+Author
  *  @format
  */
  require "../vendor/autoload.php";

  use Patrimonio\WWW\alter\FillFormAlter;

  session_start();
  //if there's no login
  if (!isset($_SESSION['login'])){
    header("Location: ../index.html");

  }
  $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
  $fill = new FillFormAlter();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Author" />
    <link rel="stylesheet" href="delete.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/inputs.css">
    <title>Baixa</title>
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
            <a class="button-menu-back" href="../../table/table.php">Voltar</a>
        </div>
      </nav>
    </header>

    <main>
      <article>
        <h1 class="h1-search">Baixa</h1>
      </article>
      <hr>
      <form action="add_baixa.php" method="post">
        <section class="form-session">
          <label for="">Data</label>
          <div>
            <input class="input-text" type="date" name="date" id="">
          </div>
        </section>
        <section class="form-session">
          <label for="">Patrimonio</label>
          <select class="input-text" name="patrimonio" id="">
            <? $fill->getSelect("patrimonio", $id, ["id","pat_desc"])?>
          </select>
        </section>
        <section class="form-session">
          <label for="">Motivo</label>
          <div>
            <textarea class="input-text area" name="reason" id="" cols="30" rows="10"></textarea>
          </div>
        </section>       
        <span class="submit">
          <input class="button1" type="submit" value="enviar">
        </span>
      </form>
    </main>
    
  </body>
</html>
