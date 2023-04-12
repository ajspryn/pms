<div class="demo-inline-spacing">
    
</div>
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
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Item Code</th>
            <th>Category Name</th>
            <th>New Stock</th>
            <th>Min qyt</th>
            <th>Difference</th>
            <th>Status</th>
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
                <td>{{ $category->stock }}</td>
                <td>{{ $category->minqty }}</td>
                <td>{{ $category->stock }}</td>
                <td>
                    @if ($category->stock == 0)
                        {{ 'Stock Kurang' }}
                    @else
                        {{ 'Stock Aman' }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    