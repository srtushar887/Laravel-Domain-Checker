@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Domains</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap" style="padding-right: 5px">
            <a href="{{route('user.domain.create')}}">
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    Create New
                </button>


            </a>


            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 folderbtn" disabled style="margin-left: 5px;" data-toggle="modal" data-target="#addfolder">
                <i class="fas fa-folder"></i>
            </button>



        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="checketdall"></th>
                                <th>Domain</th>
                                <th>Expiry</th>
                                <th>Status</th>
                                <th>Register</th>
                                <th>Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domains as $domain)
                            <tr>
                                <th><input type="checkbox" value="{{$domain->id}}" class="all_data_check"></th>
                                <td>{{$domain->domain_name}}</td>
                                <td>{{$domain->domain_exp_date}}</td>
                                <td>
                                    @if($domain->domain_exp_date > \Carbon\Carbon::now()->format('Y-m-d'))
                                        <i class="fas fa-check-circle"></i>
                                    @else
                                        <i class="fas fa-times-circle"></i>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{$domain->domain_owner}}</span>

                                </td>
                                <td>{{$domain->created_at->diffForHumans()}}</td>
                                <td>
                                    <i class="fas fa-trash" data-toggle="modal" data-target="#userdomaindelete{{$domain->id}}"></i>
                                </td>
                            </tr>

                            <div class="modal fade" id="userdomaindelete{{$domain->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('user.domain.delete')}}" method="post">
                                            @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Domain</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            are you sure to delete this domain ?
                                            <input type="hidden" name="domain_del_id" value="{{$domain->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$domains->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="addfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.folder.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        @foreach($folders as $fold)
                        <div class="form-check form-check-flat form-check-primary mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" value="{{$fold->id}}" class="form-check-input folderchecked">
                                {{$fold->folder_name}}
                                <i class="input-frame"></i></label>
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" disabled class="btn btn-primary savebtn" id="foldersavedata">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(document).ready(function () {

            var domain_id = [];
            var folder_id = [];
            $(document).on('click','#checketdall',function () {

                $('.folderbtn').prop('disabled',false)


                $('.all_data_check').prop('checked', true);
                $('.all_data_check:checked').each(function () {
                    domain_id.push($(this).val());
                });

            })

            $('.folderchecked').click(function (){
                folder_id.push($(this).val());
                if(folder_id.length > 0){
                    $('.savebtn').prop('disabled',false)
                }
            })


            $('#foldersavedata').click(function () {
                $.ajax({
                    type : "POST",
                    url: "{{route('user.domain.folder.save')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'domain_id' : domain_id,
                        'folder_id' : folder_id,
                    },
                    success:function(data){
                        $('#addfolder').modal('hide');

                        swal("Domain successfully added folder", "", "success");

                        setTimeout(function () {
                            location.reload();
                        },3000)

                    }
                });
            })








        })
    </script>
@endsection
