<div class="text-white mb-8 w-128">

    <form wire:submit.prevent="searchByCity" class="relative flex search-input text-gray-800">
        <input wire:model="search" type="text"  placeholder="Nom de votre ville" class="w-full px-5 py-2 mr-2 rounded"/>
        
        <button type="submit" class="bg-gray-900 hover:bg-gray-800 hover:shadow-sm text-white rounded shadow-lg px-3">
            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
        
        <svg wire:loading wire:target="searchByCity" class="absolute top-0 right-0 animate-spin  mr-16 mt-2 h-5 w-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </form>    
    
    <svg wire:loading wire:target="searchByCity" class="animate-spin ml-56 mt-16 h-11 w-11 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

    @if ($current['cod'] === 200)
        <div wire:loading.remove wire:target="searchByCity" class="relative weather-container font-sans w-128 max-w-lg overflow-hidden shadow-lg mt-4">
            <div  class="current-weather flex items-center justify-between px-6 py-8 bg-gray-900 rounded-t-lg">
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">{{ $current['temp'] }}</div>
                        <div class="mt-3">Ressenti de {{ $current['feels_like'] }}</div>
                        <div>Humidité de {{ $current['humidity'] }}</div>
                    </div>
                    <div class="mx-12">
                        <div class="font-semibold">
                            {{ $current['description'] }}
                        </div>
                        <div>{{ $current['city'] }}, {{ $current['country'] }}</div>
                    </div>
                </div>

                <div>
                    <img src="{{ $current['icon'] }}" alt="meteo icon">                
                </div>
            </div> <!-- end current weather -->

            

            <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden rounded-b-lg">
                @foreach ($days as $day)
                    <div class="flex items-center">
                        <div class="w-1/6 text-lg text-gray-200">
                            {{ $day['daily_day'] }}
                        </div>

                        <div class="w-4/6 px-4 flex items-center">
                            <div>
                                <img src="{{ $day['daily_icon'] }}" alt="meteo icon">
                            </div>
                            <div class="ml-3">
                                {{ $day['daily_description'] }}
                            </div>
                        </div>

                        <div class="w-1/6 text-right">
                            <div>
                                {{ $day['daily_temp_max'] }}
                            </div>
                            <div>
                                {{ $day['daily_temp_min'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
                

            </div> <!-- end future weather -->
        </div> <!-- end weather container -->  
    @else
        <div wire:transition="slide-in" class="relative w-128 mt-8 flex justify-center overflow-hidden bg-gray-800 rounded shadow-lg py-5 px-5 text-2xl text-white">
            <span class="mt-5 mb-5">Aucun résultat pour votre recherche! </span>  
            <button wire:click="cancel" class="absolute top-0 right-0 w-5 mt-2 mr-2 text-white hover:bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>            
        </div>          
    @endif    
</div>