@extends('layouts.app')

@section('title','Dashboard')

@push('css')

@endpush


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Category / Item</p>
            <h3 class="card-title">{{ $categoryCount }}/{{ $itemCount }}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-danger">info</i>
              <a href="#pablo">Total Category and Item</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">slideshow</i>
            </div>
            <p class="card-category">Slider Count</p>
            <h3 class="card-title">{{ $sliderCount }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> <a href="{{ route('slider.index')}}">Get More Details.</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Reservations</p>
            <h3 class="card-title">{{ $reservations->count() }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> not Confirmed Reservation
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-twitter"></i>
            </div>
            <p class="card-category">Contact</p>
            <h3 class="card-title">{{ $contactCount }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      @include('layouts.partial.msg')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Reservation</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Stutus</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($reservations as $key=>$reservation )
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $reservation->name }}</td>
                      <td>{{ $reservation->phone }}</td>
                      <td>
                        @if($reservation->stutus == true)
                          <span class="btn btn-info btn-sm">Confirmed</span>
                        @else
                          <span class="btn btn-danger btn-sm">Not confirmed yet</span>
                        @endif
                      </td>
                      <td>
                        @if($reservation->stutus == false)
                          <form id="stutus-form-{{$reservation->id}}" action="{{ route('reservation.stutus',$reservation->id) }}" style="Display:none" method="post">
                            @csrf
                          </form>
                          <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verifty this request by phone?')){
                            event.preventDefault();
                            document.getElementById('stutus-form-{{$reservation->id}}').submit();
                          }else{
                            event.preventDefault();
                          }"><i class="material-icons">done</i></button>
                        @endif
                        <form id="destroy-form-{{$reservation->id}}" action="{{ route('reservation.destroy',$reservation->id) }}" style="Display:none" method="post">
                          @csrf
                          @method('DELETE')
                        </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You went to delete this?')){
                          event.preventDefault();
                          document.getElementById('destroy-form-{{$reservation->id}}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="material-icons">delete</i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')

@endpush
