--TEST--
Test function keccak_hash() by calling it with expected arguments
--CREDITS--
Bryan C. Geraghty <bryan@ravensight.org>
--SKIPIF--
<?php if (!extension_loaded("keccak")) print "skip"; ?>
--FILE--
<?php

$data = "\xde\xad\xbe\xef";

var_dump(base64_encode(keccak_hash($data)));
var_dump(base64_encode(keccak_hash($data, 512)));
var_dump(base64_encode(keccak_hash($data, 384)));
var_dump(base64_encode(keccak_hash($data, 256)));
var_dump(base64_encode(keccak_hash($data, 224)));

?>
--EXPECT--
string(88) "Jkpv6J5fTCUsOoeF25cTwNi+8GzkElvIjJYnG46aX3RTEZscoUyeDuTlN5tg1VjABOYR2ORkdDmNHp2etlgo2Q=="
string(88) "Jkpv6J5fTCUsOoeF25cTwNi+8GzkElvIjJYnG46aX3RTEZscoUyeDuTlN5tg1VjABOYR2ORkdDmNHp2etlgo2Q=="
string(64) "vWaeZ+VrMKsiZVrjUKX0xuR5vXjBPw9+4yniwjyeGXEVV6V683w6RoBjCTQvs9zt"
string(44) "lKWq5oAApIubeGWunN/XR/zUGch4ddfqnZe8ljcLnbA="
string(40) "7uMsN4WQNyyybCsv4SLTp//CbVV3EIPQeD/ArA=="

