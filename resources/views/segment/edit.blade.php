
<div class="row">
  <div class="col-md-3" id="popup_fillter">
    @foreach($attributes as $val)
    <div class="row">
      <input type="checkbox"
      @if(in_array($val->name,$attr))
      checked
      @endif
      id="adv{{ $val->name }}" value="{{ $val->id_attribute }}">
      <label class="attr_fillter" for="adv{{ $val->name }}">{{ $val->label }}</label>
    </div>
    @endforeach
  </div>
  <div class="col-md-9 form_segment">
    <form id="form_sub_seg" action="{{URL::action('SegmentController@add')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id_segment" value="{{$segments->id_segment}}">
      <div class="attribute_fillter scroll_fillter">
        <div class="form-group row">
          <label for="name" class="col-md-3 control-label" style="margin-top: 15px;">Segment name</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Enter your segment" name="save_fillter_name" id="segment_name" value="{{ $segments->segment_name }}" required>
            <div id="notification"></div>
          </div>
        </div>
        <div class="row">
          <label for="name" class="text-left col-md-3 control-label">Status</label>
          <div class="col-md-9 text-left" id="tag">
            @foreach($tags as $tag)
            <div class="tag" style="float:left;padding-top: 10px">
              <input name="tag[]" type="checkbox" style="display: none" value="{{$tag->id_tag}}" id="tag_{{$tag->id_tag}}"
              @if(isset($segment_value->tag))
              @if(in_array($tag->id_tag,$segment_value->tag))
              checked
              @endif
              @endif
              >
              <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2"
                data-color="{{$tag->id_color}}"
                @if(isset($segment_value->tag))
                @if(in_array($tag->id_tag,$segment_value->tag))
                style="background: {{$tag->id_color}} ;color: #fff;"
                @endif
                @endif
                >
                {{$tag->tag_name}}</label>&nbsp;&nbsp;
              </div>
              @endforeach
            </div>
          </div><br>
          <div class="row">
          <label for="name" class="text-left col-md-3 control-label">Customer from</label>
          <div class="col-md-9 text-left">
            <div class="text-left from_feild" style="overflow: hidden;">
              <a href="javascript:void(0)" class="add_from"><span class="glyphicon glyphicon-plus"></span></a>

            </div>
            <ul class="list_from">
              <li><input type="checkbox" name="customer_from[]" id="from_add" value="add"> <label class="from_label" for="from_add">Add</label></li>
              <li><input type="checkbox" name="customer_from[]" id="from_import" value="import"> <label class="from_label" for="from_import">Import</label></li>
              @foreach($form as $value)
              <li><input type="checkbox" name="customer_from[]" id="from_{{$value->id_form}}" value="{{$value->id_form}}"> <label class="from_label" for="from_{{$value->id_form}}">{{$value->form_name}}</label></li>
              @endforeach
            </ul>
          </div>
        </div>
         <!-- attr -->
         @foreach ( $attribute as $index => $attribute )
         @if($attribute->type == "radio" || $attribute->type == "select")
         <div class="form-group row adv{{$attribute->name}}">
          <label class="col-md-3 control-label">{{ $attribute->label }}</label>
          <div class="col-md-9">
            @foreach ( $attribute->options as $key => $option )
            <input style="width: 100%;"
            @if(!empty($segment_value->radio))
            @foreach($segment_value->radio as $key => $val)
            @if($attribute->name == $key && in_array($option->option_value,$val))
              checked
            @endif
            @endforeach
            @endif
            type="checkbox" name="attr_fillter_radio[{{$attribute->name}}][]" id="radio_fillter{{md5($key.$option->option_name)}}" class="form-control" value="{{$option->option_value}}">
            <label class="attr_fillter" for="radio_fillter{{md5($key.$option->option_name)}}">{{$option->option_name}}</label>
            @endforeach
          </div>
        </div>
        @elseif($attribute->type == "checkbox")
        <div class="row form-group adv{{$attribute->name}}">
          <label for="name" class="text-left col-md-3 control-label">{{$attribute->label}}</label>
          <div class="col-md-9 text-left">
            @foreach ( $attribute->options as $key => $option )
            <input style="width: 100%;"
            @if(!empty($segment_value->checkbox))
            @foreach($segment_value->checkbox as $key => $val)
            @if($attribute->name == $key && in_array($option->option_value,$val))
              checked
            @endif
            @endforeach
            @endif
            type="checkbox" name="attr_fillter_checkbox[{{$attribute->name}}][]" id="checkbox_fillter{{md5($key.$option->option_name)}}" class="form-control" 
            value="{{$option->option_value}}">
            <label class="attr_fillter" for="checkbox_fillter{{md5($key.$option->option_name)}}">{{$option->option_name}}</label>
            @endforeach
          </div>
        </div>
        @else
        <div class="row form-group adv{{$attribute->name}}">
          <label for="name" class="text-left col-md-3 control-label">{{$attribute->label}}</label>
          <div class="col-md-9 text-left">
            <input type="checkbox"
            @if(!empty($segment_value->text))
            @if(in_array($attribute->name , $segment_value->text))
              checked
            @endif
            @endif
            id="attr_fillter{{$attribute->name}}" name="attr_fillter_text[]" value="{{$attribute->name}}">
            <label class="attr_fillter" for="attr_fillter{{$attribute->name}}"></label>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="form-group row custom_segment">
        <label for="name" class="col-md-7 control-label text-right">Manual selection</label>
        <div class="col-md-5">
          <input type="checkbox" name="segment_type" id="custom_segment" value="custom_segment"
          @if($segments->type == 'custom_segment')
            checked
          @endif
          >
          <label for="custom_segment"></label>
        </div>
      </div>
      <!-- end attr -->
      <div class="form-group row text-center">
        <button type="submit" class="btn btn-primary">
          Edit Segment
        </button>
      </div>
    </form>
  </div>
</div>
<script>
  var option = <?php  if(isset($segments->option)) {echo json_encode($segments->option);}else{echo 0;} ?>;
  var form = jQuery.parseJSON(option);
  $.each(form['from'],function (index,value) {
      $('#from_'+value+'').closest('li').find('label').click();
  });  
</script>




