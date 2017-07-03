@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
@section('main-content')

    <h2 style="text-align: center">输入回复的内容：</h2>
{{--{{session(['uid' => '18','username' => 'zty'])}}--}}
        <form action="{{url('/home/post/submit/'.$type.'/'.$rid)}}" method="post" class="" style="margin-left: 10px;width: 70%">
{{--            {{var_dump($rid)}}--}}
            {{--{{die}}--}}
            {{ csrf_field() }}
            <input type="hidden" value="{{$post[0]->tid}}" name="tid">
            <input type="hidden" value="{{$post[0]->fid}}" name="fid">
            <input type="hidden" value="{{$post[0]->pid}}" name="pid">
            {{--{{$post[0]->pid}}--}}
            <textarea style="width:70%;margin:auto;" class="form-control" rows="5" name="content"></textarea>
            <button type="submit"  class="btn btn-lg btn-info"
                    style="width: 150px;margin-left: 10px; float: right; margin-top: 10px;margin-bottom: 20px">回帖</button>
        </form>

    <div class="blog-center-top clearfix">
        <a href="{{url('/home/post/')}}" > <button style="margin-top:10px;margin-left:20px" class="btn btn-default">返回帖子列表</button> </a>

        <div class="blog-center-top-right">

@endsection

