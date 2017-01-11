<?php
$q=$db->query('select `nick`,`numer`,`staff` from `userzy` where `staff` > 0 order by `staff` desc');
if($q->num_rows == 0){
die($m->info('Na tym czacie nie ma nikogo w obsłudze!'));
}
while($sv=$q->fetch_assoc()){
$lista .= "{$main->nick($sv['nick'], $sv['staff'])} | staff: {$sv['staff']}\r\n";
}
$m->info("Lista obsługi:\r\n{$lista}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>