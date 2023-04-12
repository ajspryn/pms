<div class="d-flex justify-content-between align-items-center ">
  <div class="col-xl-3">
      <div class="mb-3 row">
          <label for="html5-search-input" class="col-md-2 col-form-label">Search:</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="search" placeholder="Search ..." id="search-group" />
          </div>
      </div>
  </div>
  <div class="d-flex justify-content-center justify-content-md-end">
    <button class="btn btn-label-primary dropdown-toggle me-2" id="export-btn">Export</button>
    <button class="create-new btn btn-primary" data-bs-toggle="modal" data-bs-target="#creategroup"><i class="ti ti-plus me-sm-1"></i>Add New</button>
  </div>
</div>        

<div class="table-responsive text-nowrap ">
  <table class="table table-striped" id="table-id"> 
  <thead>
    <tr>
      <th></th>
      <th>Action</th>
      <th>Main Group</th>
      <th>Code Group</th>
      <th>Name Group</th>
      <th>Full Code + Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($group as $group)
    <tr>
      <td></td>
      <td>
  @can('Exiting-Data-Edit')       
  <a class="btn submit-btn editgroup-btn" data-id="{{ $group->id }}" data-bs-toggle="modal" data-bs-target="#editgroup" ><i class=" ti ti-edit ti-ms"></i></a>
  @endcan

  @can('Exiting-Data-Delete')
      {!! Form::open(['method' => 'DELETE','route' => ['group.destroy', $group->id],'style'=>'display:inline']) !!}
      {{Form::button('<i class="ti ti-trash"></i>', ['type' =>'submit', 'class' => 'submit-btn'])}}
      {!! Form::close() !!}
  @endcan
      </td>
      <td>{{ $group->main_group->code_main_group }}-
          {{ $group->main_group->name }}
      </td>
      <td>{{ $group->code_group }}</td>
      <td>{{ $group->name }}</td>
      <td>
          {{ $group->main_group->code_main_group }}
          {{ $group->code_group }}-
          {{ $group->name }}
      </td>
    </tr>
    
@endforeach
</tbody>
</table>
</div>


<!-- Create Group -->
<div class="modal fade" id="creategroup" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2">Create Group</h3>
          <p class="text-muted"> 
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
              </div>
            @endif
          </p>
        </div>
        <form id="editUserForm" class="row g-3" onsubmit="return true" method="POST" action="{{ route('group.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-12 ">
              <label class="form-label">Code Main Group</label>
              <select  class="select2 form-select form-select-lg" data-allow-clear="true" name="main_group_id">
                <option></option>
                @foreach ($maingroup as $mgroup)
                <option value="{{ $mgroup->uuid }}" >
                  [Main Group] {{ $mgroup->code_main_group }}-{{ $mgroup->name }}
                </option>
                @endforeach
              </select>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
          </div>
          <div class="col-12 ">
              <label class="form-label">Code Group</label>
              <input type="text" id="code_group" name="code_group" class="form-control" placeholder="code Group" required />
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
          </div>
          <div class="col-12">
              <label class="form-label" for="modalEditUserName">Name Group</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
          </div>
          <br>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Create Group -->

<script>
  $(document).ready(function() {
      $('#search-group').on('input', function() {
          $.ajax({
              url: '/search', // Ganti dengan URL Anda
              method: 'GET',
              data: {
                  query: $(this).val()
              },
              success: function(data) {
                  // Perbarui tampilan daftar data tabel dengan data yang diterima dari server
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });
      });
  });
</script>
