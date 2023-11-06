<div>
    @if($result)
    <div class="row justify-content-center mt-2">
        <div class="col-xxl-8">
            <div class="card" id="demo">
                <div class="card-header border-bottom-dashed p-3 text-center">
                    <h4>File Content </h4>
                </div>                
                <div class="card-body p-3 border-top border-top-dashed font-italic">
                    {{$result}}
                </div>
                
            </div>
            <!--end card-body-->            
        </div>
        
        <!--end card-->
    </div>
    @endif
    <!--end col-->
</div>

</div>