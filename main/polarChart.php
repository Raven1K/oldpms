
 <div class="col-xl-12 col-lg-10 mb-4">
      
                  
                     <div class="card-body">
                        <h5 class="card-title">Polar Area Chart</h5>
                        <div id="polarAreaChart"></div>
                        <script>document.addEventListener("DOMContentLoaded", () => {
                           new ApexCharts(document.querySelector("#polarAreaChart"), {
                             series: [14, 23, 21, 17, 15, 10, 12, 17, 21, 30],
							 labels:["Nasipit", "Tubay", "Tubod", "Cantilan", "Lianga", "Bislig", "Loreto", "Talacogon", "Bunawan", "Bayugan"],
							   
                             chart: {
                               type: 'polarArea',
                               height: 450,
                               toolbar: {
                                 show: true
                               }
                             },
                             stroke: {
                               colors: ['#031918']
                             },
                             fill: {
                               opacity: 0.8
                             }
                           }).render();
                           });
                        </script> 
                     </div>
                  
               </div>
<script src="assets/js/apexcharts.min.js"></script>
<script src="assets/js/main.js"></script>
