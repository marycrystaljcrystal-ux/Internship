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