@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Bordered Table</h5>
      {{-- <p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p> --}}
      <!-- Bordered Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Start Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td><img src="/admin/category/uploads/image/{{ $item->image }}" width="100px" padding="100px" alt="Product Image"></td>
              <td>{{ $item->created_at }}</td>
              <td>
                <form action="{{ url('destroy',$item->id) }}" method="POST">

                    {{-- <a class="btn btn-info" href="{{ route('category.show',$item->id) }}">Show</a> --}}

                    <a class="btn btn-primary" href="{{ url('edit-prod',$item->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('delete-category',$item->id) }}">Delete</a>

                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
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
