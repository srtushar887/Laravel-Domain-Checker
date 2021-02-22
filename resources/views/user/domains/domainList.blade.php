@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Domains</h4>

                <div class="page-title-right">
                    <a href="{{route('user.domain.create')}}">

                        <button class="btn btn-success btn-sm">Create New</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Example</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Domain Name</th>
                                <th>Exp Date</th>
                                <th>Status</th>
                                <th>Register</th>
                                <th>Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domains as $dm)
                            <tr>
                                <th scope="row">{!! $dm->domain_name !!}</th>
                                <td>{{$dm->domain_exp_date}}</td>
                                <td>
                                    aa
                                </td>
                                <td>{!! $dm->domain_owner !!}</td>
                                <td>{{$dm->created_at->diffForHumans()}}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
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
@endsection
