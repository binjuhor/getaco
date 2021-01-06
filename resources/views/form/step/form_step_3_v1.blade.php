<!-- step 3 old -->
<div class="step step3" style="display: none;">

	<div class="row" style="margin: 10px 0px;">
		<div class="name_form col-sm-6">
			<div class="row">
				<label class="col-sm-4" for="">Form name</label>
				<div class="col-sm-8">
					<input type="text" @if(isset($form_edit)) value="{{$form_edit->form_name}}" @endif class="form-control" id="name_form" required="required">
				</div>
			</div>
		</div>
	</div>
	<!-- select type field -->
	<div class="row hidden" style="position: relative;" >
		<div class="col-sm-12" >
			<label style="float: left;">Basic info:</label>
			<!-- basic field -->
			<!-- Name -->
			<div class="icon" data-type="name" style="float: left;">
				<i class="fas fa-user" title="name"></i>
			</div>
			<!-- Email Customer -->
			<div class="icon" data-type="email_customer" style="float: left;">
				<i class="fas fa-at" title="Email Address"></i>
			</div>
			<!-- Phone number -->
			<div class="icon" data-type="phone" style="float: left;">
				<i class="fas fa-phone" title="Phone number"></i>
			</div>
			<!-- dynamic field -->
			<label style="float: left; line-height: 30px;">Other:</label>
			<!-- type text -->
			<div class="icon" data-type="text" style="float: left;">
				<i class="fa fa-pencil-alt" title="text"></i>
			</div>
			<!-- type textarea -->
			<div class="icon" data-type="textarea" style="float: left;">
				<i title="textarea" class="fa fa-align-left"></i>
			</div>
			<!-- email -->
			<div class="icon" data-type="email" style="float: left;">
				<i class="far fa-envelope" title="Email"></i>
			</div>
			<!-- select -->
			<div class="icon" data-type="select" style="float: left; ">
				<i class="far fa-caret-square-down" title="Select"></i>
			</div>
			<!-- checkbox -->
			<div class="icon" data-type="checkbox" style="float: left; ">
				<i class="far fa-check-square" title="checkbox"></i>
			</div>
			<!-- radio -->
			<div class="icon" data-type="radio" style="float: left; ">
				<i class="far fa-check-circle" title="Radio"></i>
			</div>
			<!-- date -->
			<div class="icon" data-type="date" style="float: left; ">
				<i class="far fa-calendar " title="Date"></i>
			</div>
			<!-- time -->
			<div class="icon" data-type="time" style="float: left; ">
				<i class="far fa-clock" title="Time"></i>
			</div>
			<div class="icon" data-type="html" style="float: left; ">
				<i class="fa fa-code" title="Html text"></i>
			</div>

			<div class="icon" data-type="submit" style="float: left; ">
				<i class="far fa-paper-plane" title="Submit"></i>
			</div>
			<div class="icon" data-type="column" style="float: left; ">
				<i class="fa fa-columns" title="Column Layout"></i>
			</div>

			<div class="attribute" style="float: left;">
				<button class="btn btn-secondary" style="float: left;position: relative;border:1px solid gray" id="btn_attribute">Attribute:</button>
				<div id="list_attribute" style="position: absolute;z-index: 2;top:35px;background-color: #ddd;max-height: 400px;width: 200px;border: 1px solid gray;border-radius: 5px;height: 400px;overflow-y:scroll;display: none;">
					@foreach($attribute as $ab)
					<p style="margin: 5px 20px; color: black;border: 1px solid gray;padding: 5px;border-radius: 3px;cursor: pointer;" data-label="{{$ab['label']}}" data-name="{{$ab['name']}}" data-type="{{$ab['type']}}" data-id="{{$ab->id_attribute}}" data-option="{{$ab->options}}" >
						<b>{{$ab['label']}}
							<i class="fas fa-arrow-circle-right" style="float: right;line-height: 30px;">
							</i>
						</b>
					</p>
					@endforeach
				</div>
				
			</div>
		</div>
	</div>
	<!-- this is preview -->
	<button data-toggle="modal" data-target="#preview" class="btn btn_back btn_back_sm" style="height: 40px;line-height: 40px;margin-bottom:20px">preview</button>
	<div id="preview" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Preview Form</h4>
				</div>
				<div class="modal-body getacoEmbed" style="width: auto;overflow-x: scroll;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn_back btn_back_sm" style="height: 40px;line-height: 40px" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<?php $user = Auth::User() ?>
	<!-- form backend, form frondend -->
	<div class="row">
		<!-- form backend -->
		<div class="col-sm-6 backend">
			<div class="panel panel-default">
				<div class="panel-heading">
					Backend
					<i class="fas fa-cogs " style="float:right;font-size: 15px;margin: 0 10px" id="btn_style_form" title="Style Form"></i>
					<i class="fas fa-tags btn_label" style="float:right;font-size: 15px;margin: 0 10px" id="" title="hidden labels"></i>
					<i class="fas fa-audio-description edit_text_form" style="float:right;font-size: 15px;color: gray;margin: 0 10px;position: relative;" title="description" data-text="description"></i> 
					<i class="fas fa-heading edit_text_form" style="float:right;font-size: 15px;margin: 0 10px" title="header" data-text="header"></i> 
				</div>
				<div class="edit_text hidden" style="position: absolute;width: 300px;min-height: 150px;background-color: #ddd;z-index: 10;left: 500px;top:40px;padding: 10px;border: 1px solid gray;border-radius: 5px;">
					<textarea name="" id="" cols="30" rows="5" style="width: 100%;"></textarea>
					<input type="hidden" value="">
					<button class="btn btn-warning" style="float: right;">Update</button>
				</div>
				<div class="panel-body" style="height: 450px;max-height:450px; overflow-y: scroll; " id="formBackend">

				</div>
			</div>
		</div>
		<!-- form frontend -->
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Frontend
				</div>
				<div class="panel-body" style="height: 450px;max-height: 450px;overflow-y: scroll;">
					
					<div id="form_frontend" style="">
						
						<div class="content_form" id="frontend" style="border-radius: 10px;">
							
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div> <!-- end form-->
</div>