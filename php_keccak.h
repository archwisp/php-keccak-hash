#ifndef PHP_KECCAK_H
# define PHP_KECCAK_H

extern zend_module_entry keccak_module_entry;
# define phpext_keccak_ptr &keccak_module_entry

# ifdef PHP_WIN32
#  define PHP_KECCAK_API __declspec(dllexport)
# else
#  define PHP_KECCAK_API
# endif

# ifdef ZTS
#  include "TSRM.h"
# endif

PHP_MINIT_FUNCTION(keccak);
PHP_MSHUTDOWN_FUNCTION(keccak);
PHP_RINIT_FUNCTION(keccak);
PHP_RSHUTDOWN_FUNCTION(keccak);
PHP_MINFO_FUNCTION(keccak);

PHP_FUNCTION(keccak_hash);
PHP_FUNCTION(keccak_hash_hex);

# ifdef ZTS
#  define KECCAK_G(v) TSRMG(keccak_globals_id, zend_keccak_globals *, v)
# else
#  define KECCAK_G(v) (keccak_globals.v)
# endif

#endif
