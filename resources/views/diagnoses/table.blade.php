<div class="table-responsive">
    <table class="table" id="diagnoses-table">
        <thead>
        <tr>
        <th>STT</th>
        <th>Người bệnh</th>
        <th>Chuẩn đoán</th>
        <th>Tổng tiền</th>
        <th>Đã trả</th>
        <th>Thời gian</th>
        </tr>
        </thead>
        <tbody>
        @foreach($diagnoses as $key => $diagnosis)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $diagnosis->partient->name }}</td>
            <td>{{ $diagnosis->name }}</td>
            <td>{{ $diagnosis->total_amount }}</td>
            <td>{{ $diagnosis->total_paid }}</td>
            <td>{{ $diagnosis->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
