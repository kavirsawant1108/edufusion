<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .auth-container {
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3c096c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #5a189a;
        }
        .info-text {
            margin: 20px 0;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <h2>Authentication</h2>
    <div id="loginForm" class="form-container">
        <form id="studentLoginForm">
            <input type="text" id="fullName" placeholder="Full Name" required><br><br>
            <input type="text" id="enrollmentNo" placeholder="Enrollment No" required><br><br>
            <input type="text" id="branch" placeholder="Branch" required><br><br>
            <input type="number" id="year" placeholder="Year" required><br><br>
            <input type="text" id="currentSem" placeholder="Current Sem/Year" required><br><br>
            <button type="button" onclick="loginStudent()">Submit</button>
        </form>
        <div class="info-text">
            <p>If you are already an authenticated user, <a href="login.html">Login Here</a>.</p>
        </div>
    </div>
</div>

<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.1.0/firebase-app.js";
    import { getDatabase, ref, child, get } from "https://www.gstatic.com/firebasejs/11.1.0/firebase-database.js";

    const firebaseConfig = {
        apiKey: "AIzaSyC44NKT8t45pQCe6-YQByjMH2QCXKZV8XQ",
        authDomain: "edufusion-8efbf.firebaseapp.com",
        databaseURL: "https://edufusion-8efbf-default-rtdb.firebaseio.com/",
        projectId: "edufusion-8efbf",
        storageBucket: "edufusion-8efbf.appspot.com",
        messagingSenderId: "676084495283",
        appId: "1:676084495283:web:efc5365f66679707a611c6",
        measurementId: "G-D2T62EWR4X"
    };

    const app = initializeApp(firebaseConfig);
    const database = getDatabase(app);

    async function loginStudent() {
        const fullName = document.getElementById("fullName").value;
        const enrollmentNo = document.getElementById("enrollmentNo").value;
        const branch = document.getElementById("branch").value;
        const year = document.getElementById("year").value;
        const currentSem = document.getElementById("currentSem").value;

        if (!fullName || !enrollmentNo || !branch || !year || !currentSem) {
            alert("All fields are required!");
            return;
        }

        try {
            const dbRef = ref(database);
            const snapshot = await get(child(dbRef, `students`));

            if (snapshot.exists()) {
                const students = snapshot.val();
                let studentFound = false;

                for (const key in students) {
                    const student = students[key];
                    if (
                        student.fullName === fullName &&
                        student.enrollmentNo === enrollmentNo &&
                        student.branch === branch &&
                        student.year === parseInt(year) &&
                        student.currentSem === currentSem
                    ) {
                        studentFound = true;
                        break;
                    }
                }

                if (studentFound) {
                    alert(`Authentication Successful!\nYour ID: ${fullName}\nYour Password: ${enrollmentNo}`);
                } else {
                    alert("Login failed. Incorrect information.");
                }
            } else {
                alert("No student data found.");
            }
        } catch (error) {
            console.error("Error during login:", error);
            alert("Error during login. Try again.");
        }
    }

    window.loginStudent = loginStudent;
</script>

</body>
</html>
