@extends('backend/layouts.template')
@section('titlepage')
Perbandingan Kriteria
@endsection
@section('title')
Perhitungan
@endsection
@section('content')

@if(session()->has('success'))
<div class="alert alert-primary" role="alert">{{ session('success')}}</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger" role="alert">{{ session('loginError')}}</div>
@endif
<div id="success_message"></div>
<!-- Content End -->
<div class="container">
    <div class="row">
        <h3 class="ui header">Matriks Perbandingan Berpasangan</h3>
        <table class="ui collapsing celled blue table">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <?php
                    $n = getJumlahKriteria();
                    for ($i = 0; $i <= ($n - 1); $i++) {
                        echo "<th>" . getKriteriaNama($i) . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($x = 0; $x <= ($n - 1); $x++) {
                    echo "<tr>";
                    echo "<td>" . getKriteriaNama($x) . "</td>";
                    for ($y = 0; $y <= ($n - 1); $y++) {
                        echo "<td>" . round($matrik[$x][$y], 5) . "</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Jumlah</th>
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                        echo "<th>" . round($jmlmpb[$i], 5) . "</th>";
                    }
                    ?>
                </tr>
            </tfoot>

        </table>

    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="{{asset('backend/js/vendor/jquery-3.5.1.min.js')}}"></script> -->
<!-- <script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="{{asset('js/Guru.js')}}"></script> -->
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script type="text/javascript">
    function sum(no) {
        var txtkriteriavalue = document.getElementById('hkriteria' + no).value;
        var result = 1 / parseFloat(txtkriteriavalue);
        if (!isNaN(result)) {
            document.getElementById('hkriteriaterbalik' + no).value = result.toFixed(2);
        }
    }
</script>

@endsection