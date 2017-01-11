<?php
if($user['online'] == 1){
if($plec == 1) $jaki = 'zalogowana';
if($plec == 2) $jaki = 'zalogowany';
die($m->info('Hej! Przecież jesteś już '.$jaki.'!'));
}
$q=$db->query('select `nick`,`staff` from `userzy` where `online` = 1');
while($r=$q->fetch_assoc()){
$zalogowani .= $main->nick($r['nick'], $r['staff'])."\r\n";
}
$powitanie = 'Siema '.$niczek." masz na sobie w tej chwili zarombistą pelerynkę niewitkę tak samo jak Harry Potter :d, możesz teraz swobodnie podsłuchiwać wszytkich czatowiczów, ponieważ nikt nawet nie ma pojęcia o tym, że tu jesteś! :ddd\r\nAktualnie podsluchujesz następujących użytkowników:\r\n$zalogowani";
$db->query('update `userzy` set `online` = 1 where `numer` = '.$from);
$m->info($powitanie);
$czas = time();
$db->query('update `userzy` set `czas` = '.$czas.' where numer` = '.$from);
?>