@extends('layouts.app')
@section('extra_header')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}" type="text/css">
<!-- Fonts -->
@endsection
@section('content')

<style>
.popup{
    position: absolute;
    background: white;
    z-index: 10000;
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.25);
}
#background{
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1000;
}
a.close{
    text-decoration: none;
    float: right;
}
</style>
<div class="row header_list">
    <form id="list_customer_form" action=""  method="POST">
        <div class="col-lg-6">
            <h2>
                @if(isset($segment))
                    {{ $segment->segment_name }}
                    <input type="hidden" name="id_segment" value="{{ $segment->id_segment }}">
                @else
                    {{ Request::is('app/customer/customer*') ? 'Customer management' : (Request::is('app/search*') ?'Search result':'Lead management') }}
                @endif
            </h2></div>
            <div class="col-lg-6 text-right">
                @can('owner')
                <div class="dropdown" style="top:23px;">
                    <p class="dropdown_excel" data-toggle="dropdown" ></p>
                    <ul class="dropdown-menu dropdown-menu-right drop_excel_conten">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <li>
                            <a class="text-center btn_export" id="export" data_url="{{ URL::action('ExportController@CustomerExport') }}" href="javascript:void(0)">Export</a>
                        </li>
                        @if(isset($segment))
                            @if($segment->type != 'segment')
                                <li><a class="btn_import" href="{{ action('ExportController@index',$type) }}" id="export">Import</a></li>
                            @endif
                        @else
                            <li><a class="btn_import" href="{{ action('ExportController@index',$type) }}" id="export">Import</a></li>
                        @endif
                        
                    </ul>
                </div>
                @endcan
                <a href="javascript:void(0)" id="button1" class=" btn btn_filter"><img src="" alt="">Fillter</a>
                <!-- popup fillter -->
                @include('customer.fillter')
                <!-- end poopup fillter -->
                <div id="background"></div>
                @if(isset($segment))
                    @if($segment->type != 'segment')
                        <a href="{{action('CustomerController@add')}}" class="btn btn-primary"><img src="" alt="">ADD LEAD</a>
                    @endif
                @else
                    <a href="{{action('CustomerController@add')}}" class="btn btn-primary"><img src="" alt="">ADD LEAD</a>
                @endif
            </div>
        </form>
    </div>
        <div class="row content_table">
            <div class="col-md-12">
                <table class="table" id="table_format">
                    <thead>
                        <tr>
                            <th class="text-left">NAME</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">EMAIL</th>
                            <th class="text-left">MODIFY</th>
                            @foreach ($attributes as $key => $attribute )
                            <th class="text-left">{{ $attribute->label }}</th>
                            @endforeach
                            <th class="text-left">STATUS</th>
                            <th class="text-center" >ACTION</th>
                            <div class="text-right icon_menu_attr" style="position:absolute;z-index: 1;right:20px;top:15px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 3 13">
                                    <path fill="#B2B2B2" fill-rule="nonzero" d="M0 11.5c0 .83.67 1.5 1.5 1.5S3 12.33 3 11.5 2.33 10 1.5 10 0 10.67 0 11.5zm0-10C0 2.33.67 3 1.5 3S3 2.33 3 1.5 2.33 0 1.5 0 0 .67 0 1.5zm0 5C0 7.33.67 8 1.5 8S3 7.33 3 6.5 2.33 5 1.5 5 0 5.67 0 6.5z"/>
                                </svg>
                                <div id="popup_attr" class="dropdown">
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if(count($attr) == 0)
                                        <li class="text-center">No data</li>
                                        @else
                                        @foreach($attr as $val)
                                        <li class="attr_active row">

                                          <div class="icon">
                                              <input type="checkbox" id="{{ $val->name }}" name="{{ $val->name }}" value="{{ $val->id_attribute }}"
                                              @if($val->status == 1) checked="" @endif>
                                              <label  for="{{ $val->name }}" class="label label_attr"> </label>
                                          </div>
                                          <label class="lable label_format label_attr" for="{{ $val->name }}" style="margin-top:-5px !important;" @if($val->status == 1) style="color:#ff4669;" @endif>{{ $val->label }}</label>
                                      </li>
                                      @endforeach
                                      @endif
                                  </ul>
                              </div>
                          </div>


                      </tr>
                  </thead>
                  <tbody>
                    <?php $ctm_act = $ctm_del =0; ?>

                    @can('ctm_act')
                    <?php $ctm_act = 1; ?>
                    @endcan

                    @can('ctm_del')
                    <?php $ctm_del = 1; ?>
                    @endcan
                    @if(count($customers) == 0)
                    <tr>
                        <td class="text-center" colspan="6">No result</td>
                    </tr>
                    @endif
                    @foreach($customers as $index => $customer)

                    <tr class="customer_detail">
                        <td class="text-left">
                            <a href="{{action('CustomerController@detail')}}?id={{$customer->id_customer}}" class="terms">
                                @if($customer->customer_name == "")
                                N/a
                                @else
                                {{ $customer->customer_name }}
                                @endif
                            </a>
                        </td>

                        <td class="text-left">
                            @if($customer->customer_phone == "")
                            N/a
                            @else
                            {{ $customer->customer_phone }}
                            @endif
                        </td>
                        <td class="text-left">
                            @if($customer->customer_email == "")
                            N/a
                            @else
                            {{ $customer->customer_email }}
                            @endif
                        </td>
                        <td class="text-left">{{ date('d M Y', strtotime($customer->created_at)) }}</td>

                        @foreach ($attributes as $key => $attribute )
                        <td class="text-left">{{ $customer->dynamicValue($attribute->name, $customer->id_customer) }}</td>
                        @endforeach
                      
                    <td class="text-left">
                        <div class="status row" id="tag">
                            @foreach($tags as $tag)
                            @foreach($customer->CustomerTag as $key)
                            @if($key->id_tag == $tag->id_tag)
                            <div class="tag" style="" data-id="{{$tag->id_tag}}">
                                <div class="tag">
                                    <input type="hidden" id="tag_{{$tag->id_tag}}"
                                    @foreach ($tagCus as $tagc)
                                    @if($tagc['id_tag'] == $tag['id_tag'])
                                    value="1"
                                    @break
                                    @endif
                                    @endforeach>
                                    <label
                                    @foreach($color_tags as $key)
                                    @if($tag['id_color'] == $key['id_color'])
                                    data-color="{{$key->color_content}}"
                                    @endif
                                    @endforeach
                                    style="background: {{$tag->id_color}};width: 25px;height: 25px;border-radius: 30px;margin-top:5px"
                                    data-status="0" for="tag_{{$tag->id_tag}}" id="color_tag" class="label tag_label_default" data-label="{{$tag->tag_name}}" >
                                    </label>
                                </div>
                            <div class="label_hover" style="">{{$tag->tag_name}}</div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </td>

                    <td colspan="2"  class="text-center action_click" style="white-space:nowrap;">
                        @if($ctm_act == 1)
                        <a href="{{action('CustomerController@detail')}}?id={{$customer->id_customer}}&key=edit" title="Edit" class="btn-action btn-edit"></a>
                        @endif
                        @if($ctm_del == 1)
                        <!-- <a href="{{action('CustomerController@delete')}}?id={{$customer->id_customer}}"  title="Delete" class="btn-action btn-delete"></a> -->
                        <a href="javascript:void(0)" url_action_delete="{{action('CustomerController@delete')}}?id={{$customer->id_customer}}" title="Delete" class="btn-action btn-delete action_delete" ></a>
                        @endif
                        @if($customer->type == 'lead')
                        <a href="#" data-url="{{action('CustomerController@lead')}}" data-id="{{$customer->id_customer}}" title="Become Customer" class="btn-action btn-become"></a>
                        @endif
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row footer_list">
            <div class="show_cus col-md-2 text-left">
                <!-- Showing : <span></span> -->
            </div>
            <div class = "col-md-8 text-center pagination_content">{{ $customers->appends(Request::only('name_fillter','fillter_from','fillter_to','tag','segment','customer_type'))->links() }}</div>
            <div class="col-md-2 total_cus text-right">
                Total: <span class="total_customers">{{ $customers->total() }}</span>
            </div>
        </div>

    </div>
