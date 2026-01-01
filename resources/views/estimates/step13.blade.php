<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Project Address</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Playfair Display', serif;
        background: #f9f9f9;
        padding: 50px;
        margin: 0;
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .header-row h1 {
        margin: 0;
        font-size: 28px;
    }

    .header-row p {
        color: #003f3a;
        font-size: 16px;
        margin: 0;
    }

    .help-text {
        font-size: 18px;
        margin: 40px 0 20px;
        font-weight: 500;
    }

    .input-group {
        max-width: 500px;
        margin: auto;
    }

    input[type="text"] {
        width: 100%;
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #d3d3d3;
        font-size: 14px;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #003f3a;
        outline: none;
        background-color: #e6f0ef;
    }

    .note {
        text-align: center;
        color: #555;
        font-size: 14px;
        margin-top: 10px;
    }

    .nav-buttons {
        display: flex;
        justify-content: space-between;
        max-width: 500px;
        margin: 40px auto 0;
    }

    .nav-buttons button {
        padding: 12px 30px;
        border-radius: 50px;
        border: 2px solid #003f3a;
        background: #003f3a;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .manual-link {
        display: block;
        margin-top: 10px;
        color: #003f3a;
        text-decoration: underline;
        font-size: 14px;
        cursor: pointer;
    }
</style>
</head>
<body>

<div class="header-row">
    <h1>Little Worker</h1>
    <p>Project Information — 5 / 5</p>
</div>

<p class="help-text">One last step to finalize your project:</p>

<div class="input-group">
    <input type="text" name="project_address" placeholder="Enter the construction site address...">
    
</div>

<p class="note">
    We only ask for your address to verify that we operate in your area. Your information remains confidential.
</p>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
   <button onclick="window.location.href='/estimate/step14'">Next →</button>
</div>

</body>
</html>
