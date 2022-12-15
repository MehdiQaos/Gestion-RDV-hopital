<?php
    session_start();
    if (!isset($_SESSION['user_id']))
        header('location: sign.php');
    include_once 'scripts/doctor_scripts.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/style_doctor.css" />
    <title>Hopital system management</title>
</head>

<body>
    <div class="d-flex shadow-sm bg-light" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center d-flex flex-column py-4 fs-5 border-bottom mt-5">
                <div class="d-flex align-items-center">
                    <img src="img/photos/user.png" width="50px" class="rounded-circle me-3" alt="">
                    <div>
                        <p class="fw-bold fs-4" style="margin:-5px;"><?= $_SESSION['user_name'] ?></p>
                        <p class="text-secondary fs-6"><?= $_SESSION['user_email'] ?></p>
                    </div>
                </div>

                <a href="scripts/logout.php" class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 ">Log out</a> </div>

            <form method="POST" action="dashboard_doctor.php" class="list-group list-group-flush my-3">

                <button type="submit" name="dashboard" class="list-group-item list-group-item-action fw-bold"><i

                        class="uil uil-chart-bar fs-4 me-2"></i>Dashboard</button>
                <button name="appointements" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-medkit me-2 fs-4" ></i>My Appointments</button>
                <button name="sessions" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-stopwatch me-2 fs-4" ></i>My Sessions</button>        
                <button name="patients" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-bookmark me-2 fs-4"></i>My Patients</button>
                <button name="settings" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-setting me-2 fs-4"></i>Settings</button>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll;">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-3 m-0">Dashboard</h2>
                </div>
            <div class="d-flex align-items-center end-50">
                <div class="pt-3 me-3">
                  <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                  <p class="fs-6 text-black fw-bold"><?= Date('Y-m-d'); ?></p>
                </div>
                <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
            </div>
            </nav>

            <!-- main content -->
            <main class="container-fluid px-4">

                <?php
                    if(isset($_GET["appointements"]))
                        require "./includes/doctor/appointements_section.php";
                    else if(isset($_GET["sessions"]))
                        require "./includes/doctor/sessions_section.php";
                    else if(isset($_GET["patients"]))
                        require "./includes/doctor/patients_section.php";
                    else if(isset($_GET["settings"]))
                        require "./includes/doctor/settings_section.php";
                    else
                        require "./includes/doctor/dashboard_section.php";
                ?>

    <!-- /#page-content-wrapper -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>