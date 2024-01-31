<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class UploadFile
{
    public static function uploadImg($img,$module){
        $time = time();
        $year = date('Y', $time);
        $month = date('m', $time);
        $path =  public_path('upload/'.$module.'/'.$year.'/'.$month.'/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $thumbName = $time.'.'.$img->clientExtension();
        $img->move($path,$thumbName);

        return $thumbName;
    }

    public static function removeImg($name, $module){
        $time = explode('.',$name)[0];
        $year = date('Y',$time);
        $month = date('m',$time);
        $pathUpload = 'upload/'.$module.'/'.$year.'/'.$month.'/'.$name;
        if(File::exists($pathUpload)) {
            File::delete($pathUpload);
        }
    }

    public static function uploadImageFromURL($imageUrl, $module)
    {
        /* sử dụng thư viện  GuzzleHttp
            Cài đặt composer require guzzlehttp/guzzle
        */
        $client = new Client();
        $response = $client->get($imageUrl);

        if ($response->getStatusCode() == 200) {

            $time = time();
            $year = date('Y', $time);
            $month = date('m', $time);
            $path =  public_path('upload/'.$module.'/'.$year.'/'.$month.'/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $pathInfo = pathinfo($imageUrl);
            $fileName = $pathInfo['filename']; // nếu lấy thêm tên file 
            $extension = $pathInfo['extension'];
            $thumbName = $time.'.'.$extension;

            // Lưu hình ảnh vào thư mục : sử dụng $response->getBody()  hoặc file_get_content($imgUrl)
            file_put_contents($path.$thumbName, $response->getBody());

            return $thumbName;

        } else {
            return false;
        }
    }
}
