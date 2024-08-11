@extends('admin.layouts.app')

@push('plugin-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
         <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kelas</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Kelas</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-right">Form Kelas</h4>
                    </div>
                    <form action="{{ route('course.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data"> @csrf
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="form-group">
                                    <label>Kategori <span class="text-danger">*</span></label>
                                    <select name="course_category_id" class="form-control select2 @error('course_category_id') is-invalid @enderror">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label>Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Masukkan judul" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mentor <span class="text-danger">*</span></label>
                                    <select name="mentor_id" class="form-control select2 @error('mentor_id') is-invalid @enderror">
                                        <option selected disabled>Pilih Mentor</option>
                                        @foreach ($mentor as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('mentor_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan <span class="text-danger">*</span></label>
                                    <input type="text" name="job" class="form-control  @error('job') is-invalid @enderror" placeholder="Masukkan pekerjaan" value="{{ old('job') }}">
                                    @error('job')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Waktu <span class="text-danger">*</span></label>
                                    <input type="number" name="time" class="form-control  @error('time') is-invalid @enderror" placeholder="Masukkan waktu" value="{{ old('time') }}">
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Gambar</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="formFile" onchange="previewImage(event)">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mt-3">
                                        <img id="imagePreview" src="#" alt="Preview Gambar" style="max-width: 300px; display: none;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-secondary bg-gradient wafes-effect waves-light"> Simpan Data</button>
                                <a  href="{{ route('course.index') }}" class="btn btn-light bg-gradient wafes-effect waves-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('custom-js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush