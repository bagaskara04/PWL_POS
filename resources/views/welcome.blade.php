@extends('layouts.template')

@section('content')

    <!-- Profil Pengguna -->
    <div class="card mt-4">
        <div class="card-header text-center">
            <h3 class="card-title">Profil Pengguna</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    @php
                        $foto = Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : null;
                    @endphp

                    <img src="{{ $foto }}" class="img-thumbnail" width="350" alt="Foto Profil" id="preview-image">


                    <!-- Form Upload Foto -->
                    <form action="{{ url('/update_photo') }}" method="POST" enctype="multipart/form-data" class="mb-2">
                        @csrf
                        <input type="file" name="photo" id="photo" class="form-control mb-2" accept="image/*"
                            onchange="previewPhoto()" required>
                        <button type="submit" class="btn btn-primary w-100">Change Foto</button>
                    </form>

                    <!-- Tombol Hapus Foto -->
                    @if (Auth::user()->photo)
                        <form action="{{ url('/delete_photo') }}" method="POST" class="mb-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">Delete Photo</button>
                        </form>
                    @endif

                    <!-- Tombol Logout -->
                    <form action="{{ url('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Alert -->
            @if (session('success'))
                <div class="alert alert-success mt-3 text-center">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-3 text-center">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mt-3 text-center">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        function previewPhoto() {
            const input = document.getElementById('photo');
            const preview = document.getElementById('preview-image');

            const file = input.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
