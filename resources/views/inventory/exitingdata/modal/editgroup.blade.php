<!-- Update Group -->
<div class="modal fade" id="editgroup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Edit Group</h3>
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
          <form class="row g-3" onsubmit="return true" action="{{ route('group.update',$group->pluck('id')) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="col-12 ">
              <label class="form-label">Code Main Group</label>
              <select  class="select2 form-select form-select-lg" data-allow-clear="true" id="main_group_id" name="main_group_id">
                <option></option>
                @foreach ($maingroup as $mgroup)
                <option value="{{ $mgroup->uuid }}">
                  [Main Group] {{ $mgroup->code_main_group }}-{{ $mgroup->name }}
                </option>
                @endforeach
              </select>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
          </div>
          <div class="col-12 ">
              <label class="form-label">Code Group</label>
              <input type="text"  class="form-control" id="code_group" name="code_group"  required />
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
          </div>
          <div class="col-12">
              <label class="form-label" for="modalEditUserName">Name Group</label>
              <input type="text"  class="form-control" id="name" name="name"  required/>
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
  <!--/ Update Group -->