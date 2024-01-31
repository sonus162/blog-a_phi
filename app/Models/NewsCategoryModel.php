<?php

namespace App\Models;

use App\Helpers\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'news_category';
    protected $fillable = ['id','name','slug','title','description','keyword'];
    protected  $crudNotAccepted     = ['_token','check_new'];
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

        $params['slug'] = URL::create_slug($params['name']);

        if($option['task'] == 'add-item'){
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params=null, $option=null){
        if($option['task'] == 'delete-item'){
            self::where('id',$params['id'])->delete();
        }
        if($option['task'] == 'delete-items'){
            $ids = $params['ids'];
            self::whereIn('id',$ids)->delete();
        }
    }

    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }
}
