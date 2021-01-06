(function($){
    "use strict";
    $('#content').on('click','.add', function(e){
        e.preventDefault();
        var a = $(this).closest('form').find('.__option_group');
        var num = parseInt(a.length);
        $(this).closest('.row').before(`<div class="form-group row __option_group">
            <label for="name" class="col-md-2 control-label">Option `+num+`</label>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Option name"
                name="option_name[]" required autofocus>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Option value"
                name="option_value[]"  autofocus>
            </div>
            <div class="col-md-2 text-right">
                <button type="button" class="sub"></button>
            </div>
            `);
        // let contain = $(this).closest('.__option_group');
        // return contain.after('<div class="form-group row __option_group">' + contain.html() +'</div>');  
    });

    $('#content').on('click', '.sub', function (e){
        return $(this).closest('.__option_group').remove();
    });

    $('#content').on('click','.package-placeorder', function(e){
        e.preventDefault();
        $('#id_package').val($(this).data('packid'));
        $("#form_placeorder").submit();
    });


    $('#content').on('change','[name="attribute_type"]',function(){
        let attributeType = $(this).val();
        if (
            attributeType === 'select' ||
            attributeType === 'radio' ||
            attributeType === 'checkbox'
        ) {
                $('.__option_group').remove(); 
                $(this).closest('.form-group').append($(optionForAttribute()));
                if (attributeType == 'select') {
                    $('select[name="attribute_type"]').parent().after(
                        `<div class="form-group row __option_group option_defaul">
                            <label class="col-md-2">Option Default</label>
                            <div class="col-md-10">
                                <input name="option_name[]" class="form-control" placeholder="Option Defaul" required>
                                <input type="hidden" value="getaco_default" name="option_value[]">
                            </div>
                        </div>`
                    );
                }
        }else{
            $('.__option_group').remove();
        }
        
    });

    let optionForAttribute  = function(){
        let elementText = 
        `<div class="form-group row __option_group">
            <label for="name" class="col-md-2 control-label">Option 1</label>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Option name"
                name="option_name[]" required autofocus>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Option value"
                name="option_value[]"  autofocus>
            </div>
            <div class="col-md-2 text-right">
                <button type="button" class="sub"></button>
            </div>
        </div>
        <div class="row add_option __option_group" style="margin-bottom: 15px">
                <div class="col-md-offset-2 col-md-10">
                    <button type="button" class="add add_option"></button>
                 </div>
        </div>`;
        return elementText;
    }

    $('#__embedCode').on('click', function(){
        copyCode();
    });

    $('#__copyCode').on('click', function(){
        copyCode();
    });

    var copyCode = function(){
        $('#__embedCode').select();
        document.execCommand("Copy");
        $('#__message').text('Copied embed code')
    }
    // $('body').on('change',"input[name='disable']",function () {
    //     $('.__option_group').find("input[name='option_value[]']").fadeIn();
    //     $(this).closest('.__option_group').find("input[name='option_value[]']").fadeOut();
    // })

})(jQuery)