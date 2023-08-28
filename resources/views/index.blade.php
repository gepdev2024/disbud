@extends('layouts/blankLayout')

@section('title', 'AdHoc - Disbud')
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

<p class="position-absolute text-light bg-dark" style="z-index:1000">Peta Infografis Cagar Budaya Propinsi Riau</p>

<div id="map" style="height: 100vh;"></div>
@dump($data)

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script>
    var kategoriBenda = [];
    var kategoriTakBenda = [];
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

    function markerOnClick(data) {
        let fotosHtml = ''
        let carouselIndex = '';
        let carouselFull = '';

        data.fotos.forEach((foto, index) => {
            carouselIndex += '<li data-bs-target="#carouselExample" data-bs-slide-to="' + index + '"';
            
            if (index === 0) {
                carouselIndex += ' class="active"';
            }
            
            carouselIndex += '></li>';
        });


        data.fotos.forEach((foto, index) => {
            fotosHtml += '<div class="carousel-item';
            
            if (index === 0) {
                fotosHtml += ' active';
            }
            
            fotosHtml += '">' +
                '<img class="d-block w-100" src="storage/foto/'+foto.url+'" alt="Slide" />' +
                '<div class="carousel-caption d-none d-md-block">' +
                    '<h3 class="text-light bg-dark">'+foto.nama+'</h3>' +
                '</div>' +
            '</div>';
        });

        
        if(data.fotos.length > 0){
            carouselFull += '<div id="carouselExample" class="carousel carousel-dark slide mb-4" data-bs-ride="carousel">'+
                        '<ol class="carousel-indicators">'+
                            carouselIndex+
                        '</ol>'+
                        '<div class="carousel-inner">'+
                            fotosHtml+
                        '</div>'+
                        '<a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">'+
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
                            '<span class="visually-hidden">Previous</span>'+
                        '</a>'+
                        '<a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">'+
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
                            '<span class="visually-hidden">Next</span>'+
                        '</a>'+
                    '</div>'
        }


        $(".modal-content").html(
            '<div class="modal-header">'+
                '<h5 class="modal-title" id="exampleModalLabel1">'+data.nama+'</h5>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
            '</div>'+
            '<div class="card">'+
                '<div class="card-body">'+
                    carouselFull+
                    '<p class="card-text" style="text-align:justify">'+data.deskripsi+'</p>'+
                '</div>'+
            '</div>'+
            '<div class="modal-footer">'+
                '<a href='+data.link_360+' target="_blank" type="button" class="btn btn-primary">Tampilan 360</a>'+
            '</div>'
            );
        $('#basicModal').modal('show');
        e.preventDefault();
    }

    function addMarkersToMap(data) {
        data.forEach(function (item) {
            const myIcon = L.icon({
                iconUrl: "storage/gambarPopup/"+item.gambar_popup,
                shadowUrl: "leaflet/images/shadow.png",
                iconSize: [30, 30],
                shadowSize: [50, 50],
                iconAnchor: [15, 55],
                shadowAnchor: [25,60],
            });

            

            const marker = L.marker([item.latitude, item.longitude], { icon: myIcon })
            if(item.sub_kategori.kategori.nama === "Benda"){
                kategoriBenda.push(marker);
            }else{
                kategoriTakBenda.push(marker);
            }

            marker.on('click', () => markerOnClick(item));
        });
    }

    // Call the function to add markers with your generated data
    const data = @json($data);
    addMarkersToMap(data);

    

    var grupBenda = L.layerGroup(kategoriBenda);
    var grupTakBenda = L.layerGroup(kategoriTakBenda);
    
    map.addLayer(grupBenda);
    
    var baseLayers = {'Benda':grupBenda, 'Tak Benda':grupTakBenda};
    L.control.layers(baseLayers, {}, { collapsed: false }).addTo(map);
</script>
@endsection