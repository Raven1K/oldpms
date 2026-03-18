// /**
//  * @license
//  * Copyright 2019 Google LLC. All Rights Reserved.
//  * SPDX-License-Identifier: Apache-2.0
//  */
// // Initialize and add the map




// function initMap() {
//   // The location of Butuan

// const butuanLat = document.getElementById("decimalLatitude").value;
// const butuanLong = document.getElementById("decimalLongitude").value;


// const butuan = {
//   lat: Number(butuanLat),
//   lng: Number(butuanLong)
// };




// //   const butuan = {
// //     lat: 9.2000,
// //     lng: 125.5630
 

// // };

// const caraga = {
//   lat: Number(butuanLat),
//   lng: Number(butuanLong)
// };


//   // const caraga = {
//   //   lat: 9.2000,  
//   //   lng: 125.7000

//   // };




//   // The map, centered at Caraga
//   const map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 8.7,
//     center: caraga,
//   });
//   // The marker, positioned at Butuan
//   const marker = new google.maps.Marker({
//     position: butuan,
//     map: map,
//   });
// }

// window.initMap = initMap;












// var locations = [
//   ['Butuan', 9.2000, 125.5630]

// ];




// var map = new google.maps.Map(document.getElementById('map'), {
//   zoom: 10,
//   center: new google.maps.LatLng(9.2000, 125.7000),
//   mapTypeId: google.maps.MapTypeId.ROADMAP
// });

// var infowindow = new google.maps.InfoWindow();

// var marker, i;

// for (i = 0; i < locations.length; i++) {  
//   marker = new google.maps.Marker({
//     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//     map: map
//   });

//   google.maps.event.addListener(marker, 'click', (function(marker, i) {
//     return function() {

//       infowindow.setContent('<h3>' + locations[i][0] + '</h3><img src="' + locations[i][3] + '">');
//       // infowindow.setContent(locations[i][0]);
      
//       infowindow.open(map, marker);
//     }
//   })(marker, i));


// }






 var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 10,
  center: new google.maps.LatLng(9.2000, 125.5630),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map

  });

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent('<h3>' + locations[i][0] + '</h3> <img src="' + locations[i][3] + '" width="200" height="170"><br> <br><h3  style="color:black; font-size:17px; text-align:left;">' + locations[i][4] + '</h3><span  style="color:black; font-size:14px; text-align:left;">' + locations[i][5] + '</span><br><span  style="color:black; font-size:14px; text-align:left;">' + locations[i][6] + '</span><br><span  style="color:black; font-size:14px; text-align:left;">Date Approved: ' + locations[i][7] + '</span> <br> <span  style="color:black; font-size:14px; text-align:left;" >Date Expiry: ' + locations[i][8] + '</span> <br> <span  style="color:black; font-size:14px; text-align:left;" >Application Status: ' + locations[i][9] + '</span>');
      infowindow.open(map, marker);
    }
  })(marker, i));
}

