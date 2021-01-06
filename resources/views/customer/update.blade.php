<form action="{{action('CustomerController@update')}}"
    class="form-horizonal form-row-seperated" method="POST"
    enctype="multipart/form-data" >
<div class="detail_customer tab_edit" style="display: none">
    
    <div class="id_tag">
    </div>
    <div class="tag_comment hidden">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_customer" value="{{$customer->id_customer}}">
    <input type="hidden" name="id_company" value="{{ Auth::user()->id_company }}">
    <div class="info_content">
        <div class="row avata_detail_customer">
                    <span class="name">{{ $name }} </span>
                    <div class="mail">
                        <div class="name">@empty($customer['customer_name']) N/A @endempty {{$customer['customer_name']}}</div>
                        <div class="email">@empty($customer['customer_email']) N/A @endempty {{$customer['customer_email']}}</div>
                    </div>
                </div>
        <div class="field">
            <div class="row info_customer">
                <label for="" class="col-md-3 form-label">Name</label>
                <div class="col-md-9 info_edit">
                    <input type="text" class="form-control" value="{{$customer->customer_name}}" name="customer_name">
                </div>
            </div>
        </div>
        <div class="field">
            <div class="row info_customer">
                <label for="" class="col-md-3 form-label">Phone</label>
                <div class="col-md-9 info_edit">
                    <input type="tel" class="form-control" value="{{$customer->customer_phone}}" name="customer_phone" minlength="9" maxlength="12" >
                </div>
            </div>
        </div>
        <div class="field">
            <div class="row info_customer">
                <label for="" class="col-md-3 form-label">Email</label>
                <div class="col-md-9 info_edit">
                    <input type="text" class="form-control" value="{{$customer->customer_email}}" name="customer_email">
                </div>
            </div>
        </div>
            <div class="field">
                <div class="row info info_customer">
                    <label for="" class="col-md-3 form-label " >Status</label>
                    <div class="status col-md-9 info_edit" id="tag">
                         @foreach($tags as $tag)
                        <div class="tag" style="float:left;margin:3px;font-size: 12px;">
                          <input name="tag[]" type="checkbox" style="display: none" value="{{$tag->id_tag}}" id="tag_{{$tag->id_tag}}"
                          @foreach($tagCus as $key)
                          @if($tag['id_tag'] == $key['id_tag'])
                          checked="checked"
                          @endif
                          @endforeach>
                          <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2"
                           @foreach($tagCus as $key)
                              @if($tag['id_tag'] == $key['id_tag'])
                                style="background: {{$tag['id_color']}};color:white"
                              @endif
                           @endforeach data-color="{{$tag->id_color}}">
                           <input type="hidden" value="0">
                           {{$tag->tag_name}}</label>&nbsp;&nbsp;
                         </div>
                         @endforeach
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="row info_customer ">
                    <label for="" class="col-md-3 control-label">Segment</label>
                    <div class="segment col-md-9 info_edit" id="tag">
                        @foreach($segments as $segment)
                          @if($segment->type == 'custom_segment')
                            <div class="row">
                                <div class="icon col-md-10">
                                    <input type="checkbox" id="segment_{{$segment->id_segment}}" name="segment[]" value="{{$segment->id_segment}}"
                                    @foreach($segCus as $key)
                                    @if($segment['id_segment'] == $key['id_segment'])
                                    checked
                                    @endif
                                    @endforeach>
                                    <label for="segment_{{$segment->id_segment}}">{{$segment->segment_name}}</label><br>
                                </div>
                            </div>
                          @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="attribute_group">
                    @include("customer.load_attribute")
            </div>
             <div class="form-group row edit_information text-center">
            <div class="row" id="box_popup_select_attr" >
                <div class="col-md-12 info_edit box_popup_select_attr">
                    <a href="javascript:void(0)" class="btn_add_attr_edit">ADD ATTRIBUTE</a>
                    <div class="popup_select_attr" style="padding:5px 0 15px 0">
                        @foreach ( $attributes as $index => $attribute )
                        <div class="row ajax_attr" data-id="{{ $attribute->name }}">
                            <div class="icon col-md-2">
                              <input type="checkbox" id="input_{{ $attribute->name }}" name="ajax_attr" value="{{ $attribute->id_attribute }}"
                              @if ($customer->dynamicValue($attribute->name, $customer->id_customer) || $attribute->show_edit==1) checked @endif>
                              <label  for="input_{{ $attribute->name }}" class="label label_attr"> </label>
                          </div>
                          <label for="input_{{ $attribute->name }}" class="col-md-10 text-left" style="margin-top:13px">{{ $attribute->label }}</label>
                      </div>
                      @endforeach
                    </div>
                </div>
            </div>
            
        </div>
         </div>
        
</div>
<div class="button_acction row">
    <div class="left col-md-6">
        <button type="reset" value="Cancel" class="btn btn_cancel btn_back_sm" style="float: right;">Cancel</button>
    </div>
    <div class="col-sm-6">
        <button type="submit" class="btn btn_save btn-primary-sm">SAVE</button>
    </div>
</div>
</form>

