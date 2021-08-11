<!DOCTYPE html>
<html>
<!-- http://webapplayers.com/inspinia_admin-v2.9.4/ecommerce_product_list.html -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CRUD | Dashboard</title>

    <link href="/tema/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tema/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/tema/css/custom.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="/tema/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/tema/js/plugins/dataTables/datatables.min.js" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/tema/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/tema/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/tema/css/animate.css" rel="stylesheet">
    <link href="/tema/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">

        @include('tema.sidebar')

        <div id="page-wrapper" class="gray-bg">

            @include('admin.includes.alerts')

            @include('tema.nav')

            @yield('content')

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/tema/js/jquery-3.1.1.min.js"></script>
    <script src="/tema/js/popper.min.js"></script>
    <script src="/tema/js/bootstrap.js"></script>
    <script src="/tema/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/tema/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/tema/js/plugins/flot/jquery.flot.js"></script>
    <script src="/tema/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/tema/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/tema/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/tema/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/tema/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/tema/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/tema/js/inspinia.js"></script>
    <script src="/tema/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/tema/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/tema/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/tema/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/tema/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/tema/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="/tema/js/plugins/toastr/toastr.min.js"></script>

    <!-- DataTables -->
    <script src="/tema/js/plugins/dataTables/datatables.min.js"></script>
    <script src="/tema/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            let toast = $('.toast');

            setTimeout(function () {
                toast.toast({
                    delay: 5000,
                    animation: true
                });
                toast.toast('show');

            }, 2000);

            var data1 = [
                [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
            ];
            var data2 = [
                [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis: {
                    },
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                }
            );

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                }]
            };


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, { type: 'doughnut', data: doughnutData, options: doughnutOptions });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [70, 27, 85],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                }]
            };


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, { type: 'doughnut', data: doughnutData, options: doughnutOptions });

        });

        $(window).bind("scroll", function () {
            let toast = $('.toast');
            toast.css("top", window.pageYOffset + 20);

        });
    </script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `¿Está seguro de que desea eliminar este registro?`,
                text: "Si borra esto, desaparecerá para siempre.",
                icon: "Aviso",
                buttons: true,
                dangerMode: true,
                confirmButtonText: 'Eliminar!',
                cancelButtonText: 'Cancelar',
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    
    </script>
</body>

</html>