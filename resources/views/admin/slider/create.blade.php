@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush


@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Slider</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Title</label>
                        <input type="text" name="title" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Image</label>
                          <input type="file" name="image" class="form-control" style="opacity: unset;position: initial;">
                        </div>
                    </div>
                    <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
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
