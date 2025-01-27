@props(['page_title'=> 'Log In', 'auth_user'=>''])

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite(['resources/css/style.css'])
    <title>{{ $page_title }} | noobmaster</title>
</head>
<body>
    {{ $slot }}
</body>
</html>