</div>


<input type="hidden" name="" id="url_update_attr" value="{{ url::action('CustomerAttributeController@update_status') }}">

<script>
    var data = <?php  if(isset($data)) {echo json_encode($data);}else{echo 0;} ?>;
    var fillter = <?php  if(isset($fillter)) {echo json_encode($fillter);}else{echo 0;} ?>;
</script>
@endsection
@section('extra_footer')
<script type="text/javascript" src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/list-customer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/addCustomer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/edit_customer.js') }}"></script>
<script>
    var url_attr_fillter ="{{ URL::action('CustomerAttributeController@add_attr_fillter') }}";

    
</script>
<script type="text/javascript">

if(data != 0){
    $.each(data,function (index,value) {
        $.each(value,function (index2,value2) {
        $('#adv'+index2+'').prop('checked',true);
            if (index == 'attr_fillter_text') {
                $('#adv'+value2+'').prop('checked',true);
                $('#attr_fillter'+value2+'').prop('checked',true);
            }
            else{
                $.each(value2,function (index3,value3) {
                     $('input[name="'+index+'['+index2+'][]"]').each(function () {
                        if ($(this).val() == value3) {
                            $(this).prop('checked',true);
                        }
                    })
                })
               
            }
          
        })
    });
}
if (fillter != 0) {
    $('.show_advan').click();
    $.each(fillter,function (index,value) {
       if (index == 'text') {
            $.each(value,function (index2,value2) {
                $('#adv'+value2+'').closest('div').find('.attr_fillter').click();
            });
       }else if(index == 'checkbox' || index == 'radio'){
            $.each(value,function (index2,value2) {
                $('#adv'+index2+'').closest('div').find('.attr_fillter').click();
            });
       }
       else if(index == 'tag'){
            $.each(value,function (index2,value2) {
                var color = $('#tag_'+value2+'').closest('.tag').find('label').data('color');
                $('#tag_'+value2+'').prop('checked',true);
                $('#tag_'+value2+'').closest('.tag').find('label').css({'background':color,'color':'white'});
            });
       }
    });


   
}

</script>
@endsection
