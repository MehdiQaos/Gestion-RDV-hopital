<section class="p-4 pt-0 " id="sessions">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left mycolor fs-4 " id="menu_toggles"></i>
                            <!-- <h2 class="fs-2 m-0"> </h2> -->
                            <div class="input-group ms-5" style="width:500px;">
                                <input type="search" class="form-control rounded" placeholder="Search Doctor Name, Email or Date " aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-secondary mycolor ms-2 rounded button1 border-0">search</button>
                              </div>
                        </div>
                    <div class="d-flex align-items-center end-50">
                        <div class="pt-3 me-3">
                          <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                          <p class="fs-6 text-black fw-bold"><?= date("Y-m-d") ?></p>
                        </div>
                        <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
                    </div>
        
                    </nav>        
                    
                        <div class="d-flex justify-content-between ">
                            <p class="fs-5 ms-2">All Sessions(<?= $countArr[3]?>)</p>
               
                        </div>
                        <?php 
                            $objects  = view_sessions();
                            if(is_array($objects)){

                            
                            foreach($objects as $object){
                        ?>
                         <div class="justify-content-center"style="; overflow: scroll;">
                            <div class="" style="width: 90%;">
                                <div class="p-5 pt-5 pb-1 shadow-sm  rounded  border"> 
                                    <div>
                                        <h3 class="fs-4 mycolor"><?= $object->title?></h3>
                                        <p class="fs-5 pt-4 text-black fw-bold mb-0">New Booking</p>
                                        <p class="m-0"><?= $object->start_time?></p>
                                        <p class="m-0">Starts at <span class="fw-bold"><?= $object->start_time?></span></p>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_session" value="<?= $object->id?>">
                                    <button class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 w-100" type="submit" name="book">Book Now</button>
                                    </form>
                                 </div>
                                </div>
                            </div>
                            <?php }}else{ echo $objects;}
                        ?>
                           
                            
                        </div>
                       
                   </section>
                   <script>
        var el = document.getElementById("wrapper");
       
        var toggleButton_ss = document.getElementById("menu_toggles");

        toggleButton_ss.onclick = function () {
            el.classList.toggle("toggled");
        };
        
    </script>