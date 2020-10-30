<div class="modal" id="comment-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title"><i class="fa fa-comment"></i> New Comment</h5>
			</div>
			<form action="#" id="frm-comment" class="form-horizontal" method="POST">
				<div class="modal-body">
					<label><i>You can select both recipients or one</i></label>
					<div class="row">
						<div class="col-md-6">
							<label for="to" class="control-label">To other Admin</label>
							<select class="form-control" name="admin_id" id="admin_id">
								<option value="">---------------Select admin---------------</option>
								@foreach ($admins as $admin)
									<option value="{{ $admin->id }}">{{ $admin->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-6">
							<label for="to" class="control-label">To User</label>
							<select class="form-control" name="user_id" id="user_id">
								<option value="">---------------Select user---------------</option>
								@foreach ($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<label for="Subject" class="control-label">Subject</label>
					<input type="text" name="subject" id="subject" class="form-control" value="">
					<label for="body" class="control-label">Body</label>
					<textarea class="form-control" name="body" id="body" rows="10"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="save-comment" class="btn btn-flat btn-primary">
						<i class="fa fa-paper-plane"></i> Send Message
					</button>
				</div>
			</form>
		</div>
	</div>
</div>