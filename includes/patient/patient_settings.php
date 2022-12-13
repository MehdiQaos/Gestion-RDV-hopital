<div  id="dashboard">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle_s"></i>
                    <!-- <h2 class="fs-2 m-0"> </h2> -->
                    <h3 class="fw-bold ms-5 mt-1" style="color: #007A69;"> Settings</h3>
                    
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
                  <section class="mt-5 ">
                        <div  class="rounded shadowborder " >
                            <div class="my-2 ">
                                <div class="">
                                    <div class="p-3  pb-2 shadow-sm d-flex  rounded border">
                                    <i class="uil uil-medkit fs-3 mycolor box rounded py-2   px-3 mb-3 mt-2"></i>  
                                        <div class="ms-3 mt-2" data-bs-toggle="modal" data-bs-target="#edit_profile_patient">                      
                                            <h3 class="fs-4 mycolor">Account Settings</h3>
                                            <p class="fs-6 text-black">Edit your account Details & Change password</p>
                                        </div>    
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="p-3  pb-2 shadow-sm d-flex  rounded border">
                                    <i class="uil uil-medkit fs-3 mycolor box rounded py-2   px-3 mb-3 mt-2"></i>  
                                        <div class="ms-3 mt-2" data-bs-toggle="modal" data-bs-target="#show_profile_patient">                      
                                            <h3 class="fs-4 mycolor">View Account Details</h3>
                                            <p class="fs-6 text-black">View Personnale information About your Account</p>
                                        </div>    
                                                 
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="p-3  pb-2 shadow-sm d-flex  rounded border">
                                    <i class="uil uil-medkit fs-3 text-danger box rounded py-2   px-3 mb-3 mt-2"></i>  
                                        <div class="ms-3 mt-2" data-bs-toggle="modal" data-bs-target="#delete_account">                      
                                            <h3 class="fs-4 text-danger">Delete Account</h3>
                                            <p class="fs-6 text-black">Will Permanently Delete your Account</p>
                                        </div>    
                                                 
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                       
                      
                    
                  </section>
        </div>
</div>

<script>
        var el = document.getElementById("wrapper");
        var toggleButton_s = document.getElementById("menu-toggle_s");

        toggleButton_s.onclick = function () {
            el.classList.toggle("toggled");
        };
       
    </script>
   