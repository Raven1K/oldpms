/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// Initialize and add the map




function initMap() {
  // The location of Butuan

const butuanLat = document.getElementById("decimalLatitude").value;
const butuanLong = document.getElementById("decimalLongitude").value;


const butuan = {
  lat: Number(butuanLat),
  lng: Number(butuanLong)
};




//   const butuan = {
//     lat: 9.2000,
//     lng: 125.5630
 

// };

const caraga = {
  lat: Number(butuanLat),
  lng: Number(butuanLong)
};


  // const caraga = {
  //   lat: 9.2000,  
  //   lng: 125.7000

  // };




  // The map, centered at Caraga
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8.7,
    center: caraga,
  });
  // The marker, positioned at Butuan
  const marker = new google.maps.Marker({
    position: butuan,
    map: map,
  });
}

window.initMap = initMap;












