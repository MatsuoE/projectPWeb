@extends('layout.dashboardmember')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-6 col-lg-3">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ count($order) }}</h3>

          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- table produk baru -->
  @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk Baru</h4>
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
            @foreach ($product -> slice(-5) -> sortDesc() as $product) 
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