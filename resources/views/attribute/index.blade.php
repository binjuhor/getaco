@extends('layouts.app')
@section('content')
<div class="row header_list">
    <b class="col-md-6"><h2>Attribute list</h2></b>
    <div class="col-md-6 text-right">
        @can('atb_act')<a href="#" class="btn btn-primary popup_attribute" data-toggle="modal" data-target="#modal_attribute"> 
            <img src="" alt="">ADD ATTRIBUTE</a>
            @endcan
        </div>
    </div>
    <div class="row content_table">
       <div class="col-md-12">
           <table class="table" id="table_format">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>MODIFY</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>

            <tbody id="list_attribute">
                <?php $atb_act = $atb_del = 0; ?>
                @can('atb_act')
                <?php $atb_act = 1; ?>
                @endcan
                @can('atb_del')
                <?php $atb_del = 1; ?>
                @endcan
                @foreach($attributes as $index => $attribute)
                <tr data-sort="{{$attribute->sort_order}}" data-id="{{$attribute->id_attribute}}">
                    <td ><span class="name">{{ $attribute->label }}</span></td>
                    <td >{{ $attribute->type }}</td>
                    <td class="text-left">{{ date('d M Y', strtotime($attribute->created_at)) }}</td>

                    <td class="text-center">
                        @if($atb_act == 1)
                        <!-- <a href="{{ URL::action('CustomerAttributeController@active')}}?id={{ 
                        $attribute->id_attribute 
                    }}&amp;status={{ $attribute->status==0?1:0 }}"
                    title="Show in profile" 
                    class="btn-action btn-view {{ $attribute->status==1?" active":"" }}"></a>
 -->
                    <a href="" title="Edit" class="btn-action btn-edit" data-toggle="modal" data-target="#modal_attribute" data-id="{{ $attribute->id_attribute }}" data-type="{{ $attribute->type }}"></a>
                    <!-- {{ URL::action('CustomerAttributeController@edit')}}?id={{ $attribute->id_attribute }} -->
                    @endif
                    @if($atb_del == 1)
                    <a href="javascript:void(0)" url_action_delete="{{ URL::action('CustomerAttributeController@delete')}}?id={{ $attribute->id_attribute }}" title="Delete" class="btn-action btn-delete action_delete" ></a>
                    @endif
                     <div class="sort"></div>
                    </td>

                </tr>
            @endforeach
            @if(count($attributes) == 0)
            <tr class="text-center">
                <td colspan="4">No data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>
<div class="modal fade" id="modal_attribute" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body" style="padding: 30px 20px 10px 20px">
                @include("attribute.form")
                <div class="form_edit">
                    
                </div>
             </div>
    <div class="modal-footer">
        <button type="button" class="btn btn_back" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>
@endsection
@section('extra_footer')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('/js/getaco.js') }}"></script>
<script src="{{ asset('/js/builForm/attribute.js') }}"></script>
<script>
    var url_sort_attribute = "{{ URL::action('CustomerAttributeController@sort') }}";
</script>
<script>
    $('.popup_attribute').click(function () {
        var title = $(this).text();
        $('#modal_attribute h4').text(title);
        $('#form_edit_attribute').hide();
        $('#form_add_attribute').show();
    });
    $('.btn-edit').click(function () {
        $('#modal_attribute h4').text('EDIT ATTRIBUTE');
        $('#form_add_attribute').hide();
        var id = $(this).data('id');
        $('#modal_attribute .modal-body .form_edit').load('attribute/edit?id='+id+'');
        var type = $(this).data('type');

    });
</script>
@endsection