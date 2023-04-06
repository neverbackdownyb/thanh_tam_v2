<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Chuẩn đoán</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Đã Thanh toán</th>
        <th scope="col">Hình thức</th>
        <th scope="col">Ghi chú</th>
        <th scope="col">Thời gian</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $payments = $partients->payments;

    ?>
    @if($payments->isEmpty())
        <tr>
            <th scope="row">Chưa có lịch sử thanh toán nào</th>
        </tr>
    @else
        @foreach($payments as  $key => $item)
        <tr>
            <th scope="row">Lần {!! $key + 1 !!}</th>
            <td>{{ $item->diagnosis->name ?? '' }}</td>
            <td>{{ number_format($item->diagnosis->total_amount) }}</td>
            <td>{{ number_format($item->total_money) }}</td>
            <td>{{ \App\Models\Payments::$listPaymentType[$item->type] }}</td>
            <td>{{  $item->note }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>
