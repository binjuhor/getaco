<div class="step step3" style="display: none;">
	@if(isset($form_edit))
	<input type="hidden" value="{{$form_edit->source}}" id="source_form_edit">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		@if(isset($key))
			<script>
				var source = $('#source_form_edit').val();
				var source2 = 
				`<div class="step_form row" id="step_form_1">
					<div class="content_form col-md-8  col-sm-offset-2">
						`+source+`
						<div class="field_frontend"></div>
					</div>
					<div class="setting_form col-md-8  col-sm-offset-2">
						<span class="style_background" ><img src="{{ asset('/iconSVG/shape-copy.svg')}}" alt="">Style Background</span>
						<span class="mid add_step"><img src="{{ asset('/iconSVG/clone-copy.svg')}}" alt="">Add step</span>
						<span class="delete_step"><img src="{{ asset('/iconSVG/delete-1487-copy-3.svg')}}" alt="">Delete</span>
					</div>
				</div>`
				$('.step3').html(source2);
			</script>
		@else
		<script>
			var source = $('#source_form_edit').val();
			$('.step3').html(source);
		</script>
		@endif
	@else
	<div class="step_form row" id="step_form_1">
		<div class="content_form" style="width: 567px;margin-left: 200px">
			<div class="first_content">
				<img src="{{ asset('/images/undraw-setup-obqo.svg')}}" alt="">
				<h3>Drag drop the tools to use</h3>
				<p>The provided tool provided will support you <br> create a perfect form</p>
			</div>
			<div class="field_frontend"></div>
		</div>
		<div class="setting_form col-md-8  col-sm-offset-2">
			<span class="style_background" ><img src="{{ asset('/iconSVG/shape-copy.svg')}}" alt="">Style All Form</span>
			<span class="mid add_step"><img src="{{ asset('/iconSVG/clone-copy.svg')}}" alt="">Add step</span>
			<span class="delete_step"><img src="{{ asset('/iconSVG/delete-1487-copy-3.svg')}}" alt="">Delete</span>
		</div>
	</div>
	@endif
</div>
<div class="modal fade" id="preview_step3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
      
    </div>
  </div>
  