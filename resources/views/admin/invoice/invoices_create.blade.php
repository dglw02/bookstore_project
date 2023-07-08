@extends('layouts.admin_base')
@section('content')
    <?php
    $books = Illuminate\Support\Facades\DB::table('books')
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
                </div><br/>
            @endif



            <form method="POST" action="{{url('admin/invoices/create')}}">@csrf
                <br>
                <div class="form-group">
                    <label for="invoices_name">Name</label>
                    <input type="text" class="form-control" name="invoices_name" placeholder="Please enter "/>
                </div>

                <div class="form-group">
                    <label for="invoices_date">Date</label>
                    <input name="invoices_date" type="date" class="form-control" placeholder="Please enter ">
                </div>

                <table id="table">
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
                        <td><input name="invoices_detail_quantity[]" min="1" type="number" class="form-control"
                                   placeholder="Quantity"></td>
                        <td><input name="invoices_detail_price[]" min="1" type="number" class="form-control"
                                   placeholder="Price"></td>
                    </tr>

                </table>
                <br>
                <input type="button" class="btn btn-success" value="Add books" onclick="row()">
                <input type="button" class="btn btn-danger" value="Delete" onclick="del()">
                <br><br>
                <button type="submit" class="btn btn-block btn-primary" onclick="processForm()"> Create Book</button>
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
            var table = document.getElementById("table");
            var rows = table.rows.length;
            var r = table.insertRow(rows);

            var c1 = r.insertCell(0);
            var c2 = r.insertCell(1);
            var c3 = r.insertCell(2);
            var c4 = r.insertCell(3);


            var checkbox = document.createElement("input");
            var books_name = document.createElement("select");
            var invoices_detail_quantity = document.createElement("input");
            var invoices_detail_price = document.createElement("input");


            checkbox.type = "checkbox";
            invoices_detail_quantity.type = "number";
            invoices_detail_price.type = "number";


            books_name.className = "form-control";
            invoices_detail_quantity.className = "form-control";
            invoices_detail_price.className = "form-control";


            books_name.innerHTML =
                `
                @foreach($books as $book)
                <option value="{{ $book->books_id }}">{{ $book->books_name }}</option>
                @endforeach
            `;

            r.className = "new-row";
            c1.style.textAlign = "center";

            books_name.name = "books_id[]";
            invoices_detail_quantity.name = "invoices_detail_quantity[]";
            invoices_detail_price.name = "invoices_detail_price[]";

            c1.appendChild(checkbox);
            c2.appendChild(books_name);
            c3.appendChild(invoices_detail_quantity);
            c4.appendChild(invoices_detail_price);

        }

        function del() {
            var table = document.getElementById("table");
            var rows = table.rows.length;

            for (var i = rows - 1; i > 0; i--) {
                if (table.rows[i].cells[0].children[0].checked) {
                    table.deleteRow(i);
                }
            }
        }

        function processForm() {
            var formData = [];
            var table = document.getElementById("table");
            var rows = table.rows.length;

            for (var i = 1; i < rows; i++) {
                var row = table.rows[i];
                var books_id = row.cells[1].getElementsByTagName("select")[0].value;
                var invoices_detail_quantity = row.cells[2].getElementsByTagName("input")[0].value;
                var invoices_detail_price = row.cells[3].getElementsByTagName("input")[0].value;

                var data = {
                    books_id: books_id,
                    invoices_detail_quantity: invoices_detail_quantity,
                    invoices_detail_price: invoices_detail_price
                };

                formData.push(data);
            }
            console.log(formData);
        }


    </script>
@endsection
