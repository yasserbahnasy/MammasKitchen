@extends('layouts.app')

@section('title','Login')

@push('css')

@endpush


@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-1">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Login</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" name="email" value="{{ old('email')}}" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{route('welcome')}}" class="btn btn-danger">Back</a>
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
