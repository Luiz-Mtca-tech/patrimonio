<?php

/**
 * 
 * @authors Luiz Henrique da Mota Couto (you@example.org)
 * @date    2021-08-12 16:48:05
 * @package classes\db\
 * @version 1.0.0
 * 
 * Classe para realizar operações com o banco de dados MySQL
 * contém as funções nescessárias para o CRUD
 */

namespace Patrimonio\WWW\db;
use \PDO;

class MysqlDataBase
{
	// os atributos da classe para estabelecer a conexão com o DB
	protected string $db_name;   // o nome do banco conectado
	public string $host_name;  // o nome do servidor onde está o DB
	public string $user;      // o nome do usuário logado
	private string $password; // a senha do usuário
	public PDO $pdo;         // esse atributo é a conexão com o banco de dados 

	public function __construct(string $db_name, string $host_name, string $user, string $password)
	{
		
		/* atribuindo os valores recebidos aos atributos
		 * serão usados para fazer a conexão com o servidor
		 */

		$this->db_name = $db_name;
		$this->host_name = $host_name;
		$this->user = $user;
		$this->password = $password;

		//tentando realizar uma conexão com o Banco de Dados
		try {
		    header('Content-Type: text/html; charset=utf-8');
		    $this->pdo = new PDO("mysql:dbname=".$this->db_name.";host=".$this->host_name, $this->user, $this->password);
			
		}catch(\PDOException $e) {
	    	echo "ERRO: ".$e->getMessage();
	    	exit;
		}	

					
	}

	
	public function query(string $query, bool $return_array)
	{
		$sql = $this->pdo->prepare($query);

		if ($sql->execute() && $return_array){
			if ($sql->fetchAll()) {

			}
		}else if ($sql->execute() && $return_array == false) {

		}
	}

	
	//leitura de dados
	/*
	 * vai receber um array com os campos no qual deseja listar, depois vai
	 * criar uma requisição SQL para selecionar os itens desejados 
	 */
	public function selectDatas(string $table, $fields, $all = true)
	{	

		$require = "SELECT ";

		switch (gettype($fields)){
			case 'array':
				for ($i=0; $i < count($fields); $i++) { 

					if ($i == count($fields) - 1) {
	
						$require .= "`".$fields[$i]."` ";
	
					} else {
	
						$require .= "`".$fields[$i]."`, ";
	
					}
				}

				break;
			case 'string':
				$require .= $fields.' ';

				break;
			default:
				return false;

		}
		
		$require .= "FROM `".$table."`";
		
		$sql = $this->pdo->prepare($require);
		
		if ($sql->execute()) {
			if($all){
				$data = $sql->fetchAll();
			
			}else {
				$data = $sql->fetch();
			}

			return $data;
			
		}else {
			$result = false;
			return $result;
		}

	}

	//cadastro de dados	
	public function registerDatas(string $table, array $data)// array $fields, array $datas)
	{
		$query = "INSERT INTO `".$table."` (";

		$keys = array_keys($data);
		$values = "";

		for ($i = 0; $i < count($data); $i++){
			echo "key: ".$keys[$i].", value: ".$data[$keys[$i]]."<br>";
			
			if ($i == count($data) - 1) {
				$query .= "`".$keys[$i]."` ";
				$values .= "'".$data[$keys[$i]]."'";
			} else {
				$query .= "`".$keys[$i]."`, ";
				$values .= "'".$data[$keys[$i]]."',";
			}
		}

		$query .= ") VALUES (".$values.")";

		$sql = $this->pdo->prepare($query);
		if ($sql->execute()) {
			return true;
		} else {
			return false;
		}

	}
	//atualizar dados
	public function updateDatas(string $table, $id, array $fields, array $datas)
	{
		$query = "UPDATE `".$table."` SET ";

		for ($i = 0; $i < count($fields); $i++) {
			if ($i == count($fields) - 1) {
				$query .= "`".$fields[$i]."` = '".$datas[$i]."' ";

			}else{
				$query .= "`".$fields[$i]."` = '".$datas[$i]."', ";

			}
		}

		$query .= " WHERE `id` = ".$id;
		$sql = $this->pdo->prepare($query);

		if ($sql->execute()) {
			return true;

		} else {
			return false;

		}
	} 

	//deletar dados
	public function deleteDatas(string $table ,$id)
	{	
		$require = "DELETE FROM `".$table."` WHERE `id` = ".$id;
		
		$sql = $this->pdo->prepare($require);
		
		if ($sql->execute()) {
			return true;

		} else {
			return false;
			
		}
	}
	/* Procurar por itens na tabela. Recebe o nome do campo, um array com os
	 * campo ou só o * e alguma condição
	 */
	public function find($table, string $condition, $fields = '*')
	{	
		$query = "SELECT ";
		if (gettype($fields) == 'array') {
			for ($i=0; $i < count($fields); $i++) { 
				if ($i == count($fields) - 1) {
					$query .= "`".$fields[$i]."` FROM ".$table;

				} else {
					$query .= "`".$fields[$i]."`, ";

				}
			}

		} else {
			$query = "SELECT ".$fields." FROM ".$table;

		}

		if (!empty($condition)) {
			$query .= " WHERE ".$condition;
		}

		$sql = $this->pdo->prepare($query);
		
		if($sql->execute()) {
			$result = $sql->fetch();
			return $result;
		} else {
			return false;
		}

	}
	/* Esta função é a mesma coisa que a função find, porém, esta retorna todos os registros
	 * encontrados no banco de dados 
	 */
	public function findAll($table, string $condition = "", $fields = '*')
	{
		$query = "SELECT ";
		if (gettype($fields) == 'array') {
			for ($i=0; $i < count($fields); $i++) { 
				if ($i == count($fields) - 1) {
					$query .= "`".$fields[$i]."` ";

				} else {
					$query .= "`".$fields[$i]."`, ";

				}
			}

		} else {
			$query = "SELECT ".$fields." FROM ".$table;

		}

		if (!empty($condition)) {
			$query .= " WHERE ".$condition;
		}

		$sql = $this->pdo->prepare($query);
		$sql->execute();
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}

}






