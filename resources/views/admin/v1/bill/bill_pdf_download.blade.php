
<!doctype html>
<html lang="en">

    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Order confirmation </title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
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

<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                  <td>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                      <tbody>
                        <tr>
                          <td align="left" style="font-size: 18px; font-weight: 500; color: #6b10f4; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;"> Invoice No: {{$saledata->invoice_no}}</td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                       
                      </tbody>
                    </table>
                    <table width="250" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                      <tbody>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px; font-weight: 500; color: #475569; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                            Bill To
                          </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; color: #475569; text-align: right; line-height: 20px;">{{$saledata->customer->name}}</td>
                            </tr>
                            <tr>
                            <td style="font-size: 12px; color: #475569; text-align: right; line-height: 20px;">Phone: {{$saledata->customer->phone}}
                                Atlanta Minnesota
                                HM 36346</td>
                           
                        </tr>
                        <tr>
                      
                        <tr cellpading>
                          <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                            Invoice Date: {{$saledata->sale_date}}
                          </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                Due Date: 2023-11-03
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                Sale Agent:                                            <strong>{{$saledata->store->store_name}}</strong><br>India <br>Phone: (+91) {{$saledata->user->phone}}<br> Email: {{$saledata->user->email}}<br>GSTIN : {{$saledata->user->gst_no}}

                            </td>
                          </tr>
                        
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!-- /Header -->
<!-- Order Details -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr style="background: #F1F5F9; border: 1px solid #e2e8f0;">
                        <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" width="5%" align="left">
                            #
                          </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" width="45%" align="left">
                        Item
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" align="left">
                        <small>Qty</small>
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" align="right">
                        Rate
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" align="right">
                        Tax
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;" align="right">
                        Amount
                      </th>
                    </tr>
                    <!-- <tr>
                      <td height="1" style="background: #bebebe;" colspan="4"></td>
                    </tr> -->
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                    @foreach ($saledata->saledetails as $sdata)

                    <tr>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #64748b;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                            1
                          </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #424242;  line-height: 18px;  vertical-align: top; padding:10px 10px 10px 0;" class="article">
                        {{$sdata->product->title}}
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 10px 10px 0;"><small>{{$sdata->qty}}</small></td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0 10px 0;" align="right">{{$sdata->product->price}}</td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0 10px 10px;" align="right">SGST 9.00%
                        CGST 9.00%</td>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0 10px 10px;" align="right">{{$sdata->total_amount}}</td>
                    </tr>
                    @endforeach

                    

                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Order Details -->
<!-- Total -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
              <td>

                <!-- Table Total -->
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td style="font-weight: 500; font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5A5C6B; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Total</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                        ₹{{$saledata->sub_total}}
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Discount (30%)</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        -₹{{$saledata->discount}}
                      </td>
                    </tr>
                   
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; "><strong>Tax</strong></td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        ₹{{$saledata->total_tax}}
                      </td>
                    </tr>
                    
                      <tr>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; "><strong>Total</strong></td>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            ₹{{$saledata->total}}
                        </td>
                      </tr>
                      
                  </tbody>
                </table>
                <!-- /Table Total -->

              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Total -->
<!-- Information -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" class="col">

                          <tbody>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>Note:</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="5"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                Officia voluptas veniam magni maiores temporibus consequuntur rem.
                              </td>
                            </tr>
                            
                          </tbody>
                        </table>


                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                          <tbody>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                                <td width="100%" height="5"></td>
                              </tr>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>Terms & Conditions</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="5"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                Hic magnam voluptatibus sequi consequuntur eum repellat quam nemo praesentium. Libero rem tempora officia iusto. Veniam in vel voluptatum natus numquam est eaque nihil.
                              </td>
                              
                            </tr>
                            <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                  Hic magnam voluptatibus sequi consequuntur eum repellat quam nemo praesentium. Libero rem tempora officia iusto. Veniam in vel voluptatum natus numquam est eaque nihil.
                                </td>
                                
                              </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="30"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Information -->
</body>
</html>
<script>
    print();
</script>