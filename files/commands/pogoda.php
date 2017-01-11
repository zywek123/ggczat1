<?php
if(!$parts[1]){
	die($m->info('Podaj miasto!'));
}
include(dirname(__FILE__).'/../libs/open.weather.map.php');
$weath = new weather($parts[1]);
$m->info('Pogoda dla miasta '.$weath->name.': Temperatury: od '.$weath->temp_min." do ".$weath->temp_max."\r\nCiśnienie: ".$weath->pressure."\r\ndeszcz: ".$weath->rain."\r\nprędkość wiatru: ".$weath->wind."\r\nwilgotność powietrza: ".$weath->humidity."\r\nchmury: ".$weath->clouds);