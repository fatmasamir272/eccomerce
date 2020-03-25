<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\NewsDatatable;
use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Comments;
use Illuminate\Support\Facades\Storage;
use File ;

class Newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function convertes() {
        $movies = News::all();
    //    $data= $user->toJson();
    //    $fileName='news.json';
         // File::put(public_path('uploads'.$fileName),$data);
//Storage::put('Movies.json', $data);
/*$table = News::all();
         $filename = "movies.json";
         $handle = fopen($filename, 'w+');
         fputs($handle, $table->toJson(JSON_PRETTY_PRINT));
         fclose($handle);
         $headers = array('Content-type'=> 'application/json');
         return response()->download($filename,'movies.json',$headers);*/
         Storage::disk('public')->put('movies.json', response()->json($movies));

    }
    public function index(NewsDatatable $admin)
    {
        //
         //folder  admin/admins/index.blade.php
return $admin->render('admin.news.index',['title'=>'News Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.news.create', ['title' => 'Create new News']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(),
            [
                'title'     => 'required',
                'desc'    => 'required', //user / company / vendor
                'content'    => 'required', /////unique for table admins
                'status' => 'required',
                 'user_id' => 'required'
            ], [], [
                'title'     => trans('admin.title'),
                 'desc'     => trans('admin.desc'),
                'content'    => trans('admin.content'),
                'status' => trans('admin.status'),
            ]);
       // $data['user_id'] = admin()->user()->id;
        News::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('/news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    $news = News::find($id);
   return view('admin.news.show', ['news' => $news]);
    }

 public function add_comment($news_id)
    {
        //
        $data = $this->validate(request(),
            [
                'comment'     => 'required',
            ]);
        $data['user_id'] = admin()->user()->id;
         $data['news_id'] = $news_id;
        Comments::create($data);
        session()->flash('success', trans('admin.record_added'));
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = News::find($id);
        $title = trans('admin.edit');
        return view('admin.news.edit', compact('admin', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate(request(),
            [
               'title'     => 'required',
                'desc'    => 'required', //user / company / vendor
                'content'    => 'required', /////unique for table admins
                'status' => 'required'
            ], [], [
               'title'     => trans('admin.title'),
                 'desc'     => trans('admin.desc'),
                'content'    => trans('admin.content'),
                'status' => trans('admin.status'),
            ]);
       
        News::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('/news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        News::find($id)->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('/news'));
    }
///////////////////////////multiple  delete
    public function multi_delete() {
        if (is_array(request('item'))) {
            News::destroy(request('item'));
        } else {
            News::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('/news'));
    }
}
