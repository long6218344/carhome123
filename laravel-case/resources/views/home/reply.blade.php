<html>


{{--{{session(['uid' => '18','username' => 'zty'])}}--}}
        <form action="{{url('/home/post/submit')}}" method="post" class="clearfix " style="margin-left: 10px;width: 70%">
            {{ csrf_field() }}
            <input type="hidden" value="{{$post[0]->tid}}" name="tid">
            <input type="hidden" value="{{$post[0]->fid}}" name="fid">
            <input type="hidden" value="{{$post[0]->pid}}" name="pid">
            {{--{{$post[0]->pid}}--}}
            <textarea class="form-control" rows="5" name="content"></textarea>
            <button type="submit" class="btn btn-lg btn-info"
                    style="width: 150px;margin-left: 10px; float: right; margin-top: 10px;margin-bottom: 20px">回帖</button>
        </form>


</html>