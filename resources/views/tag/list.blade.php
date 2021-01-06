@extends('layouts.app')
@section('content')
    <div class="row header_list">
        <b class="col-md-6"><h2>Status</h2></b>
        @can('stt_act')
            <div class="col-md-6 text-right">
            <a href="#" class="btn btn-primary add_status" data-toggle="modal" data-target="#modal_status">
                <img src="" alt="">ADD STATUS</a>
            </div>
        @endcan
    </div>

    <div class="row content_table">
        <div class="col-md-12">
            <table class="table table_status" id="table_format">
            <thead>
            <tr>
                <th class="text-left">STATUS NAME</th>
                <th class="text-left">MODIFY</th>
                <th class="text-center">ACTION</th>
            </tr>
            </thead>

            <tbody>
            @foreach($tags as $index => $tag)
                <tr>
                    <td class="text-left">
                        <label data-status="0" for="tag_{{$tag->id_tag}}" id="abc" style="background: {{$tag->id_color}};color:white;line-height: 25px;padding:0 10px;border-radius:20px">
                            {{$tag->tag_name}}
                        </label>
                    </td>
                    <td class="text-left">{{ date('d M Y', strtotime($tag->created_at)) }}</td>
                    
                    <td scope="col" class="text-center">
                        @can('stt_act')
                        <a href="#" title="Edit" class="btn-action btn-edit" data-toggle="modal" data-target="#modal_status" data-id="{{$tag->id_tag}}"><img
                                    src="" alt="" ></a>
                        @endcan
                        @can('stt_del')
                        <a href="javascript:void(0)" url_action_delete="{{ URL::action('TagController@destroy') }}?id={{$tag->id_tag}}" title="Delete" class="btn-action btn-delete action_delete" ><img src="" alt=""></a>
                        @endcan
                    </td>
                    
                </tr>
            @endforeach
            @if(count($tags) == 0)
                <tr class="text-center">
                    <td colspan="3">No data</td>
                </tr>
            @endif
            </tbody>
        </table>

        <div class="row footer_list">
            <div class = "col-md-12 text-center pagination_content">{{ $tags->links() }}</div>
        </div>

    </div>
</div>
<div id="modal_status" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
    </div>

  </div>
</div>
@endsection
@section('extra_footer')
<script>
    $('.btn-edit').click(function () {
        $('#modal_status h4').text('EDIT STATUS');
        var id = $(this).data('id');
        $('#modal_status .modal-body').load('tag/edit?id='+id+'');
        var type = $(this).data('type');
    });
    $('.add_status').click(function () {
         $('#modal_status h4').text('ADD STATUS');
        $('#modal_status .modal-body').load('tag/add');
    })
</script>

@endsection

