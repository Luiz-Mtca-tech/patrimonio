<?
/**
* @author: Luiz Henrique da Mota Couto
* @date: 20/09/2022
* Time: 10:15
*/


require "../vendor/autoload.php";

use Patrimonio\WWW\db\MysqlDataBase;

session_start();

$db = new MysqlDataBase("sistcon", "mysql", "root", "031957");

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

$user_data = $db->find("usuario", "usu_cpf = $cpf", ["usu_nome", "usu_dbase", "usu_senha", "id"]);

//checking if the user was found
if($user_data != false){

    //checking if the password is right
    if ($user_data["usu_senha"] == md5($password)){

        //setting the session variables to use later
        $_SESSION["dbase"] = $user_data["usu_dbase"];
        $_SESSION["login"] = $user_data["usu_nome"];
        
        $unit = $db->find("userunid", "id_usu = ".$user_data['id'], ["cdunidade", "uni_nome"]);
        $_SESSION["unidade"] = $unit["uni_nome"];
        $_SESSION["codigo-unidade"] = $unit["cdunidade"];

        //sending to the next page
        header("Location: ../table/table.php");
    } else {
        echo "wrong password";
        exit;
    }

   
} else{
    echo "user not found!";
    exit;
}
