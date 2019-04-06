@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            My Next Flight
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="#" class="btn btn-label-brand btn-sm  btn-bold dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Latest
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(421px, 46px, 0px);">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                        <span class="kt-nav__link-text">Reports</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-send"></i>
                                        <span class="kt-nav__link-text">Messages</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                        <span class="kt-nav__link-text">Charts</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                        <span class="kt-nav__link-text">Members</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-settings"></i>
                                        <span class="kt-nav__link-text">Settings</span>
                                    </a>
                                </li>
                            </ul>			</div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Annual Companies Taxes EMS</span>
                                    <span class="kt-widget12__value">$500,000</span>
                                </div>

                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Next Tax Review Date</span>
                                    <span class="kt-widget12__value">July 24,2017</span>
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
        </div>
        <div class="col-md-8">
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
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget31_tab1_content">
                            <div class="kt-widget31">
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Anna Strong
                                            </a>
                                            <p class="kt-widget31__text">
                                                Visual Designer,Google Inc
                                            </p>
                                        </div>
                                    </div>

                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>63%</span>
                                                <span>London</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-brand" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_14.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Milano Esco
                                            </a>
                                            <p class="kt-widget31__text">
                                                Product Designer, Apple Inc
                                            </p>
                                        </div>
                                    </div>

                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>33%</span>
                                                <span>Paris</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic kt-widget4__pic--pic">
                                            <img src="./assets/media/users/100_11.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Nick Bold
                                            </a>
                                            <p class="kt-widget31__text">
                                                Web Developer, Facebook Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>13%</span>
                                                <span>London</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic kt-widget4__pic--pic">
                                            <img src="./assets/media/users/100_1.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Wiltor Delton
                                            </a>
                                            <p class="kt-widget31__text">
                                                Project Manager, Amazon Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <div class="kt-widget31__stats">
                                                <span>93%</span>
                                                <span>New York</span>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_6.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Sam Stone
                                            </a>
                                            <p class="kt-widget31__text">
                                                Project Manager, Kilpo Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <div class="kt-widget31__stats">
                                                <span>50%</span>
                                                <span>New York</span>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget31_tab2_content">
                            <div class="kt-widget31">
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic kt-widget4__pic--pic">
                                            <img src="./assets/media/users/100_11.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Nick Bold
                                            </a>
                                            <p class="kt-widget31__text">
                                                Web Developer, Facebook Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>13%</span>
                                                <span>London</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic kt-widget4__pic--pic">
                                            <img src="./assets/media/users/100_1.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Wiltor Delton
                                            </a>
                                            <p class="kt-widget31__text">
                                                Project Manager, Amazon Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <div class="kt-widget31__stats">
                                                <span>93%</span>
                                                <span>New York</span>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_14.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Milano Esco
                                            </a>
                                            <p class="kt-widget31__text">
                                                Product Designer, Apple Inc
                                            </p>
                                        </div>
                                    </div>

                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>33%</span>
                                                <span>Paris</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_6.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Sam Stone
                                            </a>
                                            <p class="kt-widget31__text">
                                                Project Manager, Kilpo Inc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <div class="kt-widget31__stats">
                                                <span>50%</span>
                                                <span>New York</span>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__pic">
                                            <img src="./assets/media/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Anna Strong
                                            </a>
                                            <p class="kt-widget31__text">
                                                Visual Designer,Google Inc
                                            </p>
                                        </div>
                                    </div>

                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>63%</span>
                                                <span>London</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-brand" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-label-brand btn btn-sm btn-bold">Follow</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection