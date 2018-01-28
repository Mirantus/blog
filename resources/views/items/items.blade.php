@foreach($items as $key => $value)
    <div>
        <b><small>{{ $value->date }}</small></b><br>
        <a href="{{ URL::to('/items/' . $value->id) }}">{{ $value->title }}</a><br>
        @auth
            <div>
                <small><a href="{{ URL::to('/items/' . $value->id . '/edit') }}">редактировать</a></small>
                &nbsp;&nbsp;
                <small><a href="#" onclick="confirm('Действительно удалить?') ? document.forms.remove{{ $value->id  }}.submit() : null; return false;">удалить</a></small>
            </div>
            <form name="remove{{ $value->id  }}" method="POST" action="/items/{{ $value->id  }}">
                {{ csrf_field() }}

                <input name="_method" type="hidden" value="DELETE">
            </form>
        @endauth
        <hr>
    </div>
@endforeach