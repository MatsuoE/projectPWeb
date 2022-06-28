@extends('layout.dashboard')
@section('content')

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
  <p> {{ 'New transaction has been added' }} </p>
</div>
@endif

<div class="card">
    <div class="mt-3 mb-3 mr-4 text-right">
      <a href="#">
        <button type="button" class="btn btn-primary">Add new transaction</button>
      </a>
      </div>
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
      @foreach ($user as $user)
      <tbody>
        <tr>
          @if($user->isAdmin == 0)
          @php $no = 0; @endphp
          <th scope="row">{{ ++$no }}</th>
          <td>{{ "|" }}</td>
          <td>{{ "|" }}</td>
          <td>{{ "|" }}</td>
          <td>{{ "|" }}</td>
          <td>{{ "|" }}</td>
          <td>{{ "|" }}</td>
          <td class="text-center">
          <a href="detail" class="btn btn-sm btn-success mb-2"><i class="fa fa-eye"></i> Detail</a>
          <a href="#" class="btn btn-sm btn-primary mb-2"><i class="fa fa-pen"></i> Edit</a>
          </td>
          @endif
          {{--
          <td class="text-center">
            <a class="btn btn-sm btn-warning" href="/dashboard/category/edit"><i class="fa fa-pen"></i></a>
          --}}
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection