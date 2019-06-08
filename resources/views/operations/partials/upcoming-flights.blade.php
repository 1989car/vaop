<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                My Upcoming Flights
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_widget31_tab1_content" role="tab">
                        Today
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_widget31_tab2_content" role="tab">
                        Week
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget31">
            @foreach($upcoming_flights as $flight)
                <div class="kt-widget31__item">
                    <div class="kt-widget31__content">
                        <div class="kt-widget31__pic">
                            <img src="{{ Storage::url($flight->timetable->airlineoperator->airlinebrand->icon_url) }}" alt="{{ $flight->timetable->airlineoperator->airlinebrand->name }}">
                        </div>
                        <div class="kt-widget31__info">
                            <a href="#" class="kt-widget31__username">
                                {{ $flight->timetable->airlineoperator->iata.$flight->timetable->number }}
                                // {{ $flight->timetable->citypair->origin->icao }}-{{ $flight->timetable->citypair->destination->icao }}
                                // {{ $flight->timetable->aircraftfamily->name }}
                            </a>
                            <p class="kt-widget31__text">
                                Operated by {{ $flight->timetable->airlineoperator->name }}
                            </p>
                        </div>
                    </div>

                    <div class="kt-widget31__content">
                        <div class="kt-widget31__progress">
                            <span class="kt-widget31__stats">
                                <span>{{ $flight->timetable->citypair->origin->name }}</span>
                                <span>{{ $flight->timetable->citypair->destination->name }}</span>
                            </span>
                            <span class="kt-widget31__stats">
                                <span>{{ $flight->timetable->departure_time_utc }}</span>
                                <span>{{ $flight->timetable->arrival_time_utc }} {{ $flight->timetable->next_day }}</span>
                            </span>
                        </div>
                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>