{{--  Add Category  --}}
<div class="modal fade" id="confirm" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirm">Invoice Of <span class="text-uppercase">
                        {{ $customer->name }}</span> <span class="text-success pull-right">TOTAL
                        :{{ Cart::total() }}</span></h4>

            </div>

            <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INVOICE
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('order.store') }}" method="HEAD">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <select name="payment_status" class="form-control show-tick" required>
                                            <option disabled="" selected>Type</option>
                                            <option value="handcash">Hand Cash</option>
                                            <option value="check">Cheack</option>
                                            <option value="due">Due</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="pay" required>
                                                <label class="form-label">Pay</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="due" required>
                                                <label class="form-label">Due</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  hidden  --}}
                                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                    <input type="hidden" name="oder_date" value="{{ date('d-m-y') }}">
                                    <input type="hidden" name="oder_status" value="pendding">
                                    <input type="hidden" name="total_product" value="{{ Cart::count() }}">
                                    <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
                                    <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                    <input type="hidden" name="total" value="{{ Cart::total() }}">
                                    <div class="col-lg-14 col-md-12 col-sm-12 col-xs-12">
                                        <input type="checkbox" id="remember_me_5" class="filled-in pull-right">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg m-l-15 waves-effect pull-right">CONFIRM</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>

    </div>
</div>
