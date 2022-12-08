<!DOCTYPE html>
<html lang="en">

<?php
include "scripts/scripts.php";
include "scripts/session_check.php";

?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/style_patient.css" />
    <title>Hopital system management</title>
</head>

<body>
    <div class="d-flex shadow-sm bg-light" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center d-flex flex-column py-4 fs-5 border-bottom mt-5">
                <div class="d-flex align-items-center">
                    <img src="img/photos/user.png" width="40px" class="rounded-circle me-3" alt="">
                    <div>
                        <p style="margin:-5px;"><?= $_SESSION["user_name"]?></p>
                        <p class="text-secondary fs-6"><?= $_SESSION["user_email"]?></p>
                    </div>
                </div>
                    <a href="scripts/logout.php" class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 ">Log out</a> </div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard_patient.php?file=dash" class="list-group-item list-group-item-action  text-secondary "><i
                        class="uil uil-home fs-4 me-2"></i>Home</a>
                <a  href="dashboard_patient.php?file=doct" class="list-group-item list-group-item-action   fw-bold"><i
                        class="uil uil-medkit me-2 fs-4" ></i>All Doctors</a>
                <a  href="dashboard_patient.php?file=session" class="list-group-item list-group-item-action  fw-bold" ><i
                        class="uil uil-stopwatch me-2 fs-4" ></i>Scheduled Sessions</a>        
                <a  href="dashboard_patient.php?file=appoint" class="list-group-item list-group-item-action   fw-bold"><i
                        class="uil uil-bookmark me-2 fs-4"></i>My Booking</a>
                <a  href="dashboard_patient.php?file=settings" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-setting fs-4 me-2"></i>Settings</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll;">
        <?php
         if(isset($_GET["file"])){
            if($_GET['file']=="dash"){
                $countArr = get_count_data();
                include("includes/patient/patient_dash.php");
                }
                else if($_GET['file']=="doct"){
                    include("includes/patient/patient_doct.php");
                }
                else if($_GET['file']=="session"){
                    include("includes/patient/patient_session.php");
               }
               else if($_GET['file']=="appoint"){
                  include("includes/patient/patient_apoint.php");
               }
               else{
                  include("includes/patient/patient_settings.php");
                  include("includes/modals/patient_profile.php");
                  include("includes/modals/patient_delete.php");
               } 
         }
         else{
            $countArr = get_count_data();
            include("includes/patient/patient_dash.php");

         }
          
        ?>
        
        </div>
<!-- forms that should be in a separate fille includable -->
                   <div class="modal fade" id="modal-doctor">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST" name="form_add_doctor">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Doctor</h5>
                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                </div>
                                <div class="modal-body">
                                        <input type="hidden" id="doctor-id">
                                        <div class="mb-3">
                                            <label class="form-label">Doctor Name</label>
                                            <input type="text" name="doctorname" class="form-control" id="doctor-name"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="doctoremail" class="form-control" id="doctor-email"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Speciality</label>
                                            <input type="text" name="speciality" class="form-control" id="doctor-speciality"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" name="doctorpassword" class="form-control" id="doctorpassword"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="doctornumber" class="form-control" id="doctornumber"/>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" name="savedoctor" class="btn mycolor button1" id="doctor-save-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script_patient.js"></script>
</body>

</html>