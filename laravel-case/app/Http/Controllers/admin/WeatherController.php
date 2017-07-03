<?php

    namespace App\Http\Controllers\admin;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class WeatherController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            $host = "http://jisutqybmf.market.alicloudapi.com";
            $path = "/weather/query";
            $method = "GET";
            $appcode = "3074fb3f31d44fa09871deb8429b629f";
            $headers = array();
            array_push($headers, "Authorization:APPCODE " . $appcode);
            $querys = "city=%E5%AE%89%E9%A1%BA&citycode=citycode&cityid=cityid&ip=ip&location=location";
            $bodys = "";
            $url = $host . $path . "?" . $querys;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($curl, CURLOPT_FAILONERROR, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_HEADER, true);
            if (1 == strpos("$".$host, "https://"))
            {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            }

            $data = curl_exec($curl);
            $json = json_decode($data);
//            dd($json);

            return view('/admin/weather/weather', ['list'=>$json]);
        }




    }
