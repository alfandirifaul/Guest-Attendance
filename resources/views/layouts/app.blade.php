<!DOCTYPE html>
<html>
<head>
    <title>Guest Attendance</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@yield('content')
</body>

<script>

    // ******************************** BURGER MENU ********************************
    const sidebar = document.getElementById('sidebar');
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const hamburgerBtnHide = document.getElementById('sidebar-hide');

    const homeHideBtn = document.getElementById('home-hide');
    const aboutHideBtn = document.getElementById('about-hide');

    hamburgerBtn.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-full');
        sidebar.classList.add('-translate-x-0');

        homeHideBtn.classList.add('hidden');
        aboutHideBtn.classList.add('hidden');
    });

    hamburgerBtnHide.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-0');
        sidebar.classList.add('translate-x-full');
        homeHideBtn.classList.remove('hidden');
        aboutHideBtn.classList.remove('hidden');
    });
    // ******************************** BURGER MENU ********************************

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


