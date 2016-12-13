<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tool\UUID;

include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
class CommonController extends Controller
{
  /**
   * 上传图片
   */
    public function image(){



      $image = $_FILES['file'];

      // 需要填写你的 Access Key 和 Secret Key
      $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
      $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

      // 构建鉴权对象
      $auth = new Auth($accessKey, $secretKey);
      $bucket = 'fd-book';
      $filePath = $image['tmp_name'];

      $uploadMgr = new UploadManager();
      $key = UUID::create();
      $token = $auth->uploadToken($bucket);

      list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
      if ($err !== null) {
        return ['status'=>0,'msg'=>$err];
      }

      $thumb = ('http://ohadc19qz.bkt.clouddn.com/'.$ret['key']);

      return json_encode(['error'=>0,'url'=>$thumb]);


    }

    public function eqSessionId(){
      $id =rq();
      foreach ($id as $key => $value){
        $type_key = $key;
        $type_id = $value;
      }
      $comment = comment_ins()->where($type_key,$type_id)->get();
      foreach ($comment as $value){
        if ($value['user_id'] == session('user_id'))
          return success();
      }

      return err();

    }
    public function getToken(){
      $type = rq('type');
      // 需要填写你的 Access Key 和 Secret Key
      $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
      $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

      // 构建鉴权对象
      $auth = new Auth($accessKey, $secretKey);
      $bucket = $type;

      $token = $auth->uploadToken($bucket);

      if ($token)
        return success(['data'=>$token]);
      return err(['error']);
    }

    public function manyCommit(){
      $type=rq();
      foreach ($type as $key => $value){
        $type_key = $key;
        $type_id = $value;
      }
      $has_commit = comment_ins()->where($type_key,$type_id)
        ->where('user_id',session('user_id'))
        ->get();

      if (!$has_commit->first())
        return success();

      $time_ed = strtotime(comment_ins()->where($type_key,$type_id)
                              ->where('user_id',session('user_id'))
                              ->orderBy('created_at','desc')->first()->created_at);
      $time_now = time();
      $out = ($time_now - $time_ed)/(60*60);

      if ($out < 24)
        return err('一天内不能重复评论,还有'.(24-$out).'小时');

      return success();

    }



}
