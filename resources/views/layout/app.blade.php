<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Global - The Generic App</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/nifty.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/themify-icons/themify-icons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/magic-check/css/magic-check.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/pace/pace.min.css')}}" rel="stylesheet">

    <style type="text/css">
        .pad-lft-logo {
            font-weight: 700;
            color: #42a5f5;
            font-size: 13px;
        }
        #listTable thead tr th:first-child {
            width: 5%;
        }
        #listTable thead tr th:last-child {
            width: 10%;
        }
        .pad-lft-slogan {
            font-size: 12px;
            text-transform: capitalize;
        }
        .pagination {
        	margin: 0px;
        }
        .panel-footer {
        	background-color: #fff;
        }
        .form-add-btn {
        	margin: 9px 10px;
        }
        .panel-body {
		    padding: 15px 20px;
		}
		.table {
			margin-bottom: 0px;
		}
        img.thumb {
            width: 50px;
            height: 50px;
        }
    </style>
    @stack('stylesheets')
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        @include('layout.header')

        <div class="boxed">
            <div id="content-container">
                <div id="page-content">
                    @yield('content')
                </div>
            </div>
            
            @include('layout.navigation')

            <footer id="footer">
                <p class="pad-lft">
                    &#0169; {{ date('Y') }}
                    <span class="pad-lft-logo">Global </span>
                    <span class="pad-lft-slogan">The Generic App.</span>
                </p>
            </footer>
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
        </div>
    </div>

    <script src="{{ asset('backend/plugins/pace/pace.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/nifty.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-alert-message').delay(5000).slideUp(300);
        });
    </script>

    @if( Session::has('message') )
    <script type="text/javascript">
        $(document).ready(function() {
            $.niftyNoty({
                type: '{{ Session::get("message_type", "mint") }}',
                container: 'floating',
                html: '<p class="alert-message">{{ Session::get("message") }}</p>',
                closeBtn: true,
                floating: {
                    position: "top-right",
                    animationIn: 'fadeIn',
                    animationOut: 'fadeOut'
                },
                focus: false,
                timer: 3000,
            });
        });
    </script>
    @endif


    @stack('scripts')
</body>
</html>
