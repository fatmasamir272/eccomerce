<?php

namespace App\Http\Controllers\Admin\Api;
use App\Http\Controllers\Controller;
use App\DataTables\NewsDatatable;
use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Comments;
use Validator;
use App\Rules\checkexist;

class Newscontroller extends Controller
{
    ////bring data from news and comments
        public function all_news()
{
$all_news=News::withCount('comments')->orderBy('id','desc')->paginate(2);
     return response(['all_news'=>$all_news]);

}
//////////////
 public function news($id)
{
//$news=News::find($id)->comments()->with('news')->paginate(10);
$news=News::find($id);
//$comments=$news->comments()->orderBy('id','desc')->paginate(10);
$comments=Comments::where('news_id',$id)->paginate(10);

     return response(['news'=>$news,'comments'=>$comments]);

}
////////////////////////
public function add_comment(Request $request)
{
$data =[
                'comment'    => 'required', 
                'news_id' => ['required','numeric',new checkexist]  
       ];
 $validate=  Validator(request()->all(),$data);
 if($validate->fails()){
        return response(['status'=>false,'messages'=>$validate->messages()]);
    }else{
       $data['user_id'] = auth()->user()->id;
        $data['news_id'] = request('news_id');
        $data['comment'] = request('comment');
        Comments::create($data);
         return response(['status'=>200,'messages'=>'successful']);

    }

}
}
