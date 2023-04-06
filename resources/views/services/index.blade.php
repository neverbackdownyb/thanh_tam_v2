@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách Dịch vụ</h1>
                </div>
            </div>
        </div>
        <div class="row container-fluid">
            <div class="col-sm-6">
                <a class="btn btn-primary float-left"
                   href="{{ route('services.create') }}">
                    Thêm mới
                </a>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('services.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $services])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

