<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="heading">
    <h3>checkout</h3>
    <p> <a href="{{url('/')}}">Home</a> / Checkout </p>
</div>

<section class="display-order">
    @if($cartitems->count() > 0)
    <div class="grand-total"> Order Detail<span></span> </div>
    @php $total = 0;@endphp
    @foreach($cartitems as $item)
    <p>{{$item->books->books_name}}=<span>{{number_format($item->books->books_price)}}  VND/x{{$item->books_quantity}} = {{number_format($item->books_quantity * $item->books->books_price)}} VND</span> </p>
        @php $total += $item->books_quantity * $item->books->books_price@endphp
    @endforeach
    @php $grandtotal = $total +($total * 0.1) + Auth::user()->province->area->area_price @endphp
    <div class="grand-total"> Grand Total : <span>{{number_format($total)}} VND + Tax 10% + Ship {{Auth::user()->province->area->area_price}} VND = {{number_format($grandtotal)}} VND</span> </div>
    @else
        <h3>There is no product in cart to check out</h3>
    @endif
</section>



<section class="checkout">

    <form action="{{url('place-order')}}" method="post">
        @csrf
        <h3>place your order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>Your Name :</span>
                <input type="text" value="{{Auth::user()->name}}" name="orders_name" required placeholder="enter your name" required>
            </div>
            <div class="inputBox">
                <span>Your Number :</span>
                <input type="number" value="{{Auth::user()->phone}}" name="orders_phone" required placeholder="enter your number" required>
            </div>
            <div class="inputBox">
                <span>Your Email :</span>
                <input type="email" value="{{Auth::user()->email}}" name="orders_email" required placeholder="enter your email" required>
            </div>
            <div class="inputBox">
                <span>Payment Method :</span>
                <select name="orders_payment">
                    <option value="cash on delivery">Cash On Delivery</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address Line :</span>
                <input type="text" min="0" value="{{Auth::user()->address}}"  name="orders_address" required placeholder="House number..." required>
            </div>
            <div class="inputBox">
                <span>Province :</span>
                <select class="form-control" name="orders_province"  id="country-dropdown" onchange="selectProvince()" required>
                    @foreach($province as $provinces)
                        <option value="{{ $provinces->province_id }}"{{ old('province_id', Auth::user()->province->province_id) == $provinces->province_id ? 'selected' : '' }}>{{ $provinces->province_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputBox">
                <span><label for="district">District :</label></span>
                <select class="form-control" name="orders_district" id="state_dropdown" onchange="selectStreet()" required>
                        <option value=""> </option>
                </select>
            </div>
            <div class="inputBox">
                <span><label for="wards">Wards :</label></span>
                <select class="form-control" name="orders_wards" id="city-dropdown" required>
                        <option value=""> </option>
                </select>
            </div>
        </div>
        @if($cartitems->count() > 0)
        <a href="{{url('cartlist')}}" class="btn">Back to cart</a>
        <input type="submit" value="order now" class="btn" name="order_btn">

        @else
            <a href="{{url('/')}}" class="btn">Back to Shopping</a>
        @endif



    </form>
    @include('sweetalert::alert')

</section>
<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')
<script async='async' src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    {{--$(document).ready(function() {--}}
    {{--    $('#country-dropdown').on('change', function() {--}}
    {{--        // var country_id = this.value; //id cua tinh--}}
    {{--        console.log(1);--}}
    {{--        $("#state-dropdown").html('');--}}
    {{--        $.ajax({--}}
    {{--            url:"{{url('get-states-by-country')}}",--}}
    {{--            type: "POST",--}}
    {{--            data: {--}}
    {{--                city_id: country_id,--}}
    {{--                _token: '{{csrf_token()}}'--}}
    {{--            },--}}
    {{--            dataType : 'json',--}}
    {{--            success: function(result){--}}
    {{--                $.each(result.city_details,function(key,value){--}}
    {{--                    $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');--}}
    {{--                });--}}
    {{--                $('#city-dropdown').html('<option value="">Select State First</option>');--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--    $('#state-dropdown').on('change', function() {--}}
    {{--        var state_id = this.value;--}}
    {{--        $("#city-dropdown").html('');--}}
    {{--        $.ajax({--}}
    {{--            url:"{{url('get-cities-by-state')}}",--}}
    {{--            type: "POST",--}}
    {{--            data: {--}}
    {{--                city_detailsId: state_id,--}}
    {{--                _token: '{{csrf_token()}}'--}}
    {{--            },--}}
    {{--            dataType : 'json',--}}
    {{--            success: function(result){--}}
    {{--                $.each(result.streets,function(key,value){--}}
    {{--                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}
    function selectProvince() {
        let country_id = $("#country-dropdown").val();
        $.ajax({
            url:"{{url('get-states-by-countryx')}}",
            type: "POST",
            data: {
                province_id: country_id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                $('#state_dropdown').html('<option value="">---Enter district---</option>');
                let html = '';
                let districts = result.district;
                for(let i = 0; i < districts.length; i++) {
                    let item = districts[i];
                    let name = item['district_name'];
                    let id = item['district_id']
                    html += '<option value='+id+'>'+name+ '</option>';
                }
                $('#state_dropdown').append(html);
                $('#state_dropdown').niceSelect("update")

                // $('#state_dropdown').append($('<option>', {
                //     value: 1,
                //     text: 'My option'
                // }));
                // $.each(districts,function(key,value){
                //     $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                // });

            }
        });
    }
    function selectStreet() {
        let state_id = $("#state_dropdown").val();
        $.ajax({
            url:"{{url('get-cities-by-statex')}}",
            type: "POST",
            data: {
                district_id: state_id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '';
                let districts = result.wards;
                for(let i = 0; i < districts.length; i++) {
                    let item = districts[i];
                    let name = item['wards_name'];
                    let id = item['wards_id']
                    html += '<option value='+id+'>'+name+ '</option>';
                }
                $('#city-dropdown').html('<option value="">---Enter wards---</option>');
                $('#city-dropdown').append(html);
                $('#city-dropdown').niceSelect("update")

                // $('#state_dropdown').append($('<option>', {
                //     value: 1,
                //     text: 'My option'
                // }));
                // $.each(districts,function(key,value){
                //     $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                // });

            }
        });
    }
</script>

</body>
</html>
