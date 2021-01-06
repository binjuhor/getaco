@extends('layouts.app')
@section('extra_header')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}" type="text/css">
<!-- Fonts -->
@endsection
@section('content')

<div class="row header_list">
    <div class="col-lg-6"><h2>{{ Request::is('app/customer/customer*') ? 'Customer' : 'Lead' }} search data</h2></div>
    <div class="col-lg-6 text-right">
    <a href="{{action('CustomerController@add')}}" class="btn btn-primary"><img src="" alt="">ADD LEAD</a>
</div>
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
                        <th class="text-left">STATUS</th>
                        <th class="text-center" >ACTION</th>
                        
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
                <tr class="text-center">
                    <td colspan="6">No results</td>
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
                    <td class="text-left">
                        <div class="status row" id="tag">
                            @foreach($tags as $tag)
                            @foreach($customer->CustomerTag as $key)
                            @if($key->id_tag == $tag->id_tag)
                            <div class="tag" style="" data-id="{{$tag->id_tag}}">
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
                                data-status="0" for="tag_{{$tag->id_tag}}" id="color_tag" class="label tag_label_default" data-label="{{$tag->tag_name}}" style="">
                            </label>
                            <div class="label_hover" style="">{{$tag->tag_name}}</div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </td>

                <td colspan="2"  class="text-center action_click" style="white-space:nowrap;">
                    @if($ctm_act == 1)
                    <a href="{{action('CustomerController@detail')}}?id={{$customer->id_customer}}&key=edit" title="Edit" class="btn-action btn-edit"></a>
                    @endif
                    @if($ctm_del == 1)
                    <a href="javascript:void(0)" url_action_delete="{{action('CustomerController@delete')}}?id={{$customer->id_customer}}" title="Delete" class="btn-action btn-delete action_delete" ></a>
                    @endif
                    @if($customer->type == 'lead')
                    <a href="#" data-url="{{action('CustomerController@lead')}}" data-id="{{$customer->id_customer}}" title="Become Customer" class="btn-action btn-become"></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
@section('extra_footer')
<script type="text/javascript" src="{{ asset('/js/customer/list-customer.js') }}"></script>
@endsection
