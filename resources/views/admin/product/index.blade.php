@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Bordered Table</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Start Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td><img src="/admin/product/uploads/image/{{ $item->image }}" width="100px" padding="100px" alt="Product Image"></td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->selling_price }}</td>
              <td>{{ $item->description }}</td>
              <td>{{ $item->created_at }}</td>
              <td>
                <form action="{{ url('destroy',$item->id) }}" method="POST">

                    <a class="btn btn-danger" href="{{ url('delete-product',$item->id) }}">Delete</a>

                    {{-- <a class="btn btn-primary" href="{{ url('edit-prod',$item->id) }}">Edit</a> --}}

                    @csrf
                    @method('DELETE')
                </form>
            </td>
            </tr>

            @endforeach
        </tbody>
      </table>
      <!-- End Bordered Table -->

      <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank">Border color utilities</a> can be added to change colors:</p>

    </div>
  </div>
@endsection
