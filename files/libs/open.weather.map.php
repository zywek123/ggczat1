<?php
class weather {

	public $name;
	public $icon;
	public $temp_min;
	public $temp_max;
	public $pressure;
	public $rain;
	public $wind;
	public $humidity;
	public $clouds;

	public function __construct($city) {
		
		$url = 'http://api.openweathermap.org/data/2.5/find?q='.$city.'&mode=json';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		curl_close($curl);
		$weather = json_decode($data);
		$weather = $weather->list[0];
		$weather->rain = (array) $weather->rain;
		$this->name = $city;
		$this->icon = 'http://openweathermap.org/img/w/'.$weather->weather[0]->icon.'.png';
		$this->temp_min = round($weather->main->temp_min-273.15, 1).' °C';
		$this->temp_max = round($weather->main->temp_max-273.15, 1).' °C';
				$this->pressure = round($weather->main->pressure, 1).' hPa';
if($weather->rain['3h'] == ''){
	$this->rain = '0 mm';
}else{
		$this->rain = $weather->rain['3h'].' mm';
}
		$this->wind = round($weather->wind->speed*60*60/1000, 1).' km/h';
		$this->humidity = round($weather->main->humidity, 1).' %';
		$this->clouds = round($weather->clouds->all, 1).' %';
		
	}

}
