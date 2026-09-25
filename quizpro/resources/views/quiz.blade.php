<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
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

    .card {
        background: white;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .card h3 {
        margin-bottom: 15px;
    }

    .card label {
        display: block;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 6px;
        cursor: pointer;
    }

    .card label:hover {
        background: #f3f4f6;
    }

    button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background: #1d4ed8;
    }

    #score-result,
    #review-result {
        margin-top: 20px;
    }
</style>
```

</head>

<body>

```
<nav>
    <div class="logo">QuizPro</div>

    <div>
        <a href="/">Dashboard</a>
        <a href="/quizzes">Quizzes</a>
    </div>
</nav>

<div class="container">

    <div class="quiz-header">
        <h1>QuizPro Quiz</h1>
        <p>Select a quiz below to begin.</p>

        <div id="timer" class="timer">
            Time Remaining: 10:00
        </div>
    </div>

    <div id="quiz-list">
        <p>Loading quizzes...</p>
    </div>

    <div id="score-result">
        Score: 0 / 0
    </div>

    <div id="review-result"></div>

</div>

<script src="/frontend/script.js"></script>
```

</body>
</html>
