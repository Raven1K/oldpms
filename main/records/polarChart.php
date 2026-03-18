


<div class="x_panel">
    <div class="card-body">
        <h2 class="card-title">Lumber Dealer Approved</h2>
        <div id="polarAreaChart"></div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#polarAreaChart"), {
                    series: <?php echo $seriesDataJS; ?>,
                    labels: ["Nasipit", "Tubay", "Tubod", "Cantilan", "Lianga", "Bislig", "Loreto", "Talacogon", "Bunawan", "Bayugan"],
                    chart: {
                        type: 'polarArea',
                        height: 350,
                        toolbar: {
                            show: true
                        }
                    },
                    stroke: {
                        colors: ['#031918']
                    },
                    fill: {
                        opacity: 1.8
                    }
                }).render();
            });
        </script>
    </div>
</div>

<script src="../assets/js/apexcharts.min.js"></script>
<script src="../assets/js/main.js"></script>
