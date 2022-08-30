<?php
$txt = $_POST['txt'];
$a = str_replace("'", "\"", $txt);
echo $a;
?>