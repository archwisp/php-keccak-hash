PHP_ARG_ENABLE(keccak, whether to enable Keccak support,
[  --enable-keccak          Enable Keccak support])

if test "$PHP_KECCAK" != "no"; then
  PHP_NEW_EXTENSION(keccak, php_keccak.c KeccakNISTInterface.c KeccakSponge.c KeccakF-1600-opt64.c, $ext_shared)
fi
