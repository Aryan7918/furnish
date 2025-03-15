<form id="editBrandForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}">
            <div class="text-danger errorClass" id="nameError"></div>
        </div>
        <div class="col-12 mb-2">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control dropify"
                data-default-file="{{ $brand->logo }}" data-show-remove="false" value="">
            <div class="text-danger errorClass" id="nameError"></div>
        </div>
    </div>
    <div class="modal-footer mx-0">
        <button type="submit" id="editBrandSave" data-id="{{ $brand->id }}" class="btn btn-primary">Update</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
