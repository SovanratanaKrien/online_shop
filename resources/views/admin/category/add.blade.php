@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Category Create</h5>

    <form class="row g-3" action="{{ url('create-category')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="col-md-12">
        <label for="" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" id="">
      </div>
      <div class="col-md-12">
        <label for="" class="form-label">Description</label>
        <textarea name="description" id="" class="form-control"></textarea>
      </div>
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck1" name="status">
          <label class="form-check-label" for="gridCheck">Status</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck2" name="popular">
          <label class="form-check-label" for="gridCheck">Popular</label>
        </div>
      </div>
      <div class="col-md-6">
        <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="formFile" name="image">
        </div>
      </div>
      <div class="col-md-12">
        <label for="" class="form-label">Meat Tittle</label>
        <input type="text" class="form-control" name="meta_title" id="">
      </div>
      <div class="col-md-12">
        <label for="" class="form-label">Meta Description</label>
        <textarea name="meta_descrip" id="" class="form-control"></textarea>
      </div>
      <div class="col-md-12">
        <label for="" class="form-label">Meta Keywords</label>
        <textarea name="meta_keywords" id="" class="form-control"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
</div>
@endsection
