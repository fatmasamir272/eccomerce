<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use Storage;
class Upload extends Controller
{
   /*
	'name',
	'size',
	'file',
	'path',
	'full_file',
	'mime_type',
	'file_type',
	'relation_id',
	 */
	public function upload($data = []) {
		if (in_array('new_name', $data)) { ///if it exist in this data from request 
			$new_name = $data['new_name'] === null?time():$data['new_name'];
		}
		if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {

			//////first check for old image and delete it and upload he new one and store it
			Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
			return request()->file($data['file'])->store($data['path']);

		}elseif(request()->hasFile($data['file']) && $data['upload_type'] == 'files'){
			//////first check for old image and delete it and upload he new one and store it
		//	Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
			$file= request()->file($data['file']);
			$file->store($data['path']);
			$size=$file->getSize();
			$mime_type=$file->getMimeType();
			$name=$file->getClientOriginalName(); //original name 
			$hashname=$file->hashName(); //name during upload

			$add=file::create([
               'name'          =>   $name,
		       'size'          =>   $size,
		       'file'          =>   $hashname,
		       'path'          =>   $data['path'],
		       'full_file'     =>   $data['path'].'/'.$hashname,
		       'mime_type'     =>   $mime_type,
		       'file_type'     =>    $data['relation_id'],
		       'relation_id'   =>    $data['relation_id'],
			]);

return  $data['path'].'/'.$hashname;
		}
	}
	/////////////////////////////////////////////
		public function delete($id) {
$file=file::find($id);
if(!empty($file)){
Storage::delete($file->full_file);
$file->delete();
        }
    }
}
