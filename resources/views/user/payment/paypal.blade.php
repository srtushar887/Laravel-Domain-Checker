@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Paypal Payment</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmTransaction" id="payment_form">
                        <input type="hidden" name="business" value="sb-sg47r8914722@business.example.com">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="item_name" value="Demo">
                        <input type="hidden" name="item_number" value="012">
                        <input type="hidden" name="amount" value="12">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="cancel_return" value="{{route('user.updgrade.account')}}">
                        <input type="hidden" name="return" value="{{route('user.updgrade.account')}}">
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
@section('js')
    <script>
        document.getElementById("payment_form").submit();
    </script>
@endsection
