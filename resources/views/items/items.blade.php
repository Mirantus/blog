@foreach($items as $key => $value)
    <div>
        <b><small>{{ $value->date }}</small></b><br>
        <a href="{{ URL::to('/items/' . $value->id) }}">{{ $value->title }}</a><br>
        @auth
            <div>
                <small><a href="{{ URL::to('/items/' . $value->id . '/edit') }}">редактировать</a></small>
                {{--&nbsp;&nbsp;--}}
                {{--<a href="">удалить</a>--}}
            </div>
        @endauth
        <hr>
    </div>
@endforeach