<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
            $itemorder = order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        
        $data = array('title' => 'Data Transaksi',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser);
        return view('dashboardmember/transaction/all-transaction', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        //$alamatkirim = order::where('alamat', $itemuser->address);
        //$numberkirim = order::where('alamat', $itemuser->number);
        if ($itemcart) {
            $inputanorder['cart_id'] = $itemcart->id;
            $inputanorder['nama_penerima'] = $itemuser->name;

            if ($itemuser->address == null){
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
            else{
                $inputanorder['alamat'] = $itemuser->address;
            }

            if ($itemuser->number == null){
                return back()->with('error', 'Nomor Penerima belum diisi');
            }
            else{
                $inputanorder['number'] = $itemuser->number;
            }
                order::create($inputanorder);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'checkout']);
                return redirect('dashboardmember')->with('success', 'Order berhasil disimpan');
        }
        else {
                return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->isAdmin == '1') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Detail Transaksi',
                        'itemorder' => $itemorder);
            return view('dashboard/transaction/detail', $data)->with('no', 1);            
        } else {
            $itemorder = Order::where('id', $id)
                            ->whereHas('cart', function($q) use ($itemuser) {
                                $q->where('user_id', $itemuser->id);
                            })->first();
            if ($itemorder) {
                $data = array('title' => 'Detail Transaksi',
                            'itemorder' => $itemorder);
                return view('dashboardmember/transaction/detail', $data)->with('no', 1);                            
            } else {
                return abort('404');
            }
        }
    }

    public function show2(Request $request, $id){
        $itemuser = $request->user();
        $itemorder = Order::where('id', $id)->whereHas('cart', function($q) use ($itemuser) {$q->where('user_id', $itemuser->id);})->first();
        if ($itemorder) {
            $data = array('title' => 'Detail Transaksi',
            'itemorder' => $itemorder);
            return view('dashboardmember/transaction/detail', $data)->with('no', 1);                            
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->isAdmin == '1') {
            $itemorder = order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('dashboard/transaction/edit-transaction', $data)->with('no', 1);            
        } else {
            return abort('404');//kalo bukan admin maka akan tampil error halaman tidak ditemukan
        }
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
        $this->validate($request,[
            'status_pembayaran' => 'required',
            'status_pengiriman' => 'required',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        $inputan = $request->all();
        $inputan['status_pembayaran'] = $request->status_pembayaran;
        $inputan['status_pengiriman'] = $request->status_pengiriman;
        $inputan['subtotal'] = str_replace(',','',$request->subtotal);
        $inputan['total'] = str_replace(',','',$request->total);
        $itemorder = order::findOrFail($id);
        $itemorder->cart->update($inputan);
        return back()->with('success','Order berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
