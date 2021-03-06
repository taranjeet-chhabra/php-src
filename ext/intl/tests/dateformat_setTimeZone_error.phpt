--TEST--
IntlDateFormatter::setTimeZone() bad args
--SKIPIF--
<?php
if (!extension_loaded('intl'))
	die('skip intl extension not enabled');
--FILE--
<?php
ini_set("intl.error_level", E_WARNING);
ini_set("intl.default_locale", "pt_PT");
ini_set("date.timezone", 'Atlantic/Azores');

$df = new IntlDateFormatter(NULL, 0, 0);

var_dump($df->setTimeZone(array()));
var_dump($df->setTimeZone('non existing timezone'));

?>
==DONE==
--EXPECTF--
Notice: Array to string conversion in %s on line %d

Warning: IntlDateFormatter::setTimeZone(): datefmt_set_timezone: no such time zone: 'Array' in %s on line %d
bool(false)

Warning: IntlDateFormatter::setTimeZone(): datefmt_set_timezone: no such time zone: 'non existing timezone' in %s on line %d
bool(false)
==DONE==
