@extends('backend.layouts.template')

@section('content')
<main id="main" class="main">

    {{-- HEADER --}}
    <div class="pagetitle">
        <h1>RIWAYAT HIDUP</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">Riwayat Hidup</li>
                <li class="breadcrumb-item active">Edit Pendidikan</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Edit Pendidikan</h5>

                        {{-- ERROR --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- FORM --}}
                        <form class="row g-3" method="POST" action="{{ route('pendidikan.update', $data->id) }}">
                            @csrf
                            @method('PUT')

                            {{-- NAMA --}}
                            <div class="col-12">
                                <label class="form-label">Nama Sekolah</label>
                                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                            </div>

                            {{-- TINGKATAN --}}
                            <div class="col-12">
                            <label class="form-label">Tingkatan</label>
                            <select name="tingkatan" class="form-control" required>
                                <option value="SD" {{ $data->tingkatan == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ $data->tingkatan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA/SMK" {{ $data->tingkatan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                <option value="D3" {{ $data->tingkatan == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ $data->tingkatan == 'S1' ? 'selected' : '' }}>S1</option>
                            </select>
                        </div>
                            {{-- TAHUN MASUK --}}
                            <div class="col-12">
                                <label class="form-label">Tahun Masuk</label>
                                <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control" value="{{ $data->tahun_masuk }}" required>
                            </div>

                            {{-- TAHUN SELESAI --}}
                            <div class="col-12">
                                <label class="form-label">Tahun Selesai</label>
                                <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control" value="{{ $data->tahun_keluar }}" required>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
                                </button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection

{{-- DATEPICKER --}}
@push('content-css')
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('content-js')
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>

<script>
    $('#tahun_masuk').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });

    $('#tahun_keluar').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });
</script>
@endpush