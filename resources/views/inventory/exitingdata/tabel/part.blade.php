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
      <button class="create-new btn btn-primary" data-bs-toggle="modal" data-bs-target="#createpart"><i class="ti ti-plus me-sm-1"></i>Add New</button>
    </div>
</div>  
<div class="table-responsive text-nowrap ">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Action</th>
            <th>Main Group</th>
            <th>Group</th>
            <th>Sub Group</th>
            <th>Unit</th>
            <th>Component</th>
            <th>Part Code</th>
            <th>Nama</th>
            <th>Full Code + Name</th>
            <th>Item Code</th>
            <th>List No</th>
            <th>Drawing No</th>
            <th>Vendor</th>
            <th>Type</th>
            <th>Part No</th>
            <th>Interval</th>
            <th>Due Date</th>
            <th>Issued By</th>
            <th>Certificate Number</th>
            <th>Specification</th>
            <th>Maintenance</th>
            <th>Approval Number</th>
            <th>Date Approval</th>
            <th>Place</th>
            <th>Date</th>
            <th>Validity</th>
            <th>Maker</th>
            <th>Image</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach ($part as $part)
            <tr>
                <td></td>
                <td>
                    @can('Exiting-Data-Edit')       
                    <a class="btn submit-btn editpart-btn" data-id="{{ $part->id }}" data-bs-toggle="modal" data-bs-target="#editpart" ><i class=" ti ti-edit ti-ms"></i></a>
                    @endcan
    
                    @can('Exiting-Data-Delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['part.destroy', $part->id],'style'=>'display:inline']) !!}
                        {{Form::button('<i class="ti ti-trash"></i>', ['type' =>'submit', 'class' => 'submit-btn'])}}
                        {!! Form::close() !!}
                    @endcan
                </td>
                <td>
                    {{ $part->component->unit->sub_group->group->main_group->code_main_group }}-
                    {{ $part->component->unit->sub_group->group->main_group->name }}
                </td>
                <td>
                    {{ $part->component->unit->sub_group->group->code_group }}-
                    {{ $part->component->unit->sub_group->group->name }}
                </td>
                <td>
                    {{ $part->component->unit->sub_group->code_sub_group }}-
                    {{ $part->component->unit->sub_group->name }}
                </td>
                <td>
                    {{ $part->component->unit->code_units }}-
                    {{ $part->component->unit->name }}
                </td>
                <td>
                    {{ $part->component->code_component }}-
                    {{ $part->component->name }}
                </td>
                <td>{{ $part->code_part }}</td>
                <td>{{ $part->name }}</td>
                <td>
                    {{ $part->component->unit->sub_group->group->main_group->code_main_group }}
                    {{ $part->component->unit->sub_group->group->code_group }}
                    {{ $part->component->unit->sub_group->code_sub_group }}-
                    {{ $part->component->unit->code_units }}-
                    {{ $part->component->code_component }}-
                    {{ $part->code_part }}-
                    {{ $part->name }}
                </td>
                <td>{{ $part->item_code }}</td>
                <td>{{ $part->list_no }}</td>
                <td>{{ $part->drawing_no }}</td>
                <td>{{ $part->vendor }}</td>
                <td>{{ $part->type }}</td>
                <td>{{ $part->serial }}</td>
                <td>{{ $part->interval }}</td>
                <td>{{ $part->end_job }}</td>
                <td>{{ $part->issue_by }}</td>
                <td>{{ $part->certificate_no }}</td>
                <td>{{ $part->specification_detail }}</td>
                <td>{{ $part->maintenance_detail }}</td>
                <td>{{ $part->number_approval }}</td>
                <td>{{ $part->date_approval }}</td>
                <td>{{ $part->pnd_place }}</td>
                <td>{{ $part->pnd_date }}</td>
                <td>{{ $part->validity }}</td>
                <td>{{ $part->maker }}</td>
                <td>{{ $part->image }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
<!--/ DataTable with Buttons -->

<!-- Extra Large Modal -->
<div class="modal fade" id="createpart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Unit</h5>
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
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="row g-3" onsubmit="return true" method="POST" action="{{ route('part.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Component Id</label>
                <select id="component_id" class="select2 form-select form-select-lg" data-allow-clear="true" name="component_id">
                    @foreach ($component as $component)
                    <option value="{{ $component->uuid }}">{{ $component->unit->sub_group->group->main_group->code_main_group }}{{ $component->unit->sub_group->group->code_group }}{{ $component->unit->sub_group->code_sub_group }}-{{ $component->unit->code_units }}-{{ $component->code_component }}-{{ $component->name }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-2">Code Part</label>
                <input type="text" id="form-repeater-1-2" class="form-control" placeholder="Format 000" name="code_part" />
            </div>
        </div>
            <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Name</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Name" name="name" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Item Code</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Item Code" name="item_code" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">List No</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="List No" name="list_no" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Drawing No</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Drawing" name="drawing_no" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Vendor</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Vendor" name="vendor" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Type</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Type" name="type" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Unit No</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Unit No" name="serial" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Issued By</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Issued By" name="issue_by" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Certificate</label>
                <input type="text" id="form-repeater-1-5" class="form-control" placeholder="Certificate" name="certificate_no" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Specification</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="specification_detail"></textarea>
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Maintenance</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="maintenance_detail"></textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Start</label>
                <input type="datetime-local" id="html5-datetime-local-input" class="form-control" id="html5-date-input" name="start_job" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">End</label>
                <input type="datetime-local" id="html5-datetime-local-input" class="form-control" id="html5-date-input" name="end_job" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Approval Number</label>
                <input type="text" id="form-repeater-1-5" class="form-control" name="number_approval" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Approval Date</label>
                <input type="date" id="form-repeater-1-5" class="form-control" id="html5-date-input" name="date_approval" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Place</label>
                <input type="text" id="form-repeater-1-5" class="form-control" name="pnd_place" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Date Place</label>
                <input type="date" id="form-repeater-1-5" class="form-control" id="html5-date-input" name="pnd_date" />  
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Validity</label>
                <input type="date" id="form-repeater-1-5" class="form-control" id="html5-date-input" name="validity" />
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Maker</label>
                      <input type="text" id="form-repeater-1-5" class="form-control" name="maker" />  
            </div>
            <div class="col mb-0">
                <label class="form-label" for="form-repeater-1-3">Upload Image</label>
                      <input type="file" id="form-repeater-1-5" class="form-control" id="formFileMultiple" name="image" /> 
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