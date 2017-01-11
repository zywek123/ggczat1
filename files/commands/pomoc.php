<?php
$staff = $stf;
	$q=$db->query('select `komenda`,`alias`,`opis` from `komendy` where `staff` = 0 order by `id` asc');
	while($asv=$q->fetch_assoc()){
if($asv['alias'] == ''){
$alias = '';
}else{
$alias = ' lub /'.$asv['alias'].'';
}
	$commands .= "/{$asv['komenda']}{$alias} - {$asv['opis']}.\r\n";
}
	$m->info("Lista dostępnych dla Ciebie komend: \r\n{$commands}\r\nKomendy dla obsługi pod /pomoc2");
$time = $_SERVER['REQUEST_TIME'];
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>