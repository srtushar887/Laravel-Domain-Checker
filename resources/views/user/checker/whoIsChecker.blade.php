@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Whois Checker</h4>
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
        <div class="col-md-12  grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
{{--                    <form class="forms-sample" action="{{route('user.whois.checkdata')}}" method="post">--}}
{{--                        @csrf--}}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Enter Domain Name</label>
                                    <input type="text"  class="form-control domain_name" name="domain_name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="submit" style="margin-top: 31px;" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>


{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>



    <div class="row" >
        <div class="col-md-12  grid-margin stretch-card whoischeckdiv">
            <div class="card">
                <div class="card-body domaincheckdata">

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.whoischeckdiv').hide();


        $('#submit').click(function () {
            var dm_name = $('.domain_name').val();
            $.ajax({
                type : "POST",
                url: "{{route('user.whois.checkdata')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'dom_name' : dm_name
                },
                success:function(data){
                    console.log(data);
                    $('.whoischeckdiv').show();
                    $('.domaincheckdata').empty().append(data);

                }
            });
        })



    })
</script>
@endsection
