<x-admin-master>
    <div class="card">
        <div class="card-header">
            <h4>All Brands
                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary float-end">Add Brand</a>
            </h4>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!}
        </div>
    </div>
    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush
</x-admin-master>
