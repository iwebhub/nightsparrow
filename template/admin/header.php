
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- aww -->
  <link href="NightsparrowMiniLogo.png" rel="shortcut icon">
  <title><?php echo $pageTitle; ?> -- Nightsparrow</title>

  <link rel="stylesheet" href="../template/admin/css/main.css">
  <meta name="viewport" content="initial-scale=1">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Redactor is here -->
  <link rel="stylesheet" href="../template/admin/redactor-js/redactor/redactor.css"/>
  <meta name="theme-color" content="#262626">


  <script src="../template/admin/redactor-js/redactor/redactor.min.js"></script>
  <script src="../template/common/js/momloc.js"></script>


  <script type="text/javascript">
    $(document).ready(
      function () {
        $('#content').redactor({
          imageUpload: 'upload.php?upload=photo',
          fileUpload: 'upload.php?upload=file',
          fixed: true
        });
      }
    );

  </script>

</head>
<body>




