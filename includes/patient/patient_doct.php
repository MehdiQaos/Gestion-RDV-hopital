<section class="pt-2 " id="doctors" style="">
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left mycolor fs-4 " id="menu-toggle_d"></i>
                            <!-- <h2 class="fs-2 m-0"> </h2> -->
                            <div class="input-group ms-5" style="width:500px;">
                                <input type="search" class="form-control rounded" placeholder="Search Doctor Name or Email" aria-label="Search" aria-describedby="search-addon" />
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
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-4">All Doctors(<?= $countArr[1]?>)</p>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 75vh; overflow: scroll;">
                                           <table class="table table-light " style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
                                            <tr class="" style="border-bottom: 2px #007A69 solid;">
                                                <td class="mycolor fw-bold ">Doctor Name</td>
                                                <td class="mycolor fw-bold">Email</td>
                                                <td class="mycolor fw-bold">Speciality</td>
                                                <td class="mycolor fw-bold">Events</td>
                                            </tr> 
                                            <tr class="">
                                                <td class="text-dark">Ossama</td>
                                                <td class="text-dark">ossama@gmail.com</td>
                                                <td class="text-dark">cardiac</td>
                                                <td class="text-dark">
                                                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-eye pe-1"></i>view</button>
                                                    <button class="btn mycolor button1 rounded-pill "><i class="mycolor uil uil-heart-rate pe-1"></i>Sessions</button>
                                                </td>
                                            </tr> 
                                            <tr class="">
                                                <td class="text-dark">Ossama</td>
                                                <td class="text-dark">ossama@gmail.com</td>
                                                <td class="text-dark">cardiac</td>
                                                <td class="text-dark">
                                                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-eye pe-1"></i>view</button>
                                                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-heart-rate pe-1"></i>Sessions</button>
                                                </td>
                                            </tr>         
                                           </table>
                         </div>
                        
                   </section>
                   <script>
        var el = document.getElementById("wrapper");
      
        var toggleButton_d = document.getElementById("menu-toggle_d");
        toggleButton_d.onclick = function (){
            el.classList.toggle("toggled");
        };
      
    </script>