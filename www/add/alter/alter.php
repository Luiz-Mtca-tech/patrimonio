<?
    require "../../vendor/autoload.php";
    
    use Patrimonio\WWW\db\MysqlDataBase;
    use Patrimonio\WWW\alter\FillFormAlter;

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $_SESSION["id_alter"] = $id;
    $db = new MysqlDataBase("sistcon", "mysql", "root", "031957");
    $fill = new FillFormAlter();
    $data = $db->find("patrimonio", "id = $id");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../add.css">
    <link rel="stylesheet" href="../../css/buttons.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/inputs.css">
    <link rel="stylesheet" href="../../css/text.css">
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
                    <a class="button-menu-back" href="../../table/table.php">Voltar</a>
                </div>
        </nav>
    </header>
    <main>
        <section>
            <article id="title-box">
                <h1 class="h1-search">Inclusão de Patriminio</h1>
            </article>
            <form action="../../php/classes/alter/Update.php" method="post">

                <section class="form-session">
                    <span class="input-text">
                        <!--<i class="fa-solid fa-magnifying-glass icon"></i>-->
                        <input class="hidden-input-text" type="text" name="number" value="<? echo $data['pat_num']?>" placeholder="número" maxlength="6">
                    </span>

                    <span class="input-text">
                        <input class="hidden-input-text" type="text" name="description" value="<? echo $data['pat_desc']?>" placeholder="Descrição" maxlength="100">
                    </span>

                    <label for="tipo">Tipo:</label>
                    <select class="input-text" id="tipo" name="type">
                        <option value="2"<?echo $data['pat_tipo'] == '2' ? 'selected' : ''?> >2-Equipamentos  de Informática</option>
                        <option value="3"<?echo $data['pat_tipo'] == '3' ? 'selected': '';?> >3-Máquinas e Utensílios </option>
                        <option value="4"<?echo $data['pat_tipo'] == '4' ? 'selected' : ''?> >4-Veículos</option>
                        <option value="5"<?echo $data['pat_tipo'] == '5' ? 'selected' : ''?> >5-Implementos Agrícolas</option>
                        <option value="6"<?echo $data['pat_tipo'] == '6' ? 'selected' : ''?> >6-Móveis de Escritórios</option>
                        <option value="7"<?echo $data['pat_tipo'] == '7' ? 'selected' : ''?> >8-Terrenos</option>
                        <option value="8"<?echo $data['pat_tipo'] == '8' ? 'selected' : ''?> >9-Edificações</option>
                    </select>

                </section class="form-session">

                <section class="form-session">

                    <label for="">Setor:</label>
                    <select class="input-text" id="sector" name="sector">
                        <?$fill->getSelect("setor", $data["pat_seto"], ["id", "set_des"])?>
                    </select>

                    <label for="">Local:</label>
                    <select class="input-text" id="local" name="local">
                       <? $fill->getSelect("local", $data["pat_loca"], ["id", "loc_des"])?>
                    </select>

                    <label for="">Situação: </label>
                    <select class="input-text" id="tipo" name="situacion">
                        <option value="1" <?echo $data['pat_situ'] == '1' ? 'selected' : ''?>>Ótimo</option>
                        <option value="2" <?echo $data['pat_situ'] == '2' ? 'selected' : ''?>>Bom</option>
                        <option value="3" <?echo $data['pat_situ'] == '3' ? 'selected' : ''?>>Regular</option>
                        <option value="4" <?echo $data['pat_situ'] == '4' ? 'selected' : ''?>>Péssimo</option>
                    </select>
                        
                </section>

                <section class="form-session">
                    <label for="">Data de Aquisição</label>
                    <span class="input-text">
                        <input class="hidden-input-text" type="date" value="<?echo date($data['pat_dtaq'])?>" name="acquisition">
                    </span>
                    
                    <label for="">Credor:</label>
                    <select class="input-text" id="credor" name="credor">
                        <!-- <option value="1">1-Abestecedora N Alvorada</option> -->
                        <? $fill->getSelect("credor", $data["pat_cred"], ["id", "razao_social"])?>
                    </select>
                    
                </section>
                <label style="display: block; text-align: center;" for="caracteristica">Característica</label>
                <section class="form-session">
                    <span class="input-text">
                        <textarea class="hidden-input-text" name="feature" cols="40" rows="10">
                            <? echo $data["pat_cara"] ?>
                        </textarea>
                    </span>
                </section>
                <section class="form-session">
                    <span class="input-text">
                        <input class="hidden-input-text" name="empenho" type="text" value="<? echo $data["pat_emp"]?>" placeholder="Número de empenho:" maxlength="11">
                    </span>
                    <span class="input-text">
                        <input class="hidden-input-text" name="nota-fiscal" type="text" value="<?echo $data["pat_nfs"]?>" placeholder="Número de NF:" maxlength="20">
                    </span>
                    <span class="input-text">
                        <i></i>
                        <input class="hidden-input-text" name="aqcuisicion-value" type="text" value="<?echo $data["pat_vlin"]?>" placeholder="Valor de Aquisição: 0,00" maxlength="18">
                    </span>
                    <span class="input-text">
                        <i></i>
                        <input class="hidden-input-text" name="actual-value" type="text" value="<?echo $data["pat_vlat"]?>" placeholder="Valor Atual: 0,00" maxlength="18">
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
    <script src="alter.js"></script>
</body>
</html>
