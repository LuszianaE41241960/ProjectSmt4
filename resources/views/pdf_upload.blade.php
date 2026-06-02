<!DOCTYPE html>
<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dropzone PDF Upload</h1><br>

            <form action="{{ route('pdf.store') }}"
                  method="post"
                  class="dropzone"
                  id="pdf-upload"
                  enctype="multipart/form-data">
                @csrf
            </form>

            <br>
            <button type="button" id="button" class="btn btn-primary">
                Upload
            </button>

        </div>
    </div>
</div>

<script type="text/javascript">
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#pdf-upload", {
        maxFilesize: 2, // MB
        acceptedFiles: ".pdf",
        addRemoveLinks: true,
        autoProcessQueue: false,

        init: function () {

            $("#button").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on("sending", function (file, xhr, formData) {
                // tambahan data kalau perlu
            });

            this.on("success", function (file, response) {
                alert("Upload berhasil!");
            });

            this.on("error", function (file, response) {
                alert("Upload gagal!");
            });
        }
    });
</script>

</body>
</html>
