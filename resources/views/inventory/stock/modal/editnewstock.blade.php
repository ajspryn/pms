<!-- Edit New Stock Modal -->
<div class="modal fade" id="editnewstock" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Edit New Stock</h3>
          </div>
          <form  class="row g-3" onsubmit="return true" action="{{ route('data.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" readonly>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserFirstName">Ship</label>
              <input class="form-control" type="text" name="ship_id" id="ship_id" value="{{ $ship_id->name }}" readonly />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label">Select Unit/Component/Part</label>
              <select  class="select2 form-select form-select-lg" data-allow-clear="false" id="code_category" name="code_category">
                @foreach ($part as $part)
                <option></option>
                <option value="{{ $part->item_code }}">
                  [Part] {{ $part->component->unit->sub_group->group->main_group->code_main_group }}{{ $part->component->unit->sub_group->group->code_group }}{{ $part->component->unit->sub_group->code_sub_group }}-{{ $part->component->unit->code_units }}-{{ $part->component->code_component }}-{{ $part->code_part }}-{{ $part->name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label for="defaultFormControlInput" class="form-label">Category Name</label>
              <input type="text" class="form-control" name="name_category" id="name_category" aria-describedby="defaultFormControlHelp" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">New Stock</label>
              <input class="form-control" name="stock" type="number" value="0" id="stock" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">Used Stock</label>
              <input class="form-control" name="used_stock" type="number" value="0" id="used_stock" required/>
              <div class="valid-feedback"> Ok! </div>
              <div class="invalid-feedback"> Required. </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">Min Qty</label>
              <input class="form-control" name="minqty" type="number" value="0" id="minqty" required />
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
  <!--/ Edit New Stock Modal -->