@extends('template')

@section('content')

    <div class="float-right">
        <a href="#" class="btn btn-outline-info btn-sm btn-download" id="download"><i class="fa fa-download"></i> telecharger</a>
    </div>
    <div class="container-fluid">
        <h2 class="text-center">Filtre pour Les Statistique</h2>
    </div>
    <div class="chart" id="print-chart">
        <hr>
        <div class="" >
            <livewire:livewire-column-chart :column-chart-model="$lineChart"/>
        </div>
        <hr class="my-4">
        <div>
            <livewire:livewire-pie-chart :pie-chart-model="$pieChart"/>
        </div>
    </div>
@endsection
@push("styles")
    @livewireChartsScripts
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@push("scripts")
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
    <script>
        $('#download').on('click',function (){
            html2PDF(document.getElementById("print-chart"), {
                jsPDF: {
                    format: 'a4',
                },
                imageType: 'image/jpeg',
                output: './pdf/generate.pdf'
            });
        });
    </script>
@endpush
