<?php
/**
 * 
 * @authors Luiz Henrique da Mota Couto (you@example.org)
 * @date    2021-06-02 08:30:04
 * @version 1.0.0
 * 
 * Uma classe com algumas funções para ajudar com o tratamento de dados
 * vindo de formulário html 
 * 
 */

namespace Patrimonio\WWW\form;

class Form {


	/* Esta função vai coletar os dados de todos os inputs de uma unica vez,voce só precisa
	 * informar os names dos inputs atrávez de um array, e a mágica será feita
	 *
	 * NOTA: ainda não desenvolvi uma forma de poder indicar o tipo de filtro nesta função,
	 * então, ela sempre usará o FILTER_INPUT_SPECIAL_CHARS como filtro. 
	 */
	public static function getInputValue(array $input_names)
	{
		$values_input = array();
		foreach ($input_names as $name) {
			array_push($values_input, filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS));
		}

		return $values_input;
	}


	/* Essa aqui é quase a mesma coisa da função getInputValue, porém, essa retorna um array na forma de
	 * objetos
	 */
	public static function getInputValueObj(array $input_names, string $method = 'post')
	{
		$values_input = [];
		foreach ($input_names as $name){

			$values_input[$name] = filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		}

		return $values_input;
	}

	public static function floatFormat(string $number)
	{
		for($i = strlen($number); $i >= 0; $i--){
			if($i == strlen($number) - 2){
				$number = substr($number, 0, $i) . "." . substr($number, $i);
				echo $number."<br>";
			}
		}
		return $number;
	}

}


