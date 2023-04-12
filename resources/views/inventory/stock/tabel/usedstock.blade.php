<!-- DataTable with Buttons -->
<div class="card-datatable table-responsive pt-0">
    <table class="datatables-basic table">
        <thead>
            <tr>
                <th><button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#newstock">
                    <span class="ti-xs ti ti-plus me-1"></span>Add Stock
                </button></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <tr>
            <th></th>
            <th></th>
            <th>Action</th>
            <th>Item Code</th>
            <th>Category</th>
            <th>Used Stock</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($category as $category)
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="button" class="btn edit-btn" data-id="{{ $category->id }}" ><i class=" ti ti-edit ti-ms"></i></button>
                        {!! Form::open(['method' => 'DELETE','route' => ['newstock.destroy', $category->id],'style'=>'display:inline']) !!}
                        {{Form::button('<i class="ti ti-trash"></i>', ['type' =>'submit', 'class' => 'submit-btn'])}}
                        {!! Form::close() !!}
                </td>
                <td>{{ $category->code_category }}</td>
                <td>{{ $category->name_category }}</td>
                <td>{{ $category->used_stock }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>