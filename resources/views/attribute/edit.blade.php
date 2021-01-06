
                <form action="{{ URL::action('CustomerAttributeController@edit') }}" 
                class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data" id="form_edit_attribute">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <?php 
                $user = Auth::User();
                use App\Orbit;
                $orbits = Orbit::all();
                ?>
                @if($user->id_role == 0)
                <label for="name" class="col-md-2 control-label">Business</label>
                <div class="col-md-10">
                    <select name="orbit" id="" class="form-control" required="required">
                        <option value="null" selected disabled>Lĩnh vực hoạt động</option>
                        @foreach($orbits as $orbit)
                        <option value="{{$orbit->id_orbit}}" @if( $orbit->id_orbit == $attribute->orbit) selected="selected" @endif >{{$orbit->orbit}}</option>
                        @endforeach
                    </select>
                </div>
                @else
                <input type="hidden" name="orbit" value="0">
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Attribute name</label>
                    <div class="col-md-10">
                        <input type="text" id="name" value="{{ $attribute->label }}" 
                        class="form-control" placeholder="Attribute name" name="name" required autofocus>
                        <input type="hidden" name="id" value="{{ $attribute->id_attribute }}">
                    </div>
                </div>
                <div class="form-group row attribute_option">
                    <label for="attribute_type" class="col-md-2 control-label">Attribute type</label>
                    <div class="col-md-10">
                        <select class="form-control" name="attribute_type" id="attribute_type" required autofocus>
                         @foreach ($attributeType as $key => $attibute)
                         <option value="{{ $key }}" 
                         @if($attribute->type == $key) selected @endif>{{ $attibute }}</option>
                         @endforeach
                        </select>
                    </div>
                @if (!null == $attribute->options)
                @foreach ($attribute->options as $key => $option)
                    @if( $option->option_value == "getaco_default")
                        <div class="form-group row __option_group option_defaul">
                            <label for="name" class="col-md-2 control-label">Option Default</label>
                            <div class="col-md-10">
                                <input name="option_name[]" class="form-control" placeholder="Option Defaul" value="{{ $option->option_name }}" required>
                                <input type="hidden" value="getaco_default" name="option_value[]">
                            </div>
                        </div>
                    @else
                    <div class="form-group row __option_group">
                        <label for="name" class="col-md-2 control-label">Option {{ $key+1 }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Option name"
                            name="option_name[]" value="{{ $option->option_name }}" required autofocus>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Option value"
                            name="option_value[]" 
                            value="{{ $option->option_value }}" autofocus>
                        </div>
                        
                        <div class="col-md-2 text-right">
                            <button type="button" class="sub">
                            </button>
                        </div>
                    </div>
                    @endif
                @endforeach
                @endif
             </div>
            
            <div class="form-group row">
                <label for="attribute_type" class="col-md-2 control-label">Use for</label>
                <div class="col-md-10">
                    <select id="attribute_type" class="form-control" name="attribute_for" required autofocus>
                       <option value="1" selected="">Customer</option>
                       <option value="0">Other</option>
                   </select>
               </div>
            </div>
             <div class="form-group row">
                <label for="status" class="col-md-2 control-label">Show in customer list</label>
                <div class="col-md-10">
                    <select id="status" class="form-control" name="status" required autofocus>
                        <option @if($attribute->status == 0) selected @endif value="0">No</option>
                        <option @if($attribute->status == 1) selected @endif value="1">Yes</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Update Attribute</button>
                </div>
            </div>
        </form>
        <script>
            var type = "<?php echo $attribute->type ?>";
            if (type =="checkbox"||type =="radio"||type =="select") {
                if (!$('#form_edit_attribute div.add_option').lenght) {
                    $('#form_edit_attribute .attribute_option').append(`
                    <div class="row add_option __option_group" style="margin-bottom: 15px">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="button" class="add add_option"></button>
                         </div>
                     </div>
                    `);
                }
            }

        </script>

   