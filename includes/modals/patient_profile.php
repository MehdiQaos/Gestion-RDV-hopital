<div class="modal fade" id="edit_profile_patient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				
				<form enctype="multipart/form-data" action="" method="post">
					
					
					
				    <div class="row">
					<?php $rows = view_patient_by_patient();
				 foreach($rows as $row){
				?>
						<div class="rounded-circle w-90px col-6"><img class="rounded-circle" id="profile_image" style="width:100px"  src="img/photos/<?= $row["photo"]?>" alt=""></div>
						<div class="pt-4 col-6">
						
						<input class="form-control form-control-x-sm w-90px " name="edit_photo" onchange="loadFile(event);" accept="image/png, image/jpeg, image/jpg" type="file">
						</div>
                    </div>
					<input type="text" class="form-control mt-3" name="edit_email" id="full_edit"   placeholder="Full Name" value="<?= $row["full_name"]?>">
					<input type="text" class="form-control mt-3" name="edit_email" id="email_edit"   placeholder="E-mail" value="<?= $row["email"]?>">
					<input type="phone" class="form-control mt-3" name="edit_email" id="phone_edit"   placeholder="Phone Number" value="<?= $row["phone"]?>">
					<input type="date" class="form-control mt-3" name="edit_email" id="birth_edit"   placeholder="Birthday" value="<?= $row["birthday"]?>">
					<input type="text" class="form-control mt-3" name="edit_email" id="cin_edit"   placeholder="CIN" value="<?= $row["cin"]?>">
					<input type="password" class="form-control mt-3" id="current_pass3" name="pass"  placeholder="New Password">
					<input type="password" class="form-control mt-3" id="current_pass3" name="curent_pass"  placeholder="Current password" >
					<input type="hidden" id="hdn_pass" name="curent_pass_real"value="<?= $row["password"]?>">
					
                <?php } ?>
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
			<div class="modal fade" id="show_profile_patient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<?php $rows = view_patient_by_patient();
				 foreach($rows as $row){
				?>
				    <div class="row justify-content-center">
						<div class="rounded-circle w-90px col-12"><img class="rounded-circle" id="profile_image" style="width:100px"  src="img/photos/<?= $row["photo"]?>" alt=""></div>
                    </div>
					<label class="mt-1 mb-0" for="email">Full Name :</label>
					<input type="text" class="form-control mt-1" name="edit_email" id="full_edit"   value="<?= $row["full_name"]?>" readonly>
					<label class="mt-1 mb-0" for="email">Email :</label>
					<input type="text" class="form-control mt-1" name="edit_email" id="email_edit"    value="<?= $row["email"]?>"  readonly>
					<label class="mt-1 mb-0" for="email">Phone Number :</label>
					<input type="phone" class="form-control mt-1" name="edit_email" id="phone_edit"   value="<?= $row["phone"]?>"  readonly>
					<label class="mt-1 mb-0" for="email">Birthday :</label>
					<input type="date" class="form-control mt-1" name="edit_email" id="birth_edit"   value="<?= $row["birthday"]?>"  readonly>
					<label class="mt-1 mb-0" for="email">CIN :</label>
					<input type="text" class="form-control mt-1" name="edit_email" id="cin_edit"   value="<?= $row["cin"]?>" readonly>
				</div>
				<?php } ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
</div>