 @foreach ($attributes as $index => $attribute )
                @if ($customer->dynamicValue($attribute->name, $customer->id_customer) || $attribute->show_edit == 1)
                @switch($attribute->type)
                @case('textarea')
                <div class="field">
                    <div class="row info_customer" id="{{ $attribute->name }}">
                        <label for="name" class="col-md-3 control-label">{{ $attribute->label }}</label>
                        <div class="col-md-9 info_edit">
                            <textarea class="form-control"  name="customer_attr[{{$attribute->name}}]">{{
                                $customer->dynamicValue($attribute->name, $customer->id_customer)
                            }}</textarea>
                        </div>
                    </div>
                </div>
                @break

                @case('select')
                <div class="field">
                    <div class="row info_customer" id="{{ $attribute->name }}">
                        <label for="select_{{md5($attribute->label)}}" class="col-md-3 control-label">{{ $attribute->label }}</label>
                        <div class="col-md-9 info_edit">
                            <select id="select_{{md5($attribute->label)}}"
                                class="form-control" name="customer_attr[{{$attribute->name}}]">
                                @foreach ( $attribute->options as $key => $option )
                                <option
                                    @if ($customer->dynamicValue($attribute->name, $customer->id_customer) == $option->option_value)
                                    selected 
                                    @endif
                                    @if($option->option_value == "getaco_default")
                                        disabled
                                    @endif
                                    value="{{$option->option_value}}">{{$option->option_name}}
                                    
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @break

                @case('radio')
                <div class="field">
                    <div class="row info_customer" id="{{ $attribute->name }}">
                        <label class="col-md-3 control-label">{{ $attribute->label }}</label>
                        <div class="col-md-9 info_edit">
                            @foreach ( $attribute->options as $key => $option )
                            <input id="radio_{{md5($key.$option)}}" name="customer_attr[{{$attribute->name}}]"
                            type="{{$attribute->type}}"
                            @if ($customer->dynamicValue($attribute->name, $customer->id_customer) == $option->option_value)
                            checked
                            @endif
                            value="{{$option->option_value}}">
                            <label for="radio_{{md5($key.$option)}}">{{$option->option_name}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                @break

                @case('checkbox')
                <div class="field">
                    <div class="row info_customer" id="{{ $attribute->name }}">
                        <label class="col-md-3 control-label">{{ $attribute->label }}</label>
                        <div class="col-md-9 info_edit">

                            @foreach ( $attribute->options as $key => $option )
                            <input  id="checkbox_{{md5($key.$option->option_name)}}"
                            name="customer_attr[{{$attribute->name}}][]"
                            @if($customer->dynamicValue($attribute->name, $customer->id_customer)!="")
                            @if (0 < strlen(strstr($customer->dynamicValue($attribute->name, $customer->id_customer), $option->option_value)))
                            checked
                            @endif
                            @endif
                            type="{{$attribute->type}}"
                            value="{{$option->option_value}}">

                            <label for="checkbox_{{md5($key.$option->option_name) }}">
                                {{ $option->option_name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                @break

                @default
                <div class="field">
                    <div class="row info_customer" id="{{ $attribute->name }}">
                        <label class="col-md-3 control-label">{{ $attribute->label }}</label>
                        <div class="col-md-9 info_edit">
                            <input type="{{$attribute->type}}" class="form-control"
                            placeholder="{{ $attribute->label }}"
                            value="{{ $customer->dynamicValue($attribute->name, $customer->id_customer) }}"
                            name="customer_attr[{{$attribute->name}}]">

                        </div>
                    </div>
                </div>
                @endswitch
                @endif
                @endforeach
