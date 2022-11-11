 <div style="height:280px">
                        <div id="columnChart"></div>
                        <script>document.addEventListener("DOMContentLoaded", () => {
                           new ApexCharts(document.querySelector("#columnChart"), {
                             series: [{
                               name: 'For Expiry',
                               data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 55, 57, 56]
                             }, {
                               name: 'Approved',
                               data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 98, 87, 105]
                             }, {
                               name: 'Returned',
                               data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 60, 30, 12]
                             }],
                             chart: {
                               type: 'bar',
                               height: 350
                             },
                             plotOptions: {
                               bar: {
                                 horizontal: false,
                                 columnWidth: '55%',
                                 endingShape: 'rounded'
                               },
                             },
                             dataLabels: {
                               enabled: false
                             },
                             stroke: {
                               show: true,
                               width: 2,
                               colors: ['transparent']
                             },
                             xaxis: {
                               categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                             },
                             yaxis: {
                               title: {
                                 text: '# (Lumber Dealer)'
                               }
                             },
                             fill: {
                               opacity: 1
                             },
                             tooltip: {
                               y: {
                                 formatter: function(val) {
                                   return val + " Lumber Dealer"
                                 }
                               }
                             }
                           }).render();
                           });
                        </script> 
</div>
<script src="../assets/js/apexcharts.min.js"></script>
<script src="../assets/js/main.js"></script>
