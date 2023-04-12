@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">            
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">PMS /</span> Approval Template
    </h4>
<!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Action</th>
                        <th>Kode Template</th>
                        <th>Nama Template</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $template)    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $template->kode_template }}</td>
                        <td>{{ $template->nama_template }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal to add new record -->
<div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="exampleModalLabel">New Template</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
      <form class="form-repeater" method="POST" action="{{ route('approvaltemplate.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-12">
            <label class="form-label" for="repeat-count">Aproval Number</label>
            <select class="form-select" id="repeat-count" name="repeat-count">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-sm-12">
          <label class="form-label" for="basicFullname">Kode Template</label>
          <div class="input-group input-group-merge">
            <input type="text" id="" class="form-control " name="kode_template" />
          </div>
        </div>
        <div class="col-sm-12">
          <label class="form-label" for="basicPost">Nama Template</label>
          <div class="input-group input-group-merge">
            <input type="text" id="" name="nama_template" class="form-control dt-post" />
          </div>
        </div>
        <div id="input-fields">
        <div class="col-sm-12">
            <label class="form-label">Approval Number 1</label>
            <select class="form-select">
                <option>Position Select</option>
                <option value="Developer">Developer</option>
            </select>
        </div>
        </div>
        <p>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!--/ DataTable with Buttons -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#repeat-count').change(function() {
            var count = $(this).val();
            var html = '';

            for (var i = 1; i <= count; i++) {
                html += '<div class="col-sm-12">';
                html += '<label class="form-label">Approval Number  ' + i + '</label>';
                html += '<select class="form-select">';
                html += '<option>Position Select</option>';
                html += '<option value="Developer">Developer</option>';
                html += '</select>';
                html += '</div>';
            }

            $('#input-fields').html(html);
        });
    });
</script>

@endsection