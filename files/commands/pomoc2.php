<?php
$staff = $stf;
	$q=$db->query('select `komenda`,`staff`,`alias`,`opis` from `komendy` where `staff` != 0 and `staff` <= '.$staff.' order by `staff` asc');
	while($asv=$q->fetch_assoc()){
if($asv['alias'] == ''){
$alias = '';
}else{
$alias = " lub /".$asv['alias']."";
}
	$commands .= "/{$asv['komenda']}{$alias} Staff: {$asv['staff']} - {$asv['opis']}\r\n";
}
	$m->info("Lista dostępnych dla Ciebie komend: \r\n{$commands}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>