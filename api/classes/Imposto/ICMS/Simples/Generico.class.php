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
namespace Imposto\ICMS\Simples;
use DOMDocument;

/**
 * Tributação do ICMS pelo SIMPLES NACIONAL, CRT=1 – Simples Nacional e
 * CSOSN=900 (v2.0)
 */
class Generico extends Cobranca {

	public function __construct($generico = array()) {
		parent::__construct($generico);
		$this->setTributacao('900');
		$this->getNormal()->setTributacao('900');
	}

	public function toArray() {
		$generico = parent::toArray();
		return $generico;
	}

	public function fromArray($generico = array()) {
		if($generico instanceof Generico)
			$generico = $generico->toArray();
		else if(!is_array($generico))
			return $this;
		parent::fromArray($generico);
		return $this;
	}

	public function getNode($name = null) {
		if(is_null($this->getModalidade()) && is_null($this->getNormal()->getModalidade())) {
			$dom = new DOMDocument('1.0', 'UTF-8');
			$element = $dom->createElement(is_null($name)?'ICMSSN900':$name);
			$element->appendChild($dom->createElement('orig', $this->getOrigem(true)));
			$element->appendChild($dom->createElement('CSOSN', $this->getTributacao(true)));
			return $element;
		}
		$element = parent::getNode(is_null($name)?'ICMSSN900':$name);
		$dom = $element->ownerDocument;
		return $element;
	}

}