<!DOCTYPE html>
<html>
<head>
    <title>Guest Attendance</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #camera {
            margin-top: 20px;
        }
        #canvas {
            display: none;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>



