@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Manage Kategori</h3>
                <a href="{{ url('/kategori/create') }}" class="btn btn-success" style="margin-left: auto">+ Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

    <script>
        $(document).on('click', '.delete-btn', function() {
            var kategoriId = $(this).data('id');

            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                $.ajax({
                    url: "{{ url('/kategori') }}/" + kategoriId,
                    type: 'POST', 
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });

            }
        });
    </script>
@endpush
