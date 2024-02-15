
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Invoice Detail | Vuesy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
            body { margin: 0; padding: 0; background: #e1e1e1; }
            div, p, a, li, td { -webkit-text-size-adjust: none; }
            .ReadMsgBody { width: 100%; background-color: #ffffff; }
            .ExternalClass { width: 100%; background-color: #ffffff; }
            body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
            html { width: 100%; }
            p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
            .visibleMobile { display: none; }
            .hiddenMobile { display: block; }
          
            @media only screen and (max-width: 600px) {
            body { width: auto !important; }
            table[class=fullTable] { width: 96% !important; clear: both; }
            table[class=fullPadding] { width: 85% !important; clear: both; }
            table[class=col] { width: 45% !important; }
            .erase { display: none; }
            }
          
            @media only screen and (max-width: 420px) {
            table[class=fullTable] { width: 100% !important; clear: both; }
            table[class=fullPadding] { width: 85% !important; clear: both; }
            table[class=col] { width: 100% !important; clear: both; }
            table[class=col] td { text-align: left !important; }
            .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
            .visibleMobile { display: block !important; }
            .hiddenMobile { display: none !important; }
            }
          </style>
          
        
    </head>

    
    <body data-layout="horizontal" data-topbar="dark">
       
        
                            <div class="card-header">
                                <h3 class="d-block w-100"><small class="float-right"></small></h3>
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
                                        <img src="data:image/svg;base64,{{ $qrCodes['path'] }}" style="width:100px;height:100px;">
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
                                
                            </div>
                       
                       
      
        
    </body>
</html>
<script>
    print();
</script>
