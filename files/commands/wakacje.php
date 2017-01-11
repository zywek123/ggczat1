<?php
$day = 24;
$month = 06;
$year = 2016;
$target = mktime(12,0,0,$month,$day,$year);
$diff = $target - time();
$days = ($diff - ($diff % 86400)) / 86400;
$diff = $diff - ($days * 86400);
$hours = ($diff - ($diff % 3600)) / 3600;
$diff = $diff - ($hours * 3600);
$minutes = ($diff - ($diff % 60)) / 60;
$diff = $diff - ($minutes * 60);
$seconds = ($diff - ($diff % 1)) / 1;
$m->info("Do wakacji pozostało {$days} dni, {$hours} godzin, {$minutes} minut i {$seconds} sekund przyjmując że rok zakończy się $day.$month.$year o godzinie 12:00");
?>
