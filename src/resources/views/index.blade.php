<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badaso Commerce Theme</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="{{ mix('js/commerce-theme.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/commerce-theme.css') }}"></link>
</head>

<body class="@if(App::environment() === 'local') debug-screens @endif">
    <div id="commerce-theme"></div>
</body>

</html>
