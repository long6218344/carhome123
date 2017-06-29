<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeIndexController extends Controller
{
    public function index()
    {
//        $this->getinfo();
        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')
            ->get();

        $reply = DB::table('reply')->get();

//        var_dump($thread);

        $forum = DB::table('forum')->get();
        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread]);
    }

    public function getinfo()
    {
        $host = "http://jisutqybmf.market.alicloudapi.com";
        $path = "/weather/query";
        $method = "GET";
        $appcode = "434cdcf95bca4ebe830053f9151ecd67";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $word = urlencode('北京');
        $querys = "city=$word&citycode=citycode&cityid=cityid&ip=ip&location=location";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
//        var_dump(curl_exec($curl));
       $data = curl_exec($curl);
// 关闭curl
        curl_close($curl);

// var_dump($data);
// 处理json数据
        $jsonObj = json_decode($data);
// var_dump($jsonObj);
// 提取文章列表
        $newslist = $jsonObj->result;
 var_dump($newslist);
    }
}
