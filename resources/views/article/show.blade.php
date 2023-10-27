@extends('layouts.app')

@section('content')
<div>
    @if($article->image)
        <img src="{{ asset('storage/articles/'.$article->image) }}" height="300px" />
    @endif

    {{ $article->title }}
    User : {{ $article->user->name }}
    <p>
        {{ $article->description }}
    </p>

    <a href="{{ route('articles.edit', ['id' => $article->id]) }}">Edit</a>
    <button id="btn-delete">Hapus</button>

</div>
<script>
    $(document).ready(function() {
        $('#btn-delete').on('click', function() {
            event.preventDefault();

            $.ajax({
                url: "{{ route('articles.destroy', ['id' => $article->id]) }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'DELETE',
                success: function(data) {
                    window.location.href = "{{ route('home') }}";
                },
                error: function(xhr, status, error) {
                    const data = xhr.responseJSON;
                    toastr.error(data.message, 'Opps!');
                }
            })
        });
    });
</script>
@endsection
