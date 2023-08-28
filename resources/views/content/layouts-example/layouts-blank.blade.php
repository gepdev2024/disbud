@extends('layouts/blankLayout')

@section('title', 'Blank layout - Layouts')
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<style>
    path.leaflet-interactive:focus {
        outline: none;
    }

    .leaflet-popup-content {
        width: 1000px;
        overflow-y: scroll;
    }
</style>

<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

@section('content')
<div id="map" style="height: 100vh;"></div>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">Email</label>
                        <input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                        <label for="dobBasic" class="form-label">DOB</label>
                        <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script>
    var map = L.map('map',{
            dragging: false,
            zoomControl: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            keyboard: false,

        }).setView([0.5933, 101.7068], 8, false);

    L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(map);

    function onEachFeature(feature, layer) {
        //bind click
        layer.bindTooltip(feature.properties.Kabupaten_,{
            direction:'center',
            className: 'countryLabel',

        })
        layer.on('mouseover', function () {
            this.setStyle({
                "fillOpacity": 1,
            });
        });
        layer.on('mouseout', function () {
            this.setStyle({
                "fillOpacity": .7,
            });
        });
    }

    fetch("{{ asset('Prov_Riau.geojson') }}")
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data,{    
                onEachFeature: onEachFeature,
                style: function(feature){
                    switch(feature.properties.Kabupaten_){
                        case 'Kota PEKANBARU':
                            return {
                                color:"#fcd89c",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'KUANTAN SINGINGI':
                            return {
                                color:"#ffaec9",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'ROKAN HILIR':
                            return {
                                color:"#b97a57",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'Kota DUMAI':
                            return {
                                color:"#7092be",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'PELALAWAN':
                            return {
                                color:"#f37076",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'SIAK':
                            return {
                                color:"#18b1f3",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'KAMPAR':
                            return {
                                color:"#c8bfe7",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'ROKAN HULU':
                            return {
                                color:"#d782c8",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'INDRAGIRI HULU':
                            return {
                                color:"#f3f78a",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'MANDAU':
                            return {
                                color:"#c8ecf4",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'BENGKALIS':
                            return {
                                color:"#a09e9a",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'MERANTI':
                            return {
                                color:"#646464",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;
                        case 'INDRAGIRI HILIR':
                            return {
                                color:"#7092be",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .7,
                            };
                            break;

                    }
                }
            }
            ).addTo(map);
        });

    function markerOnClick(e) {
        var id = this.options.id;
        $(".modal-content").html(
            '<div class="modal-header">'+
                '<h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
            '</div>'+
            '<img src="https://asset.kompas.com/crops/fqty-UuTyCQXaWTfFMVYjKXi3CU=/0x0:1024x683/750x500/data/photo/2021/06/17/60cb33c96c13e.jpg"/> '
            );
        $('#basicModal').modal('show');
        e.preventDefault();
    }

    
    const myIcon = L.icon({
        iconUrl: "{{ URL::asset('leaflet/images/iconmap.png') }}",
        iconSize:     [38, 95], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    });

    const popupContent = '<img width="500px" src="https://asset.kompas.com/crops/fqty-UuTyCQXaWTfFMVYjKXi3CU=/0x0:1024x683/750x500/data/photo/2021/06/17/60cb33c96c13e.jpg"/>'

    const marker = L.marker([0.5071, 101.4478], {icon: myIcon}).addTo(map).on('click', markerOnClick)

    
</script>
@endsection