<?php
/**
* plik zawierający funkcje 
* @author Arek
* @version v 1.0.0
* wszelkie prawa zastrzeżone!
**/

class messages
{
function info($wiad)
{
global $mbs, $p, $from, $prefix;
$mbs->addBBcode($prefix.'[color=990099]'.$wiad."[/color]")->setrecipients($from);
$p->push($mbs);
$mbs->clear();
}

function insmsg2($wiad, $nr)
{
global $mbs, $p, $from, $prefix;
$mbs->addBBcode('[color=990099]'.$wiad.'[/color]')->setrecipients($nr);
$p->push($mbs);
$mbs->clear();
}

function addmsg($wiad, $nr)
{
global $mbs, $p, $from, $prefix;
$mbs->addBBcode($prefix.'[color=990099]'.$wiad.'[/color]')->setrecipients($nr);
$p->push($mbs);
$mbs->clear();
}
}

class nicki
{
function userdata($nr)
{
global $db;
$kmb=$db->query('select * from `userzy` where `numer` = '.$nr.' limit 1');

return($kmb->fetch_assoc());
}

function zwroc($from)
{
global $db, $from;
$q=$db->query('select `numer` from `userzy` where `online` = 1 and `numer` = '.$from.' and `echo` = \'tak\'');
while($n=$q->fetch_assoc())
$do2[] = $n['numer'];
return($do2);
}

function nick($nick, $staff)
{
switch($staff){
case 1:
	    $mark = '$';
	    break;
	 case 2:
	    $mark = '$';
	    break;
	 case 3:
	    $mark = '$';
	    break;
	 case 4:
	    $mark = '$';
	    break;
	 case 5:
	    $mark = '+';
	    break;
	 case 6:
	    $mark = "+";
	    break;
         case 7:
	    $mark = '+';
	    break;
	 case 8:
	    $mark = '+';
	    break;
	 case 9:
	    $mark = '+';
	    break;
	 case 10:
	    $mark = '%';
	    break;
	 case 11:
	    $mark = '%';
	    break;
	 case 12:
	    $mark = '%';
	    break;
	 case 13:
	    $mark = '%';
	    break;
	 case 14:
            $mark = '%';
	    break;
	 case 15:
	    $mark = '@';
	    break;
	 case 16:
	    $mark = '@';
	    break;
	 case 17:
	    $mark = '@';
	    break;
	 case 18:
	    $mark = '@';
	    break;
	 case 19:
	    $mark = "@";
	    break;
         case 20:
	    $mark = '~';
	    break;
	 case 21:
	    $mark = '~';
	    break;
	 case 22:
	    $mark = '~';
	    break;
	 case 23:
	    $mark = '~';
	    break;
	 case 24:
	    $mark = '~';
	    break;
	 case 25:
	    $mark = '~';
	    break;
	 case 27:
	    $mark = '~';
	    break;
	 case 28:
	    $mark = '~';
	    break;
	 case 29:
	    $mark = '~';
	    break;
	 case 30:
	    $mark = '~';
	    break;
	 case 31:
	    $mark = '~';
	    break;
	 case 32:
	    $mark = '~';
	    break;
	 case 33:
	    $mark = "~";
	    break;
         case 34:
	    $mark = '~';
	    break;
	 case 35:
	    $mark = '~';
	    break;
	 case 36:
	    $mark = '~';
	    break;
	 case 37:
	    $mark = '~';
	    break;
	 case 38:
	    $mark = '~';
	    break;
	 case 39:
	    $mark = '~';
	    break;
	 case 40:
	    $mark = '~';
	    break;
	 case 41:
	    $mark = '~';
	    break;
	 case 42:
	    $mark = '~';
	    break;
	 case 43:
	    $mark = '~';
	    break;
	 case 44:
	    $mark = '~';
	    break;
	 case 45:
	    $mark = '~';
	    break;
	 case 46:
	    $mark = "~";
	    break;
         case 47:
	    $mark = '~';
	    break;
	 case 48:
	    $mark = '~';
	    break;
	 case 49:
	    $mark = '~';
	    break;
	 case 50:
	    $mark = '#';
	    break;
	 case 51:
	    $mark = '#';
	    break;
	 case 52:
	    $mark = '#';
	    break;
	 case 53:
	    $mark = '#';
	    break;
	 case 54:
            $mark = '#';
	    break;
	 case 55:
	    $mark = '#';
	    break;
	 case 56:
	    $mark = '#';
	    break;
	 case 57:
	    $mark = '#';
	    break;
	 case 58:
	    $mark = '#';
	    break;
	 case 59:
	    $mark = "#";
	    break;
         case 60:
	    $mark = '?#';
	    break;
	 case 61:
	    $mark = '?#';
	    break;
	 case 62:
	    $mark = '?#';
	    break;
	 case 63:
	    $mark = '?#';
	    break;
	 case 64:
	    $mark = '?#';
	    break;
	 case 65:
	    $mark = '?#';
	    break;
	 case 67:
	    $mark = '?#';
	    break;
	 case 68:
	    $mark = '?#';
	    break;
	 case 69:
	    $mark = '?#';
	    break;
	 case 70:
	    $mark = '@#';
	    break;
	 case 71:
	    $mark = '@#';
	    break;
	 case 72:
	    $mark = '@#';
	    break;
	 case 73:
	    $mark = "@#";
	    break;
         case 74:
	    $mark = '@#';
	    break;
	 case 75:
	    $mark = '@#';
	    break;
	 case 76:
	    $mark = '@#';
	    break;
	 case 77:
	    $mark = '@#';
	    break;
	 case 78:
	    $mark = '@#';
	    break;
	 case 79:
	    $mark = '@#';
	    break;
	 case 80:
	    $mark = '?@#';
	    break;
	 case 81:
	    $mark = "?@#";
	    break;
         case 82:
	    $mark = '?@#';
	    break;
	 case 83:
	    $mark = '?@#';
	    break;
	 case 84:
	    $mark = '?@#';
	    break;
	 case 85:
	    $mark = '?@#';
	    break;
	 case 86:
	    $mark = '?@#';
	    break;
	 case 87:
	    $mark = '?@#';
	    break;
	 case 88:
	    $mark = '?@#';
	    break;
	 case 89:
	    $mark = '?@#';
	    break;
	 case 90:
	    $mark = '?#?';
	    break;
	 case 91:
	    $mark = '?#?';
	    break;
	 case 92:
	    $mark = '?#?';
	    break;
	 case 93:
	    $mark = '?#?';
	    break;
	 case 94:
	    $mark = "?#?";
	    break;
         case 95:
	    $mark = '?#?';
	    break;
	 case 96:
	    $mark = '?#?';
	    break;
	 case 97:
	    $mark = '?#?';
	    break;
	 case 98:
	    $mark = '?#?';
	    break;
	 case 99:
	    $mark = '?#?';
	    break;
	 case 100:
	    $mark = '##';
	    break;
	 case 101:
	    $mark = '';
	    break;
	   default:
	    $mark = '';
	    break;
	}
	return '<'.$mark.$nick.'>';
   }
   
