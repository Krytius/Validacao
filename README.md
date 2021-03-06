Projeto Validação
==========

###

    Version: 1.0.0
    Author: Elvis Ferreira Coelho
 
    Created by Elvis Ferreira Coelho on 2014-02-05. Please report any bug at http://elviscoelho.net
    
    Copyright (c) 2014 Elvis Ferreira Coelho http://elviscoelho.net
 
The MIT License (http://www.opensource.org/licenses/mit-license.php)
 
 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
 restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the
 Software is furnished to do so, subject to the following
 conditions:
 
 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 OTHER DEALINGS IN THE SOFTWARE.

###


### Métodos

##### Validação de CPF #####

> Método de validação de CPF (Pessoa Física). 
<br>Aceita tanto estes formato "111.111.111-02" / "11111111111".

###
Retorno true ou false.

TRUE = CPF válido.

FALSE = CPF Inválido.
###

> Javascript

```js
var validador = new Validacao();
validador.validadorCPF("111.111.111-11");
```

> PHP

```php
$validador = new Validacao();
$validador->validadorCPF("111.111.111-11");
```

##### Validação de CNPJ #####

> Método de validação de CNPJ (Pessoa Jurídica). 
<br>Aceita tanto estes formato "99.343.617/0001-77" / "99343617000177".

###
Retorno true ou false.

TRUE = CNPJ válido

FALSE = CNPJ Inválido
###

> Javascript

```js
var validador = new Validacao();
validador.validadorCNPJ("111.111.111-11");
```

> PHP

```php
$validador = new Validacao();
$validador->validadorCNPJ("11.111.111/1111-11");
```

##### Validação de Email #####

> Método de validação de Email. 
<br>Aceita tanto estes formato "email@dominio.com" / "email@dominio.com.br".

###
Retorno true ou false.

TRUE = Email válido

FALSE = Email Inválido
###

> Javascript

```js
var validador = new Validacao();
validador.validadorEmail("email@dominio.com");
```

> PHP

```php
$validador = new Validacao();
$validador->validadorEmail("email@dominio.com");
```