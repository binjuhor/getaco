                    <form @if(isset($tags))
                           action="{{URL::action('TagController@update')}}"
                          @else
                          action="{{URL::action('TagController@add')}}"
                          @endif
                          class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data" id="form_sub_tag">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">Status name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Enter your tag" name="tag_name" @if(isset($tags))
                                                                                                                         value="{{$tags->tag_name}}"
                                        @endif>
                            </div>
                        </div>
                        @if(isset($tags))
                            <input type="hidden" name="id_tag" value="{{$tags->id_tag}}">
                            @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-2 control-label">Color</label>
                            <div class="col-md-10 add_status" style="margin-top:10px">
                                @foreach($color as $color_tag)
                                    <div class="color" href="javascript:void(0)" style="background: {{$color_tag}};border:none;border-radius:3px;height: 30px;width: 30px;float:left;margin:3px;cursor:pointer;padding-left: 8px;padding-top: 2px;" data-color="{{$color_tag}}">
                                        @isset($tags)
                                            @if($tags->id_color == $color_tag)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
                                                      <path fill="#FFF" fill-rule="nonzero" d="M5.085 9.468L1.293 5.736 0 7.008 5.085 12 16 1.26 14.707 0z"/>
                                                </svg>
                                            @endif
                                        @endisset
                                    </div>
                                @endforeach
                                <input type="hidden" name="id_color" @if(isset($tags))
                                value="{{$tags->id_color}}"
                                        @endif>
                                
                            </div>
                            <div id="notification" style="color:red;text-align: center"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="button" class="btn btn-primary" id="btn_add_tag">
                                @if(isset($tags))
                                    update status
                                @else
                                    add status
                                @endif
                                </button>
                            </div>
                        </div>
                    </form>
    <script src="{{ asset('/js/Color_tag/color_tag.js') }}"></script>
                    