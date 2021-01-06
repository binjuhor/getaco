@extends('embed.script')

@section('code')

@switch($setting->formType)
    @case('inline')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            
        let formCode{{ $form-> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <form class="getacoForm __getacoFormInline" action="#" 
                method="POST" id="__getAco_{{ $form->id_form }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                    <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                    <input type="hidden" name="form_show" value="0">
                    <input type="hidden" name="from_url" value="">
                    <div class="contentIncluded content_form-{{ $form->id_form }}">   
                    <?php $form->name_file?include(storage_path().'/app/FormHTML/'.$form->name_file):'File not found';?>
                    </div>
                </form>
            </div>`;
            if (!jQuery('#__getAco_{{ $form->id_form }}').length){
                jQuery('#__geTaco{{ $form->id_form }}').after(formCode{{ $form -> id_form }});
                getacoSetShow();
            }
        }
        @break
    @case('scroll')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <div class="modal fade __getAcoPopup" id="__getAcoPopup{{ $form->id_form }}" tabindex="-1" role="dialog" 
                    aria-labelledby="{{ $form->form_name }}" aria-hidden="true">
                    <div class="modal-dialog-wrap">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <form class="getacoForm" action="{{ URL::action('CustomerController@saveEmbedData') }}" 
                                    method="POST" id="__getAco_{{ $form->id_form }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                                        <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                                        <input type="hidden" name="form_show" value="0">
                                        <input type="hidden" name="from_url" value="">
                                        <div class="contentIncluded content_form-{{ $form->id_form }}">   
                                        <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        jQuery('body').append(formCode{{ $form -> id_form }});
            var lastScrollTop = 0;
            let scrollType    = '{{ isset($setting->scroll->type)?$setting->scroll->type : '' }}';
            let scrollValue   = {{ isset($setting->scroll->value)?$setting->scroll->value: 0 }};
            let windowHeight  = jQuery(window).height();
            let docHeight     = jQuery(document).height();
            switch(scrollType){
                case'screen':
                    scrollValue = scrollValue*windowHeight;
                break;
                case'percent':
                    scrollValue = docHeight * (scrollValue / 100 );
                break;
            }
            if(!enableForm( {{ isset($setting->dispayed)?$setting->dispayed:0 }} )){
                $(window).scroll(function(event){
                    var st = $(this).scrollTop();
                    @if ($setting->scroll->direction == 'down')
                        if (st > lastScrollTop){
                            if( st > scrollValue){
                                jQuery('#__getAcoPopup{{ $form->id_form }}').modal({show:true});
                            }
                        } 
                    @endif
                    @if ($setting->scroll->direction == 'up')
                        if (st < lastScrollTop){
                            jQuery('#__getAcoPopup{{ $form->id_form }}').modal({show:true});
                        } 
                    @endif
                    lastScrollTop = st;
                });
            }
        }
        @break
    @case('floatbar')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <div class="__getAcoFloatbar" id="__getAcoFloat{{ $form->id_form }}">
                    <button id="closeButton{{ $form->id_form }}" data-form="__getAcoFloat{{ 
                        $form->id_form 
                        }}"type="button" 
                        class="close closeButton" data-dismiss="floatbar" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form class="getacoForm " action="{{ URL::action('CustomerController@saveEmbedData') }}" 
                method="POST" id="__getAco_{{ $form->id_form }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                    <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                    <input type="hidden" name="form_show" value="0">
                    <input type="hidden" name="from_url" value="">
                    <div class="contentIncluded content_form-{{ $form->id_form }}">   
                    <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                    </div>
                </form></div></div>`;
            if (!jQuery('#__getAco_{{ $form->id_form }}').length){
                jQuery('body').append(formCode{{ $form -> id_form }});
                getacoSetShow();
            }
        }
        @break
        
    @case('timed')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <div class="modal fade __getAcoPopup" id="__getAcoPopup{{ $form->id_form }}" tabindex="-1" role="dialog" 
                    aria-labelledby="{{ $form->form_name }}" aria-hidden="true">
                <div class="modal-dialog-wrap">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <form class="getacoForm" action="{{ URL::action('CustomerController@saveEmbedData') }}" 
                                method="POST" id="__getAco_{{ $form->id_form }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                                    <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                                    <input type="hidden" name="form_show" value="0">
                                    <input type="hidden" name="from_url" value="">
                                    <div class="contentIncluded content_form-{{ $form->id_form }}">   
                                    <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        jQuery('body').append(formCode{{ $form -> id_form }});
            setTimeout(function(){
                jQuery('#__getAcoPopup{{ $form->id_form }}').modal({show: 'true'});
                getacoSetShow();
            }, {{ isset($setting->timeout)?$setting->timeout:0 }}*1000); 
        }
        @break

    @case('fullscreen')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <div class="modal fade __getAcoPopup" id="__getAcoPopup{{ $form->id_form }}" tabindex="-1" role="dialog" 
                    aria-labelledby="{{ $form->form_name }}" aria-hidden="true">
                    <div class="modal-dialog-wrap">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form class="getacoForm" action="{{ URL::action('CustomerController@saveEmbedData') }}" 
                                method="POST" id="__getAco_{{ $form->id_form }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                                    <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                                    <input type="hidden" name="form_show" value="0">
                                    <input type="hidden" name="from_url" value="">
                                    <div class="contentIncluded content_form-{{ $form->id_form }}">   
                                    <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        if(!enableForm( {{ isset($setting->dispayed)?$setting->dispayed:0 }} )){
            jQuery('body').append(formCode{{ $form -> id_form }});
                setTimeout(function(){
                    jQuery('#__getAcoPopup{{ $form->id_form }}').modal({
                        backdrop: 'static',
                        keyboard: false, 
                        show: true
                    });
                    getacoSetShow();
                }, {{ isset($setting->timeout)?$setting->timeout:0 }}*1000);
            }
        }
        @break
        
    @case('popup')
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
            <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <div class="modal fade __getAcoPopup" id="__getAcoPopup{{ $form->id_form }}" tabindex="-1" role="dialog" 
                    aria-labelledby="{{ $form->form_name }}" aria-hidden="true">
                    <div class="modal-dialog-wrap">   
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <form class="getacoForm" action="{{ URL::action('CustomerController@saveEmbedData') }}" 
                                    method="POST" id="__getAco_{{ $form->id_form }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                                        <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                                        <input type="hidden" name="form_show" value="0">
                                        <input type="hidden" name="from_url" value="">
                                        <div class="contentIncluded content_form-{{ $form->id_form }}">   
                                        <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
            jQuery('body').append(formCode{{ $form -> id_form }});
            jQuery('body').on('click','.__getAcoPopup{{ $form->id_form }}', function(e){
                e.preventDefault();
                jQuery('#__getAcoPopup{{ $form->id_form }}').modal({show:true});
                getacoSetShow();
            });
        }
        @break

     @default
        if (typeof formCode{{ $form -> id_form }} == 'undefined') {
            let formCode{{ $form -> id_form }} = `
             <div class="getacoEmbed" id="getacoEmbed{{ $form->id_form }}">
                <form class="getacoForm __getAcoDefaultForm" action="{{ 
                    URL::action('CustomerController@saveEmbedData') 
                }}" 
                method="POST" id="__getAco_{{ $form->id_form }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_company" value="{{ $form->id_company }}">
                    <input type="hidden" name="id_form" value="{{ $form->id_form }}">
                    <input type="hidden" name="form_show" value="0">
                    <input type="hidden" name="from_url" value="">
                    <div class="contentIncluded content_form-{{ $form->id_form }}">   
                    <?php include(storage_path().'/app/FormHTML/'.$form->name_file);?>
                    </div>
                </form>
             </div>`;
            if (!jQuery('#__getAco_{{ $form->id_form }}').length){
                jQuery('#__geTaco{{ $form->id_form }}').after(formCode{{ $form -> id_form }});
                getacoSetShow();
            }
        }
    @endswitch
@endsection
        
