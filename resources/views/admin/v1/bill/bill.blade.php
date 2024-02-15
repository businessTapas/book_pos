<script>
    
</script>

                    <div class="card-header">
                       <!--  <h3 class="d-block w-100"><small class="float-right"></small></h3> -->
                    </div>
                    <div class="card-body">
                        <div class="row invoice-info">
                            <div class="col-sm-6">
                                <h4 class="text-right">Invoice No: {{$saledata->invoice_no}}</h4>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="text-right"></h4>
                            </div>
                            <div class="col-sm-3  invoice-col">
                                From
                                <address>
                                    <strong>{{$saledata->store->store_name}}</strong><br>India <br>Phone: (+91) {{$saledata->user->phone}}<br> Email: {{$saledata->user->email}}<br>GSTIN : {{$saledata->user->gst_no}}
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                To
                                <address>
                                    <strong>{{$saledata->customer->name}}</strong><br>Kolkata<br>West Bengal<br>Phone: {{$saledata->customer->phone}}<br>Email:  {{$saledata->customer->email}}<br>GSTIN : {{$saledata->customer->gst_no}}
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col text-right">
                                <b>Issue Date:</b> {{$saledata->sale_date}}<br>
                                <b>Due Date:</b> Apr 12, 2023<br>
                                <b>Account:</b> {{$saledata->acc_holder_name}}
                            </div>
                            <div class="col-sm-3 invoice-col text-right">
                                {{--  {!! QrCode::size(100)->generate('{{$saledata->total}}'); !!} --}} 
                                 {!! QrCode::backgroundColor(255,225,225, 0)->generate($saledata->total) !!}
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
                                            <th class="wp-15 text-right">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($saledata->saledetails as $sdata)
                                        <tr>
                                            <td>{{$loop->iteration}}</td> 
                                            <td>{{$sdata->product->title}}</td>
                                            <td>{{$sdata->product->price}}</td>
                                            <td>{{$sdata->qty}}</td>
                                            <td class="text-right">{{$sdata->total_amount}}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="https://radmin.themicly.com/img/credit/visa.png" alt="Visa">
                                <img src="https://radmin.themicly.com/img/credit/mastercard.png" alt="Mastercard">
                                <img src="https://radmin.themicly.com/img/credit/american-express.png"
                                    alt="American Express">
                                <img src="https://radmin.themicly.com/img/credit/paypal2.png" alt="Paypal">
    
                                <div class="alert alert-secondary mt-20">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="th-50">Subtotal:</th>
                                                <td class="text-right">{{$saledata->sub_total}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (10%)</th>
                                                <td class="text-right">{{$saledata->total_tax}}</td>
                                            </tr>
                                            <tr>
                                                <th>Discount</th>
                                                <td class="text-right">{{$saledata->discount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">{{$saledata->total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                            @if ( $saledata->status == 'unpaid' )
                            <button id="pos-payment" type="button" value="{{ $saledata->id }}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                                Submit Payment</button>
                               {{--  <button id="pos-payment" type="button" onClick="editForm('{{ route('payment.bank.api',[$saledata->id]) }}','show-msg')" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                                    Submit Payment</button> --}}
                                    
                            @endif

{{--                                 <a  onClick="Downloadpdf('{{ route('sale.pdf.download',[2]) }}')" >
 --}}                                
                                    <a  onClick="Downloadpdf('{{ route('sale.pdf.download', [$saledata->invoice_no]) }}')" >
                                    <button type="button"   class="btn btn-primary pull-right"><i class="fa fa-download"></i>
                                    Generate PDF</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" id="abc" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
        <div id="show-msg"></div>       
<script>
        function generate_pdf() {
        var xhttp = new XMLHttpRequest();
        formdata = new FormData(document.getElementById('bill-form'));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("PDF Downloaded successfully");
            }
        };
        xhttp.open('POST', "{{ route('sale.pdf.download',[2]) }}", true);
        xhttp.send(formdata);
    }

    function order_payment(dt) {
        editForm(dt,'show-msg');
    }

    
</script>
