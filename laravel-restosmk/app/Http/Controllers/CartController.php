<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function beli($idmenu)
    {
        $menu = Menu::where('idmenu', $idmenu)->first();

        $cart = session()->get('cart', []);


        if (isset($cart[$idmenu])) {
            $cart[$idmenu]['jumlah']++;
        } else {
            $cart[$idmenu] =[
                'idmenu' => $menu->idmenu,
                'menu' => $menu->menu,
                'harga' => $menu->harga,
                'jumlah' => 1
            ];
        }

        session()->put('cart', $cart);  
        
        return redirect('cart');
    }

    public function cart()
    {
        $kategoris = Kategori::all();
        return view('cart',['kategoris' => $kategoris]);
    }

    public function hapus($idmenu)
    {
        $cart = session()->get('cart');
        if (isset($cart[$idmenu])) {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }
         return redirect('cart');
    }

    public function batal()
    {
        session()->forget('cart');
        return redirect('/');
    }

    public function tambah($idmenu)
    {
        $cart = session()->get('cart');
        $cart[$idmenu]['jumlah']++;
        session()->put('cart', $cart);

        return redirect('cart');
    }

    public function kurang($idmenu)
    {
        $cart = session()->get('cart');
        if ($cart[$idmenu]['jumlah'] > 1) {
            $cart[$idmenu]['jumlah']--;
            session()->put('cart', $cart);
        } else {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }
        
        return redirect('cart');
    }
}
