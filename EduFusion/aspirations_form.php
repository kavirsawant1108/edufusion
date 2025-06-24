<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirations Form</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your main stylesheet -->
    <style>
        /* Base styling for body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #240046; /* Background color from palette */
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent full-page scrolling */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            max-height: 90vh; /* Set max height */
            overflow-y: auto; /* Enable vertical scrolling */
            border-left: 8px solid #ff6d00; /* Accent border */
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #3c096c; /* Primary accent color */
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            margin-top: 20px;
            display: block;
            color: #240046; /* Dark purple for labels */
        }

        input[type="text"], input[type="email"], input[type="tel"], select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #ff6d00; /* Button color */
            color: white;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 30px;
            width: 100%;
            font-size: 1.1rem;
        }

        input[type="submit"]:hover {
            background-color: #ff8500; /* Slightly brighter hover color */
        }

        .form-group {
            margin-bottom: 25px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8rem;
            }

            input[type="submit"] {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 15px;
            }

            h2 {
                font-size: 1.3rem;
            }

            input[type="submit"] {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form action="process/save_aspirations.php" method="POST" class="form-box">
            <h2>Customize Your Experience</h2>

            <!-- Student Information Section -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required maxlength="10" pattern="\d{10}" title="Please enter a valid 10-digit phone number.">
            </div>

            <div class="form-group">
                <label for="education_level">Current Level of Education:</label>
                <input type="text" id="education_level" name="education_level" required>
            </div>

            <!-- Academic Interests Section -->
            <div class="form-group">
                <label for="program">Desired Program:</label>
                <input type="text" id="program" name="program" required>
            </div>

            <div class="form-group">
                <label for="interest_area">Area of Interest:</label>
                <select id="interest_area" name="interest_area" required>
                    <option value="" disabled selected>Select an area of interest</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Arts">Arts</option>
                    <option value="Science">Science</option>
                    <option value="Medical">Medical</option>
                </select>
            </div>

            <!-- Career Goals Section -->
            <div class="form-group">
                <label for="short_term">Short-term Career Objectives:</label>
                <textarea id="short_term" name="short_term" required></textarea>
            </div>

            <div class="form-group">
                <label for="long_term">Long-term Career Objectives:</label>
                <textarea id="long_term" name="long_term" required></textarea>
            </div>

            <input type="submit" value="Submit" class="btn">
        </form>
    </div>

</body>
</html>
