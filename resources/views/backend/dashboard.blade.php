@extends('backend.layouts.template')

@section('content')

<div class="page-breadcrumb" style="background: #edf1f5; padding: 20px 25px 5px 25px;">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title text-uppercase" style="letter-spacing: 2px; color: #99a1aa; font-weight: 300; font-size: 2.2rem; display: flex; align-items: center;">
                <i class="mdi mdi-laptop me-2" style="font-size: 2.5rem; opacity: 0.5;"></i> DASHBOARD
            </h1>
        </div>
    </div>
</div>

<div style="background: #edf1f5; padding: 0 25px 20px 25px;">
    <div style="background: #ffffff; padding: 10px 20px; border: 1px solid #e9e9e9;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0" style="background: transparent; font-size: 0.85rem;">
                <li class="breadcrumb-item">
                    <a href="#" style="color: #4a90e2; text-decoration: none;">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #666;">
    <i class="mdi mdi-laptop"></i> Dashboard
</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid" style="background: #edf1f5; min-height: 80vh; padding: 0 25px 40px 25px;">
    <div class="row">
        
        <div class="col-md-3">
            <div class="card text-white" style="background-color: #7e94a5; border: none; border-radius: 0;">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <i class="mdi mdi-download text-white-50" style="font-size: 5rem;"></i>
                    <div class="text-end">
                        <h1 class="font-light text-white mb-0" style="font-size: 3rem;">6.674</h1>
                        <p class="text-uppercase text-white-50 mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Download</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background-color: #cfba91; border: none; border-radius: 0;">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <i class="mdi mdi-cart text-white-50" style="font-size: 5rem;"></i>
                    <div class="text-end">
                        <h1 class="font-light text-white mb-0" style="font-size: 3rem;">7.538</h1>
                        <p class="text-uppercase text-white-50 mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Purchased</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background-color: #212121; border: none; border-radius: 0;">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <i class="mdi mdi-thumb-up text-white-50" style="font-size: 5rem;"></i>
                    <div class="text-end">
                        <h1 class="font-light text-white mb-0" style="font-size: 3rem;">4.362</h1>
                        <p class="text-uppercase text-white-50 mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Order</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background-color: #8bbd94; border: none; border-radius: 0;">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <i class="mdi mdi-cube-outline text-white-50" style="font-size: 5rem;"></i>
                    <div class="text-end">
                        <h1 class="font-light text-white mb-0" style="font-size: 3rem;">1.426</h1>
                        <p class="text-uppercase text-white-50 mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Stock</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection