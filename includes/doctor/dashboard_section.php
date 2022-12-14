<section class="content_section" id="doctor_dashboard_section">
    <div class=" rounded-3" style="background-image: url(img/photos/b8.jpg);background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5 pb-5">
                    <h5 class="fw-bolder">Welcome !</h5>
                    <p class="fs-2 fw-bold"><?= $_SESSION['user_name'] ?></p>
                    <p class="mb-4">Thanks for joining with us. We are always trying to get you a complete service<br>
                        You can view your daily schedule, Reach Patients Appointment at home!<br>
                    </p>
                    <a href="dashboard_doctor.php?appointements=" class="btn text-light"
                        style="background-color: hsl(209, 91%, 44%); padding: .4rem 5rem">View My Appointments</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 row justify-content-between">
        <div class="col-6 rounded shadowborder ">
            <p class="my-4 ms-3 mycolor fs-4 fw-bold">Status</p>
            <div class="row g-3 d-flex justify-content-around">
                <div class="col-lg-6 col-md-12 col-11">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                        <div>
                            <h3 class="fs-2 mycolor"><?= User::count_users(2) ?></h3>
                            <p class="fs-5 text-black">All Doctors</p>
                        </div>
                        <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-11">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                        <div>
                            <h3 class="fs-2 mycolor"><?= count(Patient::view_patient('doctor', $_SESSION['user_id'])); ?></h3>
                            <p class="fs-5 text-black">All Patients</p>
                        </div>
                        <i class="uil uil-accessible-icon-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-11">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border">
                        <div>
                            <h3 class="fs-2 mycolor"><?= User::count_data()['appointements']; ?></h3>
                            <p class="fs-5 text-black">New Booking</p>
                        </div>
                        <i class="uil uil-bookmark fs-3 mycolor rounded py-2  px-3 box"></i>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-11">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border">
                        <div>
                            <h3 class="fs-2 mycolor"><?= count(Session::today_sessions(2, $_SESSION['user_id'])); ?></h3>
                            <p class="fs-5 text-black">Today sessions</p>
                        </div>
                        <i class="uil uil-heart-rate fs-3 mycolor  rounded py-2  px-3 box"></i>
                    </div>
                </div>
            </div>
        </div>
        <div style=" height: 25em;border: 1px black;" class="col-6 position-relative rounded shadowborder">
            <p class="my-4 ms-3 mycolor fs-4 fw-bold">Your Upcoming Sessions until Next Week</p>
            <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll; background-image:  url(img/icons/notfound.svg);
                                            background-repeat: no-repeat;
                                            background-size:15em;
                                            background-position: bottom;">
                <table class="table table-light" style="border: 0.5px solid rgb(184, 181, 181);border-radius: 20px;">
                    <thead>
                        <tr class="" style="border-bottom: 2px #007A69 solid;">
                            <th class="mycolor fw-bold text-center">Session Title</th>
                            <th class="mycolor fw-bold text-center">Scheduled Date</th>
                            <th class="mycolor fw-bold text-center">Time</th>
                        </tr>
                    </thead>
                    <tbody class="border-none">
                        <?= next_week_sessions(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>