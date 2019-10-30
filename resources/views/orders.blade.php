@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <table class="table table-bordered" id="orders-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Total Amt</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('get.orders') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer.name', name: 'customer.name' },
                    { data: 'total_amount', name: 'total_amount' },
                    { data: 'created_at', name: 'created_at', searchable: false },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                    
                ]
            });
        });
    </script>
@endpush