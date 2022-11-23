@extends('backend/layouts.template')
@section('titlepage')
Penilaian Kinerja Guru
@endsection
@section('title')
Penilaian
@endsection
@section('content')

@if(session()->has('success'))
<div class="alert alert-primary" role="alert">{{ session('success')}}</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger" role="alert">{{ session('loginError')}}</div>
@endif
<div id="success_message"></div>
@php $questionNum = 1; @endphp

    <h2 class="small-title">Questions</h2>
    <div class="card mb-3">
        <div class="card-body">
        @php
            $choicenum = 1;
        @endphp
        @foreach ($pengisian as $item)
            <div class="d-flex flex-row align-content-center align-items-center mb-5">
                <div class="sw-5 me-4">
                    <div class="border border-1 border-primary rounded-xl sw-5 sh-5 text-primary d-flex justify-content-center align-items-center">{{$questionNum++}}</div>
                </div>
                <div class="heading mb-0">
                    {{$item[0]->nama_pengisian}}
                </div>
            </div>
            @foreach ($item as $choice)
            <div class="d-flex flex-row align-content-center align-items-center position-relative mb-3">
                <div class="sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                    <div class="d-flex justify-content-center align-items-center">
                        <label class="btn btn-foreground sw-4 sh-4 p-0 rounded-xl stretched-link" for="mc_c{{ $choicenum }}">
                            <input type="radio" class="form-check-input" id="mc_c{{ $choicenum }}" name="answer[{{ $questionNum }}]" value="{{ $choicenum++}}">
                        </label>
                    </div>
                </div>
                <div class="mb-0 text-alternate">
                    {{ $choice->nama_pilihan }}
                </div>
            </div>
            @endforeach
            <!-- <div class="d-flex flex-row align-content-center align-items-center position-relative mb-3">
                <div class="sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                    <div class="d-flex justify-content-center align-items-center">
                        <label class="btn btn-foreground sw-4 sh-4 p-0 rounded-xl stretched-link" for="answer1_2">
                            <input type="radio" class="form-check-input" id="answer1_2" name="oke" value="">
                        </label>
                    </div>
                </div>
                <div class="mb-0 text-alternate">
                    Chocolate bar sugar plum gingerbread. Gingerbread tiramisu fruitcake icing brownie. Marshmallow carrot cake jelly-o cotton candy danish. Wafer danish cupcake chocolate sesame snaps dessert marzipan.
                </div>
            </div> -->

            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-outline-primary btn-icon btn-icon-end sw-25">
                <span>Done</span>
                <i data-acorn-icon="check"></i>
            </button>
        </div>
    </div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="{{asset('backend/js/vendor/jquery-3.5.1.min.js')}}"></script>
<!-- <script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<script src="{{asset('js/Guru.js')}}"></script>
<script src = "//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>
<script src="{{asset('js/quiz.js')}}"></script>
@endsection