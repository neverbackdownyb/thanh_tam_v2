@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch sử khám bệnh</h1>
                    <h7>Bệnh nhân : {{ $history->first()->partient->name }} </h7>
                    <br>

                    <h7>Số điện thoại : {{ $history->first()->partient->phone }}</h7>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('partients.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('partients.show_history_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
