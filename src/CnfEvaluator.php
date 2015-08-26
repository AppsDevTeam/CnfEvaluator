<?php

namespace ADT;

use Nette;

/**
 * Cnf = Conjunctive normal form
 * Komponenta na vyhodnocování konjunktní normální formy
 * Projde pole opravdových hodnot a pole boolean hodnot jednotlivých callbacků,
 * pokud se jednotlivá pole shodují, provede callback
 */
class CnfEvaluator extends Nette\Object {

	/** @var array */
	protected $callbacks;

	/** @var array */
	protected $realValues;

	/**
	 * Přidá callback a pole boolean hodnot, které podmiňují provedení callbacku
	 * @param $callback
	 * @param array $conditionValues
	 */
	public function addCallback(callable $callback, $conditionValues) {
		$this->callbacks[] = [
				"callback" => $callback,
				"conditionValues" => $conditionValues,
		];
	}

	/**
	 * Pole opravdovych hodnot - TRUE, FALSE nebo NULL
	 * @param array $realValues
	 */
	public function setRealValues(array $realValues) {
		$this->realValues = $realValues;
	}

	/**
	 * Projde pole boolean hodnot a pokud hodnoty odpovidaji, provede callback
	 */
	public function process() {
		foreach ($this->callbacks as $callback) {

			$isTrue = TRUE;
			foreach ($callback["conditionValues"] as $key => $value) {
				if ($this->realValues[$key] !== $value) {
					$isTrue = FALSE;
					break;
				}
			}

			if ($isTrue) {
				call_user_func($callback["callback"]);
			}
		}
	}

}
