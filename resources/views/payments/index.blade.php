@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch sử thanh toán</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" value="{{ $phoneSelected }}" name='phone' class="form-control"
                                   id="phone"
                                   placeholder="Nhập vào SĐT">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Họ Tên</label>
                            <input type="text" value="{{ $nameSelected }}" name='name' class="form-control"
                                   id="name" placeholder="Họ tên">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('payments.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $payments])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

