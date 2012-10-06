#ifdef HAVE_CONFIG_H
# include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "ext/standard/info.h"
#include "ext/standard/basic_functions.h"
#include "KeccakNISTInterface.h"
#include "php_keccak.h"

#define KECCAK_DEFAULT_BIT_LENGTH 512

zend_function_entry keccak_functions[] = {
	PHP_FE(keccak_hash, NULL)
	{NULL, NULL, NULL}
};

zend_module_entry keccak_module_entry = {
#if ZEND_MODULE_API_NO >= 20010901
	STANDARD_MODULE_HEADER,
#endif
	"keccak",
	keccak_functions,
	PHP_MINIT(keccak),
	PHP_MSHUTDOWN(keccak),
	NULL,
	NULL,
	PHP_MINFO(keccak),
#if ZEND_MODULE_API_NO >= 20010901
	"0.1",
#endif
	STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_KECCAK
ZEND_GET_MODULE(keccak)
#endif

PHP_MINIT_FUNCTION(keccak)
{
	return SUCCESS;
}

PHP_MSHUTDOWN_FUNCTION(keccak)
{
	return SUCCESS;
}

PHP_MINFO_FUNCTION(keccak)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "keccak hash support", "enabled");
	php_info_print_table_end();
}

PHP_FUNCTION(keccak_hash)
{
   char *buffer = NULL;
   char hash[64];
   int buffer_size;
   long hash_bit_length = KECCAK_DEFAULT_BIT_LENGTH;

   if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s|l",
            &buffer, &buffer_size, &hash_bit_length) == FAILURE) 
   {
      RETURN_FALSE;
   }
   
   memset(hash, 0, sizeof hash);
   HashReturn result;

   if ((result = Hash((size_t) hash_bit_length, buffer, buffer_size * 8, hash)) != HASH_SUCCESS)
   {
      if (result == BAD_HASHLEN)
      {
         php_error_docref(NULL TSRMLS_CC, E_WARNING, "Bad bit-length");
      }

      RETURN_FALSE;
   }

   RETURN_STRINGL(hash, ceil(hash_bit_length / 8), 1);
}
