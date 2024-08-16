<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Customer <i> {{ $customers->customerName }}</i></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
                            <li class="breadcrumb-item active"> <b> {{ $customers->customerName }}</b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Profile for: <span class="text-primary">
                                        {{ $customers->customerName }}</span></h3>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <div class="col-12">
                                    {{-- {{ $customers  }} --}}
                                    <form method="post" action="{{ route('customers.update', $customers->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="vendorname">Vendor Name:</label>
                                                <input type="text" class="form-control" id="vendorinputname"
                                                    placeholder="Enter Customer name" name="customerName" value=" {{ $customers->customerName }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Cutomer Phone:</label>
                                                <input type="text" class="form-control" id="vendorphone"
                                                    placeholder="Enter vendor contact" name="vendor_contact" value=" {{ $customers->vendor_contact }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Email:</label>
                                                <input type="email" class="form-control" id="vendorphone"
                                                    placeholder="Enter Customer Email Address" name="email" value=" {{ $customers->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Customer Account Number:</label>
                                                <input type="text" class="form-control" id="vendorphone"
                                                    placeholder="Enter Account number" name="account_number" value=" {{ $customers->account_number }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="vendorphone">Bank name:</label>
                                                <input type="text" class="form-control" id="vendorphone"
                                                    placeholder="Enter Customer bank nname" name="bank_name" value=" {{ $customers->bank_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Customer Address:</label>
                                                <input type="text" class="form-control" id="vendorphone"
                                                    placeholder="Enter Address" name="address" value=" {{ $customers->address }}">
                                            </div>
                                            
                                        </div>
                                        <!-- /.card-body -->
                                        {{-- </div> --}}
                                        <div class="mb-3 float-right">
                                            <button type="submit" class="btn btn-primary">Submit Details</button>
                                        </div>
                                    </form>
                                </div>
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
</x-app-layout>
