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
            <div class="">
                <div class="">

                    @if(Auth::user()->cart->where('status',null) )

                    <div class="card shopping-cart mx-5 ">
                        <div class="card-header bg-light text-light">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            keranjang belanja
                            <a href="{{ url('/') }}" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th  scope="col">Product</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col" class="text-center">Price</th>
                                            <th  scope="col" class="text-center">Total</th>
                                            <th  scope="col"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->cart->where('status',null) as $item)
                                            <tr>
                                                <td class="col-md-5">
                                                    <div class="media">
                                                            <img class="media-object" src="{{ url('/') }}/{{ $item->cycle->image }}" style="width: 72px; height: 72px;">
                                                          <div class="media-body ml-4">
                                                            <h4 class="media-heading">{{ $item->cycle->name }}</h4>
                                                            <h5 class="media-heading"> by {{ $item->cycle->merk->name }}</h5>
                                                            {{-- <span>Status: </span><span class="text-success"><strong></strong></span> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="text-align: center">
                                                      <input type="text" disabled class="form-control" value="{{ $item->qty }}">
                                                </td>
                                                <td class="text-center"><strong>{{ rupiah($item->cycle->price) }}</strong></td>
                                                <td class="text-center" ><strong>{{ rupiah($item->cycle->price* $item->qty) }}</strong></td>
                                                <td id="loop" style="display:none">{{ $item->cycle->price* $item->qty}}</td>

                                                <td class="col-md-4">
                                                    <div class="btn-group" role="group" aria-label="ß">
                                                        <a class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <form action="{{ route('cart.destroy',$item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                        {{-- <form action="{{ route('cart.destroy','3') }}" method="delete">
                                                            @csrf
                                                            <button type="submit">a</button>
                                                        </form> --}}
                                                      </div>
                                                 </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td><h3>Total</h3></td>
                                                <td class="text-right" ><h3><strong id="total"> </strong></h3></td>
                                            </tr>
                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>
                                                <button type="button" class="btn btn-default">
                                                   Continue Shopping
                                                </button></td>
                                                <td>
                                                    <form action="{{ route('chekout') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id_user" value="{{  Auth::user()->id }}">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                            Checkout
                                                        </button>
                                                    </form>



                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>



                            </div>

                    </div>

                    @else
                    <div class="container-fluid mt-100">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body cart center">

                                            <h3><strong>Your Cart is Empty</strong></h3>
                                            <h4>Add something to make me happy :)</h4> <a href="{{ route('home') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </main>
         <!-- Popper and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {

           var TotalValue = 0;

           $("tr #loop").each(function(index,value){
             currentRow = parseFloat($(this).text());
             TotalValue += currentRow
           });
           var	number_string = TotalValue.toString(),
                split	= number_string.split(','),
                sisa 	= split[0].length % 3,
                rupiah 	= split[0].substr(0, sisa),
                ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

           document.getElementById('total').innerHTML = rupiah;

    });

    </script>
    @php
        function rupiah($angka){

	$hasil_rupiah = number_format($angka, 0, ",", ".");
	return $hasil_rupiah;

}
    @endphp
    </body>
</html>
