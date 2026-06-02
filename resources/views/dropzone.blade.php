<!DOCTYPE html>
<html>
<head>
    <title>Dropzone Image Upload in Laravel</title>

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Dropzone CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dropzone Image Upload in Laravel</h1>
            <br>

            <form action="{{ route('dropzone.store') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="dropzone"
                  id="image-upload">
                @csrf

                <div class="dz-message">
                    <h3>Klik atau drag file ke sini</h3>
                </div>
            </form>

            <br>
            <button type="button" id="uploadBtn" class="btn btn-primary">
                Upload
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">
    Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#image-upload", {
        url: "{{ route('dropzone.store') }}",
        autoProcessQueue: true,
        uploadMultiple: false, // ❌ ubah ini
        parallelUploads: 1,
        maxFiles: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
    });


    document.getElementById("uploadBtn").addEventListener("click", function () {
        myDropzone.processQueue();
    });

    myDropzone.on("success", function (file, response) {
    alert("Upload berhasil: " + response.success);
    });


    myDropzone.on("error", function (file, errorMessage) {
        console.log("Upload error:", errorMessage);
    });
</script>

</body>
</html>
