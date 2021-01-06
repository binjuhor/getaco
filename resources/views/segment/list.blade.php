@extends('layouts.app')
@section('content')
<div class="row header_list">
    <div class="col-md-6"><h2>Segment list</h2></div>
    @can('seg_act')<div class="col-md-6 text-right">
        <a data-url="" class="btn btn-primary btn-segment btn-addsegment" >
            <img src="">ADD SEGMENT</a>
        </div>
        @endcan
    </div>
    <div class="row content_table">
        <div class="col-md-12">
            <table class="table" id="table_format">
                <thead>
                    <tr>
                        <th class="text-left">SEGMENT NAME</th>
                        <th class="text-left">Customer</th>
                        <th class="text-left">MODIFY</th>
                        <th class="text-left">TYPE</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $seg_act = $seg_del = 0 ?>
                    @can('seg_act')
                        <?php $seg_act = 1 ?>
                    @endcan
                    @can('seg_del')
                        <?php $seg_del = 1 ?>
                    @endcan
                    @foreach($segments as $index => $segment)
                    <tr class="segment_item" url_action = "{{ route('shortcut_fillter') }}?id={{ $segment->id_segment }}">
                        <td class="text-left"><span class="name">{{ $segment['segment_name'] }}</span></td>
                        <td class="text-left">{{ $count_customer[$index] }}</td>
                        <td class="text-left">{{ date('d M Y', strtotime($segment->created_at)) }}</td>
                        <td class="text-left">{{($segment->type == 'segment')?'Auto':'Manual selection' }}</td>
                        <td scope="col" class="text-center">
                            @if($seg_act == 1)
                            <a  title="Edit" class="btn-action btn-edit btn-segment" data-id="{{$segment->id_segment}}" data-name="{{ $segment['segment_name'] }}"></a>
                            @endif
                            @if($seg_del == 1)
                            <a href="javascript:void(0)" url_action_delete="delete?id={{ $segment['id_segment'] }}" title="Delete" class="btn-action btn-delete action_delete" ></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if(count($segments) == 0)
                    <tr class="text-center">
                        <td colspan="3">No data</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="row footer_list">
                <div class = "col-md-12 text-center pagination_content">{{$segments -> links() }}</div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="modal-segment" role="dialog">
      <div class="modal-dialog" style="width: 850px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">SEGMENT</h4>
        </div>
        <div class="modal-body" >
                
        </div>
    </div>
</div>
</div>
<button type="hidden" style="display: none" class="" id="btn_segment" data-toggle="modal" data-target="#modal-segment"></button>
@endsection
@section('extra_footer')
<script type="text/javascript" src="{{ asset('/js/customer/list-customer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/addCustomer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/edit_customer.js') }}"></script>
<script>
    var url_attr_fillter ="{{ URL::action('CustomerAttributeController@add_attr_fillter') }}";
</script>
<script type="text/javascript" src="{{ asset('/js/segment/segment.js') }}"></script>
@endsection