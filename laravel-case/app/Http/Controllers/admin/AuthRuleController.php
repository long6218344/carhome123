<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AuthRuleController extends Controller
{
    // 添加规则列表页面
    public function index(){

        return view('/admin.authrule.index');
    }
    // 执行添加规则页面
    public function insert(){
        $action = Route::currentRouteAction();
//        dump($action);

        return back();
    }
}
