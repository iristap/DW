<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>ระบบเพิ่มข้อมูล</title>
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
    require_once './connection_connect.php';



    //get Year

    $Years = [];
    $YearSQL = "SELECT * FROM Year";
    $result = $conn->query($YearSQL);

    while ($my_row = $result->fetch_assoc()) {
        $Years[] = $my_row;
    }


    require_once './connection_close.php';



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
                                <form class="form-valide" action="./insertdatasingle.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">วันที่เก็บ<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="getdate" name="getdate" required />
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">วันที่เปิดเทอม<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="xxx2" name="xxx2" required />
                                        </div>
                                    </div> -->

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">เทอม<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="type" name="term" required>
                                                <option value="1">เทอมต้น</option>
                                                <option value="2">เทอมปลาย</option>
                                                <option value="0">ฤดูร้อน</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-suggestions">ปีการศึกษา<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                        <select class="form-control" id="type" name="year" required>
                                            <?php
                                                
                                                foreach($Years as $year){
                                                ?>
                                                <option value="<?php echo $year["year_id"] ?>"><?php echo $year["year_num"]?></option>
                                                <?php        
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    



                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <!-- <button type="submit" class="btn btn-primary" name="send" value="save">บันทึก</button> -->
                                            
                                            <button type="submit" class="btn btn-success" name="send"
                                                value="send">บันทึก</button>
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