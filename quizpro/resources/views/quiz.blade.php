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

    nav a:hover {
        text-decoration: underline;
    }

    .container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .page-header {
        background: white;
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin-bottom: 10px;
    }

    .page-header p {
        color: #555;
    }

    #quiz-list {
        display: grid;
        gap: 20px;
    }

    .quiz-card {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .quiz-card h2 {
        margin-bottom: 10px;
    }

    .quiz-card p {
        margin-bottom: 10px;
        color: #555;
    }

    .quiz-info {
        margin: 15px 0;
        font-weight: bold;
    }

    .start-button {
        display: inline-block;
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 12px 22px;
        border-radius: 6px;
    }

    .start-button:hover {
        background: #1d4ed8;
    }

    .message {
        background: white;
        padding: 25px;
        border-radius: 10px;
        color: #555;
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
        <a href="/quiz/1">Take Quiz</a>
    </div>
</nav>

<div class="container">

    <div class="page-header">
        <h1>Available Quizzes</h1>
        <p>Choose a quiz and test your knowledge.</p>
    </div>

    <div id="quiz-list">
        <div class="message">
            Loading quizzes...
        </div>
    </div>

</div>

<script>
    async function loadQuizzes() {
        const quizList = document.querySelector("#quiz-list");

        try {
            const response = await fetch("/api/quizzes");

            if (!response.ok) {
                throw new Error("Failed to load quizzes");
            }

            const quizzes = await response.json();

            if (quizzes.length === 0) {
                quizList.innerHTML = `
                    <div class="message">
                        <p>No quizzes are available right now.</p>
                    </div>
                `;
                return;
            }

            quizList.innerHTML = "";

            quizzes.forEach(quiz => {
                const quizCard = document.createElement("div");

                quizCard.className = "quiz-card";

                quizCard.innerHTML = `
                    <h2>${quiz.title}</h2>

                    <p>
                        ${quiz.description ?? "No description available."}
                    </p>

                    <div class="quiz-info">
                        Time: ${quiz.duration_minutes} minutes
                    </div>

                    <a
                        class="start-button"
                        href="/quiz/${quiz.id}"
                    >
                        Start Quiz
                    </a>
                `;

                quizList.appendChild(quizCard);
            });

        } catch (error) {
            console.error("Quiz Loading Error:", error);

            quizList.innerHTML = `
                <div class="message">
                    <p>
                        Unable to load quizzes. Please try again later.
                    </p>
                </div>
            `;
        }
    }

    loadQuizzes();
</script>

</body>
</html>
