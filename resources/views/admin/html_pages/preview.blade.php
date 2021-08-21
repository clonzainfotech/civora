<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

@php
    $data = !empty($html_page->description) ? $html_page->description : '';
    echo htmlspecialchars_decode(stripslashes($data));
@endphp
</body>
</html>