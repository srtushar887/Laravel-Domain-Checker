@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">API ACCOUNTS</h4>

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
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Register</th>
                                <th>Domains</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($api_accounts as $apiaccounts)
                                <?php
                                    $domanis = \App\Models\user_dmain::where('account_type',$apiaccounts->account_type)->count();
                                ?>
                            <tr>
                                <th scope="row">{{$apiaccounts->account_name}}</th>
                                <td>
                                    @if($apiaccounts->account_type == 1)
                                        GoDaddy
                                        @endif
                                </td>
                                <td>
                                    <a href="">{{$domanis}} domain</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-icon" data-toggle="modal" data-target="#updateaccountnname{{$apiaccounts->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-icon">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>


                                <div class="modal fade" id="updateaccountnname{{$apiaccounts->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Rename Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('user.api.acount.update.name')}}" method="post">
                                                @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="account_name" value="{{$apiaccounts->account_name}}">
                                                    <input type="hidden" class="form-control" name="update_account_name_id" value="{{$apiaccounts->id}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$api_accounts->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>





@endsection
