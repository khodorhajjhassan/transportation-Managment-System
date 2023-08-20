     
     
     
     function userSearchValidation(e){
     let origin=document.getElementById('origin');
     let destination=document.getElementById('destination');
     let validateform=document.querySelector('#validateform');
      e.preventDefault();
      if(origin.value=='' || destination.value=='' ){
        validateform.style.border='3px solid red';
      }
      else{
        validateform.style.border='';
      }
     
    }
    



/* <----> Map code  <----> */
//Global variables
let map;
let originMarker;
let destinationMarker; 
let line;

//Asks the user for permission to access his location
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

/*if in the above funtion navigator.geolocation(asks for access) is true
it runs the below function which it gets the user latitude and longitude
and uses those two values to run L.map which sets the map at this location
setView([latitude,longitude],zoom) then L.tilelayer...addTo(map) draws the map

*/
function showMap(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const popupContent = 'Current  Location'
     map = L.map("map").setView([latitude, longitude], 8);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);
    //L.marker is also a build in function that draws a marker at a specifin position
    const marker = L.marker([latitude, longitude]).addTo(map);
    //bindPopup binds a content(usually text) to the map and openPopUp runs it
    marker.bindPopup(popupContent).openPopup();
}

getLocation();

/*This function gets two textfield values(dropdown to be) and draw a market on each
location then a line between them also shows the distance and km difference
*/
function calculateDistance() {

const origin = document.getElementById("origin").value;
const destination = document.getElementById("destination").value;

console.log()
//the below if conditions remove the markers at every search(resets the map of markers and polylines)
if (originMarker) {
    map.removeLayer(originMarker);
}
if (destinationMarker) {
    map.removeLayer(destinationMarker);
}
if (line) {
    map.removeLayer(line);
}
 
 // make API requests to OpenCage Geocoding API to find the latitude and longitude of each location
 var geocodeUrl1 = "https://api.opencagedata.com/geocode/v1/json?q=" + encodeURIComponent(origin) + "&key=6d43547f3d1b49359970b8a2353195a4";
var geocodeUrl2 = "https://api.opencagedata.com/geocode/v1/json?q=" + encodeURIComponent(destination) + "&key=6d43547f3d1b49359970b8a2353195a4";
var lat1, lon1, lat2, lon2;
// make API request to OpenRouteService API to get the driving distance between the two locations
var orsUrl = "https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf6248587b0c518d1e451281711ad715f32629&start=";

//We used fetch to fetch the data json coming from those API'S
fetch(geocodeUrl1)
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
     lat1 = data.results[0].geometry.lat;
     lon1 = data.results[0].geometry.lng;
    orsUrl += lon1 + "," + lat1 + "&end=";
    
    return fetch(geocodeUrl2);
    
  })
  .then(function (response) {
    /* Remove the comments and check the console in the browser to see the structure of the api's   */
   // console.log('Location(Origin) from textfield origin ',geocodeUrl1)
   // console.log('Location(Destination) from textfield origin ',geocodeUrl2)
    return response.json();
  })
  .then(function (data) {
     lat2 = data.results[0].geometry.lat;
     lon2 = data.results[0].geometry.lng;
    console.log()
    orsUrl += lon2 + "," + lat2;

    // make the API request to get the driving distance between the two locations
    return fetch(orsUrl);
  })
  .then(function (response) {
    //console.log('This api has info of driving distance between the two locations ',orsUrl)
    return response.json();
  }).then(function (data) {
// extract the driving distance and duration from the response data(orsUrl)
const distance = data.features[0].properties.segments[0].distance / 1000;
const duration = data.features[0].properties.segments[0].duration / 60; // convert seconds to minutes

// create markers for each location and add them to the map
var latlng1 = L.latLng(lat1, lon1);
var latlng2 = L.latLng(lat2, lon2);
originMarker = L.marker(latlng1).addTo(map);
destinationMarker = L.marker(latlng2).addTo(map);


// create a polyline between the two locations and add it to the map(red line)
 line = L.polyline([latlng1, latlng2], {color: "red"}).addTo(map);

// show the distance and duration between the two locations in kilometers and minutes
var popupContent = "The distance between " + origin + " and " + destination + " is approximately " + distance.toFixed(2) + " km, and it will take about " + parseFloat((duration.toFixed(1) / 60).toFixed(2)) + " hour to drive.";
//L.popup pops the content
//setLatLng sets where to pop the content
//setContent sets the content
//openOn opens the on the map
L.popup()
.setLatLng(latlng1)
.setContent(popupContent)
.openOn(map);
})

}

/* <----> Map code end <----> */

let origin = document.getElementById('origin');
let destination = document.getElementById('destination');
function toggleLocation(event){

  event.preventDefault();

 

  let swich= origin.value;
  origin.value=destination.value;
  destination.value=swich;
  filterOptions(origin, swich);
  filterOptions(destination, origin.value);
}

 origin.addEventListener('input', function() {
  let selectedValue = origin.value;
  filterOptions(destination, selectedValue);
});

destination.addEventListener('input', function() {
  let selectedValue = destination.value;
  filterOptions(origin, selectedValue);
});

  function filterOptions(dropdown, selectedValue) {
    
    let options = dropdown.options;
  
    for (let i = 0; i < options.length; i++) {
      let option = options[i];
  
     
      if (option.value === selectedValue) {
        option.style.display = 'none'; 
      } else {
        option.style.display = 'block'; 
      }
    }
  }