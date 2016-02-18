<div class = "row">
	<div class = "col-md-8">
		<div class = "form-group">
			<label for = "title" class = "col-md-2 control-label">
				Title
			</label>
			<div class = "col-md-10">
				<input type = "text" class = "form-control" name = "title" autofocus id = "title" value = "{{ $title }}"><br />
			</div>
		</div>
		<div class = "form-group">
			<label for = "subtitle" class = "col-md-2 control-label">
				Subtitle
			</label>
			<div class = "col-md-10">
				<input type = "text" class = "form-control" name = "subtitle"
				id = "subtitle" value = "{{ $subtitle }}"><br />
			</div>
		</div>
		<div class = "form-group">
			<label for = "page_image" class = "col-md-2 control-label">
				Page Image
			</label>
			<div class = "col-md-10">
				<div class = "row">
					<div class = "col-md-6">
						<input type = "text" class = "form-control" name = "page_image"
							id = "page_image" onchange = "handle_image_change()"
							alt = "Image thumbnail" value = "{{ $page_image }}"><br />
						<div class = "visible-sm space-2"></div>
					</div>
					<script>
						function handle_image_change() {
							$("#page-image-preview").attr("src", function() {
								var value = $("#page_image").val();
								if (!value){
									value = {!! json_encode(config("blog.page_image")) !!};
									if (value == null) {
										value = "";
									}
								}
								if (value.substr(0, 4) != "http" &&
										value.substr(0, 1) != "/"){
									value = {!! json_encode(config("blog.uploads.webpath")) !!}
										+ "/" + value;
								}
								return values;
							});
						}
					</script>
					<div class = "col-md-4 text-right">
						<img src = "{{ page_image($page_image) }}" class = "img img_responsive"
						id = "page-image-preview" style = "max-height:40px;"><br />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class = "col-md-8">
		<div class = "form-group">
				<label for = "content" class = "col-md-2 control-label">
				Content
			</label>
			<div class = "col-md-10">
				<textarea class = "form-control" name = "content" rows = "14"
					id = "content">{{ $content }}</textarea><br />
			</div>
		</div>
	</div>
	<div class = "col-md-8">
		<div class = "form-group">
			<label for = "publish_date" class = "col-md-2 control-label">
				Pub Date
			</label>
			<div class = "col-md-10">
				<input class = "form-contol" name = "publish_date" id = "publish_date"
				type = "text" value = "{{ $publish_date }}"><br /><br />
			</div>
		</div>
		<div class = "form-group">
			<label for = "publish_time" class = "col-md-2 control-label">
				Pub Time
			</label>
			<div class = "col-md-10">
				<input class = "form-control" name = "publish_time" id = "publish_time"
					type = "text" value = "{{ $publish_time }}">
			</div>
		</div>
		<div class = "form-group">
			<div class = "col-md-10 col-md-offset-3">
				<div class = "checkbox">
					<label>
						<input {{ checked($is_draft) }} type = "checkbox" name = "is_draft">
						Draft?
					</label>
				</div>
			</div>
		</div>
		<div class = "form-group">
			<label for = "tags" class = "col-md-2 control-label">
				Tags
			</label>
			<div class = "col-md-10">
				<select name = "tags[]" id = "tags" class = "form-control" multiple>
					@foreach ($allTags as $tag)
						<option @if (in_array($tag, $tags)) selected @endif
						value = "{{ $tag }}">
							{{ $tag }}
						</option>
					@endforeach
				</select><br />
			</div>
		</div>
		<div class = "form-group">
			<label for = "layout" class = "col-md-2 control-label">
				Layout
			</label>
			<div class = "col-md-10">
				<input type = "text" class = "form-control" name = "layout"
					id = "layout" value = "{{ $layout }}" ><br />
			</div>
		</div>
		<div class = "form-group">
			<label for = "meta_description" class = "col-md-2 control-label">
				Meta
			</label>
			<div class = "col-md-10">
				<textarea class = "form-control" name = "meta_description"
					id = "meta_description" row "6">{{ $meta_description }}</textarea><br />
			</div>
		</div>
	</div>
</div>
