<div class="d-flex justify-content-between align-items-center ">
    <div class="col-xl-3">
        <div class="mb-3 row">
            <label for="html5-search-input" class="col-md-2 col-form-label">Search:</label>
            <div class="col-md-9">
                <input class="form-control" type="text" placeholder="Search ..." id="search-maingroup" />
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center justify-content-md-end">
      <button class="btn btn-label-primary dropdown-toggle me-2" id="export-btn">Export</button>
      <button class="create-new btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmaingroup"><i class="ti ti-plus me-sm-1"></i>Add New</button>
    </div>
</div>        

<div class="table-responsive text-nowrap">
    <table class="table table-striped" id="table-id">
    <thead>
      <tr>
          <th></th>
          <th>Action</th>
          <th>Code</th>
          <th>Name Main Group</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($maingroup as $mgroup)
      <tr>
          <td></td>
          <td>
          @can('Exiting-Data-Edit')       
              <a class="btn submit-btn" data-bs-toggle="modal"  data-bs-target="#editmaingroup{{ $mgroup->id }}"><i class=" ti ti-edit ti-ms"></i></a>
          @endcan
        
          @can('Exiting-Data-Delete')
              {!! Form::open(['method' => 'DELETE','route' => ['maingroup.destroy', $mgroup->id],'style'=>'display:inline']) !!}
              {{Form::button('<i class="ti ti-trash"></i>', ['type' =>'submit', 'class' => 'submit-btn'])}}
              {!! Form::close() !!}
          @endcan
          </td>
          <td>{{ $mgroup->code_main_group }}</td>
          <td>{{ $mgroup->name }}</td>
      </tr>
        <!-- Update Main Group -->
   <div class="modal fade" id="editmaingroup{{ $mgroup->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Edit Main Group</h3>
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
          <form id="editUserForm" class="row g-3" onsubmit="return true" method="POST"  action="{{ route('maingroup.update', $mgroup->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-12 ">
                <label class="form-label">Code Main Group</label>
                <input type="text" name="code_main_group" class="form-control" placeholder="code Main Group" value="{{ old('code_main_group', $mgroup->code_main_group) }}" required />
                <div class="valid-feedback"> Ok! </div>
                <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserName">Name Main Group</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $mgroup->name) }}" required/>
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
<!--/ Update Main Group -->
      @endforeach
    </tbody>
</table>
</div>


<!-- Create Main Group -->
<div class="modal fade" id="createmaingroup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Create Main Group</h3>
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
          <form id="editUserForm" class="row g-3" onsubmit="return true" method="POST" action="{{ route('maingroup.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-12 ">
                <label class="form-label">Code Main Group</label>
                <input type="text" id="code_main_group" name="code_main_group" class="form-control" placeholder="code Main Group" required />
                <div class="valid-feedback"> Ok! </div>
                <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserName">Name Main Group</label>
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
  <!--/ Create Main Group -->
   
  
  