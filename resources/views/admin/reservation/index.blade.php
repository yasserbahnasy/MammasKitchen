@extends('layouts.app')

@section('title','Reservation')

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
                  <h4 class="card-title ">All Reservation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date And Time</th>
                        <th>Message</th>
                        <th>Stutus</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation )
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->date_and_time }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>
                              @if($reservation->stutus == true)
                                <span class="btn btn-info btn-sm">Confirmed</span>
                              @else
                                <span class="btn btn-danger btn-sm">Not confirmed yet</span>
                              @endif
                            </td>
                            <td>{{ $reservation->created_at }}</td>
                            <td>{{ $reservation->updated_at }}</td>
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
