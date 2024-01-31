<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Helpers\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = ['id','username','fullname','email','password','role_user_id','status','avatar'];
    protected  $crudNotAccepted     = ['_token','check_new','avatarHidden','password_confirmation','task'];
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

    public function getListRole($params = null){
        $result = DB::table('role_user')->get()->toArray();
        return $result;
    }

    public function saveItem($params = null, $option = null){

        if($option['task'] == 'add-item'){
            if(isset($params['avatar'])){
                $params['avatar'] = UploadFile::uploadImg($params['avatar'],'user');
            }
            $params['password'] = Hash::make($params['password']);
            self::insert($this->prepareParams($params));
        }
        if($option['task'] == 'edit-item'){
            if(!empty($params['avatar'])) {
                if($params['avatarHidden']){
                    UploadFile::removeImg($params['avatarHidden'],'user');
                }
                $params['avatar'] = UploadFile::uploadImg($params['avatar'],'user');
            }
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($option['task'] == 'change-status'){
            $status = $params['currentStatus'] =='active' ? 'active' : 'inactive';
            self::where('id', $params['id'])->update(['status' => $status]);
        }
        if($option['task'] == 'change-password'){
            $password = Hash::make($params['password']);
            self::where('id', $params['id'])->update(['password' => $password]);
        }
        if($option['task'] == 'change-role'){
            self::where('id', $params['id'])->update(['role_user_id' => $params['role_user_id']]);
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
