@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush


@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Danger - </b> {{ $error }}</span>
                      </div>
                  @endforeach
              @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Item</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('item.update',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Choose category</label>
                          <select class="form-control" name="category_id" style="-moz-appearance: menulist !important;">
                            @foreach($categories as $category)
                              <option {{ $category->id == $item->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name="description" rows="8" cols="80">{{ $item->description}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" name="price" value="{{ $item->price }}" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Image</label>
                          <input type="file" name="image"  style="opacity: unset;position: initial;">
                        </div>
                      </div>
                    </div>

                    <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush
