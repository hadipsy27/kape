<form action="{{url('projects/{id}/files')}}" enctype="multipart/form-data" method="POST">
  <div class="row">
    <div class="col-md-4">
      <input type="file" name="files">
    </div>
    <div class="col-md-4">
      <button type="submit" class="btn btn-info">Upload</button>
    </div>
  </div>
</form>