<?php
$rokdatemod = date("Y", filemtime("bot.php"));
$datemod = date("d.m.Y G:i", filemtime("bot.php"));
#$pam = round(xdebug_memory_usage()/1024, 2).'kb';
#$pamM = round(xdebug_peak_memory_usage()/1024, 2).'kb';
#$time = xdebug_time_index().'s';
$over= $cmdv+$engv;
$n = $intnum+$intnum2;
$m->info("Informacje o wersji czatu: \r\nWersja: ".$over.$n." Experimental zaktualizowana dnia $datemod\r\nSkrypt wykonuje się $roundby s\r\n$rokdatemod Żywek. All rights reserved");
?>
