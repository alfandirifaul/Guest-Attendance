<!DOCTYPE html>
<html>
<head>
    <title>Guest Attendance</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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



