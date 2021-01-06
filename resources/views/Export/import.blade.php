@extends('layouts.app')
@section('content')
<div class="container"> 
  <div class="row header_list">
    <div class="col-md-5 col-md-offset-1 table_title"><h2>Import data customer</h2></div>
    <div class="col-md-5 text-right">
       <a href="{{ URL::action('ExportController@CreateExample') }}" class=" btn btn_filter down_example">DOWNLOAD SAMPLE</a>&nbsp
      <input type="submit" id="btn_import" disabled="" value="IMPORT" class="btn btn_submit_import">
    </div>
  </div> 
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row status_file" style="display: none;" id="status_file"></div>
      <div class="box_file">
      @foreach($log as $val)
        <div class="row status_file">
         <div class="col-xs-7">
          <p class="text_import">{{ $val->file_name }}</p>
         </div>
         <div class="col-xs-3">
           <p class="text_import">{{ date('d M Y', strtotime($val->created_at)) }}</p>
         </div>
         <div class="col-xs-2 text-right">
           <a href="" class="btn-action btn-delete" style="margin-top: 12px;"></a>
         </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-12 box_drop_drag_file text-center" id="dragandrophandler">
        <p class="icon_up_excel_file"></p>
        <p class="text_import">Drag and drop your file</p>
        <p class="text_import">Upload file xls/csv ( Maximun 500 line )</p>
      </div>
    </div>
  </div><br>
  <div class="row text-center ">
    <input type="button" value="CHOOSE FILE" id="choose_file" class=" btn btn_filter">
  </div>
</div>
<!-- modal thong bao loi -->
<div class="container">
  <div class="modal fade" id="err_modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body modal_import_status">
          <h3>Cảnh báo !</h3>
          <p class="err_excel_file"></p>
          <p class="success_import"></p>
        </div>
        <div class="modal-footer" style="text-align: center;,border-top: 2px solid #e5e5e5;">
          <button type="button" class="btn btn_filter down_example" id="cencel_upload" data-dismiss="modal" style="height: 40px;
    line-height:40px; font-size: 12px;">CENCEL</button>
          <button type="button" class="btn btn-primary" id="btn_upload" data-dismiss="modal" style="height: 40px;
    line-height:40px; font-size: 12px;">UPLOAD</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal thong bao thành công -->
<div class="container">
  <div class="modal fade" id="success_modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ action('ExportController@note',session('id_log')) }}" method="post">
          {{ csrf_field() }}
          <div class="modal-body modal_import_status">
            <h3>Thông báo !</h3>
            <p class="success_import">Bạn đã import thành công {{ session('success') }} khách hàng.</p>
            <p class="text_note">Bạn có muốn note lại gì đó.</p><br>
            <textarea style="width: 100%" class="form-control" name="import_note"></textarea>
          </div>
          <div class="modal-footer" style="text-align: center;,border-top: 2px solid #e5e5e5;">
            <button type="button" class="btn btn_filter down_example"data-dismiss="modal" style="height: 40px;line-height:40px;font-size: 12px;">CENCEL</button>
            <button type="submit" class="btn btn-primary" style="height: 40px;line-height:40px; font-size: 12px;">SAVE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<form action="{{ action('ExportController@import',$type) }}" method="post" id="form_import" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" class="hidden"  name="excel_file" id="file_data">
  <input type="hidden" name="file_name" >
</form>
@endsection
@section('extra_footer')

@if( Session::has('success') )
  <script>
    $('#success_modal').modal({backdrop: 'static', keyboard: false},'show');
  </script>
@endif
<script>
dragandrophandler.ondragover = dragandrophandler.ondragenter = function(evt) {
  evt.preventDefault();
};

dragandrophandler.ondrop = function(evt) {
  file_data.files = evt.dataTransfer.files;
  evt.preventDefault();
};

$('#choose_file').on('click',function(){
  $('#file_data').click();
});

$("#file_data").change(function(){
  var url = "{{ URL::action('ExportController@CheckFile') }}";
  UploadFile(url);
});
$('#cencel_upload').on('click',function(){
    location.reload();
});
$('#btn_import').on('click',function(){
  $('.icon_status_import').html(`<a class="loading_import"><p></p>Importing...</a>`);
  $('#form_import').submit();
});
$('#btn_upload').on('click',function(){
  var file_name = $('#file_data').prop('files')[0].name;
  $('#status_file').html(`
       <div class="col-xs-10">
         <p class="text_import">`+file_name+`</p>
       </div>
       <div class="col-xs-2 text-right icon_status_import">
         <a href="" class="btn-action btn-delete action_delete" style="margin-top: 12px;"></a>
       </div>
    `);
  $('#status_file').show();
  $('#btn_import').removeAttr('disabled');
  $('#btn_import').removeClass( "btn_submit_import" ).addClass( "btn_submit_import_active" );
})

function UploadFile(url) {
    var file_data = $('#file_data').prop('files')[0];
    var file_name = $('#file_data').prop('files')[0].name;
    var type = file_data.type;
    var match = ["application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.ms-excel"];
    if(type == match[0] || type == match[1]){
      $('#btn_upload').attr('disabled','disabled');
      $('#btn_import').attr('disabled','disabled');
      $('input[name="file_name"]').val(file_name);
        var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('_token', '{{csrf_token()}}');
           $.ajax({
            url : url,
            data: form_data,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {
                if(data.status == 'err'){
                  var tb = jQuery.parseJSON(data.back_data);
                  var tb_text = "";
                  for (var i = 0; i < tb.length; i++) {
                    tb_text = tb[i]+' , '+tb_text;
                  }
                  $('#btn_upload').removeAttr('disabled');
                  $('.err_excel_file').html('Các trường "'+tb_text+'"không có attribute phù hợp .Kiểm tra lại file của bạn hoặc bỏ qua để tiếp tục .');
                  $('#err_modal').modal({backdrop: 'static', keyboard: false},'show');
                }
                else if(data.status == 'err_default'){
                    $('.err_excel_file').html('Name , phone , email là trường tối thiểu phải có .');
                    $('#err_modal').modal({backdrop: 'static', keyboard: false},'show');
                    $('#btn_upload').attr('disabled','disabled');
                }
                else if(data.status == 'limit'){
                    $('.err_excel_file').html('File của bạn có số dòng vượt quá giới hạn cho phép là 500. Bạn có thể chia nhỏ file .');
                    $('#err_modal').modal({backdrop: 'static', keyboard: false},'show');
                    $('#btn_upload').attr('disabled','disabled');
                }
                else if(data.status == 'ok'){
                  $('#status_file').html(`
                     <div class="col-xs-10">
                       <p class="text_import">`+file_name+`</p>
                     </div>
                     <div class="col-xs-2 text-right icon_status_import">
                       <a href="" class="btn-action btn-delete action_delete" style="margin-top: 12px;"></a>
                     </div>
                    `);
                  $('#status_file').show();
                  $('#btn_import').removeAttr('disabled');
                  $('#btn_import').removeClass( "btn_submit_import" ).addClass( "btn_submit_import_active" );
                }
            },
            error: function (data) {
                console.log("fail")
            }
        });
    }else{
      $('.err_excel_file').html('Kiểu file không phù hợp .');
      $('#err_modal').modal({backdrop: 'static', keyboard: false},'show');
      $('#btn_upload').attr('disabled','disabled');
    }
}
</script>

@endsection
