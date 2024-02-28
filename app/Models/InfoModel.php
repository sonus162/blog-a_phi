<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InfoModel extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $fillable = ['id','name','phone','address','zalo','email','logo','favicon'];
    protected  $crudNotAccepted     = ['_token','check_new','logoHidden','faviconHidden'];
    public $timestamps = true;

    public function getItem($params=null, $option = null){
        $params['id'] = 1;
        $result = [];
        if($option['task'] == 'get-item'){
            $result = self::where('id',$params['id'])->get()->toArray();
        }
        return $result;
    }

    public function saveItem($params = null, $option = null){

        if($option['task'] == 'add-item'){
            if(isset($params['logo'])) {
                $params['logo'] = $this->uploadThumb($params['logo']);
            }
            if(isset($params['favicon'])) {
                $params['favicon'] = $this->uploadThumb($params['favicon']);
            }
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            if(!empty($params['logo'])) {
                if($params['logoHidden']){
                    $this->removeThumb($params['logoHidden']);
                }
                $params['logo'] = $this->uploadThumb($params['logo']);
            }else {
                $params['logo'] = $params['logoHidden'];
            }
            if(!empty($params['favicon'])) {
                if($params['faviconHidden']){
                    $this->removeThumb($params['faviconHidden']);
                }
                $params['favicon'] = $this->uploadThumb($params['favicon']);
            }else {
                $params['favicon'] = $params['faviconHidden'];
            }
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }


    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }

    public function uploadThumb($img){
        // Tạo thư mục upload hình ảnh
        $time = time();
        $year = date('Y', $time);
        $month = date('m', $time);
        $path =  public_path('upload/info/'.$year.'/'.$month.'/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $thumbName = $time.'-'.$img->getClientOriginalName();
        $img->move($path,$thumbName);

        return $thumbName;
    }

    public function removeThumb($name){
        $time = explode('-',$name)[0];
        $year = date('Y',$time);
        $month = date('m',$time);
        $pathUpload = 'upload/info/'.$year.'/'.$month.'/'.$name;
        if(File::exists($pathUpload)) {
            File::delete($pathUpload);
        }
    }
}
