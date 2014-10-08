function initialize() {
var mapCanvas = document.getElementById('map_canvas');
var mapOptions = {
  center: new google.maps.LatLng(17.4421, 78.4253),
  zoom: 8,
  mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(mapCanvas, mapOptions)
}
google.maps.event.addDomListener(window, 'load', initialize);

