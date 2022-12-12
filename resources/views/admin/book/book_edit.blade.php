@extends('layouts.admin_base')

@section('title','Cập nhật sản phẩm')

@section('content')
    <h1 class="text-center">Cập nhật sản phẩm</h1>

    <form action="{{url('/admin/product/'.$book->books_id.'/edit')}}" method="POST">
        @csrf
        @method('put')
        <br>
        <input value="{{ $book->books_name  }}" name="bookName" type="text" class="form-control"
               placeholder="Tên sản phẩm">
        <br>
        <input value="{{ $book->books_category  }}" name="bookCategory" type="number" class="form-control" placeholder="Danh mục sản phẩm">
        <br>
        <input value="{{ $book->books_publisher  }}" name="bookPublisher" type="number" class="form-control" placeholder="Nhà phát hành sản phẩm">
        <br>
        <textarea name="bookDescription" id="editor" placeholder="Mô tả sản phẩm">{{$product->books_description}}</textarea>
        <br>
        <input value="{{ $book->books_author  }}" name="bookAuthor" type="number" class="form-control" placeholder="Tác giả sản phẩm">
        <br>
        <input value="{{ $book->books_quantity  }}" name="quantity" type="number" class="form-control" placeholder="Số lượng sản phẩm">
        <br>
        <input value="{{ $book->books_image }}" name="productImageURL" type="text" class="form-control"
               placeholder="Link ảnh sản phẩm - nhập URL">
        <br>
        <input value="{{ $book->books_price  }}" name="productPrice" type="number" class="form-control"
               placeholder="Giá sản phẩm">
        <br>
        <input value="{{ $book->books_ISBN  }}" name="bookIsbn" type="number" class="form-control" placeholder="Mã sản phẩm">
        <br>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection

@section('js')
    @parent
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
