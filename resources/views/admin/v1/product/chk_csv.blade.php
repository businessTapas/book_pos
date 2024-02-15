<script>
    
</script>

                    <div class="card-header">
                       <!--  <h3 class="d-block w-100"><small class="float-right"></small></h3> -->
                    </div>
                    <div class="card-body">
                       
    
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="wp-10">SL</th>
                                            <th class="wp-40">Product ID</th>
                                            <th class="wp-20">Publisher Name</th>
                                            <th class="wp-15">Book Title</th>
                                            <th class="wp-15 text-right">Author</th>
                                            <th class="wp-15 text-right">MRP</th>
                                            <th class="wp-15 text-right">Sale Price</th>
                                            <th class="wp-15 text-right">Avl Qty</th>
                                            <th class="wp-15 text-right">Req Qty</th>
                                            <th class="wp-15 text-right">Batch No</th>
                                            <th class="wp-15 text-right">Total Qty</th>
                                            <th class="wp-15 text-right">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data)
                                        @foreach ($data as $csvdata)
                                        <tr>
                                            <td>{{$loop->iteration}}</td> 
                                            <td>{{$csvdata->product_id}}</td>
                                            <td>{{$csvdata->publisher_name}}</td>
                                            <td>{{$csvdata->product_name}}</td>
                                            <td>{{$csvdata->author}}</td>
                                            <td>{{$csvdata->price}}</td>
                                            <td>{{$csvdata->store_price}}</td>
                                            <td>{{$csvdata->avl_qty}}</td>
                                            <td>{{$csvdata->request_qty}}</td>
                                            <td>{{$csvdata->batch_no}}</td>
                                            <td class="text-right">{{$csvdata->total_qty}}</td>
                                            <td class="text-right">{{$csvdata->total_amount}}</td>
                                        </tr>
                                        @endforeach
                                       @else
                                       <div>Nothing to upload</div>
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                       
                       
                            <button id="csv-proceed" type="button" onclick="csv_proceed()" value="" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                                Proceed</button>
                              
                                </a>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" id="abc" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        <div id="show-msg"></div>       
<script>
        

    
</script>
