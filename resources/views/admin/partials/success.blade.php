@if (Session::has("success"))
	<div class = "alert alert-success">
		<button type = "button" class = "close" data-dismiss = "alert">×</button>
		<strong>
			<i class = "fafa-check-circle fa-lg fa-fw"></i> Success.
		</strong>
		{{ Session::get("success") }}
	</div>
@endif
