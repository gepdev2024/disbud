@extends('layouts/blankLayout')

@section('title', __('nav.judul').' - Peta')
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<link rel="stylesheet" href="{{ asset('leaflet/MarkerCluster.css') }}" />
<link rel="stylesheet" href="{{ asset('leaflet/MarkerCluster.Default.css') }}" />
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
<link href={{asset("assets/landingPage/css/style.css")}} rel="stylesheet">


@section('content')
<div class="d-flex flex-column" style="height: 100vh;">
    @include('layouts/sections/navbar/nav')



    <div class="h-100 position-relative">
        <div style="z-index: 10;" class="border mh-100 m-2 bg-light d-flex flex-column position-absolute overflow-auto">
            <div class="inputs py-2">
                @foreach ($kabupaten as $item)
                <div class="form-check px-3">
                    @if (session()->has('kota'))
                        @if ($item->id == session()->get('kota'))
                            <input class="kabupaten" type="checkbox" checked="true" value={{$item->id}} id={{$item->id}}>
                        @else
                            <input class="kabupaten" type="checkbox" value={{$item->id}} id={{$item->id}}>
                        @endif
                    @else
                        <input class="kabupaten" type="checkbox" checked="true" value={{$item->id}} id={{$item->id}}>
                    @endif
                    <label class="form-check-label" for={{$item->id}}>
                        {{$item->nama}}
                    </label>
                </div>
                @endforeach
                @php
                    session()->forget('kota');
                @endphp

            </div>
            <div class="inputs border-top py-2">
                @foreach ($sub_kategori as $item)
                <div class="form-check px-3">
                    <input class="kategori" type="checkbox" checked="true" value={{$item->id}} id={{$item->id}}>
                    <label class="form-check-label" for={{$item->id}}>
                        @switch($item->nama)
                        @case("Bangunan")
                        <span style="background-color:#0073e6; color:#0073e6">tet</span> Bangunan
                        @break
                        @case("Benda")
                        <span style="background-color:#5928ed; color:#5928ed">tet</span> Benda
                        @break
                        @case("Situs")
                        <span style="background-color:#00bf7d; color:#00bf7d">tet</span> Situs
                        @break
                        @case("Struktur")
                        <span style="background-color:#b3c7f7; color:#b3c7f7">tet</span> Struktur
                        @break
                        @case("Kawasan")
                        <span style="background-color:#89ce00; color:#89ce00">tet</span> Kawasan
                        @break
                        @endswitch
                    </label>
                </div>
                @endforeach
            </div>
            <div class="inputs border-top py-2">
                <div class="form-check px-3">
                    <input class="status" type="checkbox" checked="true" value="Terima" id="Terima">
                    <label class="form-check-label" for="Terima">
                        Cagar Budaya
                    </label>
                </div>
                <div class="form-check px-3">
                    <input class="status" type="checkbox" checked="true" value="Belum" id="Belum">
                    <label class="form-check-label" for="Belum">
                        Objek Diduga Cagar Budaya
                    </label>
                </div>
            </div>
        </div>

        <div style="z-index: 0;" id="map" class="h-100"></div>
    </div>

    <input type="hidden" name="" id="lang" value={{Session::get('locale')}}>

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
</div>
<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.markercluster-src.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    const objWisata = {
        "type": "FeatureCollection",
        "features": []
    };
    const data = @json($data);
    const kabupaten = @json($kabupaten);
    const lang = $("#lang").val();
    let checkboxStates;

    var markers = L.markerClusterGroup();


    data.forEach(function(item) {
        var svgCol = '';
        console.log(item);

        if(item.latitude.length > 0 && item.longitude.length > 0){
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

            const newFeature = {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [item.longitude, item.latitude] // Replace with your actual coordinates from the database
                },
                "properties": {
                    "nama": item.nama,
                    "deskripsi": item.deskripsi,
                    "description": item.description,
                    "gambar_popup": item.gambar_popup,
                    "fotos": item.fotos,
                    "kabupaten": item.kabupaten,
                    "kabupaten_id": item.kabupaten_id,
                    "link_360": item.link_360,
                    "sub_kategori": item.sub_kategori,
                    "sub_kategori_id": item.sub_kategori_id,
                    "status": item.status,
                    "warna_kategori": svgCol,
                }
            };

        objWisata.features.push(newFeature);
        }
    });

    var map = L.map('map',{
            zoomControl: false
        }
        )
        .setView([0.5933, 101.7068], 8, false);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

    

    L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(map);


    const geojsonLayer = L.geoJSON(null, {
        filter: (feature) => {
            console.log(checkboxStates)
            const isKabChecked = checkboxStates.kabupaten.includes(feature.properties.kabupaten_id.toString());
            const isCatChecked = checkboxStates.kategori.includes(feature.properties.sub_kategori_id.toString());
            const isStatChecked = checkboxStates.kategori.includes(feature.properties.status);
            return isKabChecked && isCatChecked && isStatChecked; // Only true if both are true
        },
        pointToLayer: (feature, latlng) => {
            // Create a custom marker with the specified image
            var svgrect = `<svg cache-id='f947fb2af7bb488eb0df4d1e2adb27ab' id='e4wDYrPzlOT1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 324 375' shape-rendering='geometricPrecision' text-rendering='geometricPrecision'><rect width='324' height='324' rx='0' ry='0' transform='matrix(.370734 0.367312-.384489 0.388071 164.328181 130.355953)' fill='white' stroke-width='0'/><rect width='324' height='324' rx='20' ry='20' transform='translate(0 0.000001)' fill='${feature.properties.warna_kategori}' stroke-width='0'/></svg>`

            var url = encodeURI("data:image/svg+xml," + svgrect).replace('#','%23');
            const marker = L.marker(latlng, {
                icon: L.icon({
                    iconUrl: "storage/gambarPopup/"+feature.properties.gambar_popup,
                    shadowUrl: url,
                    iconSize: [32, 32],
                    shadowSize: [50, 50],
                    iconAnchor: [16, 55],
                    shadowAnchor: [25,60],
                }),
            });

            marker.on('click', () => markerOnClick(feature.properties));
            markers.addLayer(marker);


            return markers;
        },
    }).addTo(map);

    function updateCheckboxStates() {
        checkboxStates = {
            kabupaten: [],
            kategori: [],
            status: []
        }
    
        for (let input of document.querySelectorAll('input')) {
            if(input.checked) {
                switch (input.className) {
                    case 'kabupaten': checkboxStates.kabupaten.push(input.value); break
                    case 'kategori': checkboxStates.kategori.push(input.value); break
                    case 'status': checkboxStates.kategori.push(input.value); break
                }

            }
        }
    }


    for (let input of document.querySelectorAll('input')) {
        //Listen to 'change' event of all inputs
        input.onchange = (e) => {
            markers.clearLayers()
            geojsonLayer.clearLayers()
            updateCheckboxStates()
            geojsonLayer.addData(objWisata)   
        }
    }



    /****** INIT ******/
    updateCheckboxStates()

    geojsonLayer.addData(objWisata);

    function markerOnClick(data) {
        let fotosHtml = ''
        let carouselIndex = '';
        let carouselFull = '';
        let deskripsi = '';

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


        if(lang === 'en'){
            deskripsi = data.description;
        }else{
            deskripsi = data.deskripsi;
        }


        $(".modal-content").html(
            '<div class="modal-header">'+
                '<div>'+
                '<h5 class="modal-title" id="exampleModalLabel1">'+data.nama+'</h5>' +
                '<a href='+data.link_360+' target="_blank" type="button" class=""><u>Website Virtual Tour 360</u></a>'+
                '</div>'+
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
            '</div>'+
            '<div class="card">'+
                '<div class="card-body">'+
                    carouselFull+
                    '<p class="card-text" style="text-align:justify">'+deskripsi+'</p>'+
                '</div>'+
            '</div>'
            );
        $('#basicModal').modal('show');
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
                                color:"#ffc09f",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'KUANTAN SINGINGI':
                            return {
                                color:"#ffaec9",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'ROKAN HILIR':
                            return {
                                color:"#b97a57",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'Kota DUMAI':
                            return {
                                color:"#7092be",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'PELALAWAN':
                            return {
                                color:"#f37076",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'SIAK':
                            return {
                                color:"#18b1f3",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'KAMPAR':
                            return {
                                color:"#c8bfe7",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'ROKAN HULU':
                            return {
                                color:"#d782c8",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'INDRAGIRI HULU':
                            return {
                                color:"#f3f78a",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'MANDAU':
                            return {
                                color:"#c8ecf4",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'BENGKALIS':
                            return {
                                color:"#fb6f92",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'MERANTI':
                            return {
                                color:"#646464",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;
                        case 'INDRAGIRI HILIR':
                            return {
                                color:"#a7d489",
                                opacity:"1",
                                stroke:"",
                                "fillOpacity": .3,
                            };
                            break;

                    }
                }
            }
            ).addTo(map);
        });

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
                "fillOpacity": .3,
            });
        });
        layer.on('click', function () {
            $(".kabupaten").prop('checked', false)
            $("#"+feature.properties.ID).prop('checked', true)
            markers.clearLayers()
            geojsonLayer.clearLayers()
            updateCheckboxStates()
            geojsonLayer.addData(objWisata)   
        });
    }
    

//     var wbb = [];
//     var cbb = [];
//     var bangunan = [];
//     var benda = [];
//     var situs = [];
//     var struktur = [];
//     var kawasan = [];
//     var pekanbaru = [];
//     var kuantanSingingi = [];
//     var rokanHilir = [];
//     var dumai = [];
//     var pelalawan = [];
//     var siak = [];
//     var kampar = [];
//     var rokanHulu = [];
//     var indragiriHulu = [];
//     var bengkalis = [];
//     var meranti = [];
//     var indragiriHilir = [];
//     var allKab = [];

//     function addMarkersToMap(data) {
//         data.forEach(function (item) {
//             var svgCol = '';

//             switch (item.sub_kategori.nama){
//                 case 'Bangunan':
//                     svgCol = '#0073e6'
//                     break;
//                 case 'Benda':
//                     svgCol = '#5928ed'
//                     break;
//                 case 'Situs':
//                     svgCol ='#00bf7d'
//                     break;
//                 case 'Struktur':
//                     svgCol = '#b3c7f7'
//                     break;
//                 case 'Kawasan':
//                     svgCol = '#89ce00'
//                     break;
//             }

//             var svgrect = `<svg cache-id='f947fb2af7bb488eb0df4d1e2adb27ab' id='e4wDYrPzlOT1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 324 375' shape-rendering='geometricPrecision' text-rendering='geometricPrecision'><rect width='324' height='324' rx='0' ry='0' transform='matrix(.370734 0.367312-.384489 0.388071 164.328181 130.355953)' fill='white' stroke-width='0'/><rect width='324' height='324' rx='20' ry='20' transform='translate(0 0.000001)' fill='${svgCol}' stroke-width='0'/></svg>`

//             var url = encodeURI("data:image/svg+xml," + svgrect).replace('#','%23');
//             const myIcon = L.icon({
//                 iconUrl: "storage/gambarPopup/"+item.gambar_popup,
//                 shadowUrl: url,
//                 iconSize: [32, 32],
//                 shadowSize: [50, 50],
//                 iconAnchor: [16, 55],
//                 shadowAnchor: [25,60],
//             });

//             const marker = L.marker([item.latitude, item.longitude], { icon: myIcon })
//             if(item.status === "Belum"){
//                 wbb.push(marker);
//             }else{
//                 cbb.push(marker);
//             }


//             switch(item.kabupaten.nama){
//                 case 'Kota Pekanbaru':
//                     pekanbaru.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Kuantan Singingi':
//                     kuantanSingingi.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Rokan Hilir':
//                     rokanHilir.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kota Dumai':
//                     dumai.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Pelalawan':
//                     pelalawan.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Siak':
//                     siak.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Kampar':
//                     kampar.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Rokan Hulu':
//                     rokanHulu.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Indragiri Hulu':
//                     indragiriHulu.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Bengkalis':
//                     bengkalis.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Meranti':
//                     meranti.push(marker);
//                     allKab.push(marker);
//                     break;
//                 case 'Kabupaten Indragiri Hilir':
//                     indragiriHilir.push(marker);
//                     allKab.push(marker);
//                     break;
//             }

//             switch (item.sub_kategori.nama){
//                 case 'Bangunan':
//                     bangunan.push(marker);
//                     break;
//                 case 'Benda':
//                     benda.push(marker);
//                     break;
//                 case 'Situs':
//                     situs.push(marker);
//                     break;
//                 case 'Struktur':
//                     struktur.push(marker);
//                     break;
//                 case 'Kawasan':
//                     kawasan.push(marker);
//                     break;
//             }

//             marker.on('click', () => markerOnClick(item));
//         });
//     }

//     // Call the function to add markers with your generated data
//     const data = @json($data);
//     addMarkersToMap(data);
//     var grupPekanbaru = L.layerGroup(pekanbaru);
//     var grupKuantanSingingi = L.layerGroup(kuantanSingingi)
//     var grupRokanHilir = L.layerGroup(rokanHilir)
//     var grupDumai = L.layerGroup(dumai)
//     var grupPelalawan = L.layerGroup(pelalawan)
//     var grupSiak = L.layerGroup(siak)
//     var grupKampar = L.layerGroup(kampar)
//     var grupRokanHulu = L.layerGroup(rokanHulu)
//     var grupIndragiriHulu = L.layerGroup(indragiriHulu)
//     var grupBengkalis = L.layerGroup(bengkalis)
//     var grupMeranti = L.layerGroup(meranti)
//     var grupIndragiriHilir = L.layerGroup(indragiriHilir)
//     var grupAllKab = L.layerGroup(allKab)
//     var grupBenda = L.layerGroup(benda)
//     var grupSitus = L.layerGroup(situs)
//     var grupBangunan = L.layerGroup(bangunan)
//     var grupKawasan = L.layerGroup(kawasan)
//     var grupStruktur = L.layerGroup(struktur)
//     const lang = $("#lang").val();


//     var map = L.map('map',{
//             zoomControl: false
//         }
//         )
//         .setView([0.5933, 101.7068], 8, false);

//         L.control.zoom({
//             position: 'bottomright'
//         }).addTo(map);

    

//     L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
//     }).addTo(map);

//     window.addEventListener('resize', function(event){
//     // get the width of the screen after the resize event
//     var width = document.documentElement.clientWidth;
//     // tablets are between 768 and 922 pixels wide
//     // phones are less than 768 pixels wide
//     if (width < 768) {
//         // set the zoom level to 10
//         map.setZoom(10);
//     }  else {
//         // set the zoom level to 8
//         map.setZoom(8);
//     }
// });

//     function onEachFeature(feature, layer) {
//         //bind click
        
//         layer.bindTooltip(feature.properties.Kabupaten_,{
//             direction:'center',
//             className: 'countryLabel',

//         })
//         layer.on('mouseover', function () {
//             this.setStyle({
//                 "fillOpacity": 1,
//                 clickable:false,
//             });
//         });
//         layer.on('mouseout', function () {
//             this.setStyle({
//                 "fillOpacity": .3,
//             });
//         });
//     }

//     fetch("{{ asset('Prov_Riau.geojson') }}")
//         .then(response => response.json())
//         .then(data => {
//             L.geoJSON(data,{    
//                 onEachFeature: onEachFeature,
//                 style: function(feature){
//                     switch(feature.properties.Kabupaten_){
//                         case 'Kota PEKANBARU':
//                             return {
//                                 color:"#ffc09f",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'KUANTAN SINGINGI':
//                             return {
//                                 color:"#ffaec9",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'ROKAN HILIR':
//                             return {
//                                 color:"#b97a57",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'Kota DUMAI':
//                             return {
//                                 color:"#7092be",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'PELALAWAN':
//                             return {
//                                 color:"#f37076",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'SIAK':
//                             return {
//                                 color:"#18b1f3",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'KAMPAR':
//                             return {
//                                 color:"#c8bfe7",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'ROKAN HULU':
//                             return {
//                                 color:"#d782c8",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'INDRAGIRI HULU':
//                             return {
//                                 color:"#f3f78a",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'MANDAU':
//                             return {
//                                 color:"#c8ecf4",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'BENGKALIS':
//                             return {
//                                 color:"#fb6f92",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'MERANTI':
//                             return {
//                                 color:"#646464",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;
//                         case 'INDRAGIRI HILIR':
//                             return {
//                                 color:"#a7d489",
//                                 opacity:"1",
//                                 stroke:"",
//                                 "fillOpacity": .3,
//                             };
//                             break;

//                     }
//                 }
//             }
//             ).addTo(map);
//         });


//     L.control.layers({
//             'Semua': grupAllKab, 
//             'Kota Pekanbaru': grupPekanbaru, 
//             'Kabupaten Kuantan Singingi': grupKuantanSingingi,
//             'Kabupaten Rokan Hilir': grupRokanHilir,
//             'Kota Dumai': grupDumai,
//             'Kabupaten Pelalawan': grupPelalawan,
//             'Kabupaten Siak': grupSiak,
//             'Kabupaten Kampar': grupKampar,
//             'Kabupaten Rokan Hulu': grupRokanHulu,
//             'Kabupaten Indragiri Hulu': grupIndragiriHulu,
//             'Kabupaten Bengkalis': grupBengkalis,
//             'Kabupaten Meranti': grupMeranti,
//             'Kabupaten Indragiri Hilir': grupIndragiriHilir
//         }, {
//             '<span style="background-color:#0073e6; color:#0073e6">tet</span> Bangunan': grupBangunan, 
//             '<span style="background-color:#5928ed; color:#5928ed">tet</span> Benda': grupBenda,
//             '<span style="background-color:#00bf7d; color:#00bf7d">tet</span> Situs': grupSitus,
//             '<span style="background-color:#b3c7f7; color:#b3c7f7">tet</span> Struktur': grupStruktur,
//             '<span style="background-color:#89ce00; color:#89ce00">tet</span> Kawasan': grupKawasan,
//         }, { collapsed: false, position:'topleft'}).addTo(map);
//         $('<h6 class="mb-1 text-dark" id="mapTitle">Filter Kabupaten Kota dan Kategori</h6>').insertBefore('div.leaflet-control-layers-base');
        


//     map.addLayer(grupAllKab);
//     map.addLayer(grupBangunan);
//     map.addLayer(grupBenda);
//     map.addLayer(grupSitus);
//     map.addLayer(grupStruktur);
//     map.addLayer(grupKawasan);

//     function markerOnClick(data) {
//         let fotosHtml = ''
//         let carouselIndex = '';
//         let carouselFull = '';
//         let deskripsi = '';

//         data.fotos.forEach((foto, index) => {
//             carouselIndex += '<li data-bs-target="#carouselExample" data-bs-slide-to="' + index + '"';
            
//             if (index === 0) {
//                 carouselIndex += ' class="active"';
//             }
            
//             carouselIndex += '></li>';
//         });


//         data.fotos.forEach((foto, index) => {
//             fotosHtml += '<div class="carousel-item';
            
//             if (index === 0) {
//                 fotosHtml += ' active';
//             }
            
//             fotosHtml += '">' +
//                 '<img class="d-block w-100 bd-placeholder-img object-fit-cover" height="400" width="500" src="storage/foto/'+foto.url+'" alt="Slide" />' +
//             '</div>';
//         });

        
//         if(data.fotos.length > 0){
//             carouselFull += '<div id="carouselExample" class="carousel carousel-dark slide mb-4" data-bs-ride="carousel">'+
//                         '<ol class="carousel-indicators">'+
//                             carouselIndex+
//                         '</ol>'+
//                         '<div class="carousel-inner">'+
//                             fotosHtml+
//                         '</div>'+
//                         '<a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">'+
//                             '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
//                             '<span class="visually-hidden">Previous</span>'+
//                         '</a>'+
//                         '<a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">'+
//                             '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
//                             '<span class="visually-hidden">Next</span>'+
//                         '</a>'+
//                     '</div>'
//         }


//         if(lang === 'en'){
//             deskripsi = data.description;
//         }else{
//             deskripsi = data.deskripsi;
//         }


//         $(".modal-content").html(
//             '<div class="modal-header">'+
//                 '<h5 class="modal-title" id="exampleModalLabel1">'+data.nama+'</h5>' +
//                 '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
//             '</div>'+
//             '<div class="card">'+
//                 '<div class="card-body">'+
//                     carouselFull+
//                     '<p class="card-text" style="text-align:justify">'+deskripsi+'</p>'+
//                 '</div>'+
//             '</div>'+
//             '<div class="modal-footer">'+
//                 '<a href='+data.link_360+' target="_blank" type="button" class="">Website Virtual Tour 360</a>'+
//             '</div>'
//             );
//         $('#basicModal').modal('show');
//     }
    

   
</script>


@endsection