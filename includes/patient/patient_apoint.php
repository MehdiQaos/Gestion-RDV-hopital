<section class="p-4 pt-0 " id="sessions">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left mycolor fs-4 " id="menu-toggle_a"></i>
                            <!-- <h2 class="fs-2 m-0"> </h2> -->
                            <h3 class="fw-bold ms-5 mt-1" style="color: #007A69;">My Booking History</h3>
                        </div>
                    <div class="d-flex align-items-center end-50">
                        <div class="pt-3 me-3">
                          <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                          <p class="fs-6 text-black fw-bold"><?= date("Y-m-d") ?></p>
                        </div>
                        <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
                    </div>
        
                    </nav>        
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2">All My Bookings(0)</p>
               
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
                                </select>
                            </div>
                                
                            <button class="btn mycolor button1 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
                         </div>
                         <div class="row pt-5 justify-content-around">
                                  
                                    <div class="col-6">
                                        <div class="p-5 pt-5 pb-1 shadow-sm  rounded  border"> 
                                            <div>
                                                <h3 class="fs-4 mycolor">Test Session</h3>
                                                <p class="fs-5 pt-4 text-black fw-bold mb-0">New Booking</p>
                                                <p class="m-0">2020/11/03</p>
                                                <p class="m-0">Starts at <span class="fw-bold">@ 18:00 (24h)</span></p>
                                            </div>
                                            <button class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 w-100" type="button">Log out</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-5 pt-5 pb-1 shadow-sm  rounded  border"> 
                                            <div>
                                                <h3 class="fs-4 mycolor">Test Session</h3>
                                                <p class="fs-5 pt-4 text-black fw-bold mb-0">New Booking</p>
                                                <p class="m-0">2020/11/03</p>
                                                <p class="m-0">Starts at <span class="fw-bold">@ 18:00 (24h)</span></p>
                                            </div>
                                            <button class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 w-100" type="button">Log out</button>
                                        </div>
                                    </div>
                                    
                           </div>
                         
                       
                   </section>
                   <script>
        var el = document.getElementById("wrapper");
        var toggleButton_a = document.getElementById("menu-toggle_a");

        toggleButton_a.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>