<?php 
include 'classes/scripts.php';
require_once 'classes/doctor.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="assets/css/style_admin.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/main.js"></script>



    <title>Hopital system management</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/photos/favicona.png" />
</head>

<body>
    <div class="d-flex shadow-sm bg-light" id="wrapper" >
        <!-- Sidebar -->
        <?php 
        include './includes/admin/sidebar.php';
        include './includes/admin/alert.php';?>
        
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll;">


<!-- navbar part ( search and the calender) -->

<?php 
    include './includes/admin/navbar.php';
    if(isset($_SESSION['adminAdded'])){
        var_dump($_SESSION['adminAdded']);
        // ?
        // <script>
        //     showAlert("?= $_SESSION['adminAdded']?");
        // /script
        // ?php
        // unset($_SESSION['adminAdded']);
    }            
    ?>
        
    <div class="container-fluid px-4">
            <?php
                if(isset($_POST['dashboard-displayer']))            include 'includes/admin/dashboard.php';
                else if(isset($_POST['doctors-displayer']))         include './includes/admin/doctors.php';
                else if(isset($_POST['schedule-displayer']) || isset($_POST['allSessions']))        
                                                                    include './includes/admin/schedule.php';
                else if(isset($_POST['appointments-displayer']) || isset($_POST['allAppointment']))    
                                                                    include './includes/admin/appointment.php';
                else if(isset($_POST['patients-displayer']))        include './includes/admin/patient.php';
                else                                                include 'includes/admin/dashboard.php';

            ?>    
    </div>
                
<!-- forms -->
    <?php 
        include './includes/admin/forms/add_edit_doctor.php';
    ?>
    
    <?php 
        include './includes/admin/forms/session_modal.php';
    ?>  
    
    <?php 
        include './includes/admin/forms/view_doctor.php';
    ?>  
    
    <?php 
        include './includes/admin/forms/remove_doctor.php';
    ?>  
    <!-- /#page-content-wrapper -->
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/script_admin.js"></script>
    
</body>

</html>