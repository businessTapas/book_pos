<x-layout>
    @slot('title', 'pending payout')
    @slot('body')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="card">
                                <div class="card-header justify-content-between d-flex align-items-center">
                                    <h4 class="card-title">Basic Example</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Invoice no</th>
                                                    <th>Publisher</th>
                                                    <th>Total Amount</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $dt)
                                                    {{-- @if ($dt->salepayament) --}}
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $dt->invoice_no }}</td>
                                                            <td>{{ $dt->supplier->name }}</td>
                                                            <td class="text-right">{{ $dt->total }}</td>
                                                            <td>{{ $dt->salepayament->payment_status }}</td>
                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-layout>
