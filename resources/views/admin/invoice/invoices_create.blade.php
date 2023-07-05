@extends('layouts.admin_base')
@section('content')
<?php
$products = Illuminate\Support\Facades\DB::table('books')
    ->select('books.*')
    ->get();
?>
    <div class="card push-top">
        <div class="card-header">
            <h1>Invoices</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="POST" action="{{url('admin/invoices/create')}}">
                @csrf
                <br>
    <label for="user_id">Người nhập:</label>
    <br>
    <?php
    $users = Illuminate\Support\Facades\DB::table('Users')
        ->select('Users.*')->where('Users.isAdmin', '=', 1)
        ->get();
    ?>
    <select class="form-control" id="" name="user_id" required>
        @foreach($users as $user)
        <option value="{{ $user->id }}"> {{ $user->name }}</option>
        @endforeach
    </select>
                <div class="form-group">
                    <label for="invoices_name">Name</label>
                    <input type="text" class="form-control" name="invoices_name" placeholder="Please enter "/>
                </div>

                <div class="form-group">
                    <label for="invoices_description">Description</label>
                    <input type="text" class="form-control" name="invoices_description" placeholder="Please enter "/>
                </div>
    <table id="mytable">
        <tr>
            <th></th>
            <th>Books name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <tr>
            <td style="text-align:center;"><input type="checkbox"></td>
            <td>
                <select class="form-control" id="" name="books_id[]" required>
                    @foreach($books as $book)
                    <option value="{{ $book->books_id }}">{{ $book->books_name}}</option>
                    @endforeach
            </td>
            <td><input name="invoices_detail_quantity[]" min="1" type="number" class="form-control" placeholder="Quantity"></td>
            <td><input name="invoices_detail_price[]" min="1" type="number" class="form-control" placeholder="Price"></td>
        </tr>
    </table>
    <br>
    <input type="button" class="btn btn-success" value="Add books" onclick="row()">
    <input type="button" class="btn btn-danger" value="Delete" onclick="del()">
    <br><br>        
                <button type="submit" class="btn btn-block btn-primary onclick="processForm()">Create Book</button>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
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

<script>
    function row() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;
        var r = mytable.insertRow(rows);

        var c1 = r.insertCell(0);
        var c2 = r.insertCell(1);
        var c3 = r.insertCell(2);
        var c4 = r.insertCell(3);
        

        var checkbox = document.createElement("input");
        var bookName = document.createElement("select");
        var quantity = document.createElement("input");
        var price = document.createElement("input");
        

        checkbox.type = "checkbox";
        quantity.type = "number";
        price.type = "number";
        

        bookName.className = "form-control";
        quantity.className = "form-control";
        price.className = "form-control";
       

        bookName.innerHTML = `
            @foreach($books as $book)
            <option value="{{ $book->books_name }}">{{ $book->books_name }}</option>
            @endforeach
        `;

        r.className = "new-row";
        c1.style.textAlign = "center";

        bookName.name = "bookName[]";
        quantity.name = "invoices_detail_quantity[]";
        price.name = "invoices_detail_price[]";
        

        c1.appendChild(checkbox);
        c2.appendChild(bookName);
        c3.appendChild(quantity);
        c4.appendChild(price);
    
    }

    function del() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;

        for (var i = rows - 1; i > 0; i--) {
            if (mytable.rows[i].cells[0].children[0].checked) {
                mytable.deleteRow(i);
            }
        }
    }

    function processForm() {
        var formData = [];
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;

        for (var i = 1; i < rows; i++) {
            var row = mytable.rows[i];
            var bookName = row.cells[1].getElementsByTagName("select")[0].value;
            var quantity = row.cells[2].getElementsByTagName("input")[0].value;
            var price = row.cells[3].getElementsByTagName("input")[0].value;

            var data = {
                bookName: bookName,
                quantity: quantity,
                price: price,
            };

            formData.push(data);
        }

        // Process the form data
        console.log(formData);
    }

    function del() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;
        for (var i = rows - 1; i > 0; i--) {
            if (mytable.rows[i].cells[0].children[0].checked) {
                mytable.deleteRow(i);
            }
        }
    }
</script>
@endsection
