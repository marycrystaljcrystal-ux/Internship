<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizPro - Available Quizzes</title>

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

        .container {
            padding: 50px;
        }

        .container h1 {
            margin-bottom: 10px;
        }

        .intro {
            color: #666;
            margin-bottom: 30px;
        }

        .quiz-list {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .quiz-card {
            background: white;
            width: 300px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .quiz-card h2 {
            margin-bottom: 12px;
        }

        .quiz-card p {
            color: #666;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            margin-top: 15px;
            background: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
        }

        .button:hover {
            background: #1d4ed8;
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

    <div class="container">

        <h1>Available Quizzes</h1>

        <p class="intro">
            Choose a quiz and test your knowledge.
        </p>

        <div class="quiz-list">

            <div class="quiz-card">
                <h2>JavaScript Basics</h2>
                <p>Test your knowledge of JavaScript fundamentals.</p>
                <p><strong>Questions:</strong> 10</p>
                <p><strong>Time:</strong> 10 minutes</p>

                <a href="/quiz/1" class="button">Start Quiz</a>
            </div>

            <div class="quiz-card">
                <h2>HTML & CSS</h2>
                <p>Test your understanding of web development basics.</p>
                <p><strong>Questions:</strong> 10</p>
                <p><strong>Time:</strong> 10 minutes</p>

                <a href="/quiz/1" class="button">Start Quiz</a>
            </div>

            <div class="quiz-card">
                <h2>General Knowledge</h2>
                <p>Challenge yourself with general knowledge questions.</p>
                <p><strong>Questions:</strong> 10</p>
                <p><strong>Time:</strong> 10 minutes</p>

                <a href="/quiz/1" class="button">Start Quiz</a>
            </div>

        </div>

    </div>

</body>
</html>