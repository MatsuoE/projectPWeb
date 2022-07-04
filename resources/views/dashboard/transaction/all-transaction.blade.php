@extends('layout.dashboard')
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
      @foreach($order as $order)
                <tr>
                  @php $no = 0; @endphp
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
                    <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    @if($user)
                    <a href="{{ route('transaksi.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
      </tbody>
    </table>
  </div>


@endsection