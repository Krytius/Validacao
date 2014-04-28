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

function Validacao() {
	/**
	 * Método que retona se CPF é valido
	 *
	 * @param  {String|Interger} cpf Aceita esses tipos [111.111.111-11, 11111111111]
	 * @return {Bool}     True => Valido / False => Inválido
	 */
	function validaCPF(cpf) {

		cpf = "" + cpf;
		cpf = cpf.replace(/[^\w\s]/gi, "");

		// Verificador
		var verificador = function(i, a) {
			var soma = 0;

			for (i = i, v = 0; i > 1; i--) {
				soma += parseInt(a[v]) * i;
				v++;
			}

			var resto = (soma % 11);
			var digito = (resto > 2) ? (11 - resto) : 0;

			return (digito !== parseInt(a[a.length - 1])) ? false : true;
		};

		if (!verificador(10, cpf.substr(0, cpf.length - 1))) {
			return false;
		} else if (!verificador(11, cpf)) {
			return false;
		}

		return true;
	}

	/**
	 * Método que retona se CNPJ é valido
	 *
	 * @param  {String|Interger} cnpj Aceita esses tipos [48.884.656/0001-40, 48884656000140]
	 * @return {Bool}     True => Valido / False => Inválido
	 */
	function validaCNPJ(cnpj) {

		cnpj = "" + cnpj;
		cnpj = cnpj.replace(/[^\w\s]/gi, "");

		// Verificador
		var verificador = function(i, a) {
			var soma = 0;
			var v = 0;

			if (i === 12) {
				var ic = [5, 9];
			} else {
				var ic = [6, 9];
			}

			for (i = ic[0]; i > 1; i--) {
				soma += parseInt(a[v]) * i;
				v++;
			}

			for (i = ic[1]; i > 1; i--) {
				soma += parseInt(a[v]) * i;
				v++;
			}

			var resto = (soma % 11);
			var digito = (resto > 2) ? (11 - resto) : 0;

			return (digito !== parseInt(a[a.length - 1])) ? false : true;;
		};

		if (!verificador(12, cnpj.substr(0, cnpj.length - 1))) {
			return false;
		} else if (!verificador(13, cnpj)) {
			return false;
		}

		return true;
	}
}