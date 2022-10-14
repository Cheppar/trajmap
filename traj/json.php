<?php

	$headers = [ 
		"User-Agent: Rest data",
		"Authorization: 8mXtMA8yZcZGRNY2feEpy4CV2lwmFJ7WN-w_EOqdcEQ"
	];

$ch = curl_init("https://track.onestepgps.com/v3/api/public/device-info?state_detail=1&lat_lng&api-key=8mXtMA8yZcZGRNY2feEpy4CV2lwmFJ7WN-w_EOqdcEQ"); 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

$features = array();


foreach ($data as $key => $value){

	$coordinates[] = array( 

		'lat' => $value['lat'], 'lng' => $value['lng'] 
		
		
	// echo $key ["display_name"], " ",
	// 	 $key ["factory_id"], " ",
	// 	 $key ["make"], " ",
	// 	 $key ["model"], " ",
	// 	 $key ["active_state"], " ",
	// 	 $key ["lat"], " ",
	// 	 $key ["lng"], " ",
	// 	 $key ["heading"], " ",
	// 	 $key ["dt_tracker"], " ",
	// 	 $key ["drive_status"], " ",
	// 	 $key ["drive_status_duration_s"], " ",
	// 	 $key ["drive_status_distance_mi"], " ",
	// 	 $key ["drive_status_distance_km"], " ",
	// 	 $key ["drive_status_begin_time"], " ",
	// 	 $key ["device_engine_hours"], " ",
	// 	 $key ["acc"], " ",
	// 	 $key ["speed_mph"], " ",
	// 	 $key ["speed_kph"], " ",
	// 	 $key ["altitude_m"], " ",
	// 	 $key ["num_satellites"], " ",
	// 	 $key ["hdop"], " ",
	// 	 $key ["vin"], " ",
	// 	 $key ["external_volt"], " ",
	// 	 $key ["backup_battery_volt"], " ",
	// 	 $key ["odometer_mi"], " ",
	// 	 $key ["odometer_km"], " ",
	// 	 $key ["fuel_percent"], "<br>", "<br>";	
	);

}

$new_data = array( 
	'type' => 'FeatureCollection',
	'features' => array(
		'type' => 'Feature',
		'geometry' => array('type' => 'Point', 'coordinates' => $coordinates),
		'properties' => array('name' => 'value'),
	),
);

$final_data = json_encode($new_data, JSON_PRETTY_PRINT);

print_r($final_data);

?>

