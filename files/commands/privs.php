<?php
$plik = file('files/logs/priv.log');
for($i=(count($plik)-90); $i<count($plik); $i++){
$lst = $plik[$i];
echo $lst;
}
?>