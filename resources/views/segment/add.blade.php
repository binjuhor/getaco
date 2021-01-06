
<div class="row">
  <div class="col-md-3 " id="popup_fillter">
    @foreach($attributes as $val)
    <div class="row">
      <input type="checkbox" id="adv{{ $val->name }}" value="{{ $val->id_attribute }}">
      <label class="attr_fillter" for="adv{{ $val->name }}">{{ $val->label }}</label>
    </div>
    @endforeach
  </div>
  <div class="col-md-9 form_segment">
    <form id="form_sub_seg" action="{{URL::action('SegmentController@add')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="attribute_fillter scroll_fillter">
        <div class="form-group row">
          <label for="name" class="col-md-3 control-label" style="margin-top: 15px;">Segment name</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Enter your segment" name="save_fillter_name" required>
            <div id="notification"></div>
          </div>
        </div>
        <div class="row">
          <label for="name" class="text-left col-md-3 control-label">Status</label>
          <div class="col-md-9 text-left" id="tag">
            @foreach($tags as $tag)
            <div class="tag" style="float:left;padding-top: 10px">
              <input name="tag[]" type="checkbox" style="display: none" value="{{$tag->id_tag}}" id="tag_{{$tag->id_tag}}">
              <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2"
               data-color="{{$tag->id_color}}">
               <input type="hidden" value="0">
               {{$tag->tag_name}}</label>&nbsp;&nbsp;
             </div>
             @endforeach
           </div>
         </div>
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
              <li><input type="checkbox" name="customer_from[]" id="{{md5($value->id_form)}}" value="{{$value->id_form}}"> <label class="from_label" for="{{md5($value->id_form)}}">{{$value->form_name}}</label></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="form-group row custom_segment">
        <label for="name" class="col-md-7 control-label text-right">Manual selection</label>
        <div class="col-md-5">
          <input type="checkbox" name="segment_type" id="custom_segment" value="custom_segment">
          <label for="custom_segment"></label>
        </div>
      </div>
      <div class="form-group row text-center">
        <input id="btn_add_seg" type="submit" class="btn btn-primary" value="Add segment">
      </div>
    </form>
  </div>
</div>
