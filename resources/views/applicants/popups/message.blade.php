<div class="modal" id="messageModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Send message to applicants</h4>
			</div>
			<form action="{{ url('notification/send') }}" id="message-form" method="post">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label for="country">Country</label>
						<select name="code" id="code" class="form-control">
							<option value="254" selected>+254 KE</option>
							<option value="256">+256 UG</option>
							<option value="255">+255 TZ</option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipients">Recipients<sup class="text-danger"> *</sup></label>
						<input type="text" class="form-control" name="contacts" id="recipients" placeholder="Separate you recipients by commas">
					</div>
					<div class="form-group">
						<label for="message">Message<sup class="text-danger"> *</sup></label>
						<textarea name="message" class="form-control" id="" cols="30" rows="10" placeholder="Enter the message you want send here"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-left">Available Credit<span id="credit"></span></div>
					{{-- <span class="pull-left">Available Credit: </span> --}}
					<button id="" data-dismiss="modal" class="btn btn-secondary">Close</button>
					<button id="btn-send-message" class="btn btn-success">Send</button>
				</div>
			</form>
		</div>
	</div>
</div>