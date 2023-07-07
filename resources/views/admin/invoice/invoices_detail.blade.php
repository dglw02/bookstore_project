@extends('layouts.admin_base')
@section('title','Chi tiết hóa đơn')

@section('content')
    <br>
    <h3>Invoice ID : {{$invoice->invoices_id}}</h3>

    <br><br>
    <table class="table">
        <tr>
            <th>ISBN</th>
            <th>BOOK NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
        </tr>
        @forelse($invoiceDetails as $invoiceDetail)
            <tr>
                <td>
                    <p>{{$invoiceDetail->books_ISBN}}</p>
                </td>
                <td>
                    <p>{{$invoiceDetail->books_name}}</p>
                </td>
                <td>
                    <p>{{$invoiceDetail->invoices_detail_quantity}}</p>

                </td>
                <td>
                    <p>{{' $'.number_format($invoiceDetail->invoices_detail_price)}}</p>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection
