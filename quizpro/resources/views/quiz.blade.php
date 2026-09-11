<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizPro - Quiz</title>

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

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .quiz-header {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .quiz-header h1 {
            margin-bottom: 10px;
        }

        .timer {
            display: inline-block;
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 15px;
        }

        .question-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .question-card h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .option {
            display: block;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            cursor: pointer;
        }

        .option:hover {
            background: #f3f4f6;
        }

        .submit-button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-button:hover {
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
        </div>
    </nav>

    <div class="container">

        <div class="quiz-header">
            <h1>JavaScript Basics</h1>
            <p>Answer the following questions.</p>

            <div class="timer">
                Time Remaining: 10:00
            </div>
        </div>

        <div class="question-card">
            <h2>Question 1 of 10</h2>

            <p>Which keyword is used to declare a variable in JavaScript?</p>

            <label class="option">
                <input type="radio" name="question1">
                var
            </label>

            <label class="option">
                <input type="radio" name="question1">
                define
            </label>

            <label class="option">
                <input type="radio" name="question1">
                variable
            </label>

            <label class="option">
                <input type="radio" name="question1">
                declare
            </label>
        </div>

        <button class="submit-button">Submit Quiz</button>

    </div>

</body>
</html>