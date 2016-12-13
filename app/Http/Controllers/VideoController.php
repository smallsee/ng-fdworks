<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tool\UUID;

class VideoController extends Controller
{
  /**
   * 显示数据
   */
  public function data(){

    $data = (object)array();

    //视频
    $video_hot = video_ins()
      ->orderBy('see','desc')
      ->skip(0)
      ->take(8)
      ->get();

    $data->video_hot=$video_hot;

    return ['status'=>1,'data'=>$data];

  }

  public function timeData(){
    $data = (object)array();

    //视频
    $video_hot_small = video_ins()
      ->orderBy('see','desc')
      ->orderBy('created_at','desc')
      ->skip(1)
      ->take(9)
      ->get();

    $data->video_hot_small=$video_hot_small;

    $video_hot_big = video_ins()
      ->orderBy('see','desc')
      ->orderBy('created_at','desc')
      ->skip(0)
      ->take(1)
      ->get();

    $data->video_hot_big=$video_hot_big;

    return ['status'=>1,'data'=>$data];
  }

  public function typeData(){
    $data = (object)array();
    $type=rq();
    foreach ($type as $key => $value){
      $type_key = $key;
      $type_value = $value;
    }

    $video_type = video_ins()
      ->where($type_key,'like','%'.$type_value.'%')
      ->orderBy('created_at','desc')
      ->orderBy('see','desc')
      ->skip(0)
      ->take(8)
      ->with('user')
      ->get();

    $data->video_type=$video_type;


    $video_type_small = video_ins()
      ->where($type_key,'like','%'.$type_value.'%')
      ->orderBy('created_at','desc')
      ->skip(0)
      ->take(4)
      ->with('user')
      ->get();

    $data->video_type_small=$video_type_small;

    return success(['data'=>$data]);
  }

}
