<div>
    @if($result)
    <div class="row justify-content-center mt-2">
        <div class="col-xxl-8">
            <div class="card" id="demo">
                <div class="card-header border-bottom-dashed p-3 text-center">
                    <h4>Here is your key points </h4>
                </div>                
                <div class="card-body p-3 border-top border-top-dashed font-italic">
                    {{$result}}
                </div>
                
            </div>
            <!--end card-body-->
            <!-- <div class="card-body p-0 me-3">

                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                    <a href="javascript:window.print()" class="btn btn-success"><i class="ri-download-line"></i> Download</a>
                </div>
            </div> -->
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endif
@if($error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endif
</div>