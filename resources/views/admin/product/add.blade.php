@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Product Create</h5>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="row g-3" action="{{ url('create-product')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="col-md-12">
        <select class="form-select form-select-lg mb-3" name="cate_id" aria-label=".form-select-lg example" required autocomplete="cate_id">
            <option value="">Select Category</option>
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            @error('cate_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </select>
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" id="" required autocomplete="name">
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">slug</label>
        <input type="text" class="form-control" name="slug" id="" required autocomplete="slug">
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Small Description</label>
        <textarea name="small_description" id="" required autocomplete="small_description" class="form-control"></textarea>
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Description</label>
        <textarea name="description" id="" required autocomplete="description" class="form-control"></textarea>
      </div>

      <div class="col-md-6">
        <label for="" class="form-label">Original Price</label>
        <input type="number" class="form-control" name="original_price" id="" required autocomplete="original_price">
      </div>

      <div class="col-md-6">
        <label for="" class="form-label">Selling Price</label>
        <input type="number" class="form-control" name="selling_price" id="" required autocomplete="selling_price">
      </div>

      <div class="col-md-6">
        <label for="" class="form-label">Tax</label>
        <input type="number" class="form-control" name="tax" id="" required autocomplete="tax">
      </div>

      <div class="col-md-6">
        <label for="" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="qty" id="" required autocomplete="qty">
      </div>

      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck1" name="status">
          <label class="form-check-label" for="gridCheck">Status</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck2" name="trending">
          <label class="form-check-label" for="gridCheck">trending</label>
        </div>
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Meta Tittle</label>
        <input type="text" class="form-control" name="meta_title" id="" required autocomplete="meta_title">
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Meta Keywords</label>
        <textarea name="meta_keywords" id="" required autocomplete="meta_keywords" class="form-control"></textarea>
      </div>

      <div class="col-md-12">
        <label for="" class="form-label">Meta Description</label>
        <textarea name="meta_description" id="" required autocomplete="meta_description" class="form-control"></textarea>
      </div>

      <div class="col-md-12">
        <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
        <div class="col-sm-12">
          <input class="form-control" type="file" id="formFile" name="image">
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
</div>
@endsection
