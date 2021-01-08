<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Meteo</title>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    @livewireStyles
</head>
<body class="bg-blue-200">
    <div class="flex justify-center pt-16">
        @yield('content')
    </div>

    @livewireScripts

    <script>
        const fixedOptions  = {
            appId: 'plI5ABH9OOO6',
            apiKey: '5452d9a688d57efa14a2655106025c08',
            container: document.querySelector('#address-input')
        };

        const reconfigurableOptions = {
            language: 'fr', // Receives results in German
            countries: ['us', 'fr', 'be'], // Search in the United States of America and in the Russian Federation
            type: 'city', // Search only for cities names
            aroundLatLngViaIP: true // disable the extra search/boost around the source IP
        };

        const placesInstance = places(fixedOptions).configure(reconfigurableOptions);
    </script> 
</body>
</html>