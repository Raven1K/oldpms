<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="mapstyle.css" />
    <script type="module" src="mapindex.js"></script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises
      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
      -->
      <script async
      
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrTrt-PDGjQBDSeeZ1bhhchptmWBb7OYE=initMap">

    // src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAWoPxVf_szWTh8RlxGLd2iS2iBJ_azVI&callback=initMap">
</script>
  </body>
</html>
