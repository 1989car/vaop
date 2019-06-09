<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ GlobalSettings::get('site-title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    @if(GlobalSettings::get('rtl'))
        <link href="https://vaopassets.blob.core.windows.net/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="https://vaopassets.blob.core.windows.net/vendors/global/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="https://vaopassets.blob.core.windows.net/stylesheets/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    @else
        <link href="https://vaopassets.blob.core.windows.net/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://vaopassets.blob.core.windows.net/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://vaopassets.blob.core.windows.net/stylesheets/style.bundle.css" rel="stylesheet" type="text/css" />
    @endif

    <style>
        :root {
            --brand-color: {{ GlobalSettings::get('color-brand') }};
            --primary-color: {{ GlobalSettings::get('color-primary') }};
            --primary-hover-color: {{ GlobalSettings::get('color-primary') }};
            --success-color: {{ GlobalSettings::get('color-success') }};
            --info-color: {{ GlobalSettings::get('color-info') }};
            --warning-color: {{ GlobalSettings::get('color-warning') }};
            --danger-color: {{ GlobalSettings::get('color-danger') }};
        }
    </style>

    @yield('stylesheets')

    <link rel="shortcut icon" href="{{ Storage::url(GlobalSettings::get('favicon')) }}" />
</head>