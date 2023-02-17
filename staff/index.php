<?php

// Create a new PDO object to connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=post', 'root', '');

?>



<?php
include_once("header.php");

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- =========================start of product card====================== -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <br>
                            <!-- ========================= -->
                            <?php
                            // Prepare and execute the SQL query
                            $stmt = $pdo->prepare('SELECT COUNT(*) FROM product');
                            $stmt->execute();

                            // Fetch the result of the query and store it in a variable
                            $count = $stmt->fetchColumn();

                            // Format the result in HTML
                            $html = '<h3>' . $count . ' Products</h3>';

                            // Echo the HTML-formatted result to the web page
                            echo $html;

                            ?>

                            <br><br><br>
                            <!-- ==================== -->
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-ul"></i>
                        </div>
                        <a href="products.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ========================end of product card======================= -->

                <!-- =======================start of category card======================== -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <br>
                            <!-- ====================== -->
                            <?php
                            // Prepare and execute the SQL query
                            $stmt = $pdo->prepare('SELECT COUNT(*) FROM category');
                            $stmt->execute();

                            // Fetch the result of the query and store it in a variable
                            $count = $stmt->fetchColumn();

                            // Format the result in HTML
                            $html = '<h3>' . $count . ' Category</h3>';

                            // Echo the HTML-formatted result to the web page
                            echo $html;

                            ?>

                            <br><br><br>
                            <!-- ======================= -->
                        </div>
                        <div class="icon">
                            <i class="fa fa-th-list"></i>
                        </div>
                        <a href="category.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ====================end of category card=========================== -->

                <!-- ===================start of orders card============================ -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <br>
                            <!-- ===================== -->
                            <?php
                            // Prepare and execute the SQL query
                            $stmt = $pdo->prepare('SELECT COUNT(*) FROM orderlist');
                            $stmt->execute();

                            // Fetch the result of the query and store it in a variable
                            $count = $stmt->fetchColumn();

                            // Format the result in HTML
                            $html = '<h3>' . $count . ' Orders</h3>';

                            // Echo the HTML-formatted result to the web page
                            echo $html;

                            ?>

                            <br><br><br>
                            <!-- ==================== -->
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="orders.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ====================end of orders card=========================== -->

                <!-- ===================start of tables card============================ -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <br>
                            <!-- ==================== -->
                            <?php
                            // Prepare and execute the SQL query
                            $stmt = $pdo->prepare('SELECT COUNT(*) FROM tablenums');
                            $stmt->execute();

                            // Fetch the result of the query and store it in a variable
                            $count = $stmt->fetchColumn();

                            // Format the result in HTML
                            $html = '<h3>' . $count . ' Tables</h3>';



                            // Echo the HTML-formatted result to the web page
                            echo $html;

                            ?>

                            <br><br><br>
                            <!-- ================== -->
                        </div>
                        <div class="icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <a href="table.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- =====================end of tables card========================== -->

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../template/dist/js/pages/dashboard.js"></script>
</body>

</html>