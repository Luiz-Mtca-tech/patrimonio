<?
require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;
//use Patrimonio\WWW\alter\FillFormAlter;

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");
$data = $db->find("patrimonio", "id = $id");

$setor = $db->find("setor", "set_cod = ".$data["pat_seto"], ["set_des"]);
$local = $db->find("local", "loc_cod = ".$data["pat_loca"], ["loc_des"]);
$credor = $db->find("credor", "id = ".$data["pat_cred"], ["razao_social"]);
//$fill = new FillFormAlter();
?>
<!-- 
 *  (c) redxam llc and affiliates. Confidential and proprietary.
 *
 *  @oncall dev+Author
 *  @format
 -->
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Author" />
    <link rel="stylesheet" href="show.css">
    <link rel="stylesheet" href="../../css/buttons.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/inputs.css">
    <link rel="stylesheet" href="../../css/text.css">
    <title>Ficha</title>
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
                <h1 class="h1-search">Patrimonio nº: <? echo "legal"?></h1>
            </article>
            <hr>
            <!--here will be the data-->
            <section>
                <div class="data">                      
                    <p class="hidden-p" ><strong>N. do Patrimonio:</strong> <?echo $data['pat_num']?></p>
                </div>

                <div class="data">
                    <p class="hidden-p"><strong>Descrição:</strong> <? echo $data['pat_desc']?></p>
                </div>

                <div class="data">
                        <p class="hidden-p"> <strong>Tipo:</strong>
                            <? switch($data["pat_tipo"]){
                                case "2" :
                                    echo "Equipamentos  de Informática" ;
                                    break;
                                case "3":
                                    echo "Máquinas e Utensílios";
                                    break;
                                case "4":
                                    echo "Veículos";
                                    break;
                                case "5":
                                    echo "Implementos Agrícolas";
                                    break;
                                case "6":
                                    echo "Móveis de Escritórios";
                                    break;
                                case "7":
                                    echo "Terrenos";
                                    break;
                                case "8":
                                    echo "Edificações";
                                    break;
                            }
                            ?>
                        </p>
                </div>

            </section>

            <section class="data-session">
                <!--Setor-->
                <div>
                    <div class="data">
                        <p class="hidden-p"><strong>Setor: </strong><? echo $setor["set_des"]?></p>
                    </div>
                </div>

                <!--Local-->
                <div>
                    <div class="data">
                        <p class="hidden-p"><strong>Local:</strong> <?echo $local["loc_des"]?></p>
                    </div>
                </div>
                <!--Situação-->
                <div>
                    <div class="data">
                        <p class="hidden-p"><strong>Situação: </strong>
                        <? switch($data["pat_situ"]){
                                case "1" :
                                    echo "Ótimo" ;
                                    break;
                                case "2":
                                    echo "Bom";
                                    break;
                                case "3":
                                    echo "Regular";
                                    break;
                                case "4":
                                    echo "Péssimo";
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                </div>
                    
            </section>

            <section class="data-session">
                <!--Data de Aquisição-->
                <div class="data">
                        <p class="hidden-p"><strong>Data de Aquisição: </strong><?echo date($data['pat_dtaq'])?></p>
                </div>
                
                <!--Credor-->
                <div>
                    <div class="data">
                        <p class="hidden-p"><strong>Credor: </strong><? echo $credor["razao_social"]?> </p>
                    </div>
                </div>
                
            </section>

            <label style="display: block; text-align: center;" for="caracteristica">Característica</label>
            <div class="data">
                <p class="hidden-p"> <? echo $data["pat_cara"] ?></p>
            </div>
            
            <section class="data-session">
                <div class="data">
                    <p class="hidden-p"><strong>N. de Empenho: </strong>R$<? echo number_format($data["pat_emp"], 2, ".", ",")?></p>
                </div>
                <div class="data">
                    <p class="hidden-p"><strong>Nota Fiscal: </strong><? echo $data["pat_nfs"]?></p>
                </div>
                <div class="data">
                    <p class="hidden-p"><strong>Valor Inicial: </strong>R$<? echo number_format($data["pat_vlin"], 2, ".", ",")?></p>
                </div>
                <div class="data">
                    <p class="hidden-p"><strong>Valor Atual: </strong>R$<? echo number_format($data["pat_vlat"], 2, ".", ",")?></p>
                </div>
            </section>
            <label style="display: block; text-align: center;">Foto:</label>
            <img class="img-pat" src="<?echo $data['pat_foto']?>" alt="Imagen do Patrimonio">

        </section>
    </main>
  </body>
</html>
