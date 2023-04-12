<!-- Extra Large Modal -->
<div class="modal fade" id="editunit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
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
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Unit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="row g-3" onsubmit="return true" method="POST" action="{{ route('unit.update', $unit->pluck('id')) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row g-2">
            <div class="col mb-0">
            <label class="form-label" for="form-repeater-1-3">Sub Group Id</label>
                <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" id="sub_group_id" name="sub_group_id">
                    <option></option>
                    @foreach ($subgroup as $sgroup)
                        <option value="{{ $sgroup->uuid }}">{{ $sgroup->group->main_group->code_main_group }}{{ $sgroup->gRoup->code_group }}{{ $sgroup->code_sub_group }}-{{ $sgroup->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-2">Code Unit</label>
                <input type="text" class="form-control" placeholder="Format 000" id="code_units" name="code_units" />
            </div>
        </div>
            <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Name</label>
                <input type="text"  class="form-control" placeholder="Name" id="name" name="name" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Item Code</label>
                <input type="text"  class="form-control" placeholder="Item Code" id="item_code" name="item_code" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">List No</label>
                <input type="text"  class="form-control" placeholder="List No" id="list_no" name="list_no" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Drawing No</label>
                <input type="text"  class="form-control" placeholder="Drawing" id="drawing_no" name="drawing_no" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Vendor</label>
                <input type="text"  class="form-control" placeholder="Vendor" id="vendor" name="vendor" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Type</label>
                <input type="text"  class="form-control" placeholder="Type" id="Type" name="type" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Unit No</label>
                <input type="text"  class="form-control" placeholder="Unit No" id="serial" name="serial" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Issued By</label>
                <input type="text"  class="form-control" placeholder="Issued By" id="issue_by" name="issue_by" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Certificate</label>
                <input type="text"  class="form-control" placeholder="Certificate" id="certificate_no" name="certificate_no" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Specification</label>
                <textarea class="form-control" id="specification_detail" rows="3" name="specification_detail"></textarea>
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Maintenance</label>
                <textarea class="form-control" id="maintenance_detail" rows="3" name="maintenance_detail"></textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Start</label>
                <input type="date" class="form-control" id="start_job" name="start_job" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">End</label>
                <input type="date" id="end_job" class="form-control" name="end_job" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Approval Number</label>
                <input type="text" id="number_approval" class="form-control" name="number_approval" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Approval Date</label>
                <input type="date" id="date_approval" class="form-control"  name="date_approval" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Place</label>
                <input type="text" id="pnd_place" class="form-control" name="pnd_place" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Date Place</label>
                <input type="date" class="form-control" id="pnd_date" name="pnd_date" />  
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Validity</label>
                <input type="date"  class="form-control" id="validity" name="validity" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Maker</label>
                      <input type="text" id="maker" class="form-control" name="maker" />  
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Upload Image</label>
                      <input type="file"  class="form-control" id="formFileMultiple" name="image" /> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>