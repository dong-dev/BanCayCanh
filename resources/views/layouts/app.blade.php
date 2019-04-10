<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.metadata')
</head>

<body>
    @include('partials.header')
    @include('partials.menu')

        @yield('content')

    @include('partials.footer')

    <!-- jQuery Plugins -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js.map"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ url('js/slick.min.js') }}"></script>
    <script src="{{ url('js/nouislider.min.js') }}"></script>
    <script src="{{ url('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>

    <script>
        $(document).ready(function(){
            if($('#message-success').html() != "") {
                toastr.success($('#message-success').html(), 'Thanh Cong', {timeOut: 1500})
            }
            if($('#message-error').html() != "") {
                toastr.error($('#message-error').html(), 'Loi', {timeOut: 1500})
            }
            if($('#message-warning').html() != "") {
                toastr.warning($('#message-warning').html(), 'Canh Bao', {timeOut: 1500})
            }
        });
    </script>
    
</body>

</html>