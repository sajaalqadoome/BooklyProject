@extends('User.layouts.master')

@section('title', 'My Orders')

@section('content')
    <div class="container py-5">
        <h1>My Orders</h1>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">
                You haven't placed any orders yet.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Total (JOD)</th>
                    
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>
                                @if($order->status === 'completed')
                                    <span class="text-success">Completed</span>
                                @else
                                    <span class="text-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                      
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection