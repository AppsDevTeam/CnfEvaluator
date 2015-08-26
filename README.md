## CnfEvaluator

Cnf = Conjunctive normal form
Komponenta na vyhodnocování konjunktní normální formy. Projde pole opravdových hodnot a pole boolean hodnot jednotlivých callbacků, pokud se jednotlivá pole shodují, provede callback.


## Installation

The best way to install is using [Composer](http://getcomposer.org/):


```sh
$ composer require adt/cnf-evaluator
```

## Usage

```php
$cnf = new CnfEvaluator();

$cnf->addCallback(function() {
		...
	}, [
		"condition1" => TRUE,
		"condition2" => TRUE,
		"condition4" => FALSE,
]);

$cnf->addCallback(function() {
		...
	}, [
		"condition1" => TRUE,
		"condition2" => TRUE,
		"condition4" => FALSE,
]);

$cnf->setRealValues([
	"condition1" => TRUE,
	"condition2" => FALSE,
	"condition3" => TRUE,
	"condition4" => FALSE,
]);

$cnf->process();
```
