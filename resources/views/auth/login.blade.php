<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->

    <!-- Fonts -->
    <script src="{{asset('js/app.js')}}"></script>
      <!-- Styles -->
    <style>
    body,html{
    height:100%;
    background: #212121 !important;
}
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <div id="loading" style="display:none;">
                <div class="spinner"></div>
                <br/>
                Please wait...
            </div>



<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body p-4">


                    <div class="m-2 text-center">
                    <p class="h4 text-muted font-weight-bold mt-2">LOG IN</p>
                    </div><br>

                    <form method="POST" action="{{ route('login') }}" id="formlogin">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">

                                               <input id="email" placeholder="E-mail Address" type="email" class="form-control p-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>



                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password"  placeholder="Password" type="password" class="form-control p-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn p-2 mt-2 shadow btn-block btn-success">
                                    {{ __('Login to your account ') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">

                    @if (Route::has('password.request'))
                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

            </div>
        </div>

    </div>

</div>


<script>
$("#formlogin").submit(function(e){
e.preventDefault();
$('#loading').show();
let data = $("#formlogin").serialize()
axios.post('{{route('apilogin')}}', data).then((response)=>{
    $('#loading').hide();
if(response.data.status == "success"){

    Toast.fire({
  type: 'success',
  title: 'Login Successful'
})
setTimeout(()=>{
location.assign('/admin');
}, 1000)
}
else
{
Toast.fire({
  type: 'error',
  title: response.data.message,
})
}
}).catch((error)=>{
    $('#loading').hide();
    Toast.fire({
  type: 'error',
  title: 'Network Failed'
})

})
})

    </script>

</body>
</html>
