@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
  
            </div>
        </div>
    </div>
    <!-- end page title -->
  
    <div class="row">
        <div class="col-lg-12">
  
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Selamat {{ Carbon\Carbon::now()->timezone('Asia/Jakarta')->locale('id_ID')->isoFormat('A') }}, {{ Auth::user()->name }}!</h4>
                                <p class="text-muted mb-0">Semua sistem berjalan dengan lancar.</p>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection