<div class="modal" id="loader" tabindex="-1" role="dialog" style="margin-top: 150px;">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="background: #fcf8e3;">
			<div class="modal-body text-center text-success">
				{{ $slot }}
				<img src="{{ asset('img/loading-image.gif') }}"> 
			</div>
		</div>
	</div>
</div>