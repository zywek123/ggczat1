<?php
if($plec == 1) $cosiestalo = 'wylogowałaś';
if($plec == 2) $cosiestalo = 'wylogowałeś';
$m->info($cosiestalo.' Się zapraszamy ponownie!');
$db->query('update `userzy` set `online` = 0 where `numer` = '.$from);
?>