<div class="card w-100 bg-light-info overflow-hidden shadow-none">
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center mb-7">
                    <h5 class="fw-semibold mb-0 fs-5">Supplier :  {{$supplierName}} | Terms : {{$terms}}</h5>
                </div>
                <div class="d-flex align-items-center">
                    <div class="border-end px-2 border-muted border-opacity-10">
                        <h3 class="mb-1 fw-semibold fs-4 d-flex align-content-center">@price($invoiceAmount) <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                        <p class="mb-0 text-dark">Invoice amount</p>
                    </div>
                    <div class="border-end px-2 border-muted border-opacity-10">
                        <h3 class="mb-1 fw-semibold fs-4 d-flex align-content-center">@price($totalAmount) <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                        <p class="mb-0 text-dark">Due amount</p>
                    </div>
                    <div class="ps-4">
                        <h3 class="mb-1 fw-semibold fs-4 d-flex align-content-center"> @price($remainingAmount) <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                        <p class="mb-0 text-dark">Remaining amount</p>
                    </div>


                    <div class="ps-4">
                        <h3 class="mb-1 fw-semibold fs-4 d-flex align-content-center"> @price($paidAmount) <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                        <p class="mb-0 text-dark">Paid amount</p>
                    </div>
                    <div class="mx-3 border-start px-2 border-muted border-opacity-10" >
                        <p class="mb-1 text-dark">From - To</p>
                        <x-suppliers.terms-end-at :date="$createdDate" :terms="$termsId"/>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="welcome-bg-img mb-n7 text-end">
                    <img src="{{asset('_materialize_v2/dist/images/backgrounds/welcome-bg.svg')}}" alt="" width="50%" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</div>
