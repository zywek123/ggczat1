<?php
require_once("configs.php");
require_once("functions.php");
if(!check_ip()) die();
if(!isset($_POST['csv']) || empty($_POST['csv'])) die();
$csv=$_POST['csv'];
$csv=explode("\n",$csv);
foreach($csv as $smskey=>$sms)
    {
    if(empty($sms))
	continue;

    $csv[$smskey]=$sms=str_getcsv($sms);
    $acc_id=$sms[0];
    $sms_id=$sms[1];
    $time=$sms[2];
    $text=$sms[3];
    $number=$sms[4];
    $m = new messages();
$m->addmsg("*nvps: zrealizowano sms $text. usluga $acc_id, numer tel $number sms ID $sms_id", 12345678);
$m->addmsg("*nvps: zrealizowano sms $text. usluga $acc_id, numer tel $number sms ID $sms_id", 23456789);

    
    $return[$smskey]="*nvps: Dziekujemy za wyslanie smsa";
    }
    
foreach($csv as $smskey=>$sms)
    {
    if(!empty($sms))
    echo $sms[0].",".$sms[1].",\"".$return[$smskey]."\"\n";
    }
    
?>
