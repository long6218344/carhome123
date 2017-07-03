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
            if (1 == strpos("$" . $host, "https://")) {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            }

            $data = curl_exec($curl);
            $json = json_decode($data);

            $list = $json->result->data;


            return view('/admin/calendar.calendar', ['list' => $list]);

        }

        // IP地址查询
        public function ip()
        {


            if ($_SERVER['REMOTE_ADDR']) {
                $cip = $_SERVER['REMOTE_ADDR'];
            } elseif (getenv("REMOTE_ADDR")) {
                $cip = getenv("REMOTE_ADDR");
            } elseif (getenv("HTTP_CLIENT_IP")) {
                $cip = getenv("HTTP_CLIENT_IP");
            } else {
                $cip = "unknown";
            }


//            dump($cip);die;

            $host = "http://saip.market.alicloudapi.com";
            $path = "/ip";
            $method = "GET";
            $appcode = "f904bb7f4bf4495b8c0fd0ab0a35317c	";
            $headers = array();
            array_push($headers, "Authorization:APPCODE " . $appcode);
            $querys = "ip=" . $cip;
            $bodys = "";
            $url = $host . $path . "?" . $querys;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($curl, CURLOPT_FAILONERROR, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_HEADER, true);
            if (1 == strpos("$" . $host, "https://")) {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            }

            $data = curl_exec($curl);
            $json = json_decode($data);
            $json = $json->showapi_res_body;
//            dd($json);


            return view('/admin/ip/ip', ['list' => $json]);


        }


        public function selectip(Request $ip)
        {
            $ip = $ip->ip;

            $host = "http://saip.market.alicloudapi.com";
            $path = "/ip";
            $method = "GET";
            $appcode = "f904bb7f4bf4495b8c0fd0ab0a35317c	";
            $headers = array();
            array_push($headers, "Authorization:APPCODE " . $appcode);
            $querys = "ip=" . $ip;
            $bodys = "";
            $url = $host . $path . "?" . $querys;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($curl, CURLOPT_FAILONERROR, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_HEADER, true);
            if (1 == strpos("$" . $host, "https://")) {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            }

            $data = curl_exec($curl);
            $json = json_decode($data);
            if ($json->showapi_res_body->ret_code == "-1")
            {
                return redirect('/admin/notice')->with(['message' =>  $json->showapi_res_body->remark ,
                    'url' => '/admin/ip', 'jumpTime' => 3, 'status' => false]);
            }

            return redirect('/admin/notice')->with(['message' => '该ip地址所在:' . $json->showapi_res_body->region . ',所属官方:' . $json->showapi_res_body->isp,
                'url' => '/admin/ip', 'jumpTime' => 3, 'status' => true]);

        }
    }