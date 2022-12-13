<section id="doctors">
                    <h3  class="fw-bold
                  mb-5" style="color: #007A69;"><i class="uil uil-medkit me-2 fs-4" ></i>Doctors</h3>
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2">All Doctors(0)</p>
                            <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="add-doctor-btn"><i class="uil uil-plus mycolor" onclick=""></i>&emsp; Add Doctor</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <tr class="">
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
                                                    <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="update-btn"><i class="mycolor me-1 uil uil-pen"></i>Edit</button>
                                                    <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#view-doctor" id="view-doctor-btn"><i class="mycolor me-1 uil uil-eye"></i>view</button>
                                                    <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-doctor" id="remove-btn"><i class="mycolor me-1 uil uil-trash"></i>remove</button>
                                                </td>
                                            </tr>     
                                           </table>
                         </div>
</section>