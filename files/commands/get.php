<?php
$ac=$db->query('select * from `bufor` where `do` = '.$from.' order by `id` asc');
$i=0;
$count=$ac->num_rows;
if($count == 0){
die($m->info('Nie masz żadnych nieprzeczytanych wiadomości!'));
}
while($ta=$ac->fetch_assoc() and $count > $i){
$i++;
$msg = "{$ta['nick']}: {$ta['text']}";
$m->insmsg2($msg,$from);
}
$db->query('delete from `bufor` where `do` = '.$from);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>