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

    //***************** S: greeting
    const greetings = {
        en: {
            morning: "Good Morning",
            afternoon: "Good Afternoon",
            evening: "Good Evening"
        },
        id: {
            morning: "Selamat Pagi",
            afternoon: "Selamat Siang",
            evening: "Selamat Malam"
        },
        fr: {
            morning: "Bonjour",
            afternoon: "Bon Après-midi",
            evening: "Bonsoir"
        },
        de: {
            morning: "Guten Morgen",
            afternoon: "Guten Tag",
            evening: "Guten Abend"
        },
        jp: {
            morning: "おはようございます",
            afternoon: "こんにちは",
            evening: "こんばんは"
        },
        kr: {
            morning: "좋은 아침",
            afternoon: "안녕하세요",
            evening: "안녕하세요"
        },
        zh: {
            morning: "早上好",
            afternoon: "下午好",
            evening: "晚上好)"
        },

    };

    const languages = Object.keys(greetings);

    function greetingAnimation(elementId, text) {
        const element = document.getElementById(elementId);
        element.textContent = "";
        let index = 0;

        const interval = setInterval(() => {
            if (index < text.length) {
                element.textContent += text[index];
                index++;
            } else {
                clearInterval(interval);
            }
        }, 300); // interval to set speed each language
    }

    function getGreeting(language) {
        const hour = new Date().getHours();
        if (hour < 12) {
            return greetings[language].morning;
        } else if (hour < 17) {
            return greetings[language].afternoon;
        } else {
            return greetings[language].evening;
        }
    }

    function startAlternatingGreeting() {

        let currentLanguageIndex = 0;

        function updateGreeting() {
            const currentLanguage = languages[currentLanguageIndex];
            const greeting = getGreeting(currentLanguage);
            greetingAnimation("greeting", greeting);

            currentLanguageIndex = (currentLanguageIndex + 1) % languages.length;
        }
        updateGreeting();
        setInterval(updateGreeting, 10000); // interval to change every language
    }

    //***************** E: greeting

    startAlternatingGreeting();
    setInterval(updateTime, 1000);
    updateTime();

</script>
</html>



