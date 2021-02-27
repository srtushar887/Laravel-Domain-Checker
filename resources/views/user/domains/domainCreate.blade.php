@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add Domain</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('user.domain.list')}}">
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    Go Back
                </button>
            </a>

        </div>
    </div>



    <div class="row">
        <div class="col-md-6 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{route('user.domain.save')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Enter Domain Name</label>
                            <textarea type="text"  cols="10" rows="10" class="form-control" name="domain_name"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
