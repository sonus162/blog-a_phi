<?php

namespace App\Models;

use App\Helpers\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['id','name','slug','thumbnail','display','is_home','price','star','title','description','keyword'];
    protected  $crudNotAccepted     = ['_token','check_new','thumbnailHidden'];
    public $timestamps = true;

    public function listItem($params = null, $options = null){
        $result = null;
        $columns = isset($params['columns']) ? $params['columns'] : '*';

        if($options['task'] == 'admin-listitem') {
            $result = self::all();
        }

        if($options['task'] == 'frontend-getList'){
            $result = self::select($columns)->where('display', 1)->paginate(6);
        }

        $result = $result->toArray();

        return $result;
    }

    public function getItem($params=null, $option = null){
        if($option['task'] == 'get-item'){
            $result = self::where('id',$params['id'])->get()->toArray();
        }
        return $result;
    }

    public function saveItem($params = null, $option = null){

        $params['slug'] = Str::slug($params['name']);

        if($option['task'] == 'add-item'){
            $params['display'] = 1;
            $params['user_created'] = 'Admin';
            $params['created_at'] = date('Y-m-d H:m:s',time());
            if(isset($params['thumbnail'])) {
                $params['thumbnail'] = $this->uploadThumb($params['thumbnail']);
            }
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            if(!empty($params['thumbnail'])) {
                if($params['thumbnailHidden']){
                    $this->removeThumb($params['thumbnailHidden']);
                }
                $params['thumbnail'] = $this->uploadThumb($params['thumbnail']);
            }
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params=null, $option=null){
        if($option['task'] == 'delete-item'){
            $item = $this->getItem($params,['task' => 'get-item']);
            if(isset($item[0]['thumbnail'])){
                $this->removeThumb($item[0]['thumbnail']);
            }
            self::where('id',$params['id'])->delete();
        }
        if($option['task'] == 'delete-items'){
            $ids = $params['ids'];
            $thumbnails = self::whereIn('id',$ids)->pluck('thumbnail');
            foreach ($thumbnails as $key => $thumbnail) {
                if(isset($thumbnail))
                {
                    $this->removeThumb($thumbnail);
                }
            }
            self::whereIn('id',$ids)->delete();
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
        $path =  public_path('upload/news/'.$year.'/'.$month.'/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $thumbName = $time.'.'.$img->clientExtension();
        $img->move($path,$thumbName);

        return $thumbName;
    }

    public function removeThumb($name){
        $time = explode('.',$name)[0];
        $year = date('Y',$time);
        $month = date('m',$time);
        $pathUpload = 'upload/news/'.$year.'/'.$month.'/'.$name;
        if(File::exists($pathUpload)) {
            File::delete($pathUpload);
        }
    }
}
