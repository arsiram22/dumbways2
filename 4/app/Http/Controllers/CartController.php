<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cycle;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request);
        $cart=Cart::where('id_user',$request->id_user)
                     ->where('id_cycle',$request->id_cycle)
                     ->whereNull('status')
                     ->first();
            // dd($cart);
        if($cart){
            $qty=$cart->qty+1;
            $cart->qty =$qty;
            $cart->save();
        }
        else{
            $c = new Cart;
            $c->id_user=$request->id_user;
            $c->id_cycle=$request->id_cycle;
            $c->qty='1';
            $c->save();
        }


        // Cart::create($request->all());
        return redirect()->route('cart.index')
        ->with('success', 'Berhasil Di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $cart = Cart::findOrFail($id);
            return view('edit', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart=Cart::find($id);
        $qty=$request->qty;
            $cart->qty =$qty;
            $cart->save();

        return redirect()->route('cart.index')
        ->with('success', 'Berhasil Di Ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $c=Cart::find($id);
        $c->delete();
        return redirect()->route('cart.index')
        ->with('success', 'Berhasil Di Hapus.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
            $cart=Cart::where('id_user',$request->id_user)
                     ->whereNull('status')
                     ->get();


            // dd($cart);
            foreach($cart as $ca){
                $cy=Cycle::find($ca->cycle->id);
                $stock=$cy->stock - $ca->qty;
                $cy->stock=$stock;
                $cy->save();
                $ca->status = '1';
                $ca->save();
            }


        // Cart::create($request->all());
        return redirect()->route('home')
        ->with('success', 'Berhasil Di checkout.');
    }



}
