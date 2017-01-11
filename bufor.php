<?php
session_start();
include("files/configs.php");
include("files/functions.php");
?>
<html>
<head>
<title>Odczytywanie wiadomości z bufora</title>
<meta http-equiv="content-type" content="text/html; charset=utf8">
</head>
<body>
<?php
if($_GET['act'] == "read"){
$ca=$db->query('select `numer` from `userzy` where `pass` = \''.$_GET['pass'].'\' and `method` = \''.$_GET['authorization'].'\'');
if($ca->num_rows == 0){
echo "Nie jesteś tym, za kogo się podajesz";
}else{
$ac=$ca->fetch_assoc();
$do = $ac['numer'];
}
$q=$db->query("select * from `bufor` where `do` = {$do} and `id` >= {$_GET['start']} order by `id` asc limit {$_GET['limit']}");
while($r=$q->fetch_assoc()){
$r['nick'] = preg_replace('/[^0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/', '', $r['nick']);
$msg .= $r['nick'].': '.$r['text'].'<br/>';
}
echo '<a href="wget.php?pass='.$_GET['pass'].'&authorization='.$_GET['authorization'].'&start='.$_GET['start'].'&limit='.$_GET['limit'].'">Pobierz!</a><br>'.$msg.'<a href="?act=delete&pass='.$_GET['pass'].'&authorization='.$_GET['authorization'].'&start='.$_GET['start'].'&limit='.$_GET['limit'].'">Usuń</a>';
}else if($_GET['act'] == "delete"){
$ca=$db->query('select `numer` from `userzy` where `pass` = \''.$_GET['pass'].'\' and `method` = \''.$_GET['authorization'].'\'');
if($ca->num_rows == 0){
echo "Nie jesteś tym, za kogo się podajesz";
}else{
$ac=$ca->fetch_assoc();
$do = $ac['numer'];
}
$db->query("delete from `bufor` where `do` = $do and `id` >= {$_GET['start']} limit {$_GET['limit']}");
echo 'Usunięto '.$_GET['limit'].' wiadomości';
}?>
</body>
</html>