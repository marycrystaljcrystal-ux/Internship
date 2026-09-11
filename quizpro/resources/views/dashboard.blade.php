<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizPro - Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #222;
        }

        nav {
            background: #1f2937;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            text-align: center;
            padding: 70px 20px;
            background: white;
        }

        .hero h1 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .section {
            padding: 40px 50px;
        }

        .section h2 {
            margin-bottom: 25px;
        }

        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 250px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">QuizPro</div>

        <div>
            <a href="/">Dashboard</a>
            <a href="/quizzes">Quizzes</a>
            <a href="/quiz/1">Take Quiz</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Welcome to QuizPro</h1>

        <p>Test your knowledge, improve your skills, and track your scores.</p>

        <a href="/quizzes" class="button">Browse Quizzes</a>
    </section>

    <section class="section">
        <h2>Quiz Platform</h2>

        <div class="cards">

            <div class="card">
                <h3>Timed Quizzes</h3>
                <p>Answer questions within the given time limit.</p>
            </div>

            <div class="card">
                <h3>Instant Scores</h3>
                <p>View your quiz score after completing the quiz.</p>
            </div>

            <div class="card">
                <h3>Leaderboard</h3>
                <p>Compare your performance with other students.</p>
            </div>

        </div>
    </section>

</body>
</html>