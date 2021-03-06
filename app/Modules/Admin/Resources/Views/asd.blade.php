<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Live Demo of Google Maps Geocoding Example with PHP</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

</head>
<body>




<?php
// function to geocode address, it will return false if unable to geocode address
function geocode($address){

    // url encode the address
    $address = urlencode($address);

    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";

    // get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address
    if($resp['status']=='OK'){

        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];

        // verify if data is complete
        if($lati && $longi && $formatted_address){

            // put the data in the array
            $data_arr = array();

            array_push(
                $data_arr,
                $lati,
                $longi,
                $formatted_address
            );

            return $data_arr;

        }else{
            return false;
        }

    }else{
        return false;
    }
}
?>
<?php
if($_POST){

// get latitude, longitude and formatted address
$data_arr = geocode($_POST['address']);

// if able to geocode the address
if($data_arr){

$latitude = $data_arr[0];
$longitude = $data_arr[1];
$formatted_address = $data_arr[2];

?>
<button onclick="init_map()">adsf</button>
<!-- google map will be shown here -->
<div id="gmap_canvas">Loading map...</div>
<div id='map-label'>Map shows approximate location.</div>

<!-- JavaScript to show google map -->

<script type="text/javascript">
    function init_map() {
        var myOptions = {
            zoom: 14,
            center: new google.maps.LatLng(<?php echo $latitude ?>,<?php echo $longitude; ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        alert('asdf');
        map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);

    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>

<?php

// if unable to geocode the address
}else{
    echo "No map found.";
}
}
?>R

<div id='address-examples'>
    <div>Address examples:</div>
    <div>1. G/F Makati Cinema Square, Pasong Tamo, Makati City</div>
    <div>2. 80 E.Rodriguez Jr. Ave. Libis Quezon City</div>
</div>

<form action="/map" method="post">
    {{csrf_field()}}
    <input type='text' name='address' placeholder='Enter any address here' />
    <input type='submit' value='Geocode!' />
</form>
</body>

</html>