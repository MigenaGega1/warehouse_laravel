@extends('layouts.app')
@section('content')
    @can('isAdmin')
        @unless(count($orders) == 0)
            <div class="body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="container-xl ">
                    <div class="table-responsive shadow-md">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <a href="/dashboard" class="flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                                            </svg>
                                        </a>
                                        <h2>Order<b>Management</b></h2>
                                    </div>
                                    <div class="col-sm-7">
                                        <a href="/orders/create" class="btn btn-secondary"><span> + Add New Order</span></a>

                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client ID</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Products</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr data-entry-id="{{ $order->id }}">
                                            <td>
                                                {{ $order->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $order->client->first_name }} {{ $order->client->last_name }}
                                            </td>
                                            <td>
                                                {{ $order->user->first_name }} {{ $order->user->last_name }}
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>

                                            <td>
                                                <ul class="list-disc align-items-center ">
                                                    @foreach ($order->products as $key => $product)
                                                        <li> {{ $product->name }} ({{ $product->pivot->quantity }} x
                                                            ${{ $product->price }}={{ $product->pivot->quantity * $product->price }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{ $order->status }}
                                            </td>
                                            <td>
                                                <div class="flex space-x-2">
                                                    <a href="/orders/{{ $order->id }}/edit" class="settings" title="Edit"
                                                        data-toggle="tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    @if ($order->status == 'pending' || $order->status == 'accepted')
                                                        <button type="submit" class="default-btn floatright truncate"><a
                                                                href="/orders/{{ $order->id }}/cancel"> Cancel
                                                                Order</a></button>
                                                    @endif

                                                </div>




                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center ">

                {{ $orders->links() }}
            </div>
        @else
            <div class="items-center text-lg">
                <p>No Order Found</p>
                <div class="col-sm-7">
                    <a href="/orders/create" class="btn btn-secondary"><span>Create New Order</span></a>

                </div>
            </div>
            </div>
        @endunless
    @endcan


    @can('isOperator')
        @unless(count($ordersOperator) == 0)
            <div class="body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="container-xl ">
                    <div class="table-responsive shadow-md">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <a href="/dashboard" class="flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                                            </svg>
                                        </a>
                                        <h2>Order<b>Management</b></h2>
                                    </div>
                                    <div class="col-sm-7">
                                        <a href="/orders/create" class="btn btn-secondary"><span> + Add New Order</span></a>

                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client ID</th>
                                        <th>Created by</th>

                                        <th>Created at</th>
                                        <th>Products</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersOperator as $key => $order)
                                        <tr data-entry-id="{{ $order->id }}">
                                            <td>
                                                {{ $order->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $order->client->first_name }} {{ $order->client->last_name }}
                                            </td>
                                            <td>
                                                {{ $order->user->first_name }} {{ $order->user->last_name }}
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>

                                            <td>
                                                <ul class="list-disc align-items-center ">
                                                    @foreach ($order->products as $key => $product)
                                                        <li> {{ $product->name }} ({{ $product->pivot->quantity }} x
                                                            ${{ $product->price }}={{ $product->pivot->quantity * $product->price }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{ $order->status }}
                                            </td>
                                            <td>
                                                <div class="flex space-x-2">
                                                    <a href="/orders/{{ $order->id }}/edit" class="settings" title="Edit"
                                                        data-toggle="tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </a>

                                                    @if ($order->status == 'pending' || $order->status == 'accepted')
                                                        <button type="submit" class="default-btn floatright truncate"><a
                                                                href="/orders/{{ $order->id }}/cancel"> Cancel
                                                                Order</a></button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center ">

                {{ $ordersOperator->links() }}
            </div>
        @else
            <div class="items-center text-lg">
                <p>No Order Found</p>
                <div class="col-sm-7">
                    <a href="/orders/create" class="btn btn-secondary"><span>Create New Order</span></a>

                </div>
            </div>
        @endunless
    @endcan



































    <style>
        .body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #406d94;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn:hover,
        .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.settings {
            color: #2196F3;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }



        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }
    </style>




    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
