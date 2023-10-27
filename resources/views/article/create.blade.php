@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row" id="create_form" enctype="multipart/form-data">
            <div class="col-lg-12 mb-3">
                <label class="d-flex align-items-center fs-6 form-label mb-2">
                    <span class="fw-bold required">Upload Gambar</span>
                </label>
                <input type="file" name="image" class="form-control form-control-solid">
            </div>
            <div class="col-lg-12 mb-3">
                <label class="d-flex align-items-center fs-6 form-label mb-2">
                    <span class="fw-bold required">Judul Article</span>
                </label>
                <input type="text" name="title" class="form-control form-control-solid">
            </div>
            <div class="col-lg-12 mb-3">
                <label class="d-flex align-items-center fs-6 form-label mb-2">
                    <span class="fw-bold required">Isi Article</span>
                </label>
                <textarea type="text" name="description" class="form-control form-control-solid">
                </textarea>
            </div>
            <button id="submit" action="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#create_form').on('submit', function() {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('articles.store') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
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
