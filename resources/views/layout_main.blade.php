<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Summary App</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script>
        const main_url = "<?php echo url('/'); ?>";
    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Summary App</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo url('/'); ?>"><i class="ri-dashboard-2-line"></i> Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="ri-folder-add-line"></i> Upload Files</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="ri-profile-fill"></i> Overview</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="ri-file-download-line"></i> Download</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="ri-settings-4-fill"></i> Settings</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="ri-openai-fill"></i> About us</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="ri-bar-chart-horizontal-line"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="<?php echo url('/'); ?>">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Files</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid " id="container-new">
                        <div class=" mt-2 mb-5 page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"><?= $breadcrumbs; ?></h4>


                        </div>
                        <?php
                        $data = array(
                            'result' => isset($result) ? $result : '',
                            'error' => isset($error) ? $error : '',
                        );
                        echo view($sub_view, $data)
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script src="{{ asset('js/files.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>