<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\WeightsDatatable;
use Illuminate\Http\Request;
use App\Model\Weight;

class Weightscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeightsDatatable $admin)
    {
        //
         //folder  admin/admins/index.blade.php
return $admin->render('admin.weights.index',['title'=>'Weight Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.weights.create', ['title' => 'Create new Weight']);
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
                'name_ar'     => 'required',
                'name_en'    => 'required', //user / company / vendor
            ], [], [
                'name_ar'     => trans('admin.title'),
                 'name_en'     => trans('admin.desc'), 
            ]);
       // $data['user_id'] = admin()->user()->id;
        Weight::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('/weights'));
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
        $color = Weight::find($id);
        $title = trans('admin.edit');
        return view('admin.weights.edit', compact('color', 'title'));
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
                'name_ar'     => 'required',
                'name_en'    => 'required', //user / company / vendor
            ], [], [
                'name_ar'     => trans('admin.title'),
                 'name_en'     => trans('admin.desc'), 
            ]);
       
        Weight::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('/weights'));
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
        Weight::find($id)->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('/weights'));
    }
///////////////////////////multiple  delete
    public function multi_delete() {
        if (is_array(request('item'))) {
            Weight::destroy(request('item'));
        } else {
            Weight::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('/weights'));
    }
}
