   <div  id="dashboard">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle_da"></i>
                    <!-- <h2 class="fs-2 m-0"> </h2> -->
                    <h3 class="fw-bold ms-5 mt-1" style="color: #007A69;"> Home</h3>
                    
                </div>
            <div class="d-flex align-items-center end-50">
                <div class="pt-3 me-3">
                  <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                  <p class="fs-6 text-black fw-bold"><?= date("Y-m-d") ?></p>
                </div>
                <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
            </div>

            </nav>
            <div class="container-fluid px-4">
                
                <div class="cover_image" style="background-image: url(img/photos/b3.jpg);background-size:cover;"  >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-5 pb-5">
                                <h5 class="fw-bolder">Welcome !</h5>
                                <p class="fs-4 fw-bold">Hanane Hanane </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta ab tempore quo.<br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas debitis quidem esse fuga ullam dolores at a aliquid.<br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque tenetur quod cumque?
                                </p>
                                <h6 class="fw-bolder">Channel a Doctor here </h6>
                                <div class="input-group pt-2" style="min-width:200px; max-width:500px">
                                    <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-secondary mycolor ms-2 rounded button1 border-0">search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <section class="mt-2 row justify-content-between">
                        <div  class="col-6  rounded shadowborder " >
                            <div class="row g-3 my-2 d-flex justify-content-around">
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                                        <div>                      
                                            <h3 class="fs-2 mycolor"><?= $countArr[1]?></h3>
                                            <p class="fs-5 text-black">Doctors</p>
                                        </div>    
                                        <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>           
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                                        <div>
                                            <h3 class="fs-2 mycolor"><?= $countArr[0]?></h3>
                                            <p class="fs-5 text-black">Patients</p>
                                        </div>
                                        <i class="uil uil-accessible-icon-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                                    </div>
                                </div>
            
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                                        <div>
                                            <h3 class="fs-2 mycolor"><?= $countArr[2]?></h3>
                                            <p class="fs-5 text-black">New Booking</p>
                                        </div>
                                        <i class="uil uil-bookmark fs-3 mycolor rounded py-2  px-3 box"></i>
                                    </div>
                                </div>
            
                                
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                                        <div>
                                            <h3 class="fs-2 mycolor"><?php if(is_array(view_sessions())){ echo count(view_sessions());}else{ echo 0;};?></h3>
                                            <p class="fs-5 text-black">Today sessions</p>
                                        </div>
                                        <i class="uil uil-heart-rate fs-3 mycolor  rounded py-2  px-3 box"></i>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div style=" height: 25em;border: 1px black;" class="col-6 position-relative  rounded shadowborder mt-3" >
                            <p class=" mt-2 ms-3 mycolor fs-4 fw-bold">Your Upcoming Booking</p>
                          
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll; background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;">
                           <table class="table table-light" style="border: 0.5px solid rgb(184, 181, 181);border-radius: 20px;">
                            <thead>
                                
                            <tr class="" style="border-bottom: 2px #007A69 solid;">
                                <td class="mycolor fw-bold ">Appoint.Number</td>
                                <td class="mycolor fw-bold">Session Title</td>
                                <td class="mycolor fw-bold">Doctor</td>
                                <td class="mycolor fw-bold">Scheduled Date & Time</td>
                            </tr>
                            </thead>
                            <tbody class=" border-none">
                            <?php
                          $objects = viewAppointment();
                                if(is_array($objects)){
                                    foreach($objects as $object){
                                 ?>
                            <tr class="">
                                <td class="text-dark"><?= $object->order_in_session;?></td>
                                <td class="text-dark"><?= $object->session_title?></td>
                                <td class="text-dark"><?= $object->doctor_name?></td>
                                <td class="text-dark"><?= $object->booking_date?></td>
                            </tr>
                            <?php }}?>
                            </tbody>
                            
                           </table>
                        </div>
                        </div>
                    
                  </section>
        </div>
</div>
<script>
        var el = document.getElementById("wrapper");
    
        var toggleButton_da = document.getElementById("menu-toggle_da");

        toggleButton_da.onclick = function () {
            el.classList.toggle("toggled");
        };
      
    </script>