<!-- Listing all types of Files  -->
<div class="card user-profile-list m-2">
    <div class="card-header mb-n3 border-0">
        <div class="d-flex justify-content-between">
            <div class="row">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <h5 class="d-flex-grow-1">
                All uploaded Files
            </h5>
            <div class="flex-shrink-0">
                <button type="button" class="btn waves-effect waves-light btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#add_form">
                    Upload file
                </button>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="box-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered" id="all_files_table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>File name</th>
                        <th>Uploaded At</th>
                        <th>File size</th>
                        <th>Generate key points</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<<div class="modal fade" id="add_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                        <div class="alert-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    File Size should be lesser than the 2 MB
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form name="add-blog-post-form" file='true' id="add-blog-post-form" method="post" action="{{ url('store-raw-text') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12 mt-1">
                                    <label for="myfile">Select a file:</label><SPAN class="text-danger">*</SPAN>
                                    <input type="file" id="raw_file" name="raw_file" class="form-control" required>
                                </div>
                            </div>
                    </div>
                </div>
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success w-lg waves-effect waves-light">Upload</button>

            </div>
        </div>
    </div>
    </div>
    
   