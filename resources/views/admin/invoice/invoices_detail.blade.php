@extends('layouts.admin_base')
@section('title','Invoices Detail')

@section('content')
    <br>
    <h1 class="text-center">Invoice Detail</h1>
    <br><br>
    <table class="table">
        <tr>
            <th>ISBN</th>
            <th>BOOK NAME</th>
            <th>IMAGE</th>
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
                    <p><img src={{$invoiceDetail->books_image}} width="100px" alt="a"></p>
                </td>
                <td>
                    <p>{{$invoiceDetail->invoices_detail_quantity}}</p>
                </td>
                <td>
                    <p>{{''.number_format($invoiceDetail->invoices_detail_price)}} VND</p>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Empty list</td>
            </tr>
        @endforelse
    </table>
@endsection
