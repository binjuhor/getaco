<div class="col-md-8 comment_cus" style="padding-right: 0px;">
    <div class="col-md-8 log_customer">
        <div class="show_comment" style="" title="Show All">
            <input type="hidden" value="0">
        </div>
        <div id="comment" style="overflow-y:auto;max-height: 625px;" data-idcustomer="{{$customer->id_customer}}">
            @foreach($comments as $comment)
            <div class="row comment @if($comment->sticky == 1) comment_sticky @endif" id="comment_{{$comment->id}}" data-sticky="{{$comment->sticky}}" data-id="{{$comment->id}}">
                <div class="col-md-2 name_user" style="background-image: url('{{$comment->user->avatar}}');">
                    @empty($comment->user->avatar)
                      {{$comment->name_user}}
                    @endempty
                </div>
                <div class="panel-body comment_1 col-md-7">
                  <div class="user_log">
                      <div id="add_tag_comment" class="user_comment">
                          <b> {{$comment->user->name}}</b>
                          <span class="user_tag">
                            @if($comment['type'] != 0 && $comment['type'] != null)
                                <?php 
                                  if ($comment->status_tag == 'true') {
                                      $bg = $comment->comment->id_color;
                                      $color_tag = 'white';
                                  }
                                  else if($comment->status_tag == 'false'){
                                      $bg = '#e9e9e9';
                                      $color_tag = 'gray';
                                  }
                                  else{
                                    $bg = 'none';
                                      $color_tag = 'white';
                                  }
                                 ?>
                                <label for="" class="label" style="background:{{$bg}};color:{{$color_tag}};border-radius: 20px;">{{$comment->comment['tag_name']}}</label>
                                
                            @endif
                          </span><br>
                          <small style="font-size: 12px; color: #133d55">{{date('d M Y', strtotime($comment->created_at))}}</small>&nbsp;
                      </div>
                  </div>
                  <div class="comment_content" data-type="{{$comment->type}}" data-content="{{$comment->comment_content}}">
                      <p class="col-md-12 text-dark comment_content" style="overflow: visible;">{{$comment->comment_content}}</p>
                  </div>
                      <textarea name="comment_content" placeholder="Write Comment" class="pb-cmnt-textarea hidden text_edit_comment" id="comment_100"></textarea>
                      <button data-id="{{$comment->id}}" data-text="{{$comment->comment_content}}" style="margin-left: 10px;margin-top: 8px" type="submit" class="btn btn-primary btn-xs btn-success hidden btn_save_comment">Update</button>
                </div>
                <div @if($comment['type'] == 1)
                class="hidden col-md-2"
                @else
                class="col-md-3 action_comment"
                @endif
                id="add_tag_comment_2">
                <a href="{{action('CustomerController@delete_comment')}}?id={{$comment->id}}"  title="Delete" style="float:right;"
                   @if($comment['idUser'] == Auth::user()->id && $comment['type'] == 0)
                   class="btn-action btn-delete del"
                   @else
                   class="btn-action btn-delete del hidden"
                   @endif>
               </a>
               <a id="btn-edit" title="Edit" style="float:right;"
               @if($comment['idUser'] == Auth::user()->id && $comment['type'] == 0)
               class="btn-action btn-edit"
               @else
               class="btn-action btn_edit hidden"
               @endif>
                </a>
                  <a href="javascript:void(0)" class="btn-action btn-sticky" title="sticky"></a>
                &nbsp&nbsp

       </div>
   </div>
   @endforeach
</div>
<!-- //comment -->
<div class="panel panel-default write_comment">
    <div class="panel-body write_comment_content">
        <form action="{{action('CustomerController@comment')}}" role="form" class="" method="Post" id="add_comment">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="icon"></div>
                <input name="comment_content" placeholder="Write Comment" class="pb-cmnt-textarea" required>
                <input type="hidden" id="tag_comment" name="tag_comment">
            </div>
            <input type="hidden" name="id_customer" value="{{$customer->id_customer}}">
            <a href="javascript:void(0)" class="show_status" style="position: absolute;right:85px;top:25px">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10 10" class="show_st">
                  <path fill="#B2B2B2" fill-rule="nonzero" d="M5.875 4.125H10v1.75H5.875V10h-1.75V5.875H0v-1.75h4.125V0h1.75z"/>
              </svg>

            </a>
           <div class="group_status" id="tag" style="max-width: 200px;min-height:120px;background: white;position: absolute;top: 50px;right:30px;z-index: 10;border-radius: 3px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.25); padding: 10px;display: none;">
                @foreach($tags as $tag)
                        <div class="tag " style="float:left;margin:3px;font-size: 12px;" >
                          <label data-status="0" for="tag_{{$tag->id_tag}}" id="tag_add_before" class="label tag_label_default_2 disable"
                                style="background: {{$tag['id_color']}};color:white" data-id="{{$tag->id_tag}}">
                           <input type="hidden" value="0">
                            {{$tag->tag_name}}</label>&nbsp;&nbsp;
                         </div>
                         @endforeach
              </div>
            <button type="submit" class=""> </button>
        </form>
    </div>
</div>
<!-- end comment -->