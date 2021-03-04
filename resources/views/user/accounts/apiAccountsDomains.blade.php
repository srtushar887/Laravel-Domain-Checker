@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">API Accounts</h4>

                <div class="page-title-right">
                    <a href="{{route('user.api.account.create')}}">

                        <button class="btn btn-success btn-sm">Create New</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{route('user.api.acount.domain.save')}}" method="post">
                    @csrf
                <div class="card-body">
                    @foreach($domainList as $domain)
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="checkbox" value="{{$domain['domain']}}" name="domain_id[]" class="form-check-input folderchecked">
                            {{$domain['domain']}}
                            <i class="input-frame"></i></label>
                    </div>
                    @endforeach
                    <input type="hidden" value="{{$type}}" name="type">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection
