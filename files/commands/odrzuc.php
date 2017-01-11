<?php
if(!$parts[1]){
die($m->info('Podaj liczbę zl, którą chcesz odrzucić!'));
}
if(!preg_replace('/[^0-9]/', '', $parts[1])){
die($m->info("Liczba zł to znaki z zakresu 0-9!"));
}
$sl=$db->query("select count(numer) as `numer` from `chan` where `kanal` = '$kanal'");
$res=$sl->fetch_assoc();
$nr = $res['numer'];
$liczb = round($parts[1]/$nr, 2);
$db->query("update `chan` set `zl` = zl - $parts[1] where `numer` = $from and `kanal` = '$kanal'");
$m->addmsg($niczek.' Odrzuca '.$parts[1].' zł', $dos);
sleep(3);
$m->addmsg('Wszyscy użytkownicy kanału '.$kanal.' złapali po '.$liczb.' zł od '.$niczek, $dos);
$db->query("update `chan` set `zl` = zl + $liczb where `kanal` = '$kanal'");
?>