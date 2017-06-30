
@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
@section('main-content')







{{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">--}}
    {{--Launch demo modal--}}
{{--</button>--}}

<!-- Modal -->
{{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body" name="content">--}}
                {{--...--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--<button type="submit" class="btn btn-primary">回复</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}





    <h2>输入回复的内容：</h2>
{{--{{session(['uid' => '18','username' => 'zty'])}}--}}
        <form action="{{url('/home/post/submit')}}" method="post" class="" style="margin-left: 10px;width: 70%">
            {{ csrf_field() }}
            <input type="hidden" value="{{$post[0]->tid}}" name="tid">
            <input type="hidden" value="{{$post[0]->fid}}" name="fid">
            <input type="hidden" value="{{$post[0]->pid}}" name="pid">
            {{--{{$post[0]->pid}}--}}
            <textarea class="form-control" rows="5" name="content"></textarea>
            <button type="submit" class="btn btn-lg btn-info"
                    style="width: 150px;margin-left: 10px; float: right; margin-top: 10px;margin-bottom: 20px">回帖</button>
        </form>



@endsection