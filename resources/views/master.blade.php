<!DOCTYPE html>
<html>

<head>
    @include('layouts.header')
    <style>
        li.nav-link:hover {
            color: #ffffff !important
        }

        .modal-body {
            overflow-y: scroll;
            max-height: 800px;
        }

       .border-hr-info{
           border:1px solid #17a2b8;
       }
       .modal-2xlg{
           max-width: 1400px;
       }
        .pointer {cursor: pointer;}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    @include('layouts.navbar')

    @include('layouts.sidebar')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<div class="modal fade show" id="general-modal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@yield('script')

</body>

</html>
