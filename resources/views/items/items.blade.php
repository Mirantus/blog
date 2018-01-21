@foreach($items as $key => $value)
    <div>
        <b><small>{{ $value->date }}</small></b><br>
        <a href="{{ URL::to('/items/' . $value->id) }}">{{ $value->title }}</a><br>
        {{--<div>--}}
        {{--<a href="{{ URL::to('/items/' . $value->id . '/edit') }}">редактировать</a>--}}
        {{--&nbsp;&nbsp;--}}
        {{--<a href="">удалить</a>--}}
        {{--</div>--}}
        <hr>
    </div>
@endforeach