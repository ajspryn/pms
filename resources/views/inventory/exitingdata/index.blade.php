@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h6 class="text-muted">Inventory/Exiting Data</h6>
            <div class="nav-align-top mb-4">
              <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                  <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-main-group" aria-controls="navs-pills-justified-main-group" aria-selected="true"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Main Group</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-group" aria-controls="navs-pills-justified-group" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Group</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-sub-group" aria-controls="navs-pills-justified-sub-group" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Sub Group</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-unit" aria-controls="navs-pills-justified-unit" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Unit</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-component" aria-controls="navs-pills-justified-component" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Component</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-part" aria-controls="navs-pills-justified-part" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Part</button>
                </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane fade show active" id="navs-pills-justified-main-group" role="tabpanel">
                    @include('inventory.exitingdata.tabel.maingroup')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-group" role="tabpanel">
                    @include('inventory.exitingdata.tabel.group')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-sub-group" role="tabpanel">
                    @include('inventory.exitingdata.tabel.subgroup')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-unit" role="tabpanel">
                    @include('inventory.exitingdata.tabel.unit')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-component" role="tabpanel">
                    @include('inventory.exitingdata.tabel.component')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-part" role="tabpanel">
                    @include('inventory.exitingdata.tabel.part')
                </div>
            </div>
            </div>
          </div>
    </div>
</div>
@include('inventory.exitingdata.modal.editgroup')
@include('inventory.exitingdata.modal.editsubgroup')
@include('inventory.exitingdata.modal.editunit')
@include('inventory.exitingdata.modal.editcomponent')
@include('inventory.exitingdata.modal.editpart')

 {{-- Edit group --}}
<script>
  $(document).on("click", ".editgroup-btn", function() {
  let id = $(this).data("id");
  $.ajax({
    url: "/group/" + id + "/edit",
    type: "GET",
    dataType: "json",
    success: function(response) {
      $("#editgroup #main_group_id").val(response.main_group_id);
      $("#editgroup #code_group").val(response.code_group);
      $("#editgroup #name").val(response.name);
      $("#editgroup form").attr("action", "/group/" + response.id);
    },
    error: function(response) {
      console.log(response);
    }
  });
});
</script>
{{-- End Edit Group --}}

{{-- Edit SubGroup --}}
<script>
  $(document).on("click", ".editsubgroup-btn", function() {
  let id = $(this).data("id");
  $.ajax({
    url: "/subgroup/" + id + "/edit",
    type: "GET",
    dataType: "json",
    success: function(response) {
      $("#editsubgroup #group_id").val(response.group_id);
      $("#editsubgroup #code_sub_group").val(response.code_sub_group);
      $("#editsubgroup #name").val(response.name);
      $("#editsubgroup form").attr("action", "/subgroup/" + response.id);
    },
    error: function(response) {
      console.log(response);
    }
  });
});
</script>
{{-- End Edit SubGroup --}}

{{-- Edit Unit --}}
<script>
  $(document).on("click", ".editunit-btn", function() {
  let id = $(this).data("id");
  $.ajax({
    url: "/unit/" + id + "/edit",
    type: "GET",
    dataType: "json",
    success: function(response) {
      $("#editunit #sub_group_id").val(response.sub_group_id);
      $("#editunit #code_units").val(response.code_units);
      $("#editunit #name").val(response.name);
      $("#editunit #item_code").val(response.item_code);
      $("#editunit #list_no").val(response.list_no);
      $("#editunit #drawing_no").val(response.drawing_no);
      $("#editunit #vendor").val(response.vendor);
      $("#editunit #Type").val(response.Type);
      $("#editunit #serial").val(response.serial);
      $("#editunit #issue_by").val(response.issue_by);
      $("#editunit #certificate_no").val(response.certificate_no);
      $("#editunit #specification_detail").val(response.specification_detail);
      $("#editunit #maintenance_detail").val(response.maintenance_detail);
      $("#editunit #start_job").val(response.start_job);
      $("#editunit #end_job").val(response.end_job);
      $("#editunit #number_approval").val(response.number_approval);
      $("#editunit #date_approval").val(response.date_approval);
      $("#editunit #pnd_place").val(response.pnd_place);
      $("#editunit #pnd_date").val(response.pnd_date);
      $("#editunit #validity").val(response.validity);
      $("#editunit #maker").val(response.maker);
      $("#editunit form").attr("action", "/unit/" + response.id);
    },
    error: function(response) {
      console.log(response);
    }
  });
});
</script>
{{-- End Edit Unit --}}

