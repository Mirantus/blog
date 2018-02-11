<p>
    <small>
        @foreach($tags as $tag)
                <a href="#" onclick="return addTag('{{ $tag }}')">{{ $tag }}</a>&nbsp;
        @endforeach
    </small>
</p>

<script>
    function addTag(tag) {
        const el = document.getElementById('tags');
        let tags = el.value ? el.value.split("\n") : [];
        tags = tags.map(tag => tag.replace("\r"));
        if (!~tags.indexOf(tag)) {
            tags.push(tag);
            el.value = tags.join("\n");
        }

        return false;
    }
</script>