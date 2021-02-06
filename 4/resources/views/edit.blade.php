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
                                    <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Keranjang</a>
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
            <div class="container">
                <div class="row">
                    <div class="card mt-5">
                        <div class="row">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div> <img src="{{ url('/') }}/{{ $cart->cycle->image }}" height="100%" width="100%"></div>

                                </article> <!-- gallery-wrap .end// -->
                                </aside>
                                <aside class="col-sm-7">
                                    <article class="card-body p-5">
                                        <h3 class="title mb-3">{{ $cart->cycle->name }}</h3>

                                        <p class="price-detail-wrap">
                                            <span class="price h3 text-warning">
                                                <span class="currency">RP .</span><span class="num">{{ $cart->cycle->price }}</span>
                                            </span>

                                        </p> <!-- price-detail-wrap .// -->
                                        <dl class="item-property">
                                            <dt>Description</dt>
                                            <dd><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></dd>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-borderless mb-0">
                                                  <tbody>
                                                    <tr>
                                                      <th class="pl-0 w-25" scope="row"><strong>Price</strong></th>
                                                      <td>{{ $cart->price }}</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <form action="{{ route('cart.update',$cart->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <dl class="param param-inline">
                                                            <dt>Quantity: </dt>
                                                            <dd>
                                                            <input type="number" name="qty" value="{{ $cart->qty }}">
                                                            </dd>
                                                        </dl>  <!-- item-property .// -->
                                                    </div> <!-- col.// -->
                                                    <div class="col-sm-7">

                                                    </div> <!-- col.// -->
                                                </div> <!-- row.// -->
                                                <hr>
                                                <button type="submit" class="btn btn-lg btn-primary text-uppercase">Update</button>
                                            </form>
                                        </article> <!-- card-body.// -->
                                    </aside> <!-- col.// -->
                                </div> <!-- row.// -->
                            </div> <!-- card.// -->


                        </div>
                    </div>
                </main>
                <!-- Popper and Bootstrap JS -->

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

            </body>
            </html>

