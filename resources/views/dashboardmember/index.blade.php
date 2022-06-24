@extends('layout.dashboardmember')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-6 col-lg-3">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>150</h3>
          <p>Pengeluaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- table produk baru -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Transaksi Baru</h4>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
              </tr>
            </thead>
            @php $no = 0; @endphp
            @foreach ($product -> slice(-5) as $product) 
    <tbody>
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $product->title }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->price }}</td>
      </tr>
      @endforeach
    </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection