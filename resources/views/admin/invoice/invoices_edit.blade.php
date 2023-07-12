@extends('layouts.admin_base')

@section('content')
    <h1 class="text-center">Cập nhật hóa đơn nhập</h1>
    <?php
    $books = Illuminate\Support\Facades\DB::table('Books')
        ->select('Books.*')
        ->get();
    ?>

    @foreach($invoice as $invoices)
        <form action="{{url('/admin/invoice/'.$invoices->invoices_id.'/edit')}}" method="POST">
            @csrf
            @method('put')
            <br>
            <label for="importDate">Name:</label>
            <br>
            <input value="{{$invoices->invoices_name}}" name="invoices_name" type="text" class="form-control" placeholder="Name">
            <br>
            <label for="importDate">Date:</label>
            <br>
            <input value="{{$invoices->invoices_date}}" name="invoices_date" type="date" class="form-control" placeholder="Date">
            <br>
                <?php
                $count = 0;
                $invoiceDetails = DB::table('Invoices_Detail')
                    ->select('Invoices_Detail.*')
                    ->where('Invoices_Detail.invoices_Id', $invoices->invoices_id)
                    ->get();
                foreach ($invoiceDetails as $invoiceDetail) {
                    $books_id[$count] = $invoiceDetail->books_id;
                    $invoices_detail_quantity[$count] = $invoiceDetail->invoices_detail_quantity;
                    $invoices_detail_price[$count] = $invoiceDetail->invoices_detail_price;
                    $count++;
                } ?>
            <h5>Book List:</h5>
            <table id="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                    <?php
                for ($i = 0; $i < $count; $i++) {
                    ?>
                <tr>
                    <td style="text-align:center;"><input type="checkbox"></td>
                    <td>
                            <?php
                            $bookPre = App\Models\Books::findOrFail($books_id[$i]);
                            ?>

                        <select class="form-control" id="" name="books_id[]" required>
                            <option value="{{$books_id[$i]}}" selected="selected">{{$bookPre->books_name}}</option>
                            @foreach($books as $book)
                                <option value="{{ $book->books_id }}">{{ $book->books_name}}</option>
                            @endforeach
                    </td>
                    <td><input name="invoices_detail_quantity[]" min="1" type="number" class="form-control" placeholder="Quantity" value="{{$invoices_detail_quantity[$i]}}"></td>
                    <td><input name="invoices_detail_price[]" min="1000" type="number" class="form-control" placeholder="Price" value="{{$invoices_detail_price[$i]}}"></td>
                </tr>
                <?php } ?>
            </table>
            <br>
            <input type="button" class="btn btn-success" value="Add" onclick="row()">
            <input type="button" class="btn btn-danger" value="Delete" onclick="del()">
            <br>
        <br>
        <button type="submit" class="btn btn-primary" onclick="processForm()">Update</button>
        </form>
    @endforeach
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
            var mytable = document.getElementById("table");
            var rows = mytable.rows.length;

            for (var i = rows - 1; i > 0; i--) {
                if (mytable.rows[i].cells[0].children[0].checked) {
                    mytable.deleteRow(i);
                }
            }
        }

        function processForm() {
            var formData = [];
            var mytable = document.getElementById("table");
            var rows = mytable.rows.length;

            for (var i = 1; i < rows; i++) {
                var row = mytable.rows[i];
                var books_id = row.cells[1].getElementsByTagName("input")[0].value;
                var invoices_detail_quantity = row.cells[2].getElementsByTagName("input")[0].value;
                var invoices_detail_price = row.cells[3].getElementsByTagName("input")[0].value;


                var data = {
                    books_id: books_id,
                    invoices_detail_quantity: invoices_detail_quantity,
                    invoices_detail_price: invoices_detail_price,
                };

                formData.push(data);
            }
            console.log(formData);
        }

    </script>
@endsection
