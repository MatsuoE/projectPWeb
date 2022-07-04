@extends('layout.dashboardmember')
@section('content')

<div class="card">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Invoice</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Shipping Cost</th>
          <th scope="col">Total</th>
          <th scope="col">Payment Status</th>
          <th scope="col">Status</th>
          <th scope="col">Option</th>
  <!--        <th scope="col">Option</th>     -->
        </tr>
      </thead>
      @foreach($itemorder as $order)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $order->cart->no_invoice }}
                  </td>
                  <td>
                    {{ number_format($order->cart->subtotal, 2) }}
                  </td>
                  <td>
                    -
                  </td>
                  <td>
                    {{ number_format($order->cart->total, 2) }}
                  </td>                  
                  <td>
                    {{ $order->cart->status_pembayaran }}
                  </td>
                  <td>
                    {{ $order->cart->status_pengiriman }}
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show2', $order->id) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                  </td>
                </tr>
              @endforeach
      </tbody>
    </table>
  </div>

@endsection