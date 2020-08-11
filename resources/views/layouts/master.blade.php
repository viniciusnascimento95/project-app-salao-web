<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistema de agendamento</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
  
  <br>
  <div class="container-fluid">
    <div class="row">
      @include('layouts.menu')
      <div class="col-sm-10">
        <div class="card">
          <div class="card-header">
            <strong>@yield('card-title')</strong>
            <span class="float-right">@yield('button-novo')</span>
          </div>
          <div class="card-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.3/jquery.inputmask.js" integrity="sha512-0iy/+wgbVlUUD37ZlJ2nGEeCmal4To2J5tT99AZWu2gNeYAJTtRDY/zLONohnECXjfEor7JgXgpTyWMUYciOcg==" crossorigin="anonymous"></script>
  <script src="{{ asset('scripts/maskvalid.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt-BR.min.js" integrity="sha512-H1yBoUnrE7X+NeWpeZvBuy2RvrbvLEAEjX/Mu8L2ggUBja62g1z49fAboGidE5YEQyIVMCWJC9krY4/KEqkgag==" crossorigin="anonymous"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> --}}

  @yield('scripts')
</body>

</html>
