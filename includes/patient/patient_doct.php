<section class="pt-2 " id="doctors" style="">
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 justify-content-between" id="dashboard">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left mycolor fs-4 " id="menu-toggle_d"></i>
                            <!-- <h2 class="fs-2 m-0"> </h2> -->
                            <form class="input-group ms-5" style="width:500px;" method="post"action="">
                                <input type="search" name="search_data" class="form-control rounded" placeholder="Search Doctor Name or Email" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" name="search_doc" class="btn btn-secondary mycolor ms-2 rounded button1 border-0">search</button>
                            </form>
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
                                            <?php 
                                            if(isset($_POST["search_doc"])){
                                                $objects = view_doctors($_POST['search_data']);
                                            }
                                            else{
                                                $objects = view_doctors(null);
                                            }
                                            if($objects!=null){
                                              foreach($objects as $object){
                                              ?>
                                            <tr class="">
                                                <td class="text-dark"><?= $object->full_name?></td>
                                                <td class="text-dark"><?= $object->email?></td>
                                                <td class="text-dark"><?= $object->speciality?></td>
                                                <td class="text-dark">
                                                    <button class="btn mycolor button1 rounded-pill" onclick="show_doc_info('<?= $row['full_name']?>','<?= $row['email']?>','<?= $row['name']?>','<?= $row['phone']?>','<?= $row['photo']?>')" data-bs-toggle="modal" data-bs-target="#doctorss"><i class="mycolor uil uil-eye pe-1"></i>view</button>
                                                    <a href="?file=session&search_sess=<?= $object->full_name?>" class="btn mycolor button1 rounded-pill "><i class="mycolor uil uil-heart-rate pe-1"></i>Sessions</a>
                                                </td>
                                            </tr> 
                                            <?php }}else{ echo "no doctors today thank you";}
                                            ?>
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