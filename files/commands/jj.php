<?php
if($plec == 1){ $cozrobil = "Powróćiła"; $cosiestalo = 'wyszłaś';
}else if($plec == 2){ $cozrobil = "powrócił"; $cosiestalo = 'wyszedłeś'; }
$m->addmsg($niczek.' już do was '.$cozrobil.'! :) Cieszycie się?', $doo);
$db->query('update `userzy` set `zw` = 0 where `numer` = '.$from);
$m->info($cosiestalo.' z trybu zw. Możesz już pisać ;)');
$time = time();
$db->query('update `userzy` set `czas` = '.$time.' where `numer` = '.$from);
?>