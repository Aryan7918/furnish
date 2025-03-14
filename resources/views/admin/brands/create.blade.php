<form id="addBrandForm" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="col-12 mb-2">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
        </div>
    </div>
    <div class="modal-footer mx-0">
        <button type="submit" id="addBrandSave" class="btn btn-primary">Submit</button>
    </div>
</form>
