<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProductDatatable;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Size;
use App\Model\Weight;

use Illuminate\Http\Request;
use Storage;
class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProductDatatable $country) {
		return $country->render('admin.products.index', ['title' => trans('admin.products')]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		///on click on create it make new empty row in the table and i will make the editing on it
	 $product= Product::create([
        'title'        => '',
		/*'photo'        => '',
		'content'      => '',
        'other_data'   => '', 
        'weight'       => '',
        'stock'        => '',
        'start_at'     => '',
        'end_at'       => '',
        'price'        => '',
        'start_offer_at' => '',
        'end_offer_at'   => '',
        'price_offer'    => '',
        'status'         => '',
        'reason'         => '',*/
	  ]);
if(!empty($product)){
		return redirect(aurl('/products/'.$product->id.'/edit'));


}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {
		$data = $this->validate(request(),
			[
				'country_name_ar' => 'required',
				'country_name_en' => 'required',
				'mob'             => 'required',
				'code'            => 'required',
				'logo'            => 'sometimes|nullable|'.v_image(),
			], [], [
				'country_name_ar' => trans('admin.country_name_ar'),
				'country_name_en' => trans('admin.country_name_en'),
				'mob'             => trans('admin.mob'),
				'code'            => trans('admin.code'),
				'logo'            => trans('admin.logo'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'countries',
					'upload_type' => 'single',
					'delete_file' => '',
				]);
		}
		Product::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('/products'));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$product = Product::find($id);
		$title   = trans('admin.edit');
		return view('admin.products.create', ['title' => trans('admin.create_or_update_product',['title',$product->title]),'product'=>$product]);
	}
	///////////////dropzone
	public function upload_file($id) {
		if (request()->hasFile('file')) {
			$fid= up()->upload([
					'file'        => 'file',
					'path'        => 'products/'.$id,
					'upload_type' => 'single',
					'file_type'   => 'product',
					'relation_id' => $id,

				]);
			return response(['status'=>true,'id'=>$fid],200);
		}

	}
	//////
	public function delete_file() {
		if (request()->has('id')) {
		up()->delete(request('id'));
		}

	}
	//////////for main photo
	public function update_product_image($id) {
		//
		$product=Product::where('id',$id)->update([
       'photo'=>up()->upload([
					'file'        => 'file',
					'path'        => 'products/'.$id,
					'upload_type' => 'single',
					'delete_file' => '',

				]),
		]);
	return response(['status'=>true,'photo'=>$product->photo],200);

	}
	///////
	public function delete_product_image($id) {
		//
	  $product=Product::find($id);
	  Storage::delete($product->photo);
      $product->photo=null;
	  $product->save();

	}
	//////////////////////to get value of weight and size of the department/////////
		public function prepair_weight_size() {
if (request()->ajax() and request()->has('dep_id')) {
	//return get_parent(request('dep_id'));
	$department_list=explode(',', get_parent(request('dep_id')));
	$array2=[request('dep_id')];
	$dep_list=array_diff($department_list, $array2);
	$sizes=Size::where('is_public','yes')->whereIn('department_id', $department_list)->pluck('name_ar','id');
	//$size_2=Size::whereIn('department_id',request('dep_id'))->pluck('name_ar','id');
	//$sizes=array_merge(json_decode($size_1,true),json_decode($size_2,true));

	$weights=Weight::pluck('name_ar','id');
	return view('admin.products.ajax.size_weight',['sizes'=>$sizes ,'weights'=>$weights])->render();
}else{
return 'false';
}
	
}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $r, $id) {
		$data = $this->validate(request(),
			[
				'country_name_ar' => 'required',
				'country_name_en' => 'required',
				'mob'             => 'required',
				'code'            => 'required',
				'logo'            => 'sometimes|nullable|'.v_image(),
			], [], [
				'country_name_ar' => trans('admin.country_name_ar'),
				'country_name_en' => trans('admin.country_name_en'),
				'mob'             => trans('admin.mob'),
				'code'            => trans('admin.code'),
				'logo'            => trans('admin.logo'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'countries', ///folder name
					'upload_type' => 'single',
					'delete_file' => Country::find($id)->logo,
				]);
		}
		Product::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('/products'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$countries = Product::find($id);
		Storage::delete($countries->logo); ////delete file of logo
		$countries->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('/products'));
	}
	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$countries = Product::find($id);
				Storage::delete($countries->logo);
				$countries->delete();
			}
		} else {
			$countries = Product::find(request('item'));
			Storage::delete($countries->logo);
			$countries->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('/products'));
	}
}