<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\URL;
use App\Helpers\UploadFile;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable = ['id','name','thumbnail','link','display','desc_short','order_by'];
    protected  $crudNotAccepted     = ['_token','check_new','thumbnailHidden'];
    public $timestamps = true;

    public function listItem($params = null, $option = null){
        $result = null;

        if($option['task'] == 'admin-listitem') {
            $result = self::all()->toArray();
        }
        return $result;
    }

    public function getItem($params=null, $option = null){
        if($option['task'] == 'get-item'){
            $result = self::where('id',$params['id'])->get()->toArray();
        }
        return $result;
    }

    public function saveItem($params = null, $option = null){

        if($option['task'] == 'add-item'){
            if(isset($params['thumbnail'])){
                $params['thumbnail'] = UploadFile::uploadImg($params['thumbnail'], $this->table);
            }
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            if(!empty($params['thumbnail'])) {
                if($params['thumbnailHidden']){
                    UploadFile::removeImg($params['thumbnailHidden'], $this->table);
                }
                $params['thumbnail'] = UploadFile::uploadImg($params['thumbnail'], $this->table);
            }
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($option['task'] == 'change-orderby'){
            self::where('id', $params['id'])->update(['order_by' => $params['orderby']]);
        }
    }

    public function deleteItem($params=null, $option=null){
        if($option['task'] == 'delete-item'){
            $item = $this->getItem($params,['task' => 'get-item']);
            if(isset($item[0]['thumbnail'])){
                UploadFile::removeImg($item[0]['thumbnail'], $this->table);
            }
            self::where('id',$params['id'])->delete();
        }
        if($option['task'] == 'delete-items'){
            $ids = $params['ids'];
            $thumbnails = self::whereIn('id',$ids)->pluck('thumbnail');
            foreach ($thumbnails as $key => $thumbnail) {
                if(isset($thumbnail))
                {
                    UploadFile::removeImg($thumbnail, $this->table);
                }
            }
            self::whereIn('id',$ids)->delete();
        }
    }

    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }
}
