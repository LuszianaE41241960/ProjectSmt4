@extends('backend.layouts.template')

@section('content')
<main id="main" class="main">

    {{-- HEADER --}}
    <div class="container-fluid" style="background: #edf1f5; padding: 20px 25px 5px 25px;">

    {{-- TITLE --}}
    <h1 class="text-secondary fw-light d-flex align-items-center mb-2">
        <i class="bi bi-file-earmark-text me-2"></i> RIWAYAT HIDUP
    </h1>

    {{-- BREADCRUMB --}}
    <div style="background: #ffffff; padding: 8px 15px; border: 1px solid #e9e9e9;">
        <nav>
            <ol class="breadcrumb mb-0 p-0" style="background: transparent; font-size: 0.8rem;">
                <li class="breadcrumb-item">
                                    <a href="{{ url('dashboard') }}" class="text-primary text-decoration-none">
                                        <i class="bi bi-house-door me-1"></i> Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-secondary">
                                    <i class="bi bi-file-earmark-text me-1"></i> Riwayat Hidup
                                </li>
                                <li class="breadcrumb-item active">
                                    <i class="bi bi-briefcase me-1"></i> Pengalaman Kerja
                                </li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

               <div class="card" style="border: 1px solid #e9e9e9; margin-top:15px;">

    {{-- HEADER ABU --}}
    <div style="
        background: #f1f1f1;
        padding: 12px 20px;
        border-bottom: 1px solid #e9e9e9;
    ">
        <h5 class="mb-0 text-secondary" style="font-size: 15px; font-weight: 400;">
            Menambahkan Pengalaman Kerja
        </h5>
    </div>

    {{-- BODY PUTIH --}}
    <div class="card-body" style="background:#fff;">

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
        <form method="POST" action="{{ route('pengalaman_kerja.store') }}">
    @csrf

    {{-- NAMA --}}
    <div class="row align-items-center py-3" style="border-bottom:1px solid #e9e9e9;">
        <label class="col-md-3 col-form-label">Nama Perusahaan</label>
        <div class="col-md-9">
            <input type="text" name="nama" class="form-control" required>
        </div>
    </div>

    {{-- JABATAN --}}
    <div class="row align-items-center py-3" style="border-bottom:1px solid #e9e9e9;">
        <label class="col-md-3 col-form-label">Jabatan</label>
        <div class="col-md-9">
            <input type="text" name="jabatan" class="form-control" required>
        </div>
    </div>

    {{-- TAHUN MASUK --}}
    <div class="row align-items-center py-3" style="border-bottom:1px solid #e9e9e9;">
        <label class="col-md-3 col-form-label">Tahun Masuk</label>
        <div class="col-md-9">
            <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control" required>
        </div>
    </div>

    {{-- TAHUN SELESAI --}}
    <div class="row align-items-center py-3" style="border-bottom:1px solid #e9e9e9;">
        <label class="col-md-3 col-form-label">Tahun Selesai</label>
        <div class="col-md-9">
            <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control" required>
        </div>
    </div>

    {{-- BUTTON --}}
    <div class="mt-3 pt-3">
        <button type="submit" class="btn btn-primary me-2">
            <i class="bi bi-save"></i> Save
        </button>
        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">
            Cancel
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

{{-- CSS --}}
@push('content-css')
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

{{-- JS --}}
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