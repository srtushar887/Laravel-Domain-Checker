@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Stripe Payment</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('user.payment.stripe.save')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 accountname">
                                <div class="form-group">
                                    <label for="validationCustom01">Card Name</label>
                                    <input type="text" class="form-control" id="billing-name" name="name" placeholder="Card Name" autocomplete="off" autofocus>
                                    <input type="hidden" value="{{$plan_type}}" name="plan_type">
                                    <input type="hidden" value="{{$t_am}}" name="total_amount">
                                </div>
                            </div>
                            <div class="col-md-12 username">
                                <div class="form-group">
                                    <label for="validationCustom01">Card Number</label>
                                    <input type="tel" class="form-control input-lg" name="cardNumber" placeholder="Valid Card Number" autocomplete="off" required autofocus
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 apikey">
                                <div class="form-group">
                                    <label for="validationCustom01">Expiration Date</label>
                                    <input type="tel" class="form-control input-lg input-sz" name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 apisecret">
                                <div class="form-group">
                                    <label for="validationCustom01">Card CVV</label>
                                    <input type="tel" class="form-control input-lg input-sz" name="cardCVC" placeholder="CVC" autocomplete="off" required
                                    />
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
    <script type="text/javascript" src="{{ asset('assets/stripe/payvalid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/stripe/paymin.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('assets/stripe/payform.js') }}"></script>
    <script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]'
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
