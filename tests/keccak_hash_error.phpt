--TEST--
Test function keccak_hash() by calling it with unexpected arguments
--CREDITS--
Bryan C. Geraghty <bryan@ravensight.org>
--SKIPIF--
<?php if (!extension_loaded("keccak")) print "skip"; ?>
--FILE--
<?php

$data = "\xde\xad\xbe\xef";

var_dump(keccak_hash());
var_dump(keccak_hash($data, 512, 'Extra argument'));
var_dump(keccak_hash($data, 'Foobar'));
var_dump(keccak_hash($data, 1024));
var_dump(keccak_hash($data, 128));
var_dump(keccak_hash($data, 64));
var_dump(keccak_hash($data, 32));

?>
--EXPECTF--
Warning: keccak_hash() expects at least 1 parameter, 0 given in %s on line %d
bool(false)

Warning: keccak_hash() expects at most 2 parameters, 3 given in %s on line %d
bool(false)

Warning: keccak_hash() expects parameter 2 to be long, string given in %s on line %d
bool(false)

Warning: keccak_hash(): Bad bit-length in %s on line %d
bool(false)

Warning: keccak_hash(): Bad bit-length in %s on line %d
bool(false)

Warning: keccak_hash(): Bad bit-length in %s on line %d
bool(false)

Warning: keccak_hash(): Bad bit-length in %s on line %d
bool(false)