   function liczZalogowanych($nr)
{
global $db;
$a=$db->query('select `numer` from `userzy` where `online` = 1 and `spy` = 0');
$onli=$a->num_rows;
if($onli == 0){
$os = 'osób';
}
 if($onli == 1){
$os = 'osoba';
}
if($onli >= 2 && $onli <= 4){
$os = 'osoby';
}
 if($onli >= 5){
$os = 'osób';
}
$retrn = 'Aktualnie online '.$onli.' '.$os;
return($retrn);
}

function czas($czas){
	if($czas<60){
		return $czas.'sekund.';
	}
	else if($czas>=60 && $czas < 3600){
		$a[0]=floor($czas/60);
		$a[1]=$czas%60;
		return $a[0].' minut i '.$a[1].' sekund';
	}
	else if($czas >= 3600 && $czas < 86400){
		$a[0]=floor($czas/3600);
		$a[1]=($czas%3600)/60; $a[1]=floor($a[1]);
		$a[2]=($czas%60)/1; $a[2]=floor($a[2]);
		return $a[0].' godzin '.$a[1].' minut i '.$a[2].' sekund';
	}
	else if($czas >= 86400 && $czas < 604800){
		$a[0]=floor($czas/86400);
		$a[1]=($czas%86400)/3600; $a[1]=floor($a[1]);
		$a[2]=($czas%86400)%3600/60; $a[2]=floor($a[2]);
		$a[3]=($czas%86400)%3600%60; $a[3]=floor($a[3]);
		return $a[0].' dni '.$a[1].' godzin '.$a[2].' minut i '.$a[3].' sekund';
	}
}

function onlinenumbers($lparam)
{
global $db;
if($lparam == 0){
	$aa=$db->query('select `numer` from `userzy` where `online` = 1 and `zabawy` = \'tak\' and `zw` = 0');
while($n=$aa->fetch_assoc())
$do[] = $n['numer'];
return $do;
}else{
$aa=$db->query('select `numer` from `userzy` where `online` = 1 and `zw` = 0');
while($n=$aa->fetch_assoc())
$do[] = $n['numer'];
return $do;
}
}
  
  function selecttime($czas)
  {
$day = date('j', $czas);
$dzien = date('l', $czas);
$miesiac = date('m', $czas);
$rok = date('Y', $czas);
$godzina = date('G:i:s', $czas);
$dzien_pl = array('Monday' => 'poniedziałek', 'Tuesday' => 'wtorek', 'Wednesday' => 'środa', 'Thursday' => 'czwartek', 'Friday' => 'piątek', 'Saturday' => 'Sobota', 'Sunday' => 'Niedziela');
$miesiac_pl = array('01' => 'stycznia', '02' => 'lutego', '03' => 'marca', '04' => 'kwietnia', '05' => 'maja', '06' => 'czerwca', '07' => 'lipca', '08' => 'sierpnia', '09' => 'września', '10' => 'października', '11' => 'listopada', '12' => 'grudnia');
$dzien = date("l", $czas);
return''.$dzien_pl[$dzien].' '.$day.' '.$miesiac_pl[$miesiac].' '.$rok.' '.$godzina;
}
}

function gg($nrgg){
$dat=simplexml_load_string(file_get_contents('http://api.gadu-gadu.pl/users/'.$nrgg.'.xml'));
return($dat->users->user[0]);
}
function cpass($min, $max)
{
srand((double)microtime()*1000000);
$rand2=rand($min,$max);
for($i=0;$i<$rand2;++$i){
$znaczek = chr(rand(44,122));
if(preg_match('/^[a-zA-Z0-9]$/',$znaczek)) $kod .= $znaczek;
else $i--;
}
return($kod);
}

function exception_error_handler($errno, $errstr, $errfile, $errline){
	if(in_array($errno, array(E_WARNING, E_RECOVERABLE_ERROR, E_DEPRECATED, E_PARSE))){
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	}
	return false;
}

