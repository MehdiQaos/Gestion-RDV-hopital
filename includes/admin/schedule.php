<section id="schedule">
                     <h3  class="fw-bold
                   mb-5" style="color: #007A69;"><i class="uil uil-stopwatch me-2 fs-3" ></i>Schedule Manager</h3>
                         <div class="d-flex justify-content-between">
                             <p class="fs-5 ms-2">All Sessions(
                                <?php
                                    echo count(Session::view_sessions());    
                                ?>
                                )</p>
                             <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-session" ><i class="uil uil-plus text-white" onclick=""></i>&emsp; Add a Session</button>
                         </div>
                         <div class="w-100 d-flex justify-content-around border align-items-center py-2 shadow-sm mt-4">
                            <div>
                                <label for="session-date">Date : </label>
                                <input type="date" class="rounded border-0 button1 px-4 ms-2" name="session-date">
                            </div>
                            <div>
                                <label for="doctor-name">Doctor : </label>
                                <select class="rounded border-0 button1 px-4 ms-2" name="doctor-name" id="">
                                    <option value="">Choose Doctor Name From The List</option>
                                    <?php
                                        doctorSelect();
                                    ?>
                                </select>
                            </div>
                                
                            <button class="btn mycolor button1 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
                         </div>
                          <div class="card-body table-responsive mt-4" style="height: 50vh; overflow: scroll;">
                                            <table class="table border-secondary text-center table-hover ">
                                             <tr class="">
                                                 <td class="mycolor fw-bold ">Session Title</td>
                                                 <td class="mycolor fw-bold">Doctor</td>
                                                 <td class="mycolor fw-bold">Schedule Date & Time</td>
                                                 <td class="mycolor fw-bold">Capacity</td>
                                                 <td class="mycolor fw-bold">events</td>
                                             </tr> 
                                                <?php 
                                                    
                                                    // if(isset($_POST['search-doctor-btn'])){
                                                        
                                                    //     listDoctors($_POST['search-doctor']);
                                                    // }else{
                                                        listSessions();
                                                    

                                                ?> 
                                            </table>
                          </div>
                         
                 
                    </section>