<p>
    @foreach($tags as $tag)
        <a href="{{ URL::to('/tag/' . $tag) }}">{{ $tag }}</a>&nbsp;
    @endforeach
</p>