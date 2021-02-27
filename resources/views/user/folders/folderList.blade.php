@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Folders</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal" data-target="#creareuserfolder">
                    Create New
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
                                <th><input type="checkbox"></th>
                                <th>Name</th>
                                <th>Domains</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($folders as $folder)
                                <?php

                                    $count_domain = \App\Models\user_domain_folder::where('user_id',Auth::user()->id)->where('folder_id',$folder->id)->count();
                                ?>
                                <tr>
                                    <th><input type="checkbox" value="{{$folder->id}}"></th>
                                    <td>{{$folder->folder_name}}</td>
                                    <td>
                                        @if($count_domain <= 1)
                                            {{$count_domain}} Domain
                                        @else
                                            {{$count_domain}} Domains
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fas fa-edit" data-toggle="modal" data-target="#userfolderedit{{$folder->id}}"></i> |
                                        <i class="fas fa-trash" data-toggle="modal" data-target="#userfolderdelete{{$folder->id}}"></i>
                                    </td>
                                </tr>


                                <div class="modal fade" id="userfolderedit{{$folder->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Folder</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('user.folder.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <label>Enter Folder Name</label>
                                                    <input type="text" class="form-control" name="folder_name" value="{{$folder->folder_name}}">
                                                    <input type="hidden" class="form-control" name="folder_edit" value="{{$folder->id}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="userfolderdelete{{$folder->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('user.folder.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Folder</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    are you sure to delete this folder ?
                                                    <input type="hidden" name="folder_del_id" value="{{$folder->id}}">
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
                        {{$folders->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="creareuserfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.folder.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <label>Enter Folder Name</label>
                    <input type="text" class="form-control" name="folder_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
