@extends('layouts.app')

@section('title','Operations')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('operations.partials.next-flight', ['next_flight' => $nextFlight])
        </div>
        <div class="col-md-8">
            @include('operations.partials.upcoming-flights', ['upcoming_flights' => $upcomingFlights])
        </div>
    </div>
@endsection