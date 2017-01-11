<html>
<head>
<title>Panel wyświetlania logów</title>
<meta http-equiv="content-type" content="text/html; charset=utf8">
</head>
<body>
<form action="logfile.php" method="post">
<input type="text" name="dzien">
<input type="text" name="miesiac">
<input type="text" name="rok">
<input type="submit" value="Wyświetl logi!">
</form>

<?php
include(dirname(__FILE__)."/../configs.php");
$day = stripslashes(trim($_POST["dzien"]));
$month = stripslashes(trim($_POST["miesiac"]));
$year = stripslashes(trim($_POST["rok"]));
$log = stripslashes(trim($_POST["logi"]));
$date = "$day.$month.$year";
$str_date = strtotime($date);
$q=$db->query("select * from `logi` where `czas` > $str_date order by `id` asc");
if($q->num_rows == 0){
echo '<font color="red">niestety, nie znaleziono logów o podanej dacie</font>';
}
while($r=$q->fetch_assoc()){
$dat = date("d.m.Y G:i:s", $r['czas']);
$nick = $r['nick'];
$numer = $r['numer'];
$text = $r['text'];
$msgs .= "$nick $numer $dat: $text<br/>";
}
echo $msgs;
?>
</body>
</html>
