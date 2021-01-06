@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b style="text-align: center;" for="">{{$form['form_name']}}</b>
            </div>
            <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <!-- gui id customer neu edit -->
                    @if(isset($customer))
                        <input type="hidden" name="id_customer" value="{{$customer['id_customer']}}">
                    @endif
                    <input type="hidden" name="id" value="{{$id}}"> <!-- gui id form hien tai -->
                    @foreach($field_demo as $key)
                        @if($key['element_type'] == 'radio' || $key['element_type'] == 'checkbox')
                            <div class="form-group row">
                            <label for="" class="col-md-2 control-label">{{$key['element_label']}}</label>
                            <div class="col-md-8">
                                @foreach($items as $item)
                                    @if($item['id_element'] == $key['id_element'])
                                        <input type="{{$key['element_type']}}" placeholder="{{$key['element_value']}}" class="" name="{{$key['id_element']}}">{{$item['item_value']}}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @elseif($key['element_type'] == 'select')
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">{{$key['element_label']}}</label>
                            <div class="col-md-8">
                                <select name="" id="" class="form-control form-control-sm available" required>
                                    @if(!isset($customer))
                                    <option value selected="selected" disabled="disabled" >Select one</option>
                                    @endif
                                    @foreach($items as $item)
                                        @if($item['id_element'] == $key['id_element'])
                                            <option value="{{$item['item_key']}}"
                                                @if(isset($customer))
                                                    @foreach($fields as $field)
                                                        @if($field['id_element'] == $key['id_element'] && $field['value_field'] == $item['item_value'])
                                                            selected="selected" 
                                                        @endif
                                                    @endforeach
                                                @endif
                                            >{{$item['item_value']}} </option> 
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">{{$key['element_label']}}</label>
                            <div class="col-md-8">
                                <input type="{{$key['element_type']}}" placeholder="{{$key['element_value']}}" class="form-control" name="{{$key['id_element']}}">
                            </div>
                        </div>
                        @endif
                    @endforeach

                    
                            <input type="hidden" class="form-control" @if(isset($customer)) value="{{$customer['sort_order']}}" @endif placeholder="order" name="sort_order" value="1">
        <!-- new field  -->
                    @foreach($elements as $element)
                            <!-- form item -->
                                <div id="formItem" class="input-group mb-3" style="position: absolute;z-index: 2;top: -5px;left: 500px; display: none;background: gray; border: 1px solid gray;padding: 10px 10px;border-radius: 5px;" class="form-group">
                                    <form action="../item/add" method="post" id="form1">
                                        {{csrf_field()}} 
                                        <input type="hidden" name="id" id="id_element">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="value" required="">
                                        </div>
                                          <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" onclick="submit1()">Add</button>
                                            <a href="#" class="btn btn-secondary" onclick="cancelAddItem()">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- end form item -->
                        @if($element['element_type'] == 'checkbox' || $element['element_type'] == 'radio' )
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">{{$element['element_label']}}</label>
                            <div class="col-md-8" style="position: relative;">
                                @foreach($items as $item)
                                    @if($item['id_element'] == $element['id_element'])
                                        <input style="position: relative;" required type="{{$element['element_type']}}" name="{{$element['id_element']}}[]" value="{{$item['item_value']}}" 
                                        @if(isset($customer))
                                            @foreach($fields as $field)
                                                @if($field['id_element'] == $item['id_element'] && $field['value_field'] == $item['item_value'])
                                                    checked="checked" 
                                                @endif
                                            @endforeach
                                        @endif> {{$item['item_key']}}
                                        <div id="edititem" style="display: none;z-index: 2;position: absolute;">hello</div>
                                    @endif
                                @endforeach
                            </div>
                             <div class="col-md-1">
                                <a href="../element/edit?id={{$element['id_element']}}" style="color: blue"><i class="fas fa-edit"></i></a>
                                <a href="#" style="float: right;" onclick="showform({{$element['id_element']}})"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a href="../element/delete?id={{$element['id_element']}}" style="color: red"><i class="fas fa-ban"></i></a>
                            </div>
                        </div>    
                        @elseif($element['element_type'] == 'select')
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">{{$element['element_label']}}</label>
                            <div class="col-md-8">
                                <select name="{{$element['id_element']}}" id="" class="form-control form-control-sm available" required>
                                    @if(!isset($customer))
                                    <option value selected="selected" disabled="disabled" >Select one</option>
                                    @endif
                                    @foreach($items as $item)
                                        @if($item['id_element'] == $element['id_element'])
                                            <option value="{{$item['item_key']}}"
                                                @if(isset($customer))
                                                    @foreach($fields as $field)
                                                        @if($field['id_element'] == $element['id_element'] && $field['value_field'] == $item['item_value'])
                                                            selected="selected" 
                                                        @endif
                                                    @endforeach
                                                @endif
                                            >{{$item['item_value']}} </option> 
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <a href="../element/edit?id={{$element['id_element']}}" style="color: blue"><i class="fas fa-edit"></i></a>
                                <a href="#" style="float: right;" onclick="showform({{$element['id_element']}})"><i class="fas fa-plus"></i></a>
                            </div>

                            <div class="col-md-1">
                                <a href="../element/delete?id={{$element['id_element']}}" style="color: red"><i class="fas fa-ban"></i></a>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">{{$element['element_label']}}</label>
                            <div class="col-md-8">
                                <input type="{{$element['element_type']}}" class="form-control" placeholder="{{$element['element_value']}}" name="{{$element['id_element']}}" @if($element['element_required'] == 1) required="required" @endif
                                @if(isset($customer))
                                    @foreach($fields as $field)
                                        @if($field['id_element'] == $element['id_element'])
                                            value="{{$field['value_field']}}" 
                                        @endif
                                    @endforeach
                                @endif
                                required
                                >
                            </div>
                            <div class="col-md-1">
                                <a href="../element/edit?id={{$element['id_element']}}" style="color: blue">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1">
                                <a href="../element/delete?id={{$element['id_element']}}" style="color: red">
                                    <i class="fas fa-ban"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-10" for=""><a href="../element/add?id_form={{$id}}"><i style="font-size: 20px;" class="fas fa-plus-circle"></i></a></label>
                    </div>                    
                
                <!-- form logs -->
                
                @if(!isset($_COOKIE['cookie']))
                        <?php
                            $value = md5(time());
                            $cookieNew = setcookie('cookie',$value,time()+31536000) ;
                        ?>
                            <input type="hidden" name="cookieID" value="{{$value}}">
                            <input type="hidden" name="id_form" value="{{$id}}">
                            <input type="hidden" name="action" value="1">      
                @else
                            <input type="hidden" name="cookieID" value="{{$_COOKIE['cookie']}}">
                            <input type="hidden" name="id_form" value="{{$id}}">
                            <input type="hidden" name="action" value="2">                
                @endif
                <button type="submit" class="btn btn-primary" >{{$template['name_button']}}</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showform(val) {
        var formItem = document.getElementById('formItem');
        if (formItem.style.display === "none") {
            formItem.style.display = "block";
            document.getElementById("id_element").value = val;
        }else{
            formItem.style.display = "none";
        }
    }
    function cancelAddItem() {
        document.getElementById('formItem').style.display = "none";
    }
    function submit1() {
        document.getElementById("form1").submit();
    }

</script>
@endsection