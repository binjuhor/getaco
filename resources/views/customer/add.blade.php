@extends('layouts.app')

@section('content')
<style>
.popup{
    position: absolute;
    background: white;
    z-index: 10000;
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.25);
}
a.close{
    text-decoration: none;
    float: right;
}
</style>

<meta name="csrf-token" content="{!! Session::token() !!}">
<div class="row">
    <div class="row title_page">
        <div class="col-md-12 "><h2>Add lead</h2></div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{URL::action('CustomerController@add')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_company" id="id_company" value="{{ Auth::user()->id_company }}">
                    <input type="hidden" name="id_form" value="0">

                    <!-- set input attr -->
                    <div class="text-right icon_menu_attr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 3 13">
                            <path fill="#B2B2B2" fill-rule="nonzero" d="M0 11.5c0 .83.67 1.5 1.5 1.5S3 12.33 3 11.5 2.33 10 1.5 10 0 10.67 0 11.5zm0-10C0 2.33.67 3 1.5 3S3 2.33 3 1.5 2.33 0 1.5 0 0 .67 0 1.5zm0 5C0 7.33.67 8 1.5 8S3 7.33 3 6.5 2.33 5 1.5 5 0 5.67 0 6.5z"/>
                        </svg>
                        <div id="popup_attr" class="dropdown">
                            <ul class="dropdown-menu dropdown-menu-right">
                                @if(count($attributes) == 0)
                                <li class="text-center">No attribute</li>
                                @endif

                                @foreach ( $attributes as $index => $attribute )
                                <li class="attr_active row">
                                  <div class="icon">
                                      <input type="checkbox" id="{{ $attribute->name }}" name="{{ $attribute->name }}" value="{{ $attribute->id_attribute }}"
                                      @if($attribute->select == 1) checked="" @endif>
                                      <label  for="{{ $attribute->name }}" class="label label_attr"> </label>
                                  </div>
                                  <label class="lable label_format label_attr" for="{{ $attribute->name }}"  style="margin-top:5px !important">{{ $attribute->label }}</label>
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  <!-- end set input attr -->
                  <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Vd: BeauAgency" name="customer_name" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Phone</label>
                    <div class="col-md-10">
                        <input type="tel" class="form-control add_customer_input" id="customer_phone" placeholder="Vd: 0976264173" name="customer_phone" maxlength="12" minlength="9">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control add_customer_input" id="customer_email" placeholder="Vd: yourmail@example.com" name="customer_email" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Status</label>
                    <div class="col-md-10" id="tag">
                        @foreach($tags as $tag)
                        <div class="tag" style="float:left">
                          <input name="tag[]" type="checkbox" style="display: none" value="{{$tag->id_tag}}" id="tag_{{$tag->id_tag}}"
                          @foreach($tagCus as $key)
                          @if($tag['id_tag'] == $key['id_tag'])
                          checked="checked"
                          @endif
                          @endforeach>
                          <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2"
                           @foreach($color_tags as $key)
                           @if($tag['id_color'] == $key['id_color'])
                           style="background: {{$tag['id_color']}}"
                           @endif
                           @endforeach data-color="{{$tag->id_color}}">
                           <input type="hidden" value="0">
                           {{$tag->tag_name}}</label>&nbsp;&nbsp;
                         </div>
                         @endforeach
                     </div>
                 </div>

                 <div class="form-group row info add_segment">
                    <label for="" class="col-md-2 control-label">Segment</label>
                    <div class="status col-md-10 info_edit">
                        @foreach($segments as $segment)
                        <input type="checkbox" id="segment_{{$segment->id_segment}}" name="segment[]" value="{{$segment->id_segment}}">
                        <label for="segment_{{$segment->id_segment}}">{{$segment->segment_name}}</label><br>
                        @endforeach
                    </div>
                </div>

                @foreach ( $attributes as $index => $attribute )
                    @if($attribute->select == 1)
                        @switch( $attribute->type )
                        @case('textarea')
                        <div class="form-group row" id="{{ $attribute->name }}">
                            <label for="name" class="col-md-2 control-label">{{ $attribute->label }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="customer_attr[{{$attribute->name}}]"></textarea>
                            </div>
                        </div>
                        @break

                        @case('select')
                        <div class="form-group row" id="{{ $attribute->name }}">
                            <label for="select_{{md5($attribute->label)}}" class="col-md-2 control-label">{{ $attribute->label }}</label>
                            <div class="col-md-10">
                                <select id="select_{{md5($attribute->label)}}"  class="form-control" name="customer_attr[{{$attribute->name}}]">
                                    @foreach ( $attribute->options as $key => $option )
                                        @if($option->option_value == "getaco_default")
                                            <option disabled selected>{{$option->option_name}}</option>
                                        @else
                                            <option value="{{$option->option_value}}">{{$option->option_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @break

                        @case('radio')
                        <div class="form-group row" id="{{ $attribute->name }}">
                            <label class="col-md-2 control-label">{{ $attribute->label }}</label>
                            <div class="col-md-10">
                                @foreach ( $attribute->options as $key => $option )
                                <input id="radio_{{md5($key.$option->option_name)}}"
                                name="customer_attr[{{$attribute->name}}]"
                                type="{{$attribute->type}}"
                                value="{{$option->option_value}}">
                                <label for="radio_{{md5($key.$option->option_name)}}">{{$option->option_name}}</label>
                                @endforeach
                            </div>
                        </div>
                        @break

                        @case('checkbox')
                        <div class="form-group row" id="{{ $attribute->name }}">
                            <label class="col-md-2 control-label">{{ $attribute->label }}</label>
                            <div class="col-md-10">
                                @foreach ( $attribute->options as $key => $option )
                                <input id="checkbox_{{md5($key.$option->option_name)}}"
                                name="customer_attr[{{$attribute->name}}][]"
                                type="{{$attribute->type}}"
                                value="{{$option->option_value}}">
                                <label for="checkbox_{{md5($key.$option->option_name)}}">{{$option->option_name}}</label>
                                @endforeach
                            </div>
                        </div>
                        @break

                        @default
                        <div class="form-group row" id="{{ $attribute->name }}">
                            <label class="col-md-2 control-label">{{ $attribute->label }}</label>
                            <div class="col-md-10">
                                <input type="{{$attribute->type}}" class="form-control"
                                placeholder="{{ $attribute->label }}"
                                name="customer_attr[{{$attribute->name}}]">
                            </div>
                        </div>
                        @endswitch
                    @endif
                @endforeach

                <div id="select_input_attr"></div>


                <div class="form-group row">
                    <div class="col-md-6 col-md-offset-2">
                        <button type="submit" id="btn_submit" class="btn btn-primary">
                            Add Lead
                        </button>
                    </div>
                </div>
                <!-- thong bao trung thong itn -->
                <div class="modal fade" id="customer_modal" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body modal_import_status">
                          <h3>Thông báo !</h3>
                          <p style="font-size: 15px;font-weight: 600;color:#ff4669;" id="text_notification"></p>
                          <p style="font-size: 15px;font-weight: 600;" id="text_question"></p>
                      </div>
                      <div class="modal-footer" style="text-align: center;,border-top: 2px solid #e5e5e5;">
                          <button type="button" class="btn btn_filter down_example" data-dismiss="modal" style="height: 40px;
                          line-height:40px; font-size: 12px;">CENCEL</button>
                          <a href="#" id="leave_detail" class="btn btn-primary" style="height: 40px;
                          line-height:40px; font-size: 12px;">LEAVE</a>
                      </div>
                  </div>
              </div>
          </div>
          <!--end thong bao trung thong itn -->

    </form>
</div>
</div>
</div>

</div>
@endsection
@section('extra_footer')
<script type="text/javascript" src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
<script>
    var url_set_attr = "{{ URL::action('CustomerAttributeController@selected') }}";
    var url_check_customer = "{{ URL::action('CustomerController@checkIsset') }}";
    var detail_url = "{{ URL::action('CustomerController@detail') }}";
</script>
<script type="text/javascript" src="{{ asset('/js/customer/addCustomer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/embed/validation.js') }}"></script>
@endsection
