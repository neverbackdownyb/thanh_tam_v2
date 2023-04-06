@extends('layouts.app')

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
      integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
<style>
    .scrollable-table {
        overflow-x: auto;
    }

    table {
        border-collapse: collapse;
    }

    th, td {
        padding: .25em;
        border: 1px solid darkgrey;
    }

    body {
        margin: 2em;
    }
</style>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý người bệnh</h1>
                </div>

            </div>
        </div>
        <div class="row container-fluid">
            <div class="col-sm-6 ">
                <a class="btn btn-primary float-left"
                   href="{{ route('partients.create') }}">
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
                @include('partients.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $partients])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection



