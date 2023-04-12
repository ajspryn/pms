@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h6 class="text-muted">Inventory/Inventory Stock</h6>
            <div class="nav-align-top mb-4">
              <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                  <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-newstock" aria-controls="navs-pills-justified-main-group" aria-selected="true"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> New Stock</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-usedstock" aria-controls="navs-pills-justified-group" aria-selected="false"><i class="tf-icons ti ti-table-filled ti-xs me-1"></i> Used Stock</button>
                </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane fade show active" id="navs-pills-justified-newstock" role="tabpanel">
                    @include('inventory.stock.tabel.newstock')
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-usedstock" role="tabpanel">
                  @include('inventory.stock.tabel.usedstock')
                </div>
                </div>
            </div>
            </div>
          </div>
    </div>
    @include('inventory.stock.modal.index')
    @include('inventory.stock.modal.editnewstock')
@endsection
