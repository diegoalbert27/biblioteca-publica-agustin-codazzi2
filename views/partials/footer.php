    <!-- Jquery -->
    <script src="assets/js/jquery.min.js"></script>
    
    <!-- Font Awesome -->
    <!-- <script src="https://kit.fontawesome.com/69aa1b9484.js" crossorigin="anonymous"></script> -->
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- DataTable -->
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="vendor/DataTables/datatables.min.js"></script> -->
    <script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- Highcharts  -->
    <!-- <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="vendor/highCharts/highstock.js"></script> 
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="vendor/highCharts/exporting.js"></script> 
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script src="vendor/highCharts/export-data.js"></script> -->

    <script src="./node_modules/fullcalendar/main.js"></script>
    
    <?php
        if (isset($_SESSION['user_id']))
            echo '<script type="text/javascript" src="assets/js/datatable.js"></script>';
    ?>
    
    <script type="text/javascript" src="assets/js/formulario.js"></script>
    <script type="text/javascript" src="assets/js/calendar.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <script src="assets/js/scripts.js"></script>
</body>
</html>