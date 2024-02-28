<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SectionModel extends Model
{
    use HasFactory;
    protected $table = 'section';
    protected $fillable = ['id','name','multi_input'];
    protected  $crudNotAccepted     = ['_token','check_new','thumbnailHidden'];
    public $timestamps = true;

    public function getItem($params=null, $option = null){
        $params['id'] = 1;
        $result = [];
        if($option['task'] == 'get-item'){
            $result = self::where('id',$params['id'])->get()->toArray();
            $result[0]['multi_input'] = json_decode($result[0]['multi_input'],true);
            return $result;
        }
    }

    public function saveItem($params = null, $option = null){

        if($option['task'] == 'add-item'){
            if(isset($params['multi_input']['intro']['thumbnail'])) {
                $params['multi_input']['intro']['thumbnail'] = $this->uploadThumb($params['multi_input']['intro']['thumbnail']);
            }
            if(isset($params['multi_input']['slogan']['thumbnail'])) {
                $params['multi_input']['slogan']['thumbnail'] = $this->uploadThumb($params['multi_input']['slogan']['thumbnail']);
            }
            if(isset($params['multi_input']['post'][1]['thumbnail-1'])) {
                $params['multi_input']['post'][1]['thumbnail-1'] = $this->uploadThumb($params['multi_input']['post'][1]['thumbnail-1']);
            }
            if(isset($params['multi_input']['post'][1]['thumbnail-2'])) {
                $params['multi_input']['post'][1]['thumbnail-2'] = $this->uploadThumb($params['multi_input']['post'][1]['thumbnail-2']);
            }
            if(isset($params['multi_input']['post'][2]['thumbnail'])) {
                $params['multi_input']['post'][2]['thumbnail'] = $this->uploadThumb($params['multi_input']['post'][2]['thumbnail']);
            }
            $params['multi_input'] = json_encode($params['multi_input']);
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            if(!empty($params['multi_input']['intro']['thumbnail'])) {
                if($params['multi_input']['intro']['thumbnailHidden']){
                    $this->removeThumb($params['multi_input']['intro']['thumbnailHidden']);
                }
                $params['multi_input']['intro']['thumbnail'] = $this->uploadThumb($params['multi_input']['intro']['thumbnail']);
            }else {
                $params['multi_input']['intro']['thumbnail'] = $params['multi_input']['intro']['thumbnailHidden'];
            }
            if(!empty($params['multi_input']['slogan']['thumbnail'])) {
                if($params['multi_input']['slogan']['thumbnailHidden']){
                    $this->removeThumb($params['multi_input']['slogan']['thumbnailHidden']);
                }
                $params['multi_input']['slogan']['thumbnail'] = $this->uploadThumb($params['multi_input']['slogan']['thumbnail']);
            }else {
                $params['multi_input']['slogan']['thumbnail'] = $params['multi_input']['slogan']['thumbnailHidden'];
            }
            if(!empty($params['multi_input']['post'][1]['thumbnail-1'])) {
                if($params['multi_input']['post'][1]['thumbnailHidden-1']){
                    $this->removeThumb($params['multi_input']['post'][1]['thumbnailHidden-1']);
                }
                $params['multi_input']['post'][1]['thumbnail-1'] = $this->uploadThumb($params['multi_input']['post'][1]['thumbnail-1']);
            }else {
                $params['multi_input']['post'][1]['thumbnail-1'] = $params['multi_input']['post'][1]['thumbnailHidden-1'];
            }
            if(!empty($params['multi_input']['post'][1]['thumbnail-2'])) {
                if($params['multi_input']['post'][1]['thumbnailHidden-2']){
                    $this->removeThumb($params['multi_input']['post'][1]['thumbnailHidden-2']);
                }
                $params['multi_input']['post'][1]['thumbnail-2'] = $this->uploadThumb($params['multi_input']['post'][1]['thumbnail-2']);
            }else {
                $params['multi_input']['post'][1]['thumbnail-2'] = $params['multi_input']['post'][1]['thumbnailHidden-2'];
            }
            if(!empty($params['multi_input']['post'][2]['thumbnail'])) {
                if($params['multi_input']['post'][2]['thumbnailHidden']){
                    $this->removeThumb($params['multi_input']['post'][2]['thumbnailHidden']);
                }
                $params['multi_input']['post'][2]['thumbnail'] = $this->uploadThumb($params['multi_input']['post'][2]['thumbnail']);
            }else {
                $params['multi_input']['post'][2]['thumbnail'] = $params['multi_input']['post'][2]['thumbnailHidden'];
            }
            $params['multi_input'] = json_encode($params['multi_input']);
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
        $path =  public_path('upload/section/'.$year.'/'.$month.'/');
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
        $pathUpload = 'upload/section/'.$year.'/'.$month.'/'.$name;
        if(File::exists($pathUpload)) {
            File::delete($pathUpload);
        }
    }
}
