<script>
    var KTAppOptions = {};
</script>

<script src="https://vaopassets.blob.core.windows.net/vendors/global/vendors.bundle.js" type="text/javascript"></script>
<script src="https://vaopassets.blob.core.windows.net/javascript/scripts.bundle.js" type="text/javascript"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('javascript')