{{-- Edit component --}}
<script>
  $(document).on("click", ".editcomponent-btn", function() {
  let id = $(this).data("id");
  $.ajax({
    url: "/component/" + id + "/edit",
    type: "GET",
    dataType: "json",
    success: function(response) {
      $("#editcomponent #unit_id").val(response.unit_id);
      $("#editcomponent #code_component").val(response.code_component);
      $("#editcomponent #name").val(response.name);
      $("#editcomponent #item_code").val(response.item_code);
      $("#editcomponent #list_no").val(response.list_no);
      $("#editcomponent #drawing_no").val(response.drawing_no);
      $("#editcomponent #vendor").val(response.vendor);
      $("#editcomponent #Type").val(response.Type);
      $("#editcomponent #serial").val(response.serial);
      $("#editcomponent #issue_by").val(response.issue_by);
      $("#editcomponent #certificate_no").val(response.certificate_no);
      $("#editcomponent #specification_detail").val(response.specification_detail);
      $("#editcomponent #maintenance_detail").val(response.maintenance_detail);
      $("#editcomponent #start_job").val(response.start_job);
      $("#editcomponent #end_job").val(response.end_job);
      $("#editcomponent #number_approval").val(response.number_approval);
      $("#editcomponent #date_approval").val(response.date_approval);
      $("#editcomponent #pnd_place").val(response.pnd_place);
      $("#editcomponent #pnd_date").val(response.pnd_date);
      $("#editcomponent #validity").val(response.validity);
      $("#editcomponent #maker").val(response.maker);
      $("#editcomponent form").attr("action", "/component/" + response.id);
    },
    error: function(response) {
      console.log(response);
    }
  });
});
</script>
{{-- End Edit component --}}

{{-- Edit part --}}
<script>
  $(document).on("click", ".editpart-btn", function() {
  let id = $(this).data("id");
  $.ajax({
    url: "/part/" + id + "/edit",
    type: "GET",
    dataType: "json",
    success: function(response) {
      $("#editpart #component_id").val(response.component_id);
      $("#editpart #code_part").val(response.code_part);
      $("#editpart #name").val(response.name);
      $("#editpart #item_code").val(response.item_code);
      $("#editpart #list_no").val(response.list_no);
      $("#editpart #drawing_no").val(response.drawing_no);
      $("#editpart #vendor").val(response.vendor);
      $("#editpart #Type").val(response.Type);
      $("#editpart #serial").val(response.serial);
      $("#editpart #issue_by").val(response.issue_by);
      $("#editpart #certificate_no").val(response.certificate_no);
      $("#editpart #specification_detail").val(response.specification_detail);
      $("#editpart #maintenance_detail").val(response.maintenance_detail);
      $("#editpart #start_job").val(response.start_job);
      $("#editpart #end_job").val(response.end_job);
      $("#editpart #number_approval").val(response.number_approval);
      $("#editpart #date_approval").val(response.date_approval);
      $("#editpart #pnd_place").val(response.pnd_place);
      $("#editpart #pnd_date").val(response.pnd_date);
      $("#editpart #validity").val(response.validity);
      $("#editpart #maker").val(response.maker);
      $("#editpart form").attr("action", "/part/" + response.id);
    },
    error: function(response) {
      console.log(response);
    }
  });
});
</script>
{{-- End Edit part --}}
<script>
  var searchInput = document.getElementById('search-maingroup');
  searchInput.addEventListener('input', function() {
searchTable(searchInput.value);
});

  function searchTable(searchValue) {
  var table = document.getElementById('table-id');
  var rows = table.getElementsByTagName('tr');

for (var i = 1; i < rows.length; i++) {
  var cells = rows[i].getElementsByTagName('td');
  var found = false;

  for (var j = 0; j < cells.length; j++) {
    var cellValue = cells[j].textContent || cells[j].innerText;

    if (cellValue.toUpperCase().indexOf(searchValue.toUpperCase()) > -1) {
      found = true;
      break;
    }
  }

  if (found) {
    rows[i].style.display = '';
  } else {
    rows[i].style.display = 'none';
  }
}
}
</script>
@endsection
