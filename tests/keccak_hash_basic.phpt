--TEST--
Test function keccak_hash() by calling it with expected arguments
--CREDITS--
Bryan C. Geraghty <bryan@ravensight.org>
--SKIPIF--
<?php if (!extension_loaded("keccak")) print "skip"; ?>
--FILE--
<?php

var_dump(keccak_hash(0) === keccak_hash(0));
var_dump(keccak_hash(0) !== keccak_hash(1));
var_dump(keccak_hash(0) !== keccak_hash(3));
var_dump(keccak_hash(0) !== keccak_hash(9));
var_dump(keccak_hash(0) !== keccak_hash(10));

$data = "\xde\xad\xbe\xef";

var_dump(bin2hex(keccak_hash($data)));
var_dump(base64_encode(keccak_hash($data, 512)));
var_dump(base64_encode(keccak_hash($data, 384)));
var_dump(base64_encode(keccak_hash($data, 256)));
var_dump(base64_encode(keccak_hash($data, 224)));

// string(88) "Jkpv6J5fTCUsOoeF25cTwNi+8GzkElvIjJYnG46aX3RTEZscoUyeDuTlN5tg1VjABOYR2ORkdDmNHp2etlgo2Q=="
// string(88) "Jkpv6J5fTCUsOoeF25cTwNi+8GzkElvIjJYnG46aX3RTEZscoUyeDuTlN5tg1VjABOYR2ORkdDmNHp2etlgo2Q=="
// string(64) "vWaeZ+VrMKsiZVrjUKX0xuR5vXjBPw9+4yniwjyeGXEVV6V683w6RoBjCTQvs9zt"
// string(44) "lKWq5oAApIubeGWunN/XR/zUGch4ddfqnZe8ljcLnbA="
// string(40) "7uMsN4WQNyyybCsv4SLTp//CbVV3EIPQeD/ArA=="

?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
string(128) "2ba2bcffbaae660ab5f0202123f431009df88262a269e3be6877c814b06c986a5f7d7a8d7494ce15bd32cfb0764dfbe4a747a65f33e37e50dbb5de78475811fd"
string(88) "K6K8/7quZgq18CAhI/QxAJ34gmKiaeO+aHfIFLBsmGpffXqNdJTOFb0yz7B2Tfvkp0emXzPjflDbtd54R1gR/Q=="
string(64) "d4fLJaPQ/snSxvPhjR3lKR3qC7f3y9NDMSqHgpOdLONt32Zbpe+Rg5idinyfrYdG"
string(44) "1P1OGJEyJzA2RJ/J4RGYxzkWG0wBFqmi3M36HEkgBvE="
string(40) "KtTjrPKOkkzje5vFOtdBWuzUezHfcMC5bmuFpA==" 
