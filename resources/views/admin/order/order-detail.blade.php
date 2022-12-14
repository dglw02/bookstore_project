@extends('layouts.admin_base')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container-fluid">

                <div class="card my-4">
                    <div class="card-header">
                        <h4>Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-user"></i> <span class="mx-2">{{$order->user->name}}</span></p>
                        <p><i class="fas fa-phone"></i><span class="mx-2">{{$order->user->phone}}</span></p>
                        <p><i class="fas fa-map-marked"></i> <span
                                class="mx-2">{{$order->user->address}}, {{$order->user->city->city_name}}</span></p>
                    </div>
                </div>
                <div class="order-product mb-4">
                    <h4 class="my-4 p-4 bg-light">Order information</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0;@endphp
                        @foreach($order_details as $ord)
                            <tr>
                                <td>{{$ord->books->books_name}}</td>
                                <td><img src={{$ord->books->books_image}} width="150px" alt="a"></td>
                                <td>{{$ord->quantity}}</td>
                                <td>{{$ord->price}}$</td>
                                @php $total += $ord->quantity * $ord->price @endphp
                                <td>{{$ord->quantity * $ord->price}}$</td>
                            </tr>
                        @endforeach
                        @php $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price @endphp
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="1"></td>
                            <td><strong>Total</strong></td>
                            <td><strong>{{$grandtotal}}$</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{url('/admin/order/'.$order->orders_id.'/update')}}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Order status</h4>
                    </div>
                    <br>
                    <div class="card my-4">
                        <div class="card-body">
                            <select class="form-control" name="orders_status">
                                <option {{$order->orders_status == '0'? 'selected':''}} value="0">Pending</option>
                                <option {{$order->orders_status == '1'? 'selected':''}} value="1">Approved</option>
                                <option {{$order->orders_status == '2'? 'selected':''}} value="2">Completed</option>
                                <option {{$order->orders_status == '3'? 'selected':''}} value="3">Canceled</option>
                            </select> <br>
                            <button type="submit" class="btn btn-block btn-success">Update status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
