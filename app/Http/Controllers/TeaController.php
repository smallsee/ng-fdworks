<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tool\UUID;

class TeaController extends Controller
{
  /**
   * 显示数据
   */
  public function data(){

    $data = (object)array();

    $tea = tea_ins()->orderBy('created_at','desc')->get();


    foreach ($tea as $value){

      $value['commit'] = comment_ins()->where('tea_id',$value->id)
                                      ->with('user')
                                      ->orderBy('created_at','desc')
                                      ->skip(0)
                                      ->take(4)
                                      ->get();;
    }

    return success(['data'=>$tea]);

  }


}
