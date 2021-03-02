@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <section id="one" class="pricing-table d-flex align-items-center blue-gradient">

                <div class="container">

                    <div class="row">
                        <!-- Free Tier -->
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0" style="height: 395px">
                                <div class="card-body">
                                    <h5 class="card-title grey-text text-uppercase text-center">Free</h5>
                                    <h6 class="card-price text-center">$0<span class="term">/month</span></h6>
                                    <hr class="my-4">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Upto 10 Domains</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited API Accounts</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Email Reminders</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>DNS Manager</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Whois Checker</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Folders</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Calender</li>
                                    </ul>
                                    <button class="btn btn-block btn-primary z-depth-0 btn-rounded my-2">Current</button>
                                </div>
                            </div>
                        </div>
                        <!-- Plus Tier -->
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title grey-text text-uppercase text-center">Pro</h5>
                                    <h6 class="card-price text-center">$12<span class="term">/year</span></h6>
                                    <hr class="my-4">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upto 100 Domains</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited API Accounts</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Email Reminders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Telegram Reminders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>DNS Manager</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Whois Checker</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Folders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Calender</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Customize Reminders (Coming Soon)</strong></li>
                                    </ul>
                                    <button class="btn btn-block btn-primary z-depth-0 btn-rounded my-2" data-toggle="modal" data-target="#upgradepro">Upgrade</button>
                                </div>
                            </div>
                        </div>
                        <!-- Pro Tier -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title grey-text text-uppercase text-center">Pro Plus</h5>
                                    <h6 class="card-price text-center">$24<span class="term">/year</span></h6>
                                    <hr class="my-4">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upto 250 Domains</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited API Accounts</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Email Reminders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Telegram Reminders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>DNS Manager</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Whois Checker</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Folders</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Calender</strong></li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Customize Reminders (Coming Soon)</strong></li>
                                    </ul>
                                    <button class="btn btn-block btn-primary z-depth-0 btn-rounded my-2" data-toggle="modal" data-target="#upgradeproplus">Upgrade</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </div>

    </div>


    <div class="modal fade" id="upgradepro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upgrade to Pro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.updgrade.account.payment')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <label style="font-size: 25px;"><strong>Plan :</strong> Pro</label><br>
                    <label style="font-size: 25px;"><strong>Billing Cycle :</strong> Yearly</label>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="1" name="pay_type" class="form-check-input folderchecked">
                            Pay With Stripe
                            <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="2" name="pay_type" class="form-check-input folderchecked">
                            Pay With Paypal
                            <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="3" name="pay_type" class="form-check-input folderchecked">
                            Pay With Roser Pay
                            <i class="input-frame"></i></label>
                    </div>
                    <button type="button" class="btn btn-secondary">Total Amount : $12</button>
                    <input type="hidden" value="12" name="amount">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Make Payment</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upgradeproplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upgrade to Pro Plus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.updgrade.account.payment')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <label style="font-size: 25px;"><strong>Plan :</strong> Pro Plus</label><br>
                    <label style="font-size: 25px;"><strong>Billing Cycle :</strong> Yearly</label>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="1" name="pay_type" class="form-check-input folderchecked">
                            Pay With Stripe
                            <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="2" name="pay_type" class="form-check-input folderchecked">
                            Pay With Paypal
                            <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-flat form-check-primary mt-0">
                        <label class="form-check-label">
                            <input type="radio" value="3" name="pay_type" class="form-check-input folderchecked">
                            Pay With Roser Pay
                            <i class="input-frame"></i></label>
                    </div>
                    <button type="button" class="btn btn-secondary">Total Amount : $24</button>
                    <input type="hidden" value="24" name="amount">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
