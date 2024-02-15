<x-layout>
    @slot('title', 'customer payment')
    @slot('body')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="card">
                                <div class="card-header justify-content-between d-flex align-items-center">
                                    <h4 class="card-title">Basic Example</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Invoice Number</th>
                                                    <th>Sale Mode</th>
                                                    <th>Total</th>
                                                    <th>Publisher Name</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $entry)
                                                    
                                                <tr>
                                                    <th scope="row">{{$entry->id}}</th>
                                                    <td>{{$entry->customer->name}}</td>
                                                    <td>{{$entry->invoice_no}}</td>
                                                    <td>{{$entry->sale_mode}}</td>
                                                    <td>{{$entry->total}}</td>
                                                    <td>{{$entry->supplier->name}}</td>
                                                    <td>{{$entry->status}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-layout>
