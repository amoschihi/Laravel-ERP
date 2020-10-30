<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		@if ($app->notifications==1)
		function load_unseen_notifications(view = '')
		{
			$.post('{{ route('fetchComments') }}', {view:view}, function(data) {
				$('.dropdown-messages').html(data.notifications);
				if(data.unseen_notifications > 0) 
				{
					$('#c_count').html(data.unseen_notifications);
				}
			});
			$.post('{{ url('notification/get') }}', function(data) {
				$('.dropdown-alerts').html(data.output);
				if(data.count == 0) {
					$('#n_count').html('');
				}else {
					$('#n_count').html(data.count);
				}
			});
		}

		load_unseen_notifications();

		$('#c_dropdown').on('click',function() {
			$('#c_count').html('');
			load_unseen_notifications('yes');
		})
		$(document).on('click', '#n_dropdown', function() {
			$('#n_count').html('');
			$.post('{{ url('notification/read') }}', {userId: $('input[name=userId]').val()}, function(data) {

			});
		});
		setInterval(function() {
			load_unseen_notifications();
		}, 5000);
		@else
		$('.dropdown-alerts,.dropdown-messages').html('<li><a class="text-center" href="{{ url('admin/settings') }}"><strong>Notifications are turned off. Go to Settings</strong></a></li>');
		@endif

	});
</script>