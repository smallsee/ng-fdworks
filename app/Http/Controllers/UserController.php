<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tool\UUID;

class UserController extends Controller
{
  /**
   * 显示数据
   */
  public function data(){

    $data = (object)array();

    $user_id = rq('id');

    $user_video = video_ins()->where('user_id',$user_id)->orderBy('created_at','desc')->get();

    $data->user_video = $user_video;

    $user_book = book_ins()->where('user_id',$user_id)->orderBy('created_at','desc')->get();

    $data->user_book = $user_book;

    $user_tea = tea_ins()->where('user_id',$user_id)->orderBy('created_at','desc')->get();

    $data->user_tea = $user_tea;

    return success(['data'=>$data]);

  }


}
