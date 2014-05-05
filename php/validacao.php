<?php 

/**
 * Validação de CPF e CNPJ
 *
 * @version v.1.0.0
 * @author Elvis Ferreira Coelho
 * 
 * Created by Elvis Ferreira Coelho on 2014-02-05. Please report any bug at http://elviscoelho.net
 * 
 * Copyright (c) 2014 Elvis Ferreira Coelho http://elviscoelho.net
 * 
 * The MIT License (http://www.opensource.org/licenses/mit-license.php)
 * 
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
class Validacao
{

	/**
	 * Método que retona se CPF é valido
	 *
	 * 
	 * @param  {String|Interger} cpf Aceita esses tipos [111.111.111-11, 11111111111]
	 * @return {Bool}     True => Valido / False => Inválido
	 */
	public function validadorCPF($cpf) {
		$cpf = preg_replace('/[^\w\s]/', "", $cpf);
		
		if(!$this->verificadorCPF(10, substr($cpf, 0, -1))) {
			return false;
		} else if (!$this->verificadorCPF(11, $cpf)) {
			return false;
		}

		return true;
	}

	/**
	 * Verificador do CPF
	 * @param  int $i Numero de caracteres a ser somados
	 * @param  str $a String com os calores a ser somados
	 * @return bool 	Se digito é verdadeiro
	 */
	private function verificadorCPF($i, $a) {
		$soma = 0;

		for ($i = $i, $v = 0; $i>1; $i--) {
			$soma += intval($a[$v]) * $i;
			$v++;
		}

		$resto = ($soma % 11);
		$digito = ($resto > 2) ? (11 - $resto) : 0;

		return ($digito !== intval($a[strlen($a)-1])) ? false : true;
	}

	/**
	 * Método que retona se CNPJ é valido
	 *
	 * 
	 * @param  {String|Interger} cnpj Aceita esses tipos [48.884.656/0001-40, 48884656000140]
	 * @return {Bool}     True => Valido / False => Inválido
	 */
	public function validadorCNPJ ($cnpj) {
		$cnpj = preg_replace("/[^\w\s]/", "", $cnpj);
		
		// Verificador
		if(!$this->verificadorCNPJ(12, substr($cnpj, 0, -1))) {
			return false;
		} else if (!$this->verificadorCNPJ(13, $cnpj)) {
			return false;
		}

		return true;
	}

	/**
	 * Verificador do CNPJ
	 * @param  int $i Numero de caracteres a ser somados
	 * @param  str $a String com os calores a ser somados
	 * @return bool 	Se digito é verdadeiro
	 */
	private function verificadorCNPJ($i, $a) {
		$soma = 0;
		$v = 0;

		if($i === 12) {
			$ic = array(5, 9);
		} else {
			$ic = array(6, 9);
		}

		for ($i = $ic[0]; $i>1; $i--) {
			$soma += intval($a[$v]) * $i;
			$v++;
		}

		for ($i = $ic[1]; $i>1; $i--) {
			$soma += intval($a[$v]) * $i;
			$v++;
		}

		$resto = ($soma % 11);
		$digito = ($resto > 2) ? (11 - $resto) : 0;

		return ($digito !== intval($a[strlen($a)-1])) ? false : true;;
	}
}

?>