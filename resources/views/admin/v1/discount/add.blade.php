<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <form id="form_data" action="{{ route('admin.discount.add') }}" method="Post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Coupan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name"
                                    name="name" id="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Discount %</label>
                                <input type="number" class="form-control" placeholder="Enter Discount %"
                                    name="discount" id="discount" oninput="generateCouponCode()">
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Min Amount</label>
                                <input type="number" class="form-control" placeholder="Enter Min Amount" name="min">
                            </div>
                        </div>

                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Max Amount</label>
                                <input type="text" class="form-control" placeholder="Coupon code" name="max">
                            </div>
                        </div> --}}

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Coupon Code</label>
                                <input type="text" class="form-control" placeholder="Coupon code" name="coupon_code"
                                    id="coupon_code" value="coupon_code" readonly>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional"> Description</label>
                                <textarea type="text" class="form-control" placeholder="Enter name" name="description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="ajaxCall('form_data')">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function generateRandomString() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = '';
        for (let i = 0; i < 5; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
    }


    function generateCouponCode() {

        const discountPercentage = document.getElementById('discount').value;

        if (discountPercentage !== '') {
            const currentYear = new Date().getFullYear();
            const couponCode = currentYear + discountPercentage + generateRandomString(4);
            document.getElementById('coupon_code').value = couponCode;
        } else {
            document.getElementById('coupon_code').value = '';
        }
    }
</script>
