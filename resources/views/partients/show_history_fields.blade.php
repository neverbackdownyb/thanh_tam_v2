<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Chuẩn đoán</th>
        <th scope="col">Ghi chú</th>
        <th scope="col">Lịch hẹn</th>
        <th scope="col">Tổng tiền phải trả</th>
        <th scope="col">Còn nợ</th>
        <th scope="col">Thời gian</th>
    </tr>
    </thead>
    <tbody>

    @if($history->isEmpty())
        <tr>
            <th scope="row">Chưa có lịch sử khám bệnh</th>
        </tr>
    @else
        @foreach($history as  $key => $item)
            <tr>
                <th scope="row">{!! $key + 1 !!}</th>
                <td>{{ $item->name ?? '' }}</td>
                <td>{{ $item->note ?? '' }}</td>
                <td>{{ $item->schedule ?? '' }}</td>
                <td>{{ number_format($item->total_amount)   }}</td>
                <td>{{ number_format($item->total_amount - $item->total_paid ) }}</td>

                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
