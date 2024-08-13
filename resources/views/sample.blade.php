<form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" multiple>
    <button type="submit">Upload</button>
</form>
