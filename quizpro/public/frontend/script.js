let score = 0;
let totalQuestions = 0;
let selectedQuizId = null;
let quizSubmitted = false;

// ==========================================

// Week 1 - Day 3: JavaScript ES6+

// ==========================================


// 1. Object Destructuring + Template Literal

// ==========================================

const student = {
    name: "Mary",
    course: "Full Stack Development",
    marks: 85
};

const { name, course, marks } = student;

const studentInfo = `${name} is studying ${course} and scored ${marks} marks.`;

console.log(studentInfo);


// 2. Array Destructuring
// ==========================================

const subjects = ["JavaScript", "HTML", "CSS", "Laravel"];

const [firstSubject, secondSubject, ...remainingSubjects] = subjects;

console.log(`First subject: ${firstSubject}`);
console.log(`Second subject: ${secondSubject}`);
console.log("Remaining subjects:", remainingSubjects);


// 3. filter(), map(), reduce()
// ==========================================

const students = [
    { name: "Mary", marks: 85 },
    { name: "Anu", marks: 72 },
    { name: "John", marks: 45 },
    { name: "Priya", marks: 90 },
    { name: "David", marks: 58 }
];


// filter() - find students who passed
const passedStudents = students.filter(
    student => student.marks >= 50
);

console.log("Passed students:", passedStudents);


// map() - get only student names
const studentNames = students.map(
    student => student.name
);

console.log("Student names:", studentNames);


// reduce() - calculate total marks
const totalMarks = students.reduce(
    (total, student) => total + student.marks,
    0
);

console.log(`Total marks: ${totalMarks}`);


// Calculate average marks
const averageMarks = totalMarks / students.length;

console.log(`Average marks: ${averageMarks.toFixed(2)}`);


// 4. Interactive Component using Event Listener
// ==========================================

const button = document.querySelector("#showStudents");
const output = document.querySelector("#output");

button.addEventListener("click", () => {

    output.innerHTML = "";

    passedStudents.forEach(({ name, marks }) => {

        const studentElement = document.createElement("p");

        studentElement.textContent =
            `${name} scored ${marks} marks`;

        output.appendChild(studentElement);
    });

});
// ES6+ Arrow Function for Result Message
const getResultMessage = ({ name, marks }) =>
    `${name} has ${marks >= 60 ? "passed" : "not passed"} the assessment.`;

console.log(getResultMessage(student));













// ==========================================
// Display Quizzes from Laravel API
// ==========================================

fetch("/api/quizzes")
    .then(response => {
        if (!response.ok) {
            throw new Error("Failed to load quizzes");
        }

        return response.json();
    })
    .then(quizzes => {

        const quizList = document.querySelector("#quiz-list");

        if (quizzes.length === 0) {
            quizList.innerHTML = "<p>No quizzes available.</p>";
            return;
        }

        quizList.innerHTML = "";

        quizzes.forEach(quiz => {

            const quizCard = document.createElement("article");

            quizCard.className = "card";

            quizCard.innerHTML = `
                <h3>${quiz.title}</h3>
                <p>${quiz.description ?? "No description available."}</p>
                <p>Duration: ${quiz.duration_minutes} minutes</p>
                <button data-quiz-id="${quiz.id}" data-duration="${quiz.duration_minutes}">Start Quiz</button>
            `;

            quizList.appendChild(quizCard);
        });
    })
    .catch(error => {

        const quizList = document.querySelector("#quiz-list");

        quizList.innerHTML =
            "<p>Unable to load quizzes. Please try again.</p>";

        console.error("API Error:", error);
    });










// ==========================================
// Start Quiz and Display Questions
// ==========================================

document.addEventListener("click", function (event) {

    if (event.target.textContent === "Start Quiz") {

        const button = event.target;

        selectedQuizId = Number(button.dataset.quizId);

        const duration = Number(button.dataset.duration);

        score = 0;
        totalQuestions = 0;
        quizSubmitted = false;

        document.querySelector("#score-result").textContent = "Score: 0 / 0";

        document.querySelector("#review-result").innerHTML = "";

        startTimer(duration);
        fetch("/api/questions")
            .then(response => {

                if (!response.ok) {
                    throw new Error("Failed to load questions");
                }

                return response.json();

            })
            .then(questions => {

                const quizList = document.querySelector("#quiz-list");

                // Only show questions belonging to the selected quiz
                const quizQuestions = questions.filter(
                    question => Number(question.quiz_id) === selectedQuizId
                );

                totalQuestions = quizQuestions.length;

                if (quizQuestions.length === 0) {
                    quizList.innerHTML = "<p>No questions available for this quiz.</p>";
                    return;
                }

                quizList.innerHTML = "";

                quizQuestions.forEach((question, index) => {

                    const questionCard = document.createElement("article");

                    questionCard.className = "card";

                    questionCard.innerHTML = `
                <h3>Question ${index + 1}</h3>

                <p>${question.question_text}</p>

                <label>
                    <input type="radio" name="question_${question.id}" value="A">
                    ${question.option_a}
                </label>

                <br>

                <label>
                    <input type="radio" name="question_${question.id}" value="B">
                    ${question.option_b}
                </label>

                <br>

                <label>
                    <input type="radio" name="question_${question.id}" value="C">
                    ${question.option_c}
                </label>

                <br>

                <label>
                    <input type="radio" name="question_${question.id}" value="D">
                    ${question.option_d}
                </label>

                <br><br>

                <button class="submit-answer" data-question-id="${question.id}">
                    Submit Answer
                </button>
            `;

                    quizList.appendChild(questionCard);

                });

            })
            .catch(error => {

                const quizList = document.querySelector("#quiz-list");

                quizList.innerHTML =
                    "<p>Unable to load questions. Please try again.</p>";

                console.error("Question API Error:", error);

            });
                }

});




        // ==========================================
        // Submit Answer + Save Final Result
        // ==========================================

        document.addEventListener("click", async function (event) {

            if (!event.target.classList.contains("submit-answer")) {
                return;
            }

            if (quizSubmitted) {
                return;
            }

            const button = event.target;
            const questionId = button.dataset.questionId;

            // Prevent submitting the same question twice
            if (button.dataset.submitted === "true") {
                return;
            }

            const selectedOption = document.querySelector(
                `input[name="question_${questionId}"]:checked`
            );

            if (!selectedOption) {
                alert("Please select an answer.");
                return;
            }

            const selectedAnswer = selectedOption.value;

            try {

                const questionResponse =
                    await fetch(`/api/questions/${questionId}`);

                if (!questionResponse.ok) {
                    throw new Error("Unable to check the answer.");
                }

                const question = await questionResponse.json();

                if (selectedAnswer === question.correct_answer) {

                    score++;

                    alert("Correct!");

                } else {

                    alert(
                        `Incorrect. The correct answer is ${question.correct_answer}.`
                    );
                }

                // Mark this question as submitted
                button.dataset.submitted = "true";
                button.disabled = true;

                // Disable the answers for this question
                document
                    .querySelectorAll(`input[name="question_${questionId}"]`)
                    .forEach(input => {
                        input.disabled = true;
                    });

                // Update score
                const scoreResult = document.querySelector("#score-result");

                scoreResult.textContent =
                    `Score: ${score} / ${totalQuestions}`;

                // Update review
                const reviewResult = document.querySelector("#review-result");

                reviewResult.innerHTML += `
            <div>
                <h3>Question ${questionId}</h3>
                <p>Your answer: ${selectedAnswer}</p>
                <p>Correct answer: ${question.correct_answer}</p>
            </div>
        `;

                // Check if all questions have been answered
                const submittedButtons =
                    document.querySelectorAll(
                        '.submit-answer[data-submitted="true"]'
                    );

                if (submittedButtons.length === totalQuestions) {
                    await submitQuizResult();
                }

            } catch (error) {

                console.error("Answer Error:", error);

                alert("Unable to check the answer. Please try again.");
            }

        });


        // ==========================================
        // Save Final Quiz Result
        // ==========================================

        async function submitQuizResult() {

            if (quizSubmitted) {
                return;
            }

            quizSubmitted = true;

            clearInterval(timerInterval);

            try {

                const response = await fetch("/api/results", {

                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },

                    body: JSON.stringify({
                        quiz_id: selectedQuizId,
                        student_name: "Mary",
                        score: score,
                        total_questions: totalQuestions
                    })

                });

                if (!response.ok) {
                    throw new Error("Failed to save quiz result.");
                }

                const result = await response.json();

                console.log("Quiz result saved:", result);

                alert("Quiz completed! Your result has been saved.");

            } catch (error) {

                console.error("Result API Error:", error);

                quizSubmitted = false;

                alert(
                    "Your score was calculated, but the result could not be saved."
                );
            }
        }




        // ==========================================
        // Quiz Timer
        // ==========================================

        let quizTime = 10 * 60;
        let timerInterval;

        function startTimer(durationMinutes = 10) {

            const timerDisplay = document.querySelector("#timer");

            clearInterval(timerInterval);

            quizTime = durationMinutes * 60;

            timerDisplay.textContent =
                `Time Remaining: ${durationMinutes}:00`;

            timerInterval = setInterval(async () => {

                const minutes = Math.floor(quizTime / 60);
                const seconds = quizTime % 60;

                timerDisplay.textContent =
                    `Time Remaining: ${minutes}:${seconds
                        .toString()
                        .padStart(2, "0")}`;

                if (quizTime <= 0) {

                    clearInterval(timerInterval);

                    timerDisplay.textContent = "Time's up!";

                    alert("Time is up! Your quiz will be submitted.");

                    await submitQuizResult();

                    return;
                }

                quizTime--;

            }, 1000);
        }