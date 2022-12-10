
<div class="login-form-container">
    <div id="close-login-btn" class="fas fa-times"></div>
    <form action="logins" method="POST">
        @csrf
        <h3>sign in</h3>
        <span>email</span>
        <input type="email" name="email" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="password" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>
</div>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('js/layout.js') }}"></script>
@section('title','Danh mục sản phẩm')

@section('content')
    <section>
    </section>
@endsection
