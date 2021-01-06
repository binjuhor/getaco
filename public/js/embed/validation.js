
function checkValidateInputField() {
    var rules =  {
        customer_name: "required",
        customer_email: {
            required: true,
            email: true,
        },
        customer_phone: {
            required: true,
            minlength: 9,
            maxlength:12,
            digits:true,
        },
    };
    var messages = {
        customer_name: "Vui lòng nhập tên",
        customer_email: {
            required: "Vui lòng nhập Email",
            email: "Vui lòng nhập đúng định dạng email",
        },
        customer_phone: {
            required: "Vui lòng nhập địa chỉ",
            minlength: "Số vừa nhập không phải số điện thoại",
            maxlength: "Số vừa nhập không phải số điện thoại",
        },
    };

    jQuery('form.getacoForm').each(function () {
        jQuery(this).find('.field').each(function () {
            var type = jQuery(this).data('type');
            if (type == 'select' || type =="radio" || type =="checkbox") {
                var required = jQuery(this).data('required');
                if (required== 'required' || required=="true") {
                    if (type== 'select') {
                        var name = jQuery(this).find('select').attr('name');
                    }
                    else{
                        var name = jQuery(this).find('input').attr('name');
                    }
                    rules[name] = {required:true}; 
                    messages[name] = {required:"Không để trống trường này"};
                }
            }
            else if(type =="name"|| type=="phone"|| type=="email"){
                return;
            }
            else if(type == 'textarea'){
                var required = jQuery(this).find('textarea').attr('required');
                if (required== 'required' || required=="true") {
                    var name = jQuery(this).find('textarea').attr('name');
                    rules[name] = 'required'; 
                    messages[name] = "Không để trống trường này";
                }
            }
            else{
                var required = jQuery(this).find('input').attr('required');
                if (required== 'required' || required=="true") {
                    var name = jQuery(this).find('input').attr('name');
                    rules[name] = 'required'; 
                    messages[name] = "Không để trống trường này";
                }
            }
        });
        

        return jQuery(this).validate({
            rules: rules,
            messages: messages,
        });
    });
}




function checkValidateMultiSelect($id) {
    var error = 0;
    jQuery('#__getAco_'+$id+'').find('.element_build').each(function () {
        jQuery(this).find('.content_element .field label.error').remove();
        var type = jQuery(this).data('type');
        if ( type=="radio") {
         var name =  jQuery(this).data('name');
         var value = jQuery('input[name="'+name+'"]:checked').length;
         if (value == 0) {
            error++;
            jQuery(this).find('.content_element .field').append(`<label class="error">Vui lòng chọn lựa chọn</label>`);
        }

    }
    else if (type=="checkbox") {
         var name =  jQuery(this).data('name');
         var value = jQuery('input[name="'+name+'[]"]:checked').length;
         if (value == 0) {
            error++;
            jQuery(this).find('.content_element .field').append(`<label class="error">Vui lòng chọn lựa chọn</label>`);
        }
    }
    else if(type == "select"){
        var name =  jQuery(this).data('name');
        var value = jQuery(this).find('select option:selected').length;
        if (value == 0) {
            error++;
            jQuery(this).find('.content_element .field').append(`<label class="error">Vui lòng chọn lựa chọn</label>`);
        }
    }

    });

    if (error > 0) {
        return false;
    }
    else{
        return;
    }
}
