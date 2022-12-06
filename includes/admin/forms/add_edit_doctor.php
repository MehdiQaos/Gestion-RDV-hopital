<div class="modal fade" id="modal-doctor">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST" name="form_add_doctor">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="add-title">Add New Doctor</h5>
                                    <h5 class="modal-title d-none" id="edit-title">Edit Doctor</h5>
                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                </div>
                                <div class="modal-body">
                                        <input type="hidden" id="doctor-id">
                                        <div class="mb-3">
                                            <label class="form-label">Doctor Name</label>
                                            <input type="text" name="doctorname" class="form-control" id="doctor-name"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Picture</label>
                                            <input type="file" name="doctor-pic" class="form-control" id="doctorpic" accept="jpg , jpeg , png"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="doctoremail" class="form-control" id="doctor-email"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Speciality</label>
                                            <input type="text" name="speciality" class="form-control" id="doctor-speciality"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" name="doctorpassword" class="form-control" id="doctorpassword"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="doctornumber" class="form-control" id="doctornumber"/>
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" name="updateDoctor" class="btn mycolor button1 d-none" id="doctor-update-btn">update</button>
                                    <button type="submit" name="saveDoctor" class="btn mycolor button1" id="doctor-save-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>