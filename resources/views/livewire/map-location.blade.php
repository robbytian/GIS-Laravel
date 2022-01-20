<div class="container-fluid">
    <div class=" row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    MapBox
                </div>
                <div class="card-body">
                    <div wire:ignore id='map' style='width: 100%; height: 75vh;'></div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Form
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">longtitude</label>
                                <input wire:model="long" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">latitude</label>
                                <input wire:model="lat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div wire:ignore id='map' style='width: 100%; height: 75vh;'></div>
                </div>
            </div>

        </div>
    </div>


</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        const defaultLoc = [107.58107653608215, -6.924164845896286];
        mapboxgl.accessToken = "{{env('MAPBOX_KEY')}}";
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLoc,
            zoom: 11.15,
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        // map.addStyle('mapbox://styles/mapbox/$(style)')

        map.addControl(new mapboxgl.NavigationControl());

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng;
            const latitude = e.lngLat.lat;
            @this.long = longtitude
            @this.lat = latitude

        });
    });
</script>
@endpush