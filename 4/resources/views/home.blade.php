<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- fa-font-awesome --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
                <a class="navbar-brand" href="{{ route('home') }}"><i class="fa fa-bicycle" aria-hidden="true"></i> Bike</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">

                    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                        @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                    <a href="{{ route('cart.index') }}" class="nav-link"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Keranjang <span class="badge badge-pill badge-info">{{ count(Auth::user()->cart->where('status',null) )}}</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" width="30" height="30" class="rounded-circle">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</button>

                                        </form>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                                </li>


                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link"><i class="fa fa-sticky-note" aria-hidden="true"></i>Register</a>
                                </li>
                                        @endif
                                    @endauth
                        @endif

                    </ul>

                </div>
            </nav>

        </header>
        <main role="main">
            <div class="album py-5 bg-light">
              <div class="container">
                <div class="row">
                    @foreach($cycle as $c)
                    <div class="col-md-4 mb-3">
                        <!-- bbb_deals -->
                        <div class="bbb_deals">
                            <div class="bbb_deals_slider_container">
                                <div class=" bbb_deals_item">
                                    <div class="bbb_deals_image">
                                        <img src="{{ URL::to('/') }}/{{ $c->image }}" alt="{{ $c->name }}" class="img-thumbnail">
                                    </div>
                                    <div class="bbb_deals_content">
                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                            <div class="bbb_deals_item_category">{{ $c->merk->name}}</div>

                                        </div>
                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                            <div class="bbb_deals_item_name">{{ $c->name }}</div>
                                            <div class="bbb_deals_item_price ml-auto">{{ rupiah($c->price) }}</div>
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Available: <span>{{ $c->stock }}</span></div>
                                                <div class="sold_stars ml-auto">
                                                    @if(Auth::user())
                                                    <form action="{{ route('cart.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id_cycle" value="{{ $c->id }}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="id_user" value="{{  Auth::user()->id }}">
                                                        <button type="submit" class="btn btn-primary">add to chart</button>
                                                    </form>
                                                    @else
                                                    <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login First</a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     @endforeach

                </div>
              </div>
            </div>

        </main>
         <!-- Popper and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    </body>
</html>
</script>
@php
    function rupiah($angka){

$hasil_rupiah = number_format($angka, 0, ",", ".");
return $hasil_rupiah;

}
@endphp
</body>
