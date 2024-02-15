<div>
    <div class="product_list" id="pos-prod-item-wrapper">
        <div class="row g-2 row-cols-md-4">

            @foreach ($books as $book)
                @if ($book->master_stock_inventory)
                    <div class="col d-flex">
                        <div class="card all_product dash-product-box shadow-none border text-center w-100">
                            <a href="#" onclick="addToCart({{ $book->id }})">

                                <div class="card-body c_body pb-2">

                                    <div class="about-modal">
                                        <span class="badge bg-primary">Discounted</span>
                                        <button type="button" class="btn btn-link btn-sm p-0" data-toggle="modal"
                                            data-target=""><i class="fas fa-info-circle"></i></button>

                                    </div>

                                    <div class="dash-product-img">
                                        <img class="img-fluid" src="{{ asset($book->image) }}"
                                            alt="{{ $book->title }}">
                                        <input type="hidden" id="book_id" name="book_id" value="{{ $book->id }}">
                                    </div>

                                    <h5 class="font-size-15 mt-2 text-reset lh-base text-primary">
                                        <span class="text-reset lh-base">{{ $book->title }}</span>
                                    </h5>

                                    <h5 class="font-size-13 text-primary mt-2 mb-0">
                                        ₹{{ $book->price }}</h5>
                                    <h6 class="font-size-12 mt-1 text-muted fw-normal">Aval
                                        Qty : {{ $book->master_stock_inventory->qty }}</h6>

                                    <div class="mt-4">
                                        {{-- <a href="#"
                                    onclick="selectDrop('form_data_pos','{{ route('pos.add_cart', $book->id) }}','pos_cart')"
                                    class="btn btn-primary btn-sm w-lg"><i class="mdi mdi-cart me-1 align-middle"></i>
                                    Add To Cart</a> --}}

                                        {{-- <button type="button" class="btn btn-primary btn-sm w-lg" id="addBook"><i
                                        class="mdi mdi-cart me-1 align-middle"></i>
                                    Buy
                                    Now</button> --}}
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif
            @endforeach






        </div>
        <!-- end row -->
    </div>



    <hr>

</div>
<div class="row pt-2">
    <div class="col-sm-12">
        <div class="">
            {!! $books->links() !!}
        </div>
    </div>
</div>


