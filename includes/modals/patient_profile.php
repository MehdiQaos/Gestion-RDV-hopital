<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- need documentation  -->
				<form enctype="multipart/form-data" action="" method="post">
					<!-- need documentation  -->
					
				    <div class="row">
						<div class="rounded-circle w-90px col-6"><img class="rounded-circle" id="profile_image" style="width:100px"  src="assets/img/user/" alt=""></div>
						<div class="pt-4 col-6">
						
						<input class="form-control form-control-x-sm w-90px " name="edit_photo" onchange="loadFile(event);" accept="image/png, image/jpeg, image/jpg" type="file">
						</div>
                    </div>
					<input type="text" class="form-control mt-3" name="edit_email" id="full_edit"   placeholder="Full Name" value="">
					<input type="text" class="form-control mt-3" name="edit_email" id="email_edit"   placeholder="E-mail" value="">
					<input type="phone" class="form-control mt-3" name="edit_email" id="phone_edit"   placeholder="Phone Number" value="">
					<input type="date" class="form-control mt-3" name="edit_email" id="birth_edit"   placeholder="Birthday" value="">
					<input type="text" class="form-control mt-3" name="edit_email" id="cin_edit"   placeholder="CIN" value="">
					<span class="text-danger mt-2" id="match_email_none"style="display:none">Most be valid email</span>
					<input type="password" class="form-control mt-3" id="current_pass3" name="confirm_pass"  placeholder="Current password" >
					<span class="text-danger mt-2" id="match_c3_none"style="display:none"> Password don't match The current password !</span>
					<input type="hidden" id="hdn_session_pass3" value="">
					
                
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="profile_edit" id="profile_edit_btn" class="btn btn-light my-3 mycolor button1 px-4" >Edit</button>
				</div>
				</div>
				</form> 
			</div>
			</div>
			<!-- end modal -->