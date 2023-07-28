$(function () {
  /*
   $('#us2').locationpicker({
      location: {latitude: 46.15242437752303, longitude: 2.7470703125},   
      radius: 0,
      inputBinding: {
         latitudeInput: $('#lat'),
         longitudeInput: $('#lng'),
         locationNameInput: $('#location')
      },
      enableAutocomplete: true,
      onchanged: function(currentLocation, radius, isMarkerDropped) {
         alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
       }
   });
    
    */

  var map = document.getElementById('us2');

  // Initialize LocationPicker plugin
  var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: 45.5017,
    lng: -73.5673
  },
    {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
    },);


    google.maps.event.addListener(lp.map, 'idle', function (event) {
      var location = lp.getMarkerPosition();
      console.log('The chosen location is ' + location.lat + ',' + location.lng);
      document.getElementById("lat").value = location.lat;
      document.getElementById("lng").value = location.lng;
    });

});