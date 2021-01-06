(function($){
    'use strict';

    let showedNumberInput = `
    <div id="extraDisplayed" class="form-group row setting[displayed]">
        <label for="dispayed" class="col-md-2 control-label">Displayed number</label>
        <div class="col-md-10">
            <input name="setting[dispayed]" class="form-control" id="dispayed" type="number" required 
            value="1">
        </div>
    </div>`;

    let scrollEffect = `
    <div  id="extraDisplayed">
        <div class="form-group row setting[scroll]">
            <label for="dispayed" class="col-md-2 control-label">Scroll</label>
            <div class="col-md-10">
                <select id="scrollType" name="setting[scroll][direction]" class="form-control">
                <option value="down">Scroll Down</option>
                <option value="up">Scroll Up</option>
                </select>
            </div>
        </div>
    </div>`;

    let scrollOption = `
    <div id="choseScrollType">
         <div class="form-group row setting[scroll]">
            <label for="dispayed" class="col-md-2 control-label">Scroll type</label>
            <div class="col-md-10">
                <select id="typeScroll" name="setting[scroll][type]" class="form-control">
                    <option value="pixel">Pixel</option>
                    <option value="screen">Screen</option>
                    <option value="percent">Percent</option>
                </select>
            </div>
        </div>
        <div class="form-group row setting[scroll]">
            <label for="settingNumber" class="col-md-2 control-label">Popup Effect</label>
            <div class="col-md-10">
                <input id="settingNumber" type="number" min="0" name="setting[effect]" class="form-control" value="0">
            </div>
        </div>
    </div>`;

    /**
     * Extra time and type for scroll down.
     */
    $('body').on('change', '#scrollType', function () {
        let type = $(this).val();
        $('#choseScrollType').remove();
        if(type == 'down'){
            $('#extraPopupSetting').append(scrollOption);
        }else{
            $('#choseScrollType').remove();
        }
    })

    $(document).ready(function(){
        /**
         * Limited with each option for value of scroll.
         */
        $('body').on('change', '#typeScroll', function () {
            let type = $(this).val();
            let inputVal = $('#settingNumber');
            inputVal.removeAttr('max');
            switch (type) {
                case 'percent':
                    inputVal.attr('max', 100);
                    break;
                case 'screen':
                    inputVal.attr('max', 10);
                    break;
            }
        });
    });

    $('.themeSetting').click(function(){
        let formOption = $(this).data('display');
        $('#choseScrollType').remove();
        switch (formOption) {
            case 'fullscreen':
                $('#extraPopupSetting').html( showedNumberInput );
                break;
            case 'scroll':
                $('#extraPopupSetting').html(showedNumberInput + scrollEffect + scrollOption);
                break;
            default:
                $('#choseScrollType').remove();
                $('#extraPopupSetting').html( showedNumberInput );
                break;
        }
    });
    
    /**
     * popup with setting
     */
    $('a[data-target="#popup_display"]').click(function () {
        let formOption = $(this).data('formtype');

        switch (formOption) {
            case 'fullscreen':
                $('#extrasetting').append( showedNumberInput );
                break;
            case 'scroll':
                $('#extrasetting').append( showedNumberInput + scrollEffect + scrollOption);
                break;
            default:
                $('#extraDisplayed').remove();
                break;
        }
    });

})(jQuery)