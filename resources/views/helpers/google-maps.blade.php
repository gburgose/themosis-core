{{-- This script will only be loaded if GOOGLE_MAPS_API_KEY enviroment variable is set  --}}

@if (env('GOOGLE_MAPS_API_KEY'))
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}" async defer></script>
@endif
