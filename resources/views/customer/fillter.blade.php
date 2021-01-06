<div id="popup1" class="popup" style="display: none;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="customer_type" value="{{ $type }}">
    <input type="hidden" name="html_attr_search" id="html_attr_search">
    <div class="form-group form-inline" id="box_fillter" style="width: 600px">
        <div class="row dropdown-fillter">
            <div class="col-md-3 advan_fillter scroll_advance_attr text-left" id="popup_fillter" style="display: none;">
                @foreach($attr as $val)
                <div class="row">
                    <input type="checkbox" id="adv{{ $val->name }}" value="{{ $val->id_attribute }}">
                    <label class="attr_fillter" for="adv{{ $val->name }}">{{ $val->label }}</label>
                </div>
                @endforeach
            </div>
            <div class="scroll_fillter text-right col-md-12">
                <div class="row">
                    <label for="name" class="text-left col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <input style="width: 100%;" type="text" class="form-control" placeholder="Vd: My Name" name="name_fillter"
                        @if(isset($name))
                        value="{{ $name }}" 
                        @endif
                        >
                    </div>
                </div>
                <div class="row">
                    <label for="name" class="text-left col-md-3 control-label">Date modify</label>
                    <div class="col-md-4 date-midify">
                        <input type="date" class="form-control" name="fillter_from" 
                        @if(isset($from_date))
                        value="{{ $from_date }}" 
                        @endif
                        >
                    </div>
                    <div class="col-md-4 date-midify">
                        <input type="date" class="form-control" name="fillter_to"
                        @if(isset($to_date))
                        value="{{ $to_date }}" 
                        @endif
                        >
                    </div>
                </div>
                <div class="row">
                    <label for="name" class="text-left col-md-3 control-label">Status</label>
                    <div class="col-md-9 text-left" id="tag">
                         @foreach($tags as $tag)
                        <div class="tag" style="float:left;padding-top: 10px">
                          <input name="tag[]" type="checkbox" style="display: none" value="{{$tag->id_tag}}" id="tag_{{$tag->id_tag}}"
                            @if(isset($status) && $status != '' && in_array($tag->id_tag,$status))
                                checked
                            @endif
                          >
                          <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2"
                            data-color="{{$tag->id_color}}"
                             @if(isset($status) && $status != '' && in_array($tag->id_tag,$status))
                                style="background: {{$tag->id_color}};color:white"
                            @endif
                            >
                           <input type="hidden" value="0">
                           {{$tag->tag_name}}</label>&nbsp;&nbsp;
                         </div>
                         @endforeach
                     </div>
                 </div><br>
                 <input type="hidden" id="html_return" @isset($html_return) value="{{$html_return}}" @endisset >
                 <div class="attribute_fillter">

                 </div>
            </div>
        </div>
        <div id="form_save_fillter" class="text-center">
            <div class="save_popup">
                <div class="row" >
                    <label for="name" class="text-left col-md-3 control-label">Segment name</label>
                    <div class="col-md-9 text-left">
                        <input type="text" id="save_fillter_name" name="save_fillter_name" style="width: 100% ;" value="">
                    </div>
                </div>
                <b class="err_fillter"></b>
                <div class="row save_fillter">
                    <div class="col-sm-8" style="text-align: right;">
                        <input type="button" id="hide_form_save_fillter"  class="btn btn_back btn-no" value="CANCEL">
                    </div>
                    <div class="col-sm-4" style="text-align: center;">
                        <a type="button" id="btn_create_fillter" data_url="{{ URL::action('SearchController@save_fillter') }}" class="btn btn-primary">SAVE</a>
                    </div><br>

                </div>
            </div>
        </div>
        <div class="row footer_fillter">
            <div class="col-xs-3 text-left">
                <a  class="btn btn_filter show_advan" style="height: 40px;line-height: 40px;padding:0 20px">ADVANCED</a>
                <a class="hide_advan" style="display: none;margin: 0px;"></a>
            </div>
            <div class="col-xs-9 text-right">

                <a href="javascript:void(0)" id="show_form_save_fillter" class="text_1">SAVE SEGMENT</a>&nbsp&nbsp&nbsp
                <input type="button" id="btn_fillter_submit" data_url = "{{ URL::action('SearchController@fillter') }}" class="btn btn-primary btn_popup_fillter" value="SEARCH">

            </div>
        </div>
    </div>
</div>