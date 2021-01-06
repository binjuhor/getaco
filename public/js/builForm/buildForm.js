(function ($) {
  "use strict";

  $('.icon').click(function (e) {
    var type = $(this).data('type');
    var field = $('#formBackend .card');
    // chan tao field khi qua 10 field
    if (field.length > 10) {
      alert("length field < 10");
      return false;
    }

    // chan khi qua 2 name
    if (type == "name") {
      for (var i = field.length; i >= 0; i--) {
        var a = $(field[i]).data("type");
        if (a == "name") {
          alert("Not more than 2 field name");
          return false;
        }

      }

    } // chan khi qua 2 email
    if (type == "email_customer") {
      for (var i = field.length; i >= 0; i--) {
        var a = $(field[i]).data("type");
        if (a == "email_customer") {
          alert("Not more than 2 field email_customer");
          return false;
        }

      }

    }
    // chan khi qua 2 phone
    if (type == "phone") {
      for (var i = field.length; i >= 0; i--) {
        var a = $(field[i]).data("type");
        if (a == "phone") {
          alert("Not more than 2 field phone customer")
          return false;
        }
      }
    }
    var icon = $(this).html();
    var inputNumber = $('#num_field').val();
    inputNumber = parseInt(inputNumber) + 1;
    $('#num_field').val(inputNumber);
    var id_form = $('#id_form').val();
    switch (type) {
      case type:
        if (type == "checkbox" || type == "radio" || type == "select") {
          $('#formBackend').append(
            '<div class="card row field_' + id_form + '_' + inputNumber + '" data-type="' 
            + type + '" data-bordercolor="ddd">'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type 
            + '</b><input type="text" class="hidden form-control" style="height:30px; margin-top:5px;"></div>'

            + '<div class="options col-lg-5">'
            + '<div class="option">'

            + '</div>'
            + '<div class="add_option"><i title="Add Option" class="fas fa-plus-circle">'
            + '</i><input type="text" class="hidden form-control" style="height:30px;margin:5px 0px;"></div>'
            + '</div>'

            + '<div class="col-lg-3">'
            + '<i title="Settings" style="float:right;line-height:40px;margin:0 5px;font-size:15px" '
            + 'class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;margin:0 5px;font-size:15px" '
            + 'class="fas remove fa-trash-alt" data-type="'
            + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '</div>'
            + '</div>'
          );
        }
        else if (type == "submit") {
          $('#formBackend').append(
            '<div class="card row field_' + id_form + '_' + inputNumber + '" data-type="' + type + '" >'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
            + '<div class="edit_placeholder col-lg-5"></div>'
            + '<div class="col-lg-3">'

            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
            + '</div>'
            + '</div>'
          );
        }
        else if (type == "name") {
          $('#formBackend').append(
            '<div class="card row name" data-type="' + type + '" >'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
            + '<div class="edit_placeholder col-lg-5">' + '<span>Placeholder</span><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;">' + '</div>'
            + '<div class="col-lg-3">'

            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '</div>'
            + '</div>'
          );
        }
        else if (type == "email_customer") {
          $('#formBackend').append(
            '<div class="card row email_customer" data-type="' + type + '" >'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
            + '<div class="edit_placeholder col-lg-5">' + '<span>Placeholder</span><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;">' + '</div>'
            + '<div class="col-lg-3">'

            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '</div>'
            + '</div>'
          );
        }
        else if (type == "phone") {
          $('#formBackend').append(
            '<div class="card row phone" data-type="' + type + '" >'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
            + '<div class="edit_placeholder col-lg-5">' + '<span>Placeholder</span><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;">' + '</div>'
            + '<div class="col-lg-3">'

            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '</div>'
            + '</div>'
          );
        }
        else if (type == "column") {
          $('#formBackend').append(
            '<div class="card row column" data-type="' + type + '" >'
            + '<input class="num_column" value="1" type="hidden">'
            + '<div class="col-lg-12 column_edit">'

            + '<div class="col-sm-12 column_form" data-column="1" style="margin-top:5px"></div>'
            + '</div>'
            + '<div class="col-lg-12">'
            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '<i class="fas fa-minus-circle remove_column" style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" title="Remove column"></i>'
            + '<i class="fas fa-plus-circle add_column" style="float:right;line-height:40px;font-size:15px;margin:0 7px;" title="add column"></i>'
            + '</div>'
            + '</div>'
          );
        }

        else {
          $('#formBackend').append(
            '<div class="card row field_' + id_form + '_' + inputNumber + '" data-type="' + type + '" >'
            + '<div class="col-lg-1">' + icon + '</div>'
            + '<div class="editable col-lg-3"><b>' + type + '</b><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;"></div>'
            + '<div class="edit_placeholder col-lg-5">' + '<span>Placeholder</span><input type="text" class="hidden form-control" style="height:30px;margin-top:5px;">' + '</div>'
            + '<div class="col-lg-3">'
            + '<i title="Settings" style="float:right;line-height:40px;margin:0 10px;font-size:15px" class="fas setting fa-cog" ></i>'
            + '<i style="float:right;line-height:40px;font-size:15px" class="fas remove fa-trash-alt" data-type="' 
            + type + '" title="Remove"></i>'
            + '<i style="float:right;line-height:40px;font-size:15px;margin:0 7px;color: #8080807a" class="fas required fal fa-check-circle" data-type="' + type + '" title="Required"></i>'
            + '</div>'
            + '</div>'
          );

        }
        // frontend
        switch (type) {
          case "text":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' 
              + id_form + '_' + inputNumber + '"  data-type="text">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="field_' + id_form + '_' + inputNumber + '" >Text</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;" >'
              + '<input type="text"  class="customfieldForm" id="field_' + id_form + '_' + inputNumber 
              + '" name="customer_attr[field_' + id_form + '_' + inputNumber 
              + ']" placeholder="placeholder" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "name":
            $('#frontend').append(
              '<div class="field_frontend row name" data-type="name" data-attribute="true">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label >name</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;" >'
              + '<input type="text" class="" name="customer_name" placeholder="placeholder"required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "email_customer":
            $('#frontend').append(
              '<div class="field_frontend row email_customer" data-type="email_customer" data-attribute="true">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label >Email Customer</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;" >'
              + '<input type="email" class="" name="customer_email" placeholder="placeholder" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "phone":
            $('#frontend').append(
              '<div class="field_frontend row phone" data-type="phone" data-attribute="true">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label >Phone</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;" >'
              + '<input type="text" name="customer_phone" class="" placeholder="placeholder" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "textarea":
            $('#frontend').append(
              '<div class="field_frontend row fieldCustom field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' + id_form 
              + '_' + inputNumber + '"  data-type="textarea">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="field_' + id_form + '_' + inputNumber + '">textarea</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<textarea class="customfieldForm"  placeholder="placeholder" id="field_' + id_form + '_' 
              + inputNumber + '" type="textarea" name="customer_attr[field_' + id_form + '_' 
              + inputNumber + ']" required="required"></textarea>'
              + '</div>'
              + '</div>'
            );
            break;
          case "email":
            $('#frontend').append(
              '<div class="field_frontend row fieldCustom field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' 
              + id_form + '_' + inputNumber + '"  data-type="email">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' 
              + '<label for="id="field_' + id_form + '_' + inputNumber + '">Email</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<input class="customfieldForm" id="field_' + id_form + '_' + inputNumber 
              + '" type="email"  placeholder="Email Address" name="customer_attr[field_' 
              + id_form + '_' + inputNumber + ']" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "select":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' 
              + id_form + '_' + inputNumber + '"  data-type="select">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="id="field_' + id_form + '_' + inputNumber + '">Select</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<select class="customfieldForm" id="field_' + id_form + '_' + inputNumber 
              + '"  name="customer_attr[field_' + id_form + '_' + inputNumber + ']" required="required">'
              + '</select>'
              + '</div>'
              + '</div>'
            );
            break;
          case "checkbox":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + '][]" '
              + 'data-input="field_' + id_form + '_' + inputNumber + '" data-type="checkbox">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="">Checkbox</label>'
              + '</div>'
              + '<div class="col-sm-8  field_content" style="margin: 0px;" >'

              + '</div>'
              + '</div>'
            );
            break;
          case "radio":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" '
              + 'data-input="field_' + id_form + '_' + inputNumber + '"  data-type="radio">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label>Radio</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;" required="required">'

              + '</div>'
              + '</div>'
            );
            break;
          case "date":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' 
              + id_form + '_' + inputNumber + '"  data-type="date">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="field_' + id_form + '_' + inputNumber + '">Date</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<input type="date" id="field_' + id_form + '_' + inputNumber + '" class="customfieldForm" '
              + 'name="customer_attr[field_' + id_form + '_' + inputNumber 
              + ']" placeholder="placeholder" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "time":
            $('#frontend').append(
              '<div class="field_frontend fieldCustom row field_' + id_form + '_' + inputNumber + '" '
              + 'data-name="customer_attr[field_' + id_form + '_' + inputNumber + ']" data-input="field_' 
              + id_form + '_' + inputNumber + '"  data-type="time">'
              + '<div class="col-sm-4" style="margin:10px 0px;">' +
              '<label for="field_' + id_form + '_' + inputNumber + '">Time</label>'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<input type="time" id="field_' + id_form + '_' + inputNumber + '" class="customfieldForm" '
              + 'name="customer_attr[field_' + id_form + '_' + inputNumber 
              + ']" placeholder="placeholder" required="required">'
              + '</div>'
              + '</div>'
            );
            break;
          case "submit":
            $('#frontend').append(
              '<div class="field_frontend row field_' + id_form + '_' + inputNumber + '" data-type="submit">'
              + '<div class="col-sm-4" style="margin:10px 0px;">'
              + '</div>'
              + '<div class="col-sm-8 field_content" style="margin: 0px;">'
              + '<button type="submit" class="submit" value="submit">Submit</button>'
              + '</div>'
              + '</div>'
            );
            break;
          case "html":
            $('#frontend').append(
              '<div class="field_frontend row field_'+id_form+'_'+ inputNumber 
              + '" data-type="html" style="width:100%"></div>'
            );
            break;
        }
        break;
    };
    var class_this = 'field_' + id_form + '_' + inputNumber;
    // set style
    var style = $('#this_theme').val();
    add_theme_form(style);

    changeStyle(class_this);
  });
  $('#content').on('click', '.remove', function (e) {
    $(this).closest('.card').remove();
    var a = $(this).closest('.col-lg-3').parent().attr('class');
    var b = a.split(" ");
    $('#frontend .' + b[2] + ' ').remove();

  });
  $('#cancel').on('click', function (e) {
    $('#form_field').css({ "display": "none" });
  });
  // placeholder
  $('#content').on('click', '.edit_placeholder span', function (e) {
    $(this).addClass('hidden');
    $(this).closest('.edit_placeholder').find('input').removeClass('hidden');
  });
  $('#content').on('blur', '.edit_placeholder input', function (e) {
    var htmlText = $(this).val();
    $(this).addClass('hidden');
    $(this).closest('.edit_placeholder').find('span').text(htmlText).removeClass('hidden');
    var b = $(this).closest('.edit_placeholder').parent().attr("class");
    var c = b.split(' ');

    var d = $(this).closest('.card').data('type');
    if (d == "date" || d == 'time') {
      $('#frontend div.' + c[2] + ' input').val(htmlText);
    }
    else if (d == 'textarea') {
      $('#frontend div.' + c[2] + ' textarea').attr("placeholder", htmlText);
    }
    else {
      $('#frontend div.' + c[2] + ' input').attr("placeholder", htmlText);
    }


  });
  // label
  $('#content').on('click', '.editable b', function (e) {
    $(this).addClass('hidden');
    $(this).closest('.editable').find('input').removeClass('hidden');
  });
  $('#content').on('blur', '.editable input', function (e) {
    var htmlText = $(this).val();
    $(this).addClass('hidden');
    $(this).closest('.editable').find('b').text(htmlText).removeClass('hidden');
    var b = $(this).closest('.editable').parent().attr("class");
    var c = b.slice('9');
    $('#frontend div.' + c + ' label').text(htmlText);
    $('#frontend div.' + c + ' input').attr('name', 'customer_attr[' + c + ']');
    $('#frontend div.' + c + ' select').attr('name', 'customer_attr[' + c + ']');
    $('#frontend div.' + c + ' textarea').attr('name', 'customer_attr[' + c + ']');
    var a = $(this).closest('.editable').parent().data('type');
    if (a == "submit") {
      $('#frontend div.' + c + ' .field_content button').text(htmlText);
    }
  });
  // option: checkbox radio select
  $('#content').on('click', 'div.options .add_option i', function (e) {
    $(this).addClass('hidden');
    $(this).closest('.options').find('input').removeClass('hidden');
  });

  $('#content').on('keypress', '.add_option input', function (e) {
    if (e.which == 13) {
      var this_option = $(this);
      return add_option(this_option);
    }
  });
  function add_option(this_option) {
      var option = Math.floor(Math.random() * 10000);
    var htmlText = this_option.val();
    this_option.val('');
    this_option.addClass('hidden');
    this_option.closest('.options').find('.add_option i').removeClass('hidden');
    this_option.closest('.options').find('.option').append(
      '<div class="op option_' + option + ' "><span>' + htmlText 
      + '</span><i style="margin:0 10px; color:#8080807a;" class="selected far fa-check-circle" title="Selected">'
      +'</i><i class="fas fa-edit edit_option"></i><i class="fas fa-times remove_option" style="margin:0 5px;"></i></div>'
    );
    // add option frontend
    var a = this_option.closest('.options').parent().attr("class");
    var b = a.slice('9');
    var c = this_option.closest('.options').parent().data('type');
    if (c == "checkbox") {
      $('#frontend div.' + b + ' .field_content').append(
        '<div class="option option_' + option + '"><input type="checkbox" id="ck' + option 
        + '" name="customer_attr[' + b + '][]"  value="' + htmlText + '">'
        + '<label for="ck' + option + '">' + htmlText + '</label></div>'
      );
    }
    else if (c == "radio") {
      $('#frontend div.' + b + ' .field_content').append(

        '<div class="option option_' + option + '"><input type="radio" name="customer_attr[' 
        + b + ']" id="op' + option + '"'
        + 'class="option_' + option + '" value="' + htmlText 
        + '"><label for="op' + option + '">' + htmlText + '</label></div>'
      );
    }
    else {
      $('#frontend div.' + b + ' .field_content select').append(
        '<option class="option option_' + option + '" value="'
        + htmlText + '" name="customer_attr[' + b + ']" id="op' 
        + option + '"><label for="op' + option + '">' + htmlText + '</label></option>'
      );
    }
    var style = $('#this_theme').val();
    add_theme_form(style);

  };
  //edit option
  $('#formBackend').on('click','.op .edit_option',function(){
    $(this).closest('.op').find('span').hide();
    $(this).closest('.op').find('i').hide();
    var text = $(this).closest('.op').find('span').text();
    $(this).closest('.op').append(
      `<input class="form-control" type="text" value="`+text+`">`
    );    
  });
  $('#content').on('keypress', '.op input', function (e) {
    if (e.which == 13) {
      var text = $(this).val();
      var class_option = $(this).closest('.op').attr('class');
      var str = class_option.split(" ");
      $('#form_frontend .'+str[1]+' label').text(text);
      $('#form_frontend option.'+str[1]).text(text);
      $(this).closest('.op').find('span').show(100).text(text); 
      $(this).closest('.op').find('i').show(100); 
      $(this).remove();    
       
    }
  });
  // end edit option
  // remove option
  $('#content').on('click', '.remove_option', function (e) {

    var a = $(this).closest('.op').attr('class');
    var b = a.slice('3');
    $('#frontend .' + b + ' ').remove();
    $(this).closest('.op').remove();
  });
  // check required
  var status = 0;
  $('#content').on('click', '.required', function (e) {
    if (status == 0) {
      $(this).css({ "color": "green" });
      var a = $(this).closest(".card").attr("class");
      var b = a.slice('9');
      console.log(b);
      var type_frontend = $('#frontend .' + b + ' ').data('type');
      if (type_frontend == "select") {
        $('#frontend .' + b + ' ').find('select').attr("required", "required");
      }
      else {
        $('#frontend .' + b + '').find('input').attr("required", "required");
      }

      status = 1;
    }
    else {
      $(this).css({ "color": "#8080807a" });
      var a = $(this).closest(".card").attr("class");
      var b = a.slice('9');
      if (type_frontend == "select") {
        $('#frontend .' + b + ' ').find('select').removeAttr("required", "required");
      }
      else {
        $('#frontend .' + b + ' ').find('input').removeAttr("required", "required");
      }
      status = 0;
    }
  });
  // check selected

  var click = 0;
  $('#content').on('click', '.selected', function (e) {
    var t = $(this).closest('.card').data('type');
    var a = $(this).closest('.op').attr("class");
    var b = a.slice('3');
    //
    if (t == "checkbox") {

      var c = $('#frontend .' + b + ' input').attr("checked");

      if (c == "checked") {
        $(this).css({ "color": "#8080807a" });
        $('#frontend .' + b + ' input').removeAttr('checked', 'checked');
      }
      else {
        $(this).css({ "color": "green" });
        $('#frontend .' + b + ' input').attr('checked', 'checked');
      }
    }
    //
    else if (t == "select") {
      var c = $('#frontend .' + b + '').attr('selected');
      if (c == 'selected') {
        $(this).css({ "color": "#8080807a" });
        $('#frontend .' + b + '').removeAttr('selected', 'selected');
      }
      else {
        var e = $(this).closest('.option').find('.selected').css({ "color": "#8080807a" });
        $(this).css({ "color": "green" });
        var f = $(this).closest('.card').attr('class');
        var g = f.slice('9');
        $('#frontend .' + g + ' .option').removeAttr('selected', 'selected');
        $('#frontend .' + b + '').attr('selected', 'selected');
      }
    }
    //
    else {
      var c = $('#frontend .' + b + ' input').attr('checked');
      if (c == 'checked') {
        $(this).css({ "color": "#8080807a" });
        $('#frontend .' + b + ' input').removeAttr('checked', 'checked');
      }
      else {
        var e = $(this).closest('.option').find('.selected').css({ "color": "#8080807a" });
        $(this).css({ "color": "green" });
        var f = $(this).closest('.card').attr('class');
        var g = f.slice('9');
        $('#frontend .' + g + ' input').removeAttr('checked', 'checked');
        $('#frontend .' + b + ' input').attr('checked', 'checked');
      }
    }
  });

  // submit
  var length_a = 0;
  $('#submit').on('click', function (e) {
    e.preventDefault();
    $('#attributejson').val(processAttributes());
    var theme = $('#this_theme').val();
    $('#preview .add_field').attr('data-theme', theme);


    var html = $('#frontend').html();
    var form = $('#preview .modal-body').html();
    $('#__form').val(form);
    // template
    var key = $('#key').val();
    var edit_id = $('#edit_id').val();
    var id_company = $('#id_company').val();

    $('#input_html').val(html);

    var b = $('input#name_form').val();
    var c = $('#formBackend').html();

    $('#backend_html').val(c);
    $('#name_form2').val(b);

    var display = $('#display_form').val();
    $('#data_display').val(display);

    $('#frontend .field_frontend').each(function () {
      var type_attr = $(this).data('type');
    });
    $('#form_html').submit();
  });

  var processAttributes = function () {
    var fields = new Array();
    $('.content_form .fieldCustom').each(function (i, e) {
      var input         = new Object();
      var label         = new Array();
      var data          = new Array();
      var name          = new Array();
      var value         = new Array();
      var inputName     = $(this).data('name');
      var attributeName = $(this).data('input');
      var inputID       = $(this).attr('id');
      var labelInput    = $(this).find('label').first().text(); 
      var inputType     = $(this).data('type');
      input.name        = '' + attributeName + '';
      input.type        = '' + inputType + '';
      input.label       = '' + labelInput + '';
      $(this).removeClass('fieldCustom');
      switch (inputType) {
        case 'radio':
          $('.content_form  [name="' + inputName + '"]').each(function (n, v) {
            data[n] = '' + $(v).closest('.option').find('label').text();
          })
          input.values = data;
          break;

        case 'checkbox':
          $('.content_form  [name="' + inputName + '"]').each(function (n, v) {
            data[n] = '' + $(v).closest('.option').find('label').text();
          })
          input.values = data;
          break;

        case 'select':
          var optionSl = $(this).find('option');
          optionSl.each(function (n, v) {
            var optionVal = $(this).attr('value');
            value[n] = '' + optionVal + '';
          })
          input.values = value;
          break;

        default:
          fields.value = "";
          break;
      }
      fields[i] = input;
    });
    return JSON.stringify(fields);
  }
})(jQuery)