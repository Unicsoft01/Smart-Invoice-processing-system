<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Payments</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-header text-center  fw-bolder text-monospacce" style="font-weight: 800; font-size: 25px;color:rgb(5, 189, 5);">Vendor Credited Successfully!</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">

                                  
                                    </div>
                                </div>
                            </div>

                            <div class="card-body stable-responsive p-0 text-dark">
                                
                                        <h3 class="text-center p-5 text-primary">  
                                            <img src="data:image/png;base64,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" alt="" class="img-responsive mx-auto">
                                            <div class="text-success my-2">
                                                Transaction Successful!
                                            </div>

                                            <div class="">
                                                <b>Vendor Name:</b> {{ $supplier->customerName }}
                                            </div>
                                            <div class="">
                                                <b>Vendor Account Number:</b> {{ $supplier->account_number }}
                                            </div>
                                            <div class="">
                                                <b>Vendor Bank Name:</b> {{ $supplier->bank_name }}
                                            </div>
                                            <div class="">
                                                <b>Payment For:</b> {{ $invoice->invoice_number }}
                                            </div>
                                            <div class="">
                                                <b>Invoice Date:</b> {{ $invoice->created_at }}
                                            </div>
                                            <div class="">
                                                <b>Invoice Date:</b> NGN{{ number_format($invoice->amount) }}
                                            </div>



                                               {{-- {{ $invoice }}
                                            <hr>
                                            {{ $supplier }}</h3> --}}

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- modal and extra --}}
    <!-- /.modal-dialog -->
    </div>
</x-app-layout>
