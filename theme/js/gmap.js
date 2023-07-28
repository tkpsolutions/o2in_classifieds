function googleMapPicker(latValue, lngValue){

  var map = document.getElementById('us2');

  // Initialize LocationPicker plugin
  var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: latValue,
    lng: lngValue
  },
  {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
  });

  google.maps.event.addListener(lp.map, 'idle', function (event) {
    var location = lp.getMarkerPosition();
    //console.log('The chosen location is ' + location.lat + ',' + location.lng);
    document.getElementById("lat").value = location.lat;
    document.getElementById("lng").value = location.lng;
  });

}

//current location
$( document ).ready(function() {
  navigator.geolocation.getCurrentPosition(showPosition);
  function showPosition(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      console.log(lat + " : " + lng);
      //$('.map-lat').val(lat);
      //$('.map-lon').val(lng);
      //buildMap(lat, lng);
  }
});