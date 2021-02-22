@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">API Accounts</h4>

                <div class="page-title-right">
                    <a href="{{route('user.domain.list')}}">

                        <button class="btn btn-success btn-sm">Go Back</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Domains</h4>
                    <form class="needs-validation" novalidate="" action="{{route('user.domain.save')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 username">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="domain_name"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Domain</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
@section('js')

@endsection
