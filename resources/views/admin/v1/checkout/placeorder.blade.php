<x-layout>
    @slot('title', )
    @slot('body')



<div class="modal fade edit-layout-modal pr-0 show" id="InvoiceModal" role="dialog" aria-labelledby="InvoiceModalLabel" style="display: block; padding-left: 17px;" aria-modal="true">
    <div class="modal-dialog mw-70" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="InvoiceModalLabel">Preview Invoice</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-header">
                    <h3 class="d-block w-100">Radmin<small class="float-right">07/10/2021</small></h3>
                </div>
                <div class="card-body">
                    <div class="row invoice-info">
<div class="col-sm-12">
    <h4 class="text-right">Invoice #INV007612</h4>
</div>
<div class="col-sm-3  invoice-col">
    From
    <address>
        <strong>Themicly,</strong><br>Rajshahi <br>Bangladesh <br>Phone: (088) 016-1707 5540<br>Email: info@themicly.com
    </address>
</div>
<div class="col-sm-3 invoice-col">
    To
    <address>
        <strong>John Doe</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 123-7654<br>Email: john.doe@example.com
    </address>
</div>
<div class="col-sm-3 invoice-col text-right">
    <b>Issue Date:</b> Feb 12, 2023<br>
    <b>Due Date:</b> Apr 12, 2023<br>
    <b>Account:</b> 968-34567-1234
</div>
<div class="col-sm-3 invoice-col text-right">
    <img height="100" src="https://radmin.themicly.com/img/qr.png" alt="">
</div>
</div>

<div class="row">
<div class="col-12 table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="wp-10">SL</th>
                <th class="wp-40">Product</th>
                <th class="wp-20">Unit Price</th>
                <th class="wp-15">Qty</th>
                <th class="wp-15">Discount</th>
                <th class="wp-15 text-right">Sub Total</th>
            </tr>
        </thead>
        <tbody>
                                                            <tr>
                <td>1</td>
                <td>Lorem Product 1</td>
                <td>1320</td>
                <td>5</td>
                <td>0.00</td>
                <td class="text-right">6600.00</td>
            </tr>
                                            <tr>
                <td>2</td>
                <td>Lorem Product 2</td>
                <td>520</td>
                <td>10</td>
                <td>100.00</td>
                <td class="text-right">4200.00</td>
            </tr>
                                            <tr>
                <td>3</td>
                <td>Lorem Product 3</td>
                <td>720</td>
                <td>8</td>
                <td>0.00</td>
                <td class="text-right">5760.00</td>
            </tr>
                                            <tr>
                <td>4</td>
                <td>Lorem Product 4</td>
                <td>420</td>
                <td>12</td>
                <td>200.00</td>
                <td class="text-right">2640.00</td>
            </tr>
                                            <tr>
                <td>5</td>
                <td>Lorem Product 5</td>
                <td>920</td>
                <td>7</td>
                <td>0.00</td>
                <td class="text-right">6440.00</td>
            </tr>
                        </tbody>
    </table>
</div>
</div>

<div class="row">
<div class="col-6">
    <p class="lead">Payment Methods:</p>
    <img src="https://radmin.themicly.com/img/credit/visa.png" alt="Visa">
    <img src="https://radmin.themicly.com/img/credit/mastercard.png" alt="Mastercard">
    <img src="https://radmin.themicly.com/img/credit/american-express.png" alt="American Express">
    <img src="https://radmin.themicly.com/img/credit/paypal2.png" alt="Paypal">

    <div class="alert alert-secondary mt-20">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
</div>
<div class="col-2"></div>
<div class="col-4">
    <div class="table-responsive">
                    <table class="table">
            <tbody>
                <tr>
                    <th class="th-50">Subtotal:</th>
                    <td class="text-right">25640.00</td>
                </tr>
                <tr>
                    <th>Tax (10%)</th>
                    <td class="text-right">2564.00</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td class="text-right">28204.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>						<div class="row no-print">
                        <div class="col-12">
                            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endslot
</x-layout>