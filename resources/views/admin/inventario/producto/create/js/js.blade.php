<script>
  $('#categorias').select2();

  $('#marca').select2();

  $('#unidad').select2();

  $('#comboBoxColor').select2();

  $("#imagenes").fileinput({
    showUpload: false,
    layoutTemplates: {actionUpload: ''}, // disable thumbnail updating
    maxFileCount: 3,
    language: "es",
    theme: "fa",
    uploadUrl: "/file-upload-batch/2",
    browseLabel: "Escojer imagenes",
    allowedFileTypes: ["image"],
    maxImageWidth: 242,
    maxImageHeight: 200,
    maxFileSize: 400, //400KB
    resizePreference: 'height',
    resizeImage: true
  });
</script>