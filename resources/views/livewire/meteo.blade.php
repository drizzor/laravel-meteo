<div class="text-white mb-8">
    {{ $location }}
    <div class="places-input text-gray-800">
        <input type="search" id="address-input" placeholder="Where are we going?" />
    </div>

    <div class="weather-container font-sans w-128 max-w-lg overflow-hidden shadow-lg mt-4">
        <div class="current-weather flex items-center justify-between px-6 py-8 bg-gray-900 rounded-t-lg">
            <div class="flex items-center">
                <div>
                    <div class="text-6xl font-semibold">8°C</div>
                    <div>Ressenti de 5°C</div>
                </div>
                <div class="mx-5">
                    <div class="font-semibold">Nuageux</div>
                    <div>Ecaussinnes, Belgique</div>
                </div>
            </div>

            <div>
                <svg class="w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                </svg>
            </div>
        </div> <!-- end current weather -->

        <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden rounded-b-lg">
            <div class="flex items-center">
                <div class="w-1/6 text-lg text-gray-200">LU</div>

                <div class="w-4/6 px-4 flex items-center">
                    <div>icon</div>
                    <div class="ml-3">Nuagueux avec risque de pluie</div>
                </div>

                <div class="w-1/6 text-right">
                    <div>7°C</div>
                    <div>-2°C</div>
                </div>
            </div>

            <div class="flex items-center mt-8">
                <div class="w-1/6 text-lg text-gray-200">LU</div>

                <div class="w-4/6 px-4 flex items-center">
                    <div>icon</div>
                    <div class="ml-3">Nuagueux avec risque de pluie</div>
                </div>

                <div class="w-1/6 text-right">
                    <div>7°C</div>
                    <div>-2°C</div>
                </div>
            </div>

            <div class="flex items-center mt-8">
                <div class="w-1/6 text-lg text-gray-200">LU</div>

                <div class="w-4/6 px-4 flex items-center">
                    <div>icon</div>
                    <div class="ml-3">Nuagueux avec risque de pluie</div>
                </div>

                <div class="w-1/6 text-right">
                    <div>7°C</div>
                    <div>-2°C</div>
                </div>
            </div>
        </div> <!-- end future weather -->
    </div> <!-- end weather container -->        
</div>