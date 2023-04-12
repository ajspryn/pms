<!-- Update Sub Group -->
<div class="modal fade" id="editsubgroup" tabindex="-1" aria-hidden="true">
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
          <form class="row g-3" onsubmit="return true" action="{{ route('subgroup.update', $subgroup->pluck('id')) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="col-12 ">
                <label class="form-label">Code Group</label>
                <select  class="select2 form-select form-select-lg" data-allow-clear="true" id="group_id" name="group_id">
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
                <input type="text" id="code_sub_group" name="code_sub_group"  class="form-control" placeholder="code Group"  required />
                <div class="valid-feedback"> Ok! </div>
                <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserName">Name Sub Group</label>
                <input type="text" id="name" name="name"  class="form-control" placeholder="Name"  required/>
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
  <!--/ Update Sub Group -->