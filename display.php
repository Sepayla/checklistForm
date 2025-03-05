<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Submitted Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .display-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="display-container">
        <h2>Submitted Data</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td><?php echo htmlspecialchars($_GET['name']); ?></td>
            </tr>
            <tr>
                <td><strong>Gender</strong></td>
                <td><?php echo htmlspecialchars($_GET['gender']); ?></td>
            </tr>
            <tr>
                <td><strong>Experience</strong></td>
                <td><?php echo nl2br(htmlspecialchars($_GET['experience'])); ?></td>
            </tr>
            <tr>
                <td><strong>Programming Languages</strong></td>
                <td><?php echo htmlspecialchars($_GET['languages']); ?></td>
            </tr>
        </table>
        <a href="question.php">Go Back</a>
    </div>
</body>
</html>