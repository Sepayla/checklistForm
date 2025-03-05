<?php

$short_textErr = $genderErr = $long_textErr = $optionsErr = "";
$short_text = $gender = $long_text = $languagesList = "";
$has_error = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate full name
    if (empty($_POST["full-name"])) {
        $short_textErr = "Please don't leave this empty";
        $has_error = true;
    } else {
        $short_text = test_input($_POST["full-name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $short_text)) {
            $short_textErr = "Only letters are allowed";
            $has_error = true;
        }
    }

    // Validate experience
    if (empty($_POST["experience"])) {
        $long_textErr = "Please don't leave this empty";
        $has_error = true;
    } else {
        $long_text = test_input($_POST["experience"]);
        // Note: You might want to allow more than just letters in the experience field
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $has_error = true;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Validate programming languages
    if (isset($_POST['languages']) && !empty($_POST['languages'])) {
        $selectedLanguages = $_POST['languages'];
        $languagesList = implode(", ", $selectedLanguages);
    } else {
        $optionsErr = "Please select at least one programming language.";
        $has_error = true; // Set has_error to true if no languages are selected
    }

    // If there are no errors, redirect to display page
    if (!$has_error) {
        header("Location: display.php?name=" . urlencode($short_text) . "&gender=" . urlencode($gender) . "&experience=" . urlencode($long_text) . "&languages=" . urlencode($languagesList));
        exit();
    }
}

    // $short_textErr = $genderErr = $long_textErr= $optionsErr="";
    // $short_text = $gender = $long_text= $languagesList ="";

    // $has_error = false;

    
    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    // if (empty($_POST["full-name"])) {
    //     $short_textErr = "Please don't leave this empty";
    //     $has_error = true;

    // } else {
    //     $short_text = test_input($_POST["full-name"]);
    //     if (!preg_match("/^[a-zA-Z-' ]*$/", $short_text)) {
    //         $short_textErr = "Only letters are allowed";
    //         $has_error = true;
    //     }
    // }

    // if (empty($_POST["experience"])) {
    //     $long_textErr = "Please don't leave this empty";
    //     $has_error = true;

    // } else {
    //     $long_text = test_input($_POST["experience"]);
    //     if (!preg_match("/^[a-zA-Z-' ]*$/", $long_text)) {
    //         $long_textErr = "Only letters are allowed";
    //         $has_error = true;
    //     }
    // }

    // if (empty($_POST["gender"])) {
    //     $genderErr = "Gender is required";
    //     $has_error = true;
    // } else {
    //     $gender = test_input($_POST["gender"]);
    // }

    // if (isset($_POST['languages']) && !empty($_POST['languages'])) {
    //     $selectedLanguages = $_POST['languages'];
    //     $languagesList = implode(", ", $selectedLanguages);
    // } else {
    //     $optionsErr = "Please select at least one programming language.";
    // }

    // if (!$has_error) {
    //     header("Location: display.php? name=" . urlencode($short_text) . "&gender=" . urlencode($gender) . "&experience=" . urlencode($long_text) . "&languages=" . urlencode($languagesList));
    //     exit();
    // }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body>
    <div class="form-container">
        <form onsubmit="saveData()" class="form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <div class="boxes">
            <div>
                <label class="form-label" for="name">
                    What is your name?
                </label>
                <input class="form-input" type="text" id="full-name" name="full-name" placeholder="Short-answer text" value="<?php echo $short_text;?>">
                <p class="error" style="color:rgb(178,34,34);"><?php echo $short_textErr;?></p>
            </div>
            </div>
            
            <div>
                <label class="form-label">
                    What is your gender 
                </label>
                <div class="flex items-center space-x-4">
                    <label>
                        <input class="form-radio" type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="Male") echo "checked";?>>
                        <span>Male</span>
                    </label>
                    <label>
                        <input class="form-radio" type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>>
                        <span>Female</span>
                    </label>
                    <p class="error" style="color:rgb(178,34,34);"><?php echo $genderErr;?></p>
                </div>
            </div>
            
            <div>
                <label class="form-label" >
                As a student, what is your experience of becoming IT student 
                </label>
                <textarea class="form-textarea" id="experience" name="experience"  placeholder="Long-answer text" value="<?php echo $long_text;?>"></textarea>
                <p class="error" style="color:rgb(178,34,34);"><?php echo $long_textErr;?></p>
            </div>
            <div>
                <label class="form-label">
                    What programming languages do you know? 
                </label>
                <div class="check-container">
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="Html & Css">
                        <span>Html & Css</span>
                    </label>
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="JavaScript">
                        <span>JavaScript</span>
                    </label>
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="PHP">
                        <span>PHP</span>
                    </label>
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="Ruby">
                        <span>Ruby</span>
                    </label>
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="Python">
                        <span>Python</span>
                    </label>
                    <label>
                        <input class="form-checkbox" type="checkbox" name="languages[]" value="C++">
                        <span>C++</span>
                    </label>
                </div>
                <p class="error" style="color:rgb(178,34,34);"><?php echo $optionsErr;?></p>
            </div>
            
            <button class="button" type="submit" name="submit"  value="Submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                </svg>
                <div class="text">
                    Button
                </div>
            </button>

        </form>
    </div>
</body>
</html>