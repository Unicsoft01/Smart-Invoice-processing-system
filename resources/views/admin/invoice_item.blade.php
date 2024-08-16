<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-3">
                        <span>
                            Invoice Recieved from: <br>
                            Date: <br>
                            Supplier Address: <br>
                            Phone: <br>
                        </span>
                    </div>
                    <div class="col-3">
                        <span>
                            @php
                                $supplier = App\Models\Customers::whereId($items[0]->invoiceID)->get();
                            @endphp
                            @if (count($supplier) > 0)
                                @foreach ($supplier as $sup)
                                    {{ $sup->customerName }} <br>
                                    {{ $items[0]->created_at }} <br>
                                    {{ $sup->address }} <br>
                                    {{ $sup->vendor_contact }} <br>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap">
                                    @if (count($items) > 0)
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $ss => $item)
                                                <tr>
                                                    <td>{{ $ss + 1 }}</td>
                                                    <td>{{ $item->productName }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ number_format($item->price) }}</td>
                                                    <td>{{ number_format($item->price * $item->qty) }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h3 class="text-center p-5 text-primary">Nothing to Display, Please Consider
                                            Creating Some data</h3>
                                    @endif

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
