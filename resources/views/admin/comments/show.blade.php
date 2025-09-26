@if($post->attachment)
    <p>Pielikums:
        <a href="{{ asset('storage/'.$post->attachment) }}" target="_blank">Lejupielādēt</a>
    </p>
@endif
