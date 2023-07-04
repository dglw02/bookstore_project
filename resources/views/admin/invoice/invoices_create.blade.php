@extends('layouts.admin_base')
@section('content')
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
                <div class="form-group">
                    <label for="invoices_name">Name</label>
                    <input type="text" class="form-control" name="invoices_name" placeholder="Please enter "/>
                </div>
                <div class="form-group">
                    <label for="invoices_description">Description</label><br>
                    <textarea name="invoices_description" id="editor" cols="132"> </textarea>
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
                <select class="form-control" id="" name="productId[]" required>
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
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
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
        var productName = document.createElement("select");
        var quantity = document.createElement("input");
        var price = document.createElement("input");
        

        checkbox.type = "checkbox";
        quantity.type = "number";
        price.type = "number";
        

        productName.className = "form-control";
        quantity.className = "form-control";
        price.className = "form-control";
       

        productName.innerHTML = `
            @foreach($books as $book)
            <option value="{{ $book->books_name }}">{{ $book->books_name }}</option>
            @endforeach
        `;

        r.className = "new-row";
        c1.style.textAlign = "center";

        productName.name = "productName[]";
        quantity.name = "quantity[]";
        price.name = "price[]";
        

        c1.appendChild(checkbox);
        c2.appendChild(productName);
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
            var productName = row.cells[1].getElementsByTagName("select")[0].value;
            var quantity = row.cells[2].getElementsByTagName("input")[0].value;
            var price = row.cells[3].getElementsByTagName("input")[0].value;
            var expiryDate = row.cells[4].getElementsByTagName("input")[0].value;

            var data = {
                productName: productName,
                quantity: quantity,
                price: price,
                expiryDate: expiryDate
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
