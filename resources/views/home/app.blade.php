@extends('layouts.app')

@section('content')

    <div class="row reportRow">
        <div class="col-md-12"><p class="small-pagetitle">Overview</p></div>
        <div class="col-md-4 urlitem  overview-item">
            <div class="urlitem__content box-nested">
                <div class="box-information">
                    <div class="url__link text-uppercase"><p>New Leads</p></div>
                    <h3>{{ $newcustomer?$newcustomer:0 }}</h3>
                    <p>New leads</p>
                </div>

                <div class="small-visual">
                    <canvas id="new-customer"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 urlitem  overview-item">
            <div class="urlitem__content box-nested">
                <div class="box-information">
                    <div class="url__link text-uppercase"><p>All leads</p></div>
                    <h3>{{ $sum?$sum:0 }}</h3>
                    <p>Leads</p>
                </div>
                <div class="small-visual">
                    <canvas id="new-leads"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 urlitem  overview-item">
            <div class="urlitem__content box-nested">
                <div class="box-information">
                    <div class="url__link text-uppercase"><p>form display</p></div>
                    <h3 id="total-formShow">0</h3>
                    <p>All time.</p>
                </div>
                <div class="small-visual">
                    <canvas id="new-displayed"></canvas>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-3 urlitem  overview-item">
            <div class="urlitem__content box-nested">
                <div class="box-information">
                    <div class="url__link text-uppercase"><p>Visit site</p></div>
                    <h3>0</h3></h3>
                    <p>User yesterday</p>
                </div>
                <div class="small-visual">
                    <canvas id="new-viewed"></canvas>
                </div>
            </div>
        </div>  --}}
    </div>
    
    <div class="row content_table reportRow">
        <div class="col-md-8">
            <p class="small-pagetitle">Form</p>
            <table class="table table-noaction" id="table_format">
                <thead>
                    <tr>
                        <th class="text-left text-uppercase">ID</th>
                        <th class="text-center text-uppercase">Name</th>
                        <th class="text-center text-uppercase">Display</th>
                        <th class="text-center text-uppercase">Submited</th>
                        <th class="text-center text-uppercase">Modify</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ( $forms as $key => $form )
                        <tr>
                            <td class="text-left">
                                {{ $form->id_form }}
                            </td>
                            <td class="text-center">
                                {{ $form->form_name?$form->form_name:"Untitled" }}
                            </td>
                            <td class="text-center form-show" data-show="{{ 
                                    @json_decode($redis->get('form_'.$form->id_form))->show?
                                    @json_decode($redis->get('form_'.$form->id_form))->show:
                                    0
                                }}">
                                {{ 
                                    @json_decode($redis->get('form_'.$form->id_form))->show?
                                    @json_decode($redis->get('form_'.$form->id_form))->show:
                                    0
                                }}
                               </td>
                            <td class="text-center">
                                {{  @json_decode($form->logs)->submited?@json_decode($form->logs)->submited:0 }}
                            </td>
                            <td class="text-center">{{ date('d M Y', strtotime($form->updated_at)) }}</td>           
                        </tr>
                    @endforeach
                    @if(!count($forms))
                        <tr class="text-center">
                            <td colspan="5"> No form exits</td>
                        </tr>
                    @endif
                    
                </tbody>
    
            </table>
        </div>
        <div class="col-md-4">
            <p class="small-pagetitle">Team member</p>
            <table class="table table-noaction" id="table_format">
                <thead>
                    <tr>
                        <th class="text-left text-uppercase">Name</th>
                        <th class="text-left text-uppercase">Permisstion</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($users as $key => $user )
                    <tr>
                        <td class="text-left col-sm-8">
                            <span class="avatar-prefix col-sm-3">&nbsp;</span>
                            <strong class="col-sm-9 user__name">{{ $user->name }}</strong>
                        </td>
                        <td class="text-left col-sm-4 text-center">
                            <span class="text-uppercase level 
                                    @switch($user->id_role)
                                        @case(2)
                                            {{ " level-high" }}
                                            @break
                                        @case(3)
                                            {{ " level-medium" }}
                                            @break
                                        @case(4)
                                            {{ " level-low" }}
                                            @break
                                        @default
                                            {{" level-high"}}
                                            @break
                                    @endswitch
                                ">
                                @switch($user->id_role)
                                    @case(2)
                                        {{ "high" }}
                                        @break
                                    @case(3)
                                        {{ "medium" }}
                                        @break
                                    @case(4)
                                        {{ "low" }}
                                        @break
                                    @default
                                        {{"Owner"}}
                                @endswitch
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    @if(!count($users))
                        <tr class="text-center">
                            <td colspan="2"> No member</td>
                        </tr>
                    @endif
                    
                </tbody>
    
            </table>
        </div>
    </div>
@endsection

@section('extra_footer')
<script type="text/javascript" src="{{ asset('js/charts/loader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script>
    (function($){
        "use strict";
        let totalShow = 0;
        $('.form-show').each(function(){
            totalShow = totalShow+ parseInt($(this).data('show'));
        });
        $('#total-formShow').text(totalShow);
    })(jQuery)
</script>
@endsection
