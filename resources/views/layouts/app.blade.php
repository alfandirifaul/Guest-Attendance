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

<script>

    //***************** S: currently time
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
        };

        // Format date and time
        const formattedDate = new Intl.DateTimeFormat('en-ID', options).format(now);
        document.getElementById('current-time').textContent = `${formattedDate}`;
    }
    //***************** E: currently time

    setInterval(updateTime, 1000);
    updateTime();

</script>
</html>


