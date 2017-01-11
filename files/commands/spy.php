<?php
if(!$parts[1]){
die($m->info('Witaj w komendzie umożliwiającej włączenie lub wyłączenie widoczność Twojego nicka w /u. Aby włączyć, wpisz /spy on aby wyłączyć wpisz /spy off'));
}
if(!in_array($parts[1], array('on', 'off'))){
die($m->info('Witaj w komendzie umożliwiającej włączenie lub wyłączenie widoczność Twojego nicka w /u. Aby włączyć, wpisz /spy on aby wyłączyć wpisz /spy off'));
}
if($parts[1] == 'on'){
$db->query('update `userzy` set `spy` = 1 where `numer` = '.$from);
$m->info('właśnie wkładasz na siebie pelerynkę niewitkę i teraz nikt cie nie widzi!, patrzcie jak kozaczy!, podskoczysz? :ddd');
die;
}
if($parts[1] == 'off'){
$db->query('update `userzy` set `spy` = 0 where `numer` = '.$from);
$m->info('zdejmujesz właśnie swoją pelerynkę niewitkę, więc od teraz każdy odkryje, żę tu jesteś gdy wpisze /u, :ccc!');
die;
}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>