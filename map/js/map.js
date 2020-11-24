// JavaScript Document

function initialize() {
  var myLatlng = new google.maps.LatLng(37.556911, 126.918694);
  var myOptions = {
    zoom: 15,
    center: myLatlng,
  };
  var map = new google.maps.Map(document.getElementById('map_home'), myOptions);

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: '대우조선해양',
  });

  var infowindow = new google.maps.InfoWindow({
    content: '경상남도 거제시 거제대로 3370 대우조선해양 (우)53302',
  });

  infowindow.open(map, marker);
}

window.onload = function () {
  initialize();
};
