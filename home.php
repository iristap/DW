<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>ระบบเพิ่มปีการศึกษา</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>



    <?php
    session_start();



    ?>
    <?php include('./layout.php'); ?>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">เพิ่มข้อมูล</h5>
                            <div class="form-validation">
                                <form class="form-valide" action="./insertAll.php" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label"
                                            for="val-currency">ข้อมูลทั้งหมด(csv เท่านั้น) <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" name="fileCSV"
                                                id="fileCSV" accept=".csv" required />
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <!-- <button type="submit" class="btn btn-primary" name="send" value="save">บันทึก</button> -->
                                            <!-- <button type="submit" class="btn btn-danger" name="send"
                                                value="cancle">ยกเลิก</button> -->
                                            <button type="submit" class="btn btn-success" name="send"
                                                value="send">ยืนยัน</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ลบข้อมูล</h5>
                            <div class="form-validation">
                                <form class="form-valide" action="./deleteAll.php" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-currency">
                                            <span class="text-danger">***</span>
                                                ทำการลบข้อมูลบนฐานข้อมูลทั้งหมด
                                            <span class="text-danger">***</span>
                                        </label>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <!-- <button type="submit" class="btn btn-primary" name="send" value="save">บันทึก</button> -->
                                            <!-- <button type="submit" class="btn btn-danger" name="send"
                                                value="cancle">ยกเลิก</button> -->
                                            <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger" name="send"
                                                value="send">ลบข้อมูล</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->

    <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>