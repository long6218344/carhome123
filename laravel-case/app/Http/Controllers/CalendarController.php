<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class CalendarController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $host = "http://toutiao-ali.juheapi.com";
            $path = "/toutiao/index";
            $method = "GET";
            $appcode = "f904bb7f4bf4495b8c0fd0ab0a35317c";
            $headers = array();
            array_push($headers, "Authorization:APPCODE " . $appcode);
            $querys = "type=type";
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

            $list = $json->result->data;




            return view('/admin/calendar.calendar', ['list'=>$list]);

        }




    }
