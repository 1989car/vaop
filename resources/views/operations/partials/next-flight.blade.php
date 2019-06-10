<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                My Next Flight
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <a href="#" class="btn btn-primary">
                Fly Now
            </a>
        </div>
    </div>
    <div class="kt-portlet__body">
        <span class="kt-widget12__progress">
            <div class="progress progress-sm">
                <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget12__stat">
                63%
            </span>
        </span>
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Departure</span>
                        <span class="kt-widget12__value">{{ $next_flight->timetable->citypair->origin->icao }}</span>
                    </div>

                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Arrival</span>
                        <span class="kt-widget12__value">{{ $next_flight->timetable->citypair->destination->icao }}</span>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Total Annual Profit Before Tax</span>
                        <span class="kt-widget12__value">$3,800,000</span>
                    </div>

                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Type Of Market Share</span>
                        <span class="kt-widget12__value">Grossery</span>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Avarage Product Price</span>
                        <span class="kt-widget12__value">$60,70</span>
                    </div>

                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Satisfication Rate</span>
                        <span class="kt-widget12__progress">
							<div class="progress progress-sm">
								<div class="progress-bar kt-bg-brand" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="kt-widget12__stat">
								63%
							</span>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>