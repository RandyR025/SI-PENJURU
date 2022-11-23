@extends('backend/layouts.template')
@section('titlepage')
Data Pilihan Dari Pengisian {{$pengisian[0]->nama_pengisian}}
@endsection
@section('title')
Kelola Data
@endsection
@section('content')

@if(session()->has('success'))
<div class="alert alert-primary" role="alert">{{ session('success')}}</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger" role="alert">{{ session('loginError')}}</div>
@endif
<div id="success_message"></div>

<div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 mb-1" style="">
  <div class="d-inline-block me-0 me-sm-3 float-start float-md-none" style="margin-left: 300px;">
    <!-- Add Button Start -->
    <a href="#" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable" data-bs-toggle="modal" data-bs-placement="top" type="button" data-bs-delay="0" titte data-bs-original-title="Add" data-bs-target="#AddPilihanModal">
      <i data-cs-icon="plus"></i>
    </a>
    <!-- Add Button End -->


    <div class="d-inline-block">
      <!-- Print Button Start -->
      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-datatable="#datatableRows" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Print" type="button">
        <i data-cs-icon="print"></i>
      </button>
      <!-- Print Button End -->

      <!-- Export Dropdown Start -->
      <div class="d-inline-block datatable-export" data-datatable="#datatableRows">
        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
          <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
            <i data-cs-icon="download"></i>
          </span>
        </button>
        <div class="dropdown-menu shadow dropdown-menu-end">
          <button class="dropdown-item export-copy" type="button">Copy</button>
          <button class="dropdown-item export-excel" type="button">Excel</button>
          <button class="dropdown-item export-cvs" type="button">Cvs</button>
        </div>
      </div>
      <!-- Export Dropdown End -->
    </div>
  </div>
</div>
<!-- Controls End -->
<!-- Content End -->
<div class="container">
  <div class="row">
    <table class="table table-hover" id="datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Pilihan</th>
          <th>Nama Pilihan</th>
          <th>Points</th>
          <th class="#"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($pilihan as $item)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item->kode_pilihan }}</td>
          <td>{{ $item->nama_pilihan }}</td>
          <td>{{ $item->points }}</td>
          <td>
          <button value="{{ $item->kode_pilihan }}" class="btn btn-icon btn-icon-only btn-outline-secondary mb-1 edit_pilihan" type="button" data-bs-placement="top" titte data-bs-original-title="Edit" data-bs-toggle="tooltip">
          <i class="fa-solid fa-pen-to-square"></i>
          </button>
            <button value="{{ $item->kode_pilihan }}" class="btn btn-icon btn-icon-only btn-outline-secondary mb-1 delete_pilihan" type="button" data-bs-toggle="tooltip" data-bs-placement="top" titte data-bs-original-title="Hapus">
            <i class="fa-solid fa-trash-can"></i>
            </button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal modal-right large fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pilihan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <form action="" id="pilihan_form">
            <div class="mb-3" hidden>
              <label class="form-label">Kode Pengisian</label>
              <input id="edit_id" type="text" class="id_penilaian form-control" value="" name="kode_pengisian" />
              <span class="text-danger error-text kode_pengisian_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Kode Pilihan</label>
              <input id="edit_kodepilihan" type="text" class="kode_pilihan form-control" value="" name="kode_pilihan" />
              <span class="text-danger error-text kode_pilihan_error"></span>
            </div>
            <!-- <div class="mb-3">
              <label class="form-label">Kode Sub Kriteria</label>
              <input id="edit_kodesubkriteria" type="text" class="kodesubkriteria form-control" value="" name="kode_subkriteria" />
              <span class="text-danger error-text kode_subkriteria_error"></span>
            </div> -->

            <div class="mb-3">
              <label class="form-label">Nama Pilihan</label>
              <input id="edit_namapilihan" type="text" class="nama_pilihan form-control" value="" name="nama_pilihan" />
              <span class="text-danger error-text nama_pilihan_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Points</label>
              <input id="edit_points" type="text" class="points form-control" value="" name="points" />
              <span class="text-danger error-text points_error"></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update_pilihan">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade modal-close-out" id="AddPilihanModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable mt-3">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pilihan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <form action="{{ route('pilihan.store') }}" method="post" id="main_form">
            @csrf
            <div class="mb-3" hidden>
              <label class="form-label">Kode Pengisian</label>
              <input name="kode_pengisian" type="text" class="kode_pengisian form-control" value="{{$pengisian[0]->kode_pengisian}}" />
              <span class="text-danger error-text kode_pengisian_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Kode Pilihan</label>
              <input name="kode_pilihan" type="text" class="kode_pilihan form-control" />
              <span class="text-danger error-text kode_pilihan_error"></span>
            </div>
            <!-- <div class="mb-3">
              <label class="form-label">Kode Sub Kriteria</label>
              <input name="kode_subkriteria" type="text" class="kode_subkriteria form-control" />
              <span class="text-danger error-text kode_subkriteria_error"></span>
            </div> -->
            
            <div class="mb-3">
              <label class="form-label">Name Pilihan</label>
              <input name="nama_pilihan" type="text" class="nama_pilihan form-control" />
              <span class="text-danger error-text nama_pilihan_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Points</label>
              <input name="points" type="text" class="points form-control" />
              <span class="text-danger error-text points_error"></span>
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary add_pilihan">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade modal-close-out" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <form action="" id="edit_form">
            <div class="mb-3">
              <input id="delete_pilihan_id" type="hidden" class="name form-control" value="" />
            </div>
            <h4 style="font-size: 30px;">Anda Yakin ??? Ingin Menghapus Data Ini ???</h4>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary delete_pilihan_btn">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="{{asset('backend/js/vendor/jquery-3.5.1.min.js')}}"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#datatable').DataTable({
      responsive: true
      // scrollX: true
    });

    /* table.on('click', '.edit', function (){
      $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data);

    $('#name').val(data[1]);
    $('#email').val(data[2]);

    $('#editForm').attr('action', '/datapengguna/'+data[0]);
    $('#editModal').modal('show');
    }); */
    new $.fn.dataTable.FixedHeader(table);
  });
</script>
<script src="{{asset('js/Pilihan.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection