@extends('layouts/blankLayout')

@section('title', __('nav.judul'))
<link href={{asset("assets/landingPage/img/logo1.png")}} rel="icon">
<link href={{asset("assets/landingPage/img/apple-touch-icon.png")}} rel="apple-touch-icon">

<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href={{asset("assets/landingPage/vendor/aos/aos.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/bootstrap-icons/bootstrap-icons.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/boxicons/css/boxicons.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/glightbox/css/glightbox.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/swiper/swiper-bundle.min.css")}} rel="stylesheet">

<!-- Template Main CSS File -->
<link href={{asset("assets/landingPage/css/style.css")}} rel="stylesheet">

<style>
    .btn-primary {
        color: #fff;
        background-color: #106eea !important;
        border-color: #106eea !important;
        box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
    }

    .btn-check:checked+.btn-primary,
    .btn-check:active+.btn-primary,
    .btn-primary:active,
    .btn-primary.active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #0e58b9 !important;
        border-color: #0e58b9 !important;
    }
</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9LD1NDKPRC"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9LD1NDKPRC');
</script>
@section('page-script')
<script src="{{asset('assets/js/ui-popover.js')}}"></script>
@endsection

@section('content')
<div class="position-relative">
    @include('layouts/sections/navbar/nav')

    <button style="z-index: 5000" type="button" class="btn btn-light text-nowrap position-fixed border bottom-0 end-0 "
        data-bs-toggle="popover" data-bs-offset="0,14" data-bs-placement="left" data-bs-html="true"
        data-bs-content="<p>{{$visitor}}</p>" title="{{__(" landing.visitor")}}">
        {{$visitor}}<i class="bx bx-user"></i>
    </button>

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg" style="margin-top: 32">
            <div class="container" data-aos="fade-up">
                <input type="hidden" name="" id="lang" value={{Session::get('locale')}}>

                <div class="section-title">
                    <h2>{{__('data.visualisasi')}}</h2>
                    <div class="chartArea">
                        <canvas id="myChart" height="100px"></canvas>
                    </div>

                </div>

                <div class="row">
                    <div class="section-title">
                        <h2>{{__('data.pilih')}}</h2>
                    </div>
                    @foreach ($kabupaten as $item)
                    <div class="col-6 col-lg-3 mb-3">
                        @if ($item->id==120)
                        <input type="radio" class="btn-check" name="kabkot" id={{$item->id}} value={{$item->id}}
                        autocomplete="off" checked>
                        @else
                        <input type="radio" class="btn-check" name="kabkot" id={{$item->id}} value={{$item->id}}
                        autocomplete="off">
                        @endif
                        <label class="btn btn-primary w-100 h-100" for={{$item->id}}>{{$item->nama}}</label>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End About Section -->
</div>
</section><!-- End Services Section -->

<!-- Vendor JS Files -->
<script src={{asset("assets/landingPage/vendor/purecounter/purecounter_vanilla.js")}}></script>
<script src={{asset("assets/landingPage/vendor/aos/aos.js")}}></script>
<script src={{asset("assets/landingPage/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/landingPage/vendor/glightbox/js/glightbox.min.js")}}></script>
<script src={{asset("assets/landingPage/vendor/isotope-layout/isotope.pkgd.min.js")}}></script>
<script src={{asset("assets/landingPage/vendor/swiper/swiper-bundle.min.js")}}></script>
<script src={{asset("assets/landingPage/vendor/waypoints/noframework.waypoints.js")}}></script>
<script src={{asset("assets/landingPage/vendor/php-email-form/validate.js")}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


<script type="text/javascript">
    Chart.register(ChartDataLabels);

    let labels = [];
    let jlh = []; 
    let title; 
    let kabkot = $('input[name = "kabkot"]:checked').val();
    const lang = $("#lang").val();
    let lab;

    if(lang === 'en'){
            lab = "Numbers of tourist attractions in ";
        }else{
            lab = "Jumlah Objek Wisata "
        }


    const datas =  {{ Js::from($data) }};

    $('input[name="kabkot"]').on("click", function() {
        labels = [];
        jlh = []; 
        $("canvas#myChart").remove();
        $("div.chartArea").append('<canvas id="myChart" height="100px"></canvas>');
        kabkot = $('input[name = "kabkot"]:checked').val();
        myChart.destroy();

        datas.forEach(item => {
            if(item.idK === parseInt(kabkot)){
                console.log(item.idK);

                title = item.kabupaten;
                labels.push(item.sub_kategori);

                jlh.push(item.jumlah);
            }
        });
        data = {
        labels: labels,
        datasets: [{
            label: lab+ title,
            backgroundColor: 'rgb(16, 110, 234)',
            borderColor: 'rgb(16, 110, 234)',
            data: jlh,
        }]
        };

        configs = {
            type: 'bar',
            data: data,
            plugins: [ChartDataLabels],
            options: {
                plugins: {
                    // Change options for ALL labels of THIS CHART
                    datalabels: {
                        color: 'white',
                        font: {
                                size: 16
                            }
                    }
                }
            }
          
        };

        if(myChart){
            myChart.destroy();
            myChart = new Chart(
                document.getElementById('myChart'),
                configs
            );
        }else{
            myChart = new Chart(
                document.getElementById('myChart'),
                configs
            );
        }

      

    });

    datas.forEach(item => {

    if(item.idK === 120){
        title = item.kabupaten;
        labels.push(item.sub_kategori);

        jlh.push(item.jumlah);
    }
    });
   


    let data = {
      labels: labels,
      datasets: [{
        label: lab+ title,
        backgroundColor: 'rgb(16, 110, 234)',
        borderColor: 'rgb(16, 110, 234)',
        data: jlh,
      }]
    };

    let configs = {
        type: 'bar',
        data: data,
        plugins: [ChartDataLabels],
        options: {
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: 'white',
                    font: {
                            size: 16
                        }
                }
            }
        }
    };

    let myChart = new Chart(
      document.getElementById('myChart'),
      configs
    );

</script>


<!-- Template Main JS File -->
<script src={{asset("assets/landingPage/js/main.js")}}></script>
@endsection