<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="text-align: justify; padding:20px;">

@php
    $data = !empty($html_page->description) ? $html_page->description : '';
    echo htmlspecialchars_decode(stripslashes($data));
@endphp
</body>
</html>