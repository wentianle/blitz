--TEST--
errors and warnings: execution
--FILE--
<?php
include('common.inc');
error_reporting(E_ALL);
set_error_handler('my_error_handler');
function my_error_handler($errno, $errstr, $errfile, $errline) {
    $parts = explode('ERROR:',$errstr);
    echo trim($parts[1])."\n";
}

class B extends Blitz {}

class C extends Blitz {
    function test() {
        return "OK";
    }
}

$A = new Blitz();
$A->load('{{ test(); }}');
echo $A->parse();

$B = new Blitz();
$B->load('{{ test(); }}');
echo $B->parse();


$C = new C();
$C->load('{{ test(); }}');
echo $C->parse();

?>
--EXPECT--
calling function "test" failed, check if this function exists or parameters are valid
calling function "test" failed, check if this function exists or parameters are valid
OK

