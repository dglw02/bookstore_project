@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    @foreach($books as $book)
        <tr>
            <td>
                <p>{{$book->$books_name}}</p>
                <img src="{{$book->$books_image}}" width="150px"/>
            </td>
            <td>
                {{$book->$books_description}}
            </td>
            <td>

            </td>
        </tr>

    @empty
        <tr><td colspan="3">List empty</td></tr>
        @endforeach()

@endsection
