@extends('layouts.admin')
@section('admin')
    <div class="row g-0">
        <div class="col-md-6 col-xxl-3 mb-3 pe-md-2">
            <div class="card h-md-100">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                </div>
                <div class="card-body d-flex align-items-end">
                    <div class="row flex-grow-1">
                        <div class="col">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">$47K</div><span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-bar-weekly-sales h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
            <div class="card h-md-100">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2">Total Order</h6>
                </div>
                <div class="card-body pt-0">
                    <div class="row h-100">
                        <div class="col align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div><span class="badge rounded-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-line-total-order h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 pe-md-2 ps-xxl-2">
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mt-1">Market Share</h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">Samsung</span></div>
                                    <div class="d-xxl-none">33%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none"> 29%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">Apple</span></div>
                                    <div class="d-xxl-none"> 20%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-market-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2">
            <div class="card h-md-100">
                <div class="card-header d-flex flex-between-center pb-0">
                    <h6 class="mb-0">Weather</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row g-0 h-100 align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center"><img class="me-3" src="{{asset('assets/admin/')}}/img/icons/weather-icon.png" alt="" height="60" />
                                <div>
                                    <h6 class="mb-2">New York City</h6>
                                    <div class="fs--2 fw-semi-bold">
                                        <div class="text-warning">Sunny</div>Precipitation: 50%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-center ps-2">
                            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>
                            <div class="fs--1 text-800">32&deg; / 25&deg;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-12 col-xl-12 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                        <thead class="bg-light">
                        <tr class="text-900">
                            <th>Best Selling Products</th>
                            <th class="text-end">Revenue ($3189)</th>
                            <th class="pe-card text-end" style="width: 8rem">Revenue (%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/admin/')}}/img/products/12.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Raven Pro</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Landing</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$1311</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">41%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/admin/')}}/img/products/10.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Boots4</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Portfolio</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$860</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">27%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/admin/')}}/img/products/11.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Falcon</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Admin</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$539</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 17%;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">17%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/admin/')}}/img/products/14.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Slick</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Builder</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$245</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 8%;" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">8%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/admin/')}}/img/products/13.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Reign Pro</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Agency</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$234</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">7%</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
