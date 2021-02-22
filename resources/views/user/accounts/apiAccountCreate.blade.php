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
        <div class="col-xl-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Want the guide to get API credentials? <a href="">Click Here</a> </h4>
                    <form class="needs-validation" novalidate="" action="{{route('user.api.account.save')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <select class="form-control acctype" name="account_type">
                                        <option value="1">GoDaddy</option>
                                        <option value="2">Namesilo</option>
                                        <option value="3">NameCheap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 accountname">
                                <div class="form-group">
                                    <label for="validationCustom01">Account Name</label>
                                    <input type="text" class="form-control" name="account_name">
                                </div>
                            </div>
                            <div class="col-md-12 username">
                                <div class="form-group">
                                    <label for="validationCustom01">User Name</label>
                                    <input type="text" class="form-control" name="user_name">
                                </div>
                            </div>
                            <div class="col-md-12 apikey">
                                <div class="form-group">
                                    <label for="validationCustom01">Api key</label>
                                    <input type="text" class="form-control" name="api_key">
                                </div>
                            </div>
                            <div class="col-md-12 apisecret">
                                <div class="form-group">
                                    <label for="validationCustom01">Api Secret</label>
                                    <input type="text" class="form-control" name="api_secret">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Account</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.username').hide();


        $('.acctype').change(function () {
            var typeid = $(this).val();

            if (typeid == 1){
                $('.accountname').show();
                $('.username').hide();
                $('.apikey').show();
                $('.apisecret').show();
            }else if(typeid == 2){
                $('.accountname').show();
                $('.username').hide();
                $('.apikey').show();
                $('.apisecret').hide();
            }else if(typeid == 3) {
                $('.accountname').show();
                $('.username').show();
                $('.apikey').show();
                $('.apisecret').hide();
            }else{
                $('.accountname').hide();
                $('.username').hide();
                $('.apikey').hide();
                $('.apisecret').hide();
            }


        })



    })
</script>
@endsection
