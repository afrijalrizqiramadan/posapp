<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Sistem Informasi Pondok Pesantren" name="description" />
<meta content="Bahrul Maghfirah" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

<!-- Layout config Js -->
<script src="{{ asset('assets/js/layout.js') }}"></script>
<script src="{{ asset('assets/js/jam.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

@vite(['resources/js/app.js', 'resources/css/app.css'])

<style>
    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: var(--vz-primary);
        color: white;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid var(--vz-input-border);
        outline: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: var(--vz-primary);
        border: 1px solid #fff;
        border-radius: 4px;
        box-sizing: border-box;
        display: inline-block;
        margin-left: 5px;
        margin-top: 5px;
        padding: 0;
        padding-left: 0px;
        padding-left: 20px;
        position: relative;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: bottom;
        white-space: nowrap;
        color: white;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
        background-color: #f1f1f1;
        color: var(--vz-primary);
        outline: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        background-color: transparent;
        border: none;
        border-right-width: medium;
        border-right-style: none;
        border-right-color: currentcolor;
        border-right: 1px solid #fff;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        color: #999;
        cursor: pointer;
        font-size: 1em;
        font-weight: bold;
        padding: 0 4px;
        position: absolute;
        left: 0;
        top: 0;
        color: white;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
        background-color: #f1f1f1;
        color: var(--vz-primary);
        outline: none;
    }

    .mobile-layout {
        max-width: 450px;
        margin: auto;
        background-color: #f7f7f7;
        min-height: 100vh;
    }

    .mobile-bottom-navbar {
        max-width: 450px;
        margin: auto;
        background: var(--vz-vertical-menu-bg-dark);
        border-top: 1px solid var(--vz-vertical-menu-bg-dark);
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .mobile-bottom-navbar .nav-item a {
        color: var(--vz-vertical-menu-item-color-dark);
    }

    .mobile-bottom-navbar .nav-item a:hover {
        color: white;
    }
    .mobile-bottom-navbar .nav-item.active a {
        color: white !important;
    }

    .mobile-bottom-navbar i {
        vertical-align: middle;
        font-size: x-large;
    }

    .mobile-bottom-navbar span {
        font-size: smaller;
        vertical-align: middle
    }
</style>
@stack('styles')

<script>
    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    });
</script>
