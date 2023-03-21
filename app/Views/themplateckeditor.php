<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="<?= base_url()?>/summernote/summernote.min.css" rel="stylesheet">
  <script src="<?= base_url()?>/summernote/summernote.min.js"></script>
</head>
<body>
<?= form_open_multipart('request/formsurat/savetext') ?> 
  <textarea id="summernote" name="editordata"></textarea>
  <button type="submit" class="btn btn-success">Save New Data Event</button>
  <?= form_close(); ?>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
</body>
</html>