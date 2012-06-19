--TEST--
partial php_templates syntax compability
--FILE--
<?php
include('common.inc');

$body = <<<BODY
<!--
    some HTML can be put in comments and it's OK
-->
<!-- BEGIN test -->
test
<!-- END test -->
<!-- aaa
xxx
BODY;

$T = new Blitz();
$T->load($body);
$T->iterate('test');
echo $T->parse();

?>
--EXPECT--
unexpected TAG_OPEN_ALT (noname_loaded_from_zval: line 7, pos 1)
<!--
    some HTML can be put in comments and it's OK
-->

test

<!-- aaa
xxx
