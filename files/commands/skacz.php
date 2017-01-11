<?php
if($plec == 1) $cozrobil = 'skoczyła';
if($plec == 2) $cozrobil = 'skoczył';
$m->addmsg($niczek.' Szykuje się do skoku!', $dos);
sleep(4);
$m->addmsg($niczek.' Wreszcie '.$cozrobil.' i leci!', $dos);
sleep(4);
$skoczyl = rand(0,254);
$m->addmsg($niczek.' uzyskuje wynik '.$skoczyl.'m! gratulacje!', $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>