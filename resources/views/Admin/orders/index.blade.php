@extends('admin.layout.master')

@section('title', 'Orders Table')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Orders Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>JOD {{ number_format($order->total_amount, 2) }}</td>
<td>
    <form action="{{ route('admin.orders.status.update', $order->id) }}" method="POST" class="status-form">
        @csrf
<select class="form-select status-dropdown" data-order-id="{{ $order->id }}">
    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
    <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
</select>
    </form>
</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.status-dropdown').change(function() {
        var orderId = $(this).data('order-id');
        var newStatus = $(this).val();

        $.ajax({
            url: "{{ route('admin.orders.status.update', ['id' => ':id']) }}".replace(':id', orderId),
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: newStatus
            },
            success: function(response) {
                if (response.success) {
                    alert('Order status updated successfully!');
                    location.reload(); // لإعادة تحميل الصفحة وعرض التحديث
                } else {
                    alert('Error: ' + response.error);
                }
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
});
</script>
@endsection