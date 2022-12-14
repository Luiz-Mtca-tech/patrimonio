<?
    session_start();
    if (!isset($_SESSION['login'])){
        header("Location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/inputs.css">
    <link rel="stylesheet" href="../css/text.css">
    <script src="https://kit.fontawesome.com/9eddd44c51.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Cadastro</title>
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
            <article id="title-box">
                <h1 class="h1">Inclusão de Patriminio</h1>
            </article>
            <form action="../php/add_patrimonio.php" method="post">

                <section class="form-session">
                    <span class="input-text">
                        <!--<i class="fa-solid fa-magnifying-glass icon"></i>-->
                        <input class="hidden-input-text" type="text" name="number" placeholder="número" maxlength="6">
                    </span>

                    <span class="input-text">
                        <input class="hidden-input-text" type="text" name="description" placeholder="Descrição" maxlength="100">
                    </span>

                    <label for="tipo">Tipo:</label>
                    <select class="input-text" id="tipo" name="type">
                        <option value="2">2-Equipamentos  de Informática</option>
                        <option value="3">3-Máquinas e Utensílios </option>
                        <option value="4">4-Veículos</option>
                        <option value="5">5-Implementos Agrícolas</option>
                        <option value="6">6-Móveis de Escritórios</option>
                        <option value="7">8-Terrenos</option>
                        <option value="8">9-Edificações</option>
                    </select>

                </section class="form-session">

                <section class="form-session">

                    <label for="">Setor:</label>
                    <select class="input-text" id="sector" name="sector">
                        <option value="1">01-IPA</option>
                    </select>

                    <label for="">Local:</label>
                    <select class="input-text" id="local" name="local">
                       
                    </select>

                    <label for="">Situação: </label>
                    <select class="input-text" id="tipo" name="situacion">
                        <option value="1">Ótimo</option>
                        <option value="2">Bom</option>
                        <option value="3">Regular</option>
                        <option value="4">Péssimo</option>
                    </select>
                        
                </section>

                <section class="form-session">
                    <label for="">Data de Aquisição</label>
                    <span class="input-text">
                        <input class="hidden-input-text" type="date" name="acquisition">
                    </span>
                    
                    <label for="">Credor:</label>
                    <select class="input-text" id="credor" name="credor">
                        <option value="1">1-Abestecedora N Alvorada</option>
                    </select>
                    
                </section>
                <label style="display: block; text-align: center;" for="caracteristica">Característica</label>
                <section class="form-session">
                    <span class="input-text">
                        <textarea class="hidden-input-text" name="feature" cols="40" rows="10">
                        </textarea>
                    </span>
                </section>
                <section class="form-session">
                    <span class="input-text">
                        <input class="hidden-input-text" name="empenho" type="text" placeholder="Número de empenho:" maxlength="11">
                    </span>
                    <span class="input-text">
                        <input class="hidden-input-text" name="nota-fiscal" type="text" placeholder="Número de NF:" maxlength="20">
                    </span>
                    <span class="input-text">
                        <i></i>
                        <input class="hidden-input-text" name="aqcuisicion-value" type="text" placeholder="Valor de Aquisição: 0,00" maxlength="18">
                    </span>
                    <span class="input-text">
                        <i></i>
                        <input class="hidden-input-text" name="actual-value" type="text" placeholder="Valor Atual: 0,00" maxlength="18">
                    </span>
                </section>
                <section class="form-session">
                    <span class="input-text">
                        <input class="hidden-input-text" name="picture" type="text" placeholder="Foto:">
                    </span>
                </section>
                <span class="submit">
                    <input class="button1" type="submit" value="Enviar">
                </span>
            </form>
        </section>
    </main>
    <footer></footer>
    <script src="add.js"></script>
</body>
</html>
