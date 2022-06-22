@extends('layout.main')
@section('container')
<h2 style="text-align: center">{{ $title }}</h2>
<div class="row mt-4 mb-4">
    <div class="col-md-3">
        <img src="/img/logo.jpg" class="circle d-block mt-3" alt="Logo Bandung Elektronika" style="border-radius: 10%">
    </div>
    <div class="col-lg-7 my-auto">
        <h6 style="font-weight: bold">Deskripsi Toko</h6>
        <p>Retail & Grosir Produk Elektronika, Camera & Gadget,<br> Kami berlokasi di kota Kediri Jawa Timur dan sudah beroperasi lebih dari 30 tahun.</p>
        
        <h6 style="font-weight: bold">Buka Sejak</h6>
        <p>May 2015</p>

        <h6 style="font-weight: bold">Kebijakan Pengiriman</h6>
        <p class="small">UNTUK PEMBELIAN PRODUK DI TOKO KAMI, HARAP CHAT TERLEBIH DAHULU UNTUK MENENTUKAN ONGKOS KIRIM YANG SESUAI DENGAN TUJUAN ALAMAT ANDA.<br>
            Jika Anda menginginkan produk yang tidak ada di dalam daftar produk kami, harap bisa chat kepada kami dan akan kami tambahkan segera produk yang Anda inginkan.
        </p>
    </div>
</div>
@endsection