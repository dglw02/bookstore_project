@extends('layouts.admin_base')

@section('content')
    <h1 class="text-center">Tạo sản phẩm mới</h1>
    <form action="{{url('admin/products/create')}}" method="POST">
        @csrf
        <br>
        <input name="bookName" type="text" class="form-control" placeholder="Tên sản phẩm">
        <br>
        <input name="bookCategory" type="number" class="form-control" placeholder="Danh mục sản phẩm">
        <br>
        <input name="bookPublisher" type="number" class="form-control" placeholder="Nhà phát hành sản phẩm">
        <br>
        <textarea name="bookDescription" id="editor"></textarea>
        <br>
        <input name="bookAuthor" type="number" class="form-control" placeholder="Tác giả sản phẩm">
        <br>
        <input name="bookQuantity" type="number" class="form-control" placeholder="Số lượng sản phẩm">
        <br>
        <input name="bookImage" type="text" class="form-control" placeholder="Ảnh sản phẩm - nhập URL">
        <br>
        <input name="bookPrice" type="number" class="form-control" placeholder="Giá sản phẩm">
        <br>
        <input name="bookIsbn" type="number" class="form-control" placeholder="Mã sản phẩm">
        <br>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection

@section('js')
@parent
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
