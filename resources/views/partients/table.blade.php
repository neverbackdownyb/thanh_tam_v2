<div class="table-responsive">
    <table class="table" id="partients-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Họ Tên</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền phải trả</th>
            <th>Đã trả</th>
            <th>Còn nợ</th>
            <th>Ngày khám gần nhất</th>
            <th>Lịch hẹn gần nhất</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partients as $key => $item)
             <?php
             $totalPaid = 0;
             $payments = $item->payments;

             foreach ($payments as $paymentItem) {
                 $totalPaid += $paymentItem->total_money;
             }
                 $totalAmount = ($item->diagnosis->sum('total_amount'));
                 $lastChange = !empty($item->diagnosis->last()) ? $item->diagnosis->last()->created_at : $item->created_at;
                 $scheduleItem = $item->diagnosis->sortByDesc('schedule')->first();
                 $schedule = $scheduleItem->schedule;
             ?>
            <tr>
                <td>{{ $key  + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>

                <td>{{ number_format($totalAmount) }}</td>
                <td>{{ number_format($totalPaid) }}</td>

                <td style="@if($totalAmount - $totalPaid > 500000) color: red @endif">{{  number_format($totalAmount - $totalPaid) }}</td>

                <td>{{ $lastChange }}</td>
                <td>{{  $schedule }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partients.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a  target="_blank" href="{{ route('partients.show', [$item->id]) }}"
                           class='btn btn-default btn-xs'
                           data-toggle="tooltip" data-placement="left" title="Lịch sử thanh toán"
                        >
                            <i class="fa fa-university" aria-hidden="true"></i>

                        </a>

                       <a  target="_blank" href="{{ route('partients.history', [$item->id]) }}"
                           class='btn btn-default btn-xs'
                          data-toggle="tooltip" data-placement="top" title="Lịch sử khám bệnh"
                       >
                            <i class="fa fa-history"></i>
                        </a>

                        <a   target="_blank" href="{{ route('partients.edit', [$item->id]) }}"
                           class='btn btn-default btn-xs'
                           data-placement="top" title="Cập nhật thông tin"
                        >
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
