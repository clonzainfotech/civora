<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

@php
    $data = !empty($html_page->description) ? $html_page->description : '';
@endphp
    {{htmlspecialchars_decode(stripslashes($data))}}
</body>
</html>