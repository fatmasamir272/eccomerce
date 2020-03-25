<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Up;
class Settings extends Controller {
	public function setting() {
	//$setting= Setting::orderBy('id', 'desc')->first();  ////last data inserted
	return view('admin.settings', ['title' => trans('admin.settings')]);
	//return view('admin.settings', compact('setting', 'title'));

	}
	public function setting_save() {
				//it will be except automatic $data = request()->except(['_token', '_method']);

		/////validate for logo image and icon
		$data = $this->validate(request(), [
				'logo' => v_image(),
				'icon' => v_image(), 
				'status'              => '',
				'description'         => '',
				'keywords'            => '',
				'main_lang'           => '',
				'message_maintenance' => '',
				'email'               => '',
				'sitename_en'         => '',
				'sitename_ar'         => '',
			],
				[],
			[
				'logo' => trans('admin.logo'),
				'icon' => trans('admin.icon')
			]);
//////////////////////////////////////////////
		if (request()->hasFile('logo')) {
			$data['logo'] = Up::upload([
					'file'        => 'logo', ///name of file
					'path'        => 'settings',
					'upload_type' => 'single',
					'delete_file' => setting()->logo,
				]);
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = Up::upload([
					'file'        => 'icon',
					'path'        => 'settings',
					'upload_type' => 'single',
					'delete_file' => setting()->icon,
				]);
		}
//////////////////////////////////////////
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('/settings'));
	}
}