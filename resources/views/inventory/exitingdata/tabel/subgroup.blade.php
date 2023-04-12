<!-- DataTable with Buttons -->
<div class="d-flex justify-content-between align-items-center ">
    <div class="col-xl-3">
        <div class="mb-3 row">
            <label for="html5-search-input" id="search-input" class="col-md-2 col-form-label">Search:</label>
            <div class="col-md-9">
                <input class="form-control" type="search" placeholder="Search ..." id="html5-search-input" />
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center justify-content-md-end">
      <button class="btn btn-label-primary dropdown-toggle me-2" id="export-btn">Export</button>
      <button class="create-new btn btn-primary" data-bs-toggle="modal" data-bs-target="#createsubgroup"><i class="ti ti-plus me-sm-1"></i>Add New</button>
    </div>
</div>  
<div class="table-responsive text-nowrap ">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Action</th>
                <th>Main Group</th>
                <th>Group</th>
                <th>Code Sub Group</th>
                <th>Name Sub Group</th>
                <th>Full Code + Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subgroup as $subgroup)
            <tr>
                <td></td>
                <td></td>
                <td>
                @can('Exiting-Data-Edit')       
                    <a class="btn submit-btn editsubgroup-btn" data-id="{{ $subgroup->id }}" data-bs-toggle="modal" data-bs-target="#editsubgroup" ><i class=" ti ti-edit ti-ms"></i></a>
                @endcan
        
                @can('Exiting-Data-Delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['subgroup.destroy', $subgroup->id],'style'=>'display:inline']) !!}
                    {{Form::button('<i class="ti ti-trash"></i>', ['type' =>'submit', 'class' => 'submit-btn'])}}
                    {!! Form::close() !!}
                @endcan
                </td>
                <td>
                    {{ $subgroup->group->main_group->code_main_group }}-
                    {{ $subgroup->group->main_group->name }}
                </td>
                <td>
                    {{ $subgroup->group->code_group }}-
                    {{ $subgroup->group->name }}
                </td>
                <td>{{ $subgroup->code_sub_group }}</td>
                <td>{{ $subgroup->name }}</td>
                <td>
                    {{ $subgroup->group->main_group->code_main_group }}
                    {{ $subgroup->group->code_group }}
                    {{ $subgroup->code_sub_group }}-
                    {{ $subgroup->name }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
<!--/ DataTable with Buttons -->

<!-- Create Sub Group -->
<div class="modal fade" id="createsubgroup" tabindex="-1" aria-hidden="true">
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
          <form id="editUserForm" class="row g-3" onsubmit="return true" method="POST" action="{{ route('subgroup.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-12 ">
                <label class="form-label">Code Main Group</label>
                <select  class="select2 form-select form-select-lg" data-allow-clear="true" name="group_id">
                  <option></option>
                  @foreach ($group as $group)
                        <option value="{{ $group->uuid }}">
                            {{ $group->main_group->code_main_group }}{{ $group->code_group }}-{{ $group->name }}
                        </option>
                  @endforeach
                </select>
                <div class="valid-feedback"> Ok! </div>
                <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 ">
                <label class="form-label">Code Sub Group</label>
                <input type="text" id="code_sub_group" name="code_sub_group" class="form-control" placeholder="code Group" required />
                <div class="valid-feedback"> Ok! </div>
                <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserName">Name Sub Group</label>
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
  <!--/ Create Sub Group -->



