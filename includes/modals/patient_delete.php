<div class="modal fade" id="delete_account">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="d">Delete Account </h1>
					<button type="button"   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<?php $rows = view_patient_by_patient();
				    foreach($rows as $row){
					}?>
					<form action="" method="post">
						<h4 class="text-danger">Confirm your Password to delete Account</h4>
					<input type="password" class="form-control mt-3" id="current_pass2" name="curent_pass"  placeholder="Current password" >
					<input type="hidden" name="real_pass" value="<?= $row["password"];?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-light my-3 mycolor button1 px-4" id="delete_acc" name="delete_acc">Delete</button>
				</div>
				</div>
                </form>
			</div>
</div>