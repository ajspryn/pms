<!-- Create New Stock Modal -->
<div class="modal fade" id="newstock" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">New Stock</h3>
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return true" method="POST" action="/newstock" enctype="multipart/form-data">
            @csrf
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserFirstName">Ship</label>
              <input class="form-control" type="text" name="ship_id" id="exampleFormControlReadOnlyInput1" value="{{ $ship_id->uuid }}" disabled />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label">Select Unit/Component/Part</label>
              <select  class="select2 form-select form-select-lg" data-allow-clear="true" name="code_category">
                <option></option>
                @foreach ($part as $part)
                <option value="{{ $part->item_code }}" >
                  [Part] {{ $part->component->unit->sub_group->group->main_group->code_main_group }}{{ $part->component->unit->sub_group->group->code_group }}{{ $part->component->unit->sub_group->code_sub_group }}-{{ $part->component->unit->code_units }}-{{ $part->component->code_component }}-{{ $part->code_part }}-{{ $part->name }}
                </option>
                @endforeach
                @foreach ($component as $component)
                <option value="{{ $component->item_code }}" >
                  [Component] {{ $component->unit->sub_group->group->main_group->code_main_group }}{{ $component->unit->sub_group->group->code_group }}{{ $component->unit->sub_group->code_sub_group }}-{{ $component->unit->code_units }}-{{ $component->code_component }}-{{ $component->name }}
                </option>
                @endforeach
                @foreach ($unit as $unit)
                <option value="{{ $unit->item_code }}" >
                  [Unit] {{ $unit->sub_group->group->main_group->code_main_group }}{{ $unit->sub_group->group->code_group }}{{ $unit->sub_group->code_sub_group }}-{{ $unit->code_units }}-{{ $unit->name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label for="defaultFormControlInput" class="form-label">Category Name</label>
              <input type="text" class="form-control" name="name_category" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">New Stock</label>
              <input class="form-control" name="stock" type="number" value="0" id="html5-number-input" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">Used Stock</label>
              <input class="form-control" name="used_stock" type="number" value="0" id="html5-number-input" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">Min Qty</label>
              <input class="form-control" name="minqty" type="number" value="0" id="html5-number-input" required />
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Create New Stock Modal -->
