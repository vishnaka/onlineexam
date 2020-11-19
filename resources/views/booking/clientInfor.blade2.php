@extends('layouts.app')
@section('header')
<style>
  html, body, #viewDiv {
    padding: 0;
    margin: auto;
    height: 80%;
    width: 80%;
  }
</style>
  <link rel="stylesheet" href="https://js.arcgis.com/4.17/esri/themes/light/main.css">
  <script src="https://js.arcgis.com/4.17/"></script>
  
  <script>
require([
  "esri/Map",
  "esri/views/MapView",
  "esri/widgets/Search"
], function(Map, MapView, Search) {
  
  var map = new Map({
    basemap: "topo-vector"
  });
  
  var view = new MapView({
    container: "viewDiv",  
    map: map,
    center: [-118.80543,34.02700],
    zoom: 13
  });
  
  // Add Search widget
  var search = new Search({
    view: view
  });
  view.ui.add(search, "top-right"); // Add to the map
        
  // Find address
  
  view.on("click", function(evt){
    search.clear(); 
    view.popup.clear();
    if (search.activeSource) {
      var geocoder = search.activeSource.locator; // World geocode service
      var params = {
        location: evt.mapPoint 
      };
      geocoder.locationToAddress(params)
        .then(function(response) { // Show the address found
          var address = response.address;
          showPopup(address, evt.mapPoint);
        }, function(err) { // Show no address found
          showPopup("No address found.", evt.mapPoint);
        });
    }
  });
  
  function showPopup(address, pt) {
    view.popup.open({
      title:  + Math.round(pt.longitude * 100000)/100000 + ", " + Math.round(pt.latitude * 100000)/100000,
      content: address,
      location: pt
    });
  }

});
</script>
@endsection
@section('content')
  <div id="viewDiv"></div>
@endsection