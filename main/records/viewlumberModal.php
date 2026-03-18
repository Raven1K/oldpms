<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --primary-dark: #0056b3;
            --background-light: #f8f9fa;
            --text-dark: #343a40;
            --border-light: #dee2e6;
            --shadow-light: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: var(--background-light);
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px var(--shadow-light);
            text-align: center;
            max-width: 400px;
            width: 90%;
            border: 1px solid var(--border-light);
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-size: 1.8em;
            font-weight: 700;
        }

        p {
            margin-bottom: 30px;
            font-size: 1.1em;
            color: #6c757d;
        }

        .button-wrapper {
            margin-top: 20px;
        }

        .pdf-button {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            box-sizing: border-box;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .pdf-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .pdf-button:active {
            transform: translateY(0);
        }

        .pdf-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
        }

        .pdf-button.loading {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .pdf-button.loading::after {
            content: '';
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Your PDF</h1>
        <p>Click the button below to generate and open the PDF document. Please wait a moment after clicking.</p>

        <form method="get" action="generate_viewLumberEdealer.php">
            <?php $lumber_app_id = $_GET["lumber_app_id"]; ?>
            <input type="hidden" name="lumber_app_id" value="<?php echo htmlspecialchars($lumber_app_id); ?>">
            <div class="button-wrapper">


            <?php
  

            require_once '../../processphp/config.php'; 
            $query = "SELECT Rating FROM lumber_application WHERE lumber_app_id = '" . mysqli_real_escape_string($con, $_GET['lumber_app_id']) . "'";
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $rating = $row['Rating'];
                echo '<div style="margin-bottom: 15px; font-weight: bold;">CSS Rating: ' . 
                    (empty($rating) ? 'Not Available' : htmlspecialchars($rating)) . '</div>';
                
     
                
                $buttonDisabled = empty($rating) ? 'disabled' : '';
            } else {
                $buttonDisabled = 'disabled';
                echo '<div style="margin-bottom: 15px; color: red;">Rating information not available</div>';
            }

            mysqli_close($con);
            ?>

                <button type="submit" class="pdf-button" 
                    onclick="if(!this.disabled) {this.classList.add('loading'); this.innerHTML='Generating...';}" 
                    id="pdfButton" <?php echo $buttonDisabled; ?>>
                    <?php echo $buttonDisabled ? 'CSS Rating Required' : 'Open PDF'; ?>
                </button>
                <script>
                    window.addEventListener('focus', function() {
                        document.getElementById('pdfButton').click();
                    });
                </script>

            </div>
        </form>
    </div>
</body>
</html>