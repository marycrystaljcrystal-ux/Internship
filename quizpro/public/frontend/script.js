let score = 0;
let totalQuestions = 0;

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
                <button>Start Quiz</button>
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
        startTimer();
        fetch("/api/questions")
            .then(response => {

                if (!response.ok) {
                    throw new Error("Failed to load questions");
                }

                return response.json();

            })
            .then(questions => {

                const quizList = document.querySelector("#quiz-list");
                totalQuestions = questions.length;
                if (questions.length === 0) {
                    quizList.innerHTML = "<p>No questions available.</p>";
                    return;
                }

                quizList.innerHTML = "";

                questions.forEach((question, index) => {

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
// Submit Answer
// ==========================================

document.addEventListener("click", async function (event) {

    if (event.target.classList.contains("submit-answer")) {

        const questionId = event.target.dataset.questionId;

        const selectedOption = document.querySelector(
            `input[name="question_${questionId}"]:checked`
        );

        if (!selectedOption) {
            alert("Please select an answer.");
            return;
        }
        const selectedAnswer = selectedOption.value;

        const questionResponse = await fetch(`/api/questions/${questionId}`);

if (!questionResponse.ok) {
    alert("Unable to check the answer.");
    return;
}

const question = await questionResponse.json();

if (selectedOption.value === question.correct_answer) {

    score++;

    alert("Correct!");

} else {

    alert(`Incorrect. The correct answer is ${question.correct_answer}.`);

}
const scoreResult = document.querySelector("#score-result");

scoreResult.textContent =
    `Score: ${score} / ${totalQuestions}`;
    
    const reviewResult = document.querySelector("#review-result");

reviewResult.innerHTML = `
    <h3>Review Answer</h3>
    <p>Your answer: ${selectedAnswer}</p>
    <p>Correct answer: ${question.correct_answer}</p>
`;
    }

});







// ==========================================
// Quiz Timer
// ==========================================

let quizTime = 10 * 60;
let timerInterval;

function startTimer() {

    const timerDisplay = document.querySelector("#timer");

    clearInterval(timerInterval);

    timerInterval = setInterval(() => {

        const minutes = Math.floor(quizTime / 60);
        const seconds = quizTime % 60;

        timerDisplay.textContent =
            `Time Remaining: ${minutes}:${seconds.toString().padStart(2, "0")}`;

        if (quizTime <= 0) {

            clearInterval(timerInterval);

            timerDisplay.textContent = "Time's up!";

            alert("Time is up! Your quiz will be submitted.");

            // Automatically submit all unanswered questions
            document.querySelectorAll(".submit-answer").forEach(button => {
                button.click();
            });

            return;
        }

        quizTime--;

    }, 1000);
}