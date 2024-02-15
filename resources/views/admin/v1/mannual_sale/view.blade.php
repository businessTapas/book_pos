<x-layout>
    @slot('title', $page)
    @slot('body')

        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

            body {
                margin: 0;
                padding: 0;
                background: #e1e1e1;
            }

            div,
            p,
            a,
            li,
            td {
                -webkit-text-size-adjust: none;
            }

            .ReadMsgBody {
                width: 100%;
                background-color: #ffffff;
            }

            .ExternalClass {
                width: 100%;
                background-color: #ffffff;
            }

            body {
                width: 100%;
                height: 100%;
                background-color: #e1e1e1;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
            }

            html {
                width: 100%;
            }

            p {
                padding: 0 !important;
                margin-top: 0 !important;
                margin-right: 0 !important;
                margin-bottom: 0 !important;
                margin-left: 0 !important;
            }

            .visibleMobile {
                display: none;
            }

            .hiddenMobile {
                display: block;
            }

            @media only screen and (max-width: 600px) {
                body {
                    width: auto !important;
                }

                table[class=fullTable] {
                    width: 96% !important;
                    clear: both;
                }

                table[class=fullPadding] {
                    width: 85% !important;
                    clear: both;
                }

                table[class=col] {
                    width: 45% !important;
                }

                .erase {
                    display: none;
                }
            }

            @media only screen and (max-width: 420px) {
                table[class=fullTable] {
                    width: 100% !important;
                    clear: both;
                }

                table[class=fullPadding] {
                    width: 85% !important;
                    clear: both;
                }

                table[class=col] {
                    width: 100% !important;
                    clear: both;
                }

                table[class=col] td {
                    text-align: left !important;
                }

                .erase {
                    display: none;
                    font-size: 0;
                    max-height: 0;
                    line-height: 0;
                    padding: 0;
                }

                .visibleMobile {
                    display: block !important;
                }

                .hiddenMobile {
                    display: none !important;
                }
            }
        </style>


        <!-- Header -->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tr>
                <td height="20"></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                        bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                        <tr class="hiddenMobile">
                            <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                            <td height="30"></td>
                        </tr>

                        <tr>
                            <td>
                                <table width="800" border="0" cellpadding="0" cellspacing="0" align="center"
                                    class="fullPadding">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                    align="left" class="col">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left"
                                                                style="font-size: 18px; font-weight: 500; color: #6b10f4; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                                {{ $saledata->invoice_no }}</td>
                                                        </tr>
                                                        <tr class="hiddenMobile">
                                                            <td height="40"></td>
                                                        </tr>
                                                        <tr class="visibleMobile">
                                                            <td height="20"></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <table width="250" border="0" cellpadding="0" cellspacing="0"
                                                    align="right" class="col">
                                                    <tbody>
                                                        <tr class="visibleMobile">
                                                            <td height="20"></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="font-size: 18px; font-weight: 500; color: #475569; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                                                Bill To
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="font-size: 12px; color: #475569; text-align: right; line-height: 20px;">
                                                                {{ $saledata->customer->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="font-size: 12px; color: #475569; text-align: right; line-height: 20px;">
                                                                {{ $saledata->customer->address }}</td>

                                                        </tr>
                                                        <tr cellpading>
                                                            <td
                                                                style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                Phone no: {{ $saledata->phone }}
                                                            </td>
                                                        </tr>
                                                        <tr cellpading>
                                                            <td
                                                                style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                Email: {{ $saledata->email }}
                                                            </td>
                                                        </tr>

                                                        <tr cellpading>
                                                            <td
                                                                style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                Invoice Date: {{ $saledata->sale_date }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                Due Date: 2023-11-03
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                Sale Agent: {{ $saledata->store->store_name }}
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
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
            bgcolor="#e1e1e1">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                            class="fullTable" bgcolor="#ffffff">
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
                                        <table width="800" border="0" cellpadding="0" cellspacing="0" align="center"
                                            class="fullPadding">
                                            <tbody>
                                                <tr style="background: #F1F5F9; border: 1px solid #e2e8f0;">
                                                    <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;"
                                                        width="5%" align="left">
                                                        #
                                                    </th>
                                                    <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;"
                                                        width="45%" align="left">
                                                        Item
                                                    </th>
                                                    <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;"
                                                        align="left">
                                                        <small>Unit Price</small>
                                                    </th>
                                                    <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;"
                                                        align="right">
                                                        Qty
                                                    </th>

                                                    <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; border-right: 1px solid #e2e8f0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #1e293b; font-weight: normal; line-height: 1; vertical-align: top; padding: 8px 10px;"
                                                        align="right">
                                                        Sub Total
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
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #64748b;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                            class="article">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #424242;  line-height: 18px;  vertical-align: top; padding:10px 10px 10px 0;"
                                                            class="article">
                                                            {{ $sdata->product->title }}
                                                        </td>
                                                        <td
                                                            style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 10px 10px 0;">
                                                            <small>{{ $sdata->product->price }}</small></td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0 10px 0;"
                                                            align="right">{{ $sdata->qty }}</td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0 10px 10px;"
                                                            align="right">{{ $sdata->total_amount }}</td>
                                                    </tr>
                                                @endforeach
                                                <!-- <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                              </tr> -->
                                                <!-- <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">Beats RemoteTalk Cable</td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>MHDV2G/A</small></td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$29.95</td>
                              </tr> -->
                                                <!-- <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                              </tr> -->
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
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
            bgcolor="#e1e1e1">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                            class="fullTable" bgcolor="#ffffff">
                            <tbody>
                                <tr>
                                    <td>

                                        <!-- Table Total -->
                                        <table width="800" border="0" cellpadding="0" cellspacing="0"
                                            align="center" class="fullPadding">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-weight: 500; font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5A5C6B; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;"
                                                        width="80">
                                                        ₹{{ $saledata->sub_total }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Discount</strong>
                                                    </td>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        -₹{{ $saledata->discount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Total Tax</strong>
                                                    </td>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        ₹{{ $saledata->total_tax }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Adjustment </strong></td>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        ₹{{ $saledata->total_tax - $saledata->discount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Total</strong></td>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        ₹{{ $saledata->total }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #a94442; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <strong>Amount Due</strong></td>
                                                    <td
                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #a94442; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        ₹{{ $saledata->total }}
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
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
            bgcolor="#e1e1e1">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                            class="fullTable" bgcolor="#ffffff">
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
                                        <table width="480" border="0" cellpadding="0" cellspacing="0"
                                            align="center" class="fullPadding">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0" align="left" class="col">

                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                        <strong>Note:</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100%" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                        Officia voluptas veniam magni maiores temporibus
                                                                        consequuntur rem.
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0" align="right" class="col">
                                                            <tbody>
                                                                <tr class="visibleMobile">
                                                                    <td height="20"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100%" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                        <strong>Terms & Conditions</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100%" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                        Hic magnam voluptatibus sequi consequuntur eum
                                                                        repellat quam nemo praesentium. Libero rem tempora
                                                                        officia iusto. Veniam in vel voluptatum natus
                                                                        numquam est eaque nihil.
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                        Hic magnam voluptatibus sequi consequuntur eum
                                                                        repellat quam nemo praesentium. Libero rem tempora
                                                                        officia iusto. Veniam in vel voluptatum natus
                                                                        numquam est eaque nihil.
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


        {{-- ===================Bill MODAL Start========== --}}
        <div class="modal fade bs-example-modal-xl" data-url="" id="invoice" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="bill-form" action="" method="">
                @csrf
                <input id="invoice_no" value="{{ $saledata->id }}" type="hidden">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal-title">Tax Invoice</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="bill_modal">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- =============================End===================================== --}}

    @endslot
</x-layout>
<script>
    window.onload = function() {
        var invoiceno = document.getElementById('invoice_no').value;
        //alert(invoice_no);
        editForm('{{ route('sale.cus.invoice') }}/' + invoiceno, 'bill_modal');
        setTimeout(function() {
            $("#invoice").modal('show');
        }, 200);

        $(document).on('click', '#pos-payment', function() {
            //event.preventDefault();
            var saleid = $(this).val();
            //alert(saleid);

            // Corrected route with the discountid parameter
            var routeUrl = '{{ route('payment.bank.api', ['sale_id' => ':saleid']) }}';
            routeUrl = routeUrl.replace(':saleid', saleid);

            editForm(routeUrl,'show-msg');
            alert("Payment Successfully accepted");
            var redirect_url = '{{ route('sale.index') }}';
            refreshPage(200, redirect_url);
           
        });
    }

    function Downloadpdf(url) {
        window.open(url, "", "width=800, height=500");

    }
</script>
