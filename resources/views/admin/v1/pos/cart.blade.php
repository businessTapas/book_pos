<div class="p-2 pt-1 border rounded">
    <div class="table-responsive-lg" id="pos-slctd-prod-table">
        <table class="table mb-0">
            <thead class="text-center">
                <tr>
                    <th class="col-sm-3">Item</th>
                    {{-- <th class="col-sm-2">Batch No</th> --}}
                    <th class="col-sm-2">Price</th>
                    <th class="col-sm-2">Quantity</th>
                    <th class="col-sm-2">SubTotal</th>
                    <th class="col-sm-1"></th>
                </tr>
            </thead>

            <tbody class="text-center" id="res">

                @foreach ($carts as $cart)
                    <tr id="{{ $cart->id }}">
                        <td class="col-sm-2 product-title">

                            <button type="button" class="edit-product btn btn-link p-0" data-toggle="modal"
                                data-target="#editModal"><span><strong>{{ $cart->product->title }}
                                    </strong></span>
                            </button>
                        </td>
                        {{-- <td class="col-sm-2">
                            <input type="text" class="form-control batch-no" disabled=""> <input type="hidden"
                                class="product-batch-id" name="product_batch_id[]">
                        </td> --}}
                        <td class="col-sm-2 product-price">{{ $cart->price }}</td>
                        <td class="col-sm-2">
                            <select onchange="editForm('{{ route('pos.cart.updateqty', $cart->id.'-') }}'+this.value,'pos_cart')" class="form-select form-select-sm cartquantity"  style="height: 100px, overfloe-y:auto" name="qty[]">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}" {{ $i == $cart->qty ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="col-sm-3 sub-total">{{ $cart->price * $cart->qty }} </td>
                        <td><button onclick="editForm('{{ route('pos.cart.delete', $cart->id) }}','pos_cart')"
                                type="button" class="ibtnDel btn btn-danger font-size-10 p-1 py-0 ms-2"><i
                                    class="fas fa-window-close"></i></button></td>

                    </tr>
                @endforeach


            </tbody>

        </table><!-- end table -->
    </div>

</div>
<div class="col-12 totals" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-4">
            <span class="totals-title me-1">Items</span><span
                id="item">{{ $carts->count() }}({{ $carts->count() }})</span>
        </div>
        <div class="col-sm-4">
            <span class="totals-title">Sub-Total</span><span id="subtotal">{{ $prices }}.00</span>
        </div>
        <div class="col-sm-4">
            <span class="totals-title">Discount <button type="button" class="btn btn-link btn-sm ps-0"
                data-toggle="modal" data-target="#coupon-modal"> <i class="bx bx-edit"></i></button></span><span
                id="">{{$disamount??'0.00'}}</span>
        </div>
        <div class="col-sm-4">
            <span class="totals-title">Apply Coupon <button type="button" class="btn btn-link btn-sm ps-0" data-bs-toggle="modal" data-bs-target="#discount-sec" onclick="editForm('{{route('coupan.dispaly',['total'=> $prices])}}','dis_offer')"><i class="bx bx-edit"></i></button></span><span
                id="coupon-text"></span>
        </div>
        <div class="col-sm-4">
            <span class="totals-title">Tax <button type="button" class="btn btn-link btn-sm ps-0" data-toggle="modal"
                    data-target="#order-tax"><i class="bx bx-edit"></i></button></span><span
                id="tax">0%</span>
        </div>
        <div class="col-sm-4">
            <span class="totals-title">Shipping <button type="button" class="btn btn-link btn-sm ps-0"
                    data-toggle="modal" data-target="#shipping-cost-modal"><i
                        class="bx bx-edit"></i></button></span><span id="shipping-cost">0.00</span>
        </div>
    </div>
</div>
<div class="payment-amount text-center bg-light p-2 mt-3 border rounded">
    <h4 class="mb-0 text-primary">Grand Total <span id="grand-total">{{ number_format(($prices - $disamount), 2) }}</span>
    </h4>
</div>
{{-- ================== hidden inputs ================ --}}
<input type="hidden" name="taxeble_amount" value="{{ $prices }}"
                        id="taxeble_amount"placeholder="taxeble_amount"
                        class="form-control-sm form-control" />
                        
                        <input readonly type="hidden" name="total_tax"
                        value="0.00"
                        id="total_tax" placeholder="total tax"
                        class="form-control-sm form-control" />

                        <input readonly type="hidden" name="discount"
                        value="{{$disamount??'0.00'}}"
                        id="discount" placeholder="discount"
                        class="form-control-sm form-control" />

                        <input type="hidden" name="total_amount"
                        value="{{  str_replace(',', '', number_format(($prices - $disamount), 2) )}}"
                        id="total_amount" placeholder="amount"
                        class="form-control-sm form-control" />
{{-- ===================hidden end======================= --}}
<div class="modal fade" id="discount-sec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Offers!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="dis_offer">
            </div>
        </div>
    </div>
</div>

<script>
        
    
    // for the paginatin purpose 
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            selectDrop('form_data_pos', '{{ route('pos.search') }}?page=' + page, 'book_list')
        };
    });

    
   /*  function updateQty(cartqty) {
alert(cartqty);
        var route = "/pos.update_cart";

        if (qty <= 0) {

            alert("Please enter quantity greater then 0.");
        } else {
           

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            method:'POST',
            dataType:'json',
            url:'/getdata',
            data: { cartid: '', qty: cartqty }
            success:function(data) {
               $("#data").html(data.msg);
            },
            error: function (msg) {
               console.log(msg);
               var errors = msg.responseJSON;
            }
         });
        }
    } */

    // Add this script to handle visibility and states
    // document.addEventListener('DOMContentLoaded', function () {
    //     var discountAmount = parseFloat("{{ $disamount }}");

    //     if (discountAmount > 0) {
    //         // If discount amount is greater than 0, disable the buttons and show "applied"
    //         //document.getElementById('discount-amount').innerHTML = discountAmount.toFixed(2);
    //         document.getElementById('discount-sec').disabled = true;
    //         document.getElementById('coupon-text').innerHTML = 'applied';
    //     }
    // });
</script>

