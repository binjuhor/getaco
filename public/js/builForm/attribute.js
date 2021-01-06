(function($){
  "use trict";
  var status_attribute = 0;
  $('#btn_attribute').on('click',function () {
    if (status_attribute == 0) {
      status_attribute = 1
      $('#list_attribute').css('display','block');
    }
    else{
      $('#list_attribute').css('display','none');
      status_attribute = 0;	
    }
  });
  $('#list_attribute').on('click','p',function () {
    var label = $(this).data('label');
    var name = $(this).data('name');
    var type = $(this).data('type');
    var id = $(this).data('id');
    var options = $(this).data('option');
    var source_option = '';
    var option_checkbox= '';
    var option_radio= '';
    var option_select= '';
    var option = Math.floor(Math.random()*10000);
    
    for (var i = 0; i < options.length; i++) {
      option = parseInt(option) + 1;
      source_option = source_option + '<div class="op option_' + option+ ' "><span>' 
      + options[i]['option_name'] 
      + '</span><i style="margin:0 10px; color:#8080807a" class="selected far fa-check-circle" title="Selected">'
        +'</i><i class="fas fa-edit edit_option"></i><i class="fas fa-times remove_option" style="margin:0 5px;"></i></div>' ;
      if (type == "checkbox") {
        
        option_checkbox = option_checkbox + '<div class="option option_' 
        + option + '"><input type="checkbox" name="customer_attr[' + name 
        + '][]"  value="' + options[i]['option_value'] + '" id="' + name + i 
        + '"><label for="' + name + i +'">' + options[i]['option_name'] + '</label></div>'
        
      }
      if (type == "radio") {
        option_radio = option_radio + '<div class="option option_' + option 
        + '"><input type="radio" name="customer_attr[' + name + ']"  value="' 
        + options[i]['option_value'] + '" id="' + name + i + '"><label for="' + name + i 
        +'">' + options[i]['option_name'] + '</label></div>'
        
      }
      if (type == "select") {
            option_select = option_select + '<option class="option option_' + option 
            + '" value="' + options[i]['option_value']  + '">' + options[i]['option_name'] + '</option>'
      }
    }
    
    var inputNumber = $('#num_field').val();
      inputNumber = parseInt(inputNumber) + 1;
      $('#__namedInput').val(inputNumber);
      $('#num_field').val(inputNumber);
      var id_form = $('#id_form').val();
      switch (type) {
        case type:
          if (type == "checkbox" || type == "radio" || type == "select") {
            $('#formBackend').append(
              '<div class="card row field_'+id_form+'_'+ inputNumber + '" data-type="' + type + '">'
              + '<div class="col-lg-1"><i class="fas fa-audio-description"></i></div>'
              + '<div class="editable col-lg-3"><b>' + label + '</b><input type="text" class="hidden form-control" '
              +' style="height:30px; margin-top:5px;"></div>'
              + '<div class="options col-lg-5">'
                  + '<div class="option">'
                    + source_option 
                  + '</div>'
                + '<div class="add_option"><i title="Add Option" class="fas fa-plus-circle"></i>'
                +'<input type="text" class="hidden form-control" style="height:30px;margin:5px 0px;"></div>'
                + '</div>'

              + '<div class="col-lg-3">'
                + '<i title="Settings" style="float:right;line-height:40px;margin:0 5px;font-size:15px" class="fas setting fa-cog" ></i>'
                + '<i style="float:right;line-height:40px;margin:0 5px;font-size:15px" class="fas remove fa-trash-alt" data-type="'
                + type + '" title="Remove"></i>'
                + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
              + '</div>'
              + '</div>'
            );
          }
          else {
            $('#formBackend').append(
              '<div class="card row field_'+id_form+'_'+ inputNumber + '" data-type="' + type + '" >'
              + '<div class="col-lg-1"><i class="fas fa-audio-description"></i></div>'
              + '<div class="editable col-lg-3"><b>' + label + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
              + '<div class="edit_placeholder col-lg-5">' + '<span>Placeholder</span><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;">' + '</div>'
              + '<div class="col-lg-3">'
              + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
              + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
              + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
              + '</div>'
              + '</div>'
            );

          }
        // frontend
          switch (type) {
            case "text":
              $('#frontend').append(
                '<div class="field_frontend row field_' + id_form + '_' + inputNumber + '" data-type="text" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label for="' + name +'">'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin:0px;" >'
                + '<input type="text" name="customer_attr[' + name + ']" id="' + name +'"  class="form-control" placeholder="placeholder" >'
                + '</div>'
                + '</div>'
              );
              break;
            case "textarea":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="textarea" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label for="field_' + id_form + '_' + inputNumber + '"">'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin:0px;">'
                + '<textarea class="form-control" id="field_' + id_form + '_' + inputNumber + '" name="customer_attr['+name+']" placeholder="placeholder"></textarea>'
                + '</div>'
                + '</div>'
              );
              break;
            case "email":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="email" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label for="field_' + id_form + '_' + inputNumber + '">'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin: 0px;">'
                + '<input class="form-control" id="field_' + id_form + '_' + inputNumber + '" name="customer_attr['+name+']" placeholder="Email Address">'
                + '</div>'
                + '</div>'
              );
              break;
            case "select":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="select" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label >'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin: 0px;">'
                + '<select id="field_' + id_form + '_' + inputNumber + '" name="customer_attr['+name+']" class="form-control">'
                    +option_select
                + '</select>'
                + '</div>'
                + '</div>'
              );
              break;
            case "checkbox":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="checkbox" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label >'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin:0px;">'
                      +option_checkbox
                + '</div>'
                + '</div>'
              );
              break;
            case "radio":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="radio" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label >'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin: 0px;">'
                    +option_radio
                + '</div>'
                + '</div>'
              );
              break;
            case "date":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="date" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label for="' + name +'">'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin: 0px;">'
                + '<input type="date" id="' + name +'" name="customer_attr['+name+']" class="form-control" placeholder="placeholder">'
                + '</div>'
                + '</div>'
              );
              break;
            case "time":
              $('#frontend').append(
                '<div class="field_frontend row field_'+id_form+'_'+ inputNumber + '" data-type="time" data-attribute="true">'
                + '<div class="col-sm-4" style="margin:10px 0px;">' +
                '<label for="' + name +'">'+label+'</label>'
                + '</div>'
                + '<div class="col-sm-8 field_content" style="margin:0px;">'
                + '<input type="time" id="' + name +'" name="customer_attr['+name+']" class="form-control" placeholder="placeholder">'
                + '</div>'
                + '</div>'
              );
              break;
          }
          break;
      }
    $('#list_attribute').css('display','none');
    status_attribute = 0;
    var class_this = 'field_' + id_form + '_' + inputNumber;
    // set style
    var style = $('#this_theme').val();
    add_theme_form(style);
    changeStyle(class_this);
});
// sort attribute
    $( "#list_attribute" ).sortable({
      start: function (e,ui) {
        $(ui.helper).css({'background':'white','box-shadow':'0px 5px 20px 0px rgba(0, 0, 0, 0.25)'});
        console.log($(ui.helper).data('sort'));
      },
      axis: "y",
      cursor: "-webkit-grabbing",
      handle:".sort",
      placeholder: "sortable-placeholder-attribute",
      opacity:"0.9",
      forcePlaceholderSize:true,
          tolerance: 'pointer',
          connectWith: "#list_attribute",
          forceHelperSize: true,
      activate:function (e,ui) {
        $(ui.helper).css('transition','none');

      },
      beforeStop:function (ui,e) {
        $('#list_attribute tr').removeAttr('style');
      },
      stop:function(ui,e){
        var i = 0;
        var data = new Array();
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#list_attribute tr').each(function () {
            var id = $(this).data('id');
            i = parseInt(i) + 1;
            $(this).attr('data-sort',i);
            data[i] = id;
        });
        $.ajax({
            method: "POST",
            url: url_sort_attribute,
            data: { 
              _token : token,
              data : data,
            }
          })
          .done(function( msg ) {
            });
      }
    });
    $( "#list_attribute" ).disableSelection();
})(jQuery)