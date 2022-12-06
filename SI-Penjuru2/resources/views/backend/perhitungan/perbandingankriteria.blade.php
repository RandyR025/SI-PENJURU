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
    <!-- <table class="table table-bordered">
      <thead>
        <tr>
          <th>Kriteria</th>
          @foreach($kriteria as $item)
          <th>{{$item->nama_kriteria}}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach($kriteria as $item)
        <tr>
          <th>{{$item->nama_kriteria}}</th>
          @foreach($kriteria as $item)
          <td>
            <input type="text" class="form-control">
          </td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table> -->
    <!-- @foreach($kriteria as $key => $value)
    @if(isset($kriteria[$key+1]->nama_kriteria))
    {{$value->nama_kriteria}} <input type="text" name="" id=""> {{$kriteria[$key+1]->nama_kriteria}}</br>
    @endif
    @endforeach -->
    <form action="{{ route('perbandingansimpan') }}" method="post" id="form-perbandingan">
    @csrf
    <table class="table table-bordered">
    <?php
    for ($i = 0; $i < $perbandingan; $i++) {
      ?>
      <tr hidden>
            <th>
              <input type="text" name="tkriteria[]" id="tkriteria" value="{{$kriteria[$i]->kode_kriteria}}" hidden>
              {{$kriteria[$i]->nama_kriteria}}
            </th>
            <th><select name="pkriteria[]" id="" class="pkriteria text-center form-control">
                <option value="1">1</option>
              </select>
            </th>
            <th>
              <input type="text" name="tkriteria2[]" id="tkriteria2" value="{{$kriteria[$i]->kode_kriteria}}" hidden>
              {{$kriteria[$i]->nama_kriteria}}
            </th>
          </tr>
      <?php
      for ($j = $i; $j < $perbandingan; $j++) {
        ?>
        @if(isset($kriteria[$j+1]->nama_kriteria))

          <tr>
            <th>
              <input type="text" name="tkriteria[]" id="tkriteria" value="{{$kriteria[$i]->kode_kriteria}}" hidden>
              {{$kriteria[$i]->nama_kriteria}}
            </th>
            <th><select name="pkriteria[]" id="" class="pkriteria text-center form-control">
                <option value="1">1</option>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="9">9</option>
              </select>
            </th>
            <th>
              <input type="text" name="tkriteria2[]" id="tkriteria2" value="{{$kriteria[$j+1]->kode_kriteria}}" hidden>
              {{$kriteria[$j+1]->nama_kriteria}}
            </th>
          </tr>
          @endif
          <?php
      }
    }
    
    ?>
    </table>
    <div class="col-12 text-center">
    <button type="submit" class="btn btn-outline-primary btn-icon btn-icon-end sw-25">Comparrisson</button>
    </div>
    </form>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="{{asset('backend/js/vendor/jquery-3.5.1.min.js')}}"></script> -->
<!-- <script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="{{asset('js/Guru.js')}}"></script> -->
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

@endsection