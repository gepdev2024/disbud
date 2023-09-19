@extends('layouts/blankLayout')

@section('title', 'AdHoc - Warisan Benda')
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
<nav class="navbar navbar-example navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img width="25" src="{{asset('assets/img/logo.png')}}" alt="">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2"
            aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-ex-2">
            <div class="navbar-nav me-auto">
                <a class="nav-item nav-link" href="/">Home</a>
                <a class="nav-item nav-link active" href="/WBB">WBB</a>
                <a class="nav-item nav-link" href="WBTB">WTB</a>
            </div>

            <span class="navbar-text">Peta Infografis Cagar Budaya Propinsi Riau</span>
        </div>
    </div>
</nav>


<div id="map" style="height: 100vh;"></div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var aktif = [];
    var takAktif = [];
    var bangunan = [];
    var benda = [];
    var situs = [];
    var struktur = [];
    var kawasan = [];
    var pekanbaru = [];
    var kuantanSingingi = [];
    var rokanHilir = [];
    var dumai = [];
    var pelalawan = [];
    var siak = [];
    var kampar = [];
    var rokanHulu = [];
    var indragiriHulu = [];
    var bengkalis = [];
    var meranti = [];
    var indragiriHilir = [];

    function addMarkersToMap(data) {
        data.forEach(function (item) {
            var svgCol = '';

            switch (item.sub_kategori.nama){
                case 'Bangunan':
                    svgCol = '#0073e6'
                    break;
                case 'Benda':
                    svgCol = '#5928ed'
                    break;
                case 'Situs':
                    svgCol ='#00bf7d'
                    break;
                case 'Struktur':
                    svgCol = '#b3c7f7'
                    break;
                case 'Kawasan':
                    svgCol = '#89ce00'
                    break;
            }

            var svgrect = `<svg cache-id='f947fb2af7bb488eb0df4d1e2adb27ab' id='e4wDYrPzlOT1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 324 375' shape-rendering='geometricPrecision' text-rendering='geometricPrecision'><rect width='324' height='324' rx='0' ry='0' transform='matrix(.370734 0.367312-.384489 0.388071 164.228181 130.255953)' fill='white' stroke-width='0'/><rect width='324' height='324' rx='20' ry='20' transform='translate(0 0.000001)' fill='${svgCol}' stroke-width='0'/></svg>`

            var url = encodeURI("data:image/svg+xml," + svgrect).replace('#','%23');
            const myIcon = L.icon({
                iconUrl: "storage/gambarPopup/"+item.gambar_popup,
                shadowUrl: url,
                iconSize: [32, 32],
                shadowSize: [50, 50],
                iconAnchor: [16, 55],
                shadowAnchor: [25,60],
            });

            const marker = L.marker([item.latitude, item.longitude], { icon: myIcon })
            if(item.status === "Rusak"){
                aktif.push(marker);
                takAktif.push(marker);
            }else{
                takAktif.push(marker);
            }

            switch(item.kabupaten.nama){
                case 'Kota Pekanbaru':
                    pekanbaru.push(marker);
                    break;
                case 'Kabupaten Kuantan Singingi':
                    kuantanSingingi.push(marker);
                    break;
                case 'Kabupaten Rokan Hilir':
                    rokanHilir.push(marker);
                    break;
                case 'Kota Dumai':
                    dumai.push(marker);
                    break;
                case 'Kabupaten Pelalawan':
                    pelalawan.push(marker);
                    break;
                case 'Kabupaten Siak':
                    siak.push(marker);
                    break;
                case 'Kabupaten Kampar':
                    kampar.push(marker);
                    break;
                case 'Kabupaten Rokan Hulu':
                    rokanHulu.push(marker);
                    break;
                case 'Kabupaten Bengkalis':
                    bengkalis.push(marker);
                    break;
                case 'Kabupaten Meranti':
                    meranti.push(marker);
                    break;
                case 'Kabupaten Indragiri Hilir':
                    indragiriHilir.push(marker);
                    break;
                case 'Kabupaten Indragiri Hulu':
                    indragiriHulu.push(marker);
                    break;
            }

            switch (item.sub_kategori.nama){
                case 'Bangunan':
                    bangunan.push(marker);
                    break;
                case 'Benda':
                    benda.push(marker);
                    break;
                case 'Situs':
                    situs.push(marker);
                    break;
                case 'Struktur':
                    struktur.push(marker);
                    break;
                case 'Kawasan':
                    kawasan.push(marker);
                    break;
            }

            marker.on('click', () => markerOnClick(item));
        });
    }

    // Call the function to add markers with your generated data
    const data = @json($data);
    addMarkersToMap(data);
    var grupaktif = L.layerGroup(aktif);
    var grupTakAktif = L.layerGroup(takAktif);
    var grupPekanbaru = L.layerGroup(pekanbaru);
    var grupKuantanSingingi = L.layerGroup(kuantanSingingi)
    var grupRokanHilir = L.layerGroup(rokanHilir)
    var grupDumai = L.layerGroup(dumai)
    var grupPelalawan = L.layerGroup(pelalawan)
    var grupSiak = L.layerGroup(siak)
    var grupKampar = L.layerGroup(kampar)
    var grupRokanHulu = L.layerGroup(rokanHulu)
    var grupIndragiriHulu = L.layerGroup(indragiriHulu)
    var grupBengkalis = L.layerGroup(bengkalis)
    var grupMeranti = L.layerGroup(meranti)
    var grupIndragiriHilir = L.layerGroup(indragiriHilir)
    var grupBenda = L.layerGroup(benda)
    var grupSitus = L.layerGroup(situs)
    var grupBangunan = L.layerGroup(bangunan)
    var grupKawasan = L.layerGroup(kawasan)
    var grupStruktur = L.layerGroup(struktur)

    var map = L.map('map',{
            dragging: false,
            zoomControl: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            keyboard: false,
            layers: [grupTakAktif]
        }
        )
        .setView([0.5933, 101.7068], 8, false);

    

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

    var baseLayers = {'Aktif':grupaktif, 'Tidak Aktif':grupTakAktif};

    L.control.layers(baseLayers, {
            'Kota Pekanbaru': grupPekanbaru, 
            'Kabupaten Kuantan Singingi': grupKuantanSingingi,
            'Kabupaten Rokan Hilir': grupRokanHilir,
            'Kota Dumai': grupDumai,
            'Kabupaten Pelalawan': grupPelalawan,
            'Kabupaten Siak': grupSiak,
            'Kabupaten Kampar': grupKampar,
            'Kabupaten Rokan Hulu': grupRokanHulu,
            'Kabupaten Bengkalis': grupBengkalis,
            'Kabupaten Meranti': grupMeranti,
            'Kabupaten Indragiri Hilir': grupIndragiriHilir
        }, { collapsed: false, position:'topleft'}).addTo(map);
        $('<h6 class="mb-0 text-dark" id="mapTitle">Indikasi Kerusakan</h6>').insertBefore('div.leaflet-control-layers-base');
        

        L.control.layers({}, {
            '<span style="background-color:#0073e6; color:#0073e6">tet</span> Bangunan': grupBangunan, 
            '<span style="background-color:#5928ed; color:#5928ed">tet</span> Benda': grupBenda,
            '<span style="background-color:#00bf7d; color:#00bf7d">tet</span> Situs': grupSitus,
            '<span style="background-color:#b3c7f7; color:#b3c7f7">tet</span> Struktur': grupStruktur,
            '<span style="background-color:#89ce00; color:#89ce00">tet</span> Kawasan': grupKawasan,
        }, { collapsed: false, position: 'bottomleft'}).addTo(map);



    map.addLayer(grupPekanbaru);
    map.addLayer(grupKuantanSingingi);
    map.addLayer(grupRokanHilir);
    map.addLayer(grupDumai);
    map.addLayer(grupPelalawan);
    map.addLayer(grupSiak);
    map.addLayer(grupKampar);
    map.addLayer(grupRokanHulu);
    map.addLayer(grupBengkalis);
    map.addLayer(grupMeranti);
    map.addLayer(grupIndragiriHilir);
    map.addLayer(grupBangunan);
    map.addLayer(grupBenda);
    map.addLayer(grupSitus);
    map.addLayer(grupStruktur);
    map.addLayer(grupKawasan);


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
                '<img class="d-block w-100 bd-placeholder-img object-fit-cover" height="400" width="500" src="storage/foto/'+foto.url+'" alt="Slide" />' +
                '<div class="carousel-caption d-none d-md-block">' +
                    '<h3 style="--bs-bg-opacity: .75;" class="text-light bg-dark">'+foto.nama+'</h3>' +
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

   
</script>
@endsection