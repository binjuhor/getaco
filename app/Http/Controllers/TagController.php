<?php

namespace App\Http\Controllers;

use App\ColorTag;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TagController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    } 
    protected $color = ['#0033CC','#428BCA','#44AD8E','#A8D695','#5CB85C','#69D100','#004E00','#34495E','#7F8C8D','#A295D6','#5843AD','#8E44AD','#FFECDB','#AD4363','#D10069','#CC0033','#FF0000','#D9534F','#D1D100','#F0AD4E','#AD8D43'];
    public function view(){
        $color_tags = ColorTag::all();
        $color = $this->color;
        return view('tag.add',compact('color_tags','color'));
    }

    public function add(Request $request){
        $user = Auth::user();
        $allRequest = $request->all();
        $newTag = new Tag();
        $newTag->fill([
            'tag_name' => $allRequest['tag_name'],
            'id_company' => $user->id_company,
            'id_color' => $allRequest['id_color']
        ])->save();
        return redirect()->action('TagController@index');
    }

    public function index(){
        $user = Auth::user();
        $color_tags = ColorTag::all();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->paginate(15);
        $color = $this->color;
        return view('tag.list',compact('tags','color_tags','color'));
    }

    public function edit(Request $request){
        $tags = Tag::find($request['id']);
        // check company
        if($this->checkCompany($tags->id_company) == 'false') return redirect('/app');
        //end check
        $color_tags = ColorTag::all();
        $color = $this->color;
        return view('tag.add',compact('tags','color_tags','color'));
    }

    public function update(Request $request){
        $allRequest = $request->all();

        $newTag = Tag::find($allRequest['id_tag']);
         // check company
        if($this->checkCompany($newTag->id_company) == 'false') return redirect('/app');
        //end check
        $newTag->update([
            'tag_name' => $allRequest['tag_name'],
            'id_color' => $allRequest['id_color']
        ]);

        return redirect()->action('TagController@index');
    }

    public function destroy(Request $request)
    {
        $tag = Tag::find($request['id']);
          // check company
        if($this->checkCompany($tag->id_company) == 'false') return redirect('/app');
        //end check
        $tag->delete = 1;
        $tag->save();
        return redirect()->action('TagController@index');
    }

}
