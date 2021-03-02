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
                        <input type="hidden" name="cmd" value="_xclick"/>
                        <input type="hidden" name="business" value="EM7It2VSKaR30UF8XTAMUcdPr7nOD472PxXVw252UnVunbYgQInXvL1-PmTvF0r2c1Q6QTZCr8EO-i0i"/>
                        <input type="hidden" name="cbt" value="aasdas"/>
                        <input type="hidden" name="currency_code" value="USD"/>
                        <input type="hidden" name="quantity" value="1"/>
                        <input type="hidden" name="item_name" value="Add Money To  Account"/>
                        <input type="hidden" name="custom" value="asdad"/>
                        <input type="hidden" name="amount" value="12"/>
                        <input type="hidden" name="return" value="aasd"/>
                        <input type="hidden" name="cancel_return" value="aasd"/>
                        <input type="hidden" name="notify_url" value="adas"/>

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
