<div class="detail_customer tab_detail" style="display: none" >
            <div class="info_content">
                <div class="row avata_detail_customer">
                    <span class="name">{{$name}} </span>
                    <div class="mail">
                        <div class="name">@empty($customer['customer_name']) N/A @endempty {{$customer['customer_name']}}</div>
                        <div class="email">@empty($customer['customer_email']) N/A @endempty {{$customer['customer_email']}}</div>
                    </div>

                    <button href="" title="Edit" class="text-center btn-edit btn_edit_information"> </button> 
                </div>
                <div class="row info_customer">
                    <label for="" class="col-md-3 form-label">Name</label>
                    <div class="col-md-9"><span>{{ $customer['customer_name']?$customer['customer_name']:"N/a" }}</span></div>
                </div>
                <div class="row info_customer">
                    <label for="" class="col-md-3 form-label">Phone</label>
                    <div class="col-md-9"><span>{{ $customer['customer_phone']?$customer['customer_phone']:"N/a" }}</span></div>
                </div>
                <div class="row info_customer">
                    <label for="" class="col-md-3 form-label">Email</label>
                    <div class="col-md-9"><span>{{ $customer['customer_email']?$customer['customer_email']:"N/a" }}</span></div>
                </div>
<!-- qweqw -->
                @if(count($customer->CustomerTag))
                <div class="row info info_customer">
                    <label for="" class="col-md-3 control-label form-label">Status</label>
                    <div class="status col-md-9 info_edit" id="tag">

                        @foreach($customer->CustomerTag as $key=> $tag)
                        <div class="tag" style="float:left" >
                            <div class="label_class">
                                <label id="color_tag" class="label" style="background: {{$tag->id_color}}">
                                    {{ $tag->tag_name }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if(isset($seg))
                <div class="row info_customer">
                    <label for="name" class="col-md-3 control-label">Segment</label>
                    <div class="col-md-9 segment" style="height: auto;">
                        @foreach ($seg as $segment )
                        <div class="row">
                            <label for="" class="col-md-10">{{ $segment }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @foreach ($attributes as $index => $attribute )

                @if ($customer->dynamicValue($attribute->name, $customer->id_customer))
                <div class="row info_customer">
                    <label class="col-md-3 control-label">{{ $attribute->label }}</label>
                    <div class="col-md-9">
                        <span type="{{$attribute->type}}" name="customer_attr[{{$attribute->name}}]">
                            {{ $customer->dynamicValue($attribute->name, $customer->id_customer) }}
                        </span>
                    </div>
                </div>

                @endif
                @endforeach 
            </div>

            
        </div>