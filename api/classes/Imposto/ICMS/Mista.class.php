<?php
/**
 * MIT License
 * 
 * Copyright (c) 2016 MZ Desenvolvimento de Sistemas LTDA
 * 
 * @author Francimar Alves <mazinsw@gmail.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */
namespace Imposto\ICMS;
use Util;

/**
 * Tributação pelo ICMS
 * 70 - Com redução de base de cálculo e cobrança do
 * ICMS por substituição tributária, estende de Cobranca
 */
class Mista extends Cobranca {

	public function __construct($mista = array()) {
		parent::__construct($mista);
		$this->setTributacao('70');
		$this->setNormal(new Reducao());
	}

	public function toArray() {
		$mista = parent::toArray();
		return $mista;
	}

	public function fromArray($mista = array()) {
		if($mista instanceof Mista)
			$mista = $mista->toArray();
		else if(!is_array($mista))
			return $this;
		parent::fromArray($mista);
		return $this;
	}

	public function getNode($name = null) {
		$element = parent::getNode(is_null($name)?'ICMS70':$name);
		$dom = $element->ownerDocument;
		return $element;
	}

}