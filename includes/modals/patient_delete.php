<div class="modal fade" id="delete_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="d">Delete Account </h1>
					<button type="button"   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="includes/logout.php" method="post">
						<h4 class="text-danger">Confirm your Password to delete Account</h4>
					<input type="password" class="form-control mt-3" id="current_pass2"  placeholder="Current password" >
					<input type="hidden" id="hdn_session_pass2" value="">
					<span class="text-danger mt-2" id="match_cc_none"style="display:none"> Password don't match The current password !</span>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-light my-3 mycolor button1 px-4" id="delete_acc" name="delete_acc">Delete</button>
				</div>
				</div>
                </form>
			</div>
</div>