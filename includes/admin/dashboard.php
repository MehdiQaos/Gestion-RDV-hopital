<section id="dashboard">
                <h3 class="fw-bold" style="color: #007A69;"><i
                    class="uil uil-chart-bar fs-4 me-2"></i> Status</h3>
                <div class="row g-3 d-flex justify-content-around">
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>                      
                                <h3 class="fs-2 mycolor">
                                    <?= Doctor::countDoctors();?>
                                </h3>
                                <p class="fs-5 text-black">Doctors</p>
                            </div>    
                            <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>           
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>
                         
                                <h3 class="fs-2 mycolor">3</h3>
                                <p class="fs-5 text-black">Patients</p>
                            </div>
                            <i class="uil uil-accessible-icon-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                            <div>
                                <h3 class="fs-2 mycolor">2</h3>
                                <p class="fs-5 text-black">New Booking</p>
                            </div>
                            <i class="uil uil-bookmark fs-3 mycolor rounded py-2  px-3 box"></i>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                            <div>
                                <h3 class="fs-2 mycolor">2</h3>
                                <p class="fs-5 text-black">Today sessions</p>
                            </div>
                            <i class="uil uil-heart-rate fs-3 mycolor  rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                </div>

                  <section class="mt-5 d-flex justify-content-between">
                        <form method="post"  style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                           <p class="ms-3 mycolor fs-4 fw-bold">Upcoming Appointements until Next Tuesday</p>
                           <p class="ms-3">Here's a quick access to Upcoming Appointements until 7 days <br> More details available in @Appointement section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;
                           background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;
                           ">
                            <table class="table border-secondary text-center table-hover ">
                                <tr class="">
                                    <td class="mycolor fw-bold ">Appointement number</td>
                                    <td class="mycolor fw-bold">Patient name</td>
                                    <td class="mycolor fw-bold">Doctor</td>
                                    <td class="mycolor fw-bold">Session</td>
                                </tr>     
                                <tr class="bg-light border-bottom-0">
                                    <td class="text-dark">Appointement number</td>
                                    <td class="text-dark">Patient name</td>
                                    <td class="text-dark">Doctor</td>
                                    <td class="text-dark">Session</td>
                                </tr>
                            </table>
                           
                        </div>
                        <button class="w-100 btn mycolor button1 position-absolute bottom-0" name="allAppointment" type="submit">Show all Appointements</button>
                        
                        </form>
                        <form method="post" style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                            <p class="ms-3 mycolor fs-4 fw-bold">Upcoming Sessions until Next Tuesday</p>
                           <p class="ms-3">Here's a quick access to Upcoming Sessions that Scheduled until 7 days <br> Add,remove and many features available in @Schedule section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll; background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;">
                           <table class="table border-secondary text-center table-hover">
                            <tr class="">
                                <td class="mycolor fw-bold ">Session Title</td>
                                <td class="mycolor fw-bold">Doctor</td>
                                <td class="mycolor fw-bold">Scheduled Date & Time</td>
                                </tr>
                            
                           </table>
                        </div>
                        <button class="w-100 btn mycolor button1 position-absolute bottom-0" name="allSessions" type="submit">Show all Sessions</button>
                        </form>
                  </section>
                </section>