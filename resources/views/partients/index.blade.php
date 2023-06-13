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
                            <div class="form-group col-md-3">
                                <label for="name">Quê Quán</label>
                                <select class="select2 form-control selectProvince" name="province_id" id="province">
                                    <option value="">--Chọn quê quán --</option>
                                    @foreach($province as $item)
                                        <option @if($provinceIdSelected == $item->province_id) selected
                                                @endif value="{{ $item->province_id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row container-fluid">
            <div class="col-sm-12 ">
                <a class="btn btn-info float-right"
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

<script>
    $(document).ready(function () {
        $('.selectProvince').select2({
            tags: false,
        });
    })
</script>
