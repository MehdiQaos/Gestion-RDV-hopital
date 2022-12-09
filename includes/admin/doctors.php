<section id="doctors">
                    <h3  class="fw-bold
                  mb-5" style="color: #007A69;"><i class="uil uil-medkit me-2 fs-4" ></i>Doctors</h3>
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2">All Doctors(<?= Doctor::countDoctors();?>)</p>
                            <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="add-doctor-btn"><i class="uil uil-plus mycolor" onclick=""></i>&emsp; Add Doctor</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <tr class="top-0 position-sticky bg-light">
                                                <td class="mycolor fw-bold ">Doctor Name</td>
                                                <td class="mycolor fw-bold">Email</td>
                                                <td class="mycolor fw-bold">Speciality</td>
                                                <td class="mycolor fw-bold">Events</td>
                                            </tr> 
                                            
                                            <?php 
                                                
                                                listDoctors();

                                            ?> 
                                           </table>
                         </div>
                        </section>