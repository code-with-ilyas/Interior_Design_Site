<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION</title>
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
        max-width: 400px;
        margin: auto;
        display: flex;
        gap: 10px;
        align-items: center;
    }

    input[type="number"] {
        width: 100%;
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #d3d3d3;
        font-size: 16px;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    input[type="number"]:focus {
        border-color: #003f3a;
        outline: none;
        background-color: #e6f0ef;
    }

    .unit {
        font-size: 16px;
        color: #003f3a;
        white-space: nowrap;
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
</style>
</head>
<body>

<div class="header-row">
    <h1>H24 RENOVATION</h1>
    <p>Project Information — 3 / 5</p>
</div>

<p class="help-text">What is the total surface area of your home?</p>

<div class="input-group">
    <input type="number" name="total_surface" placeholder="Surface" value="1000">
    <span class="unit">m²</span>
</div>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
    <button onclick="window.location.href='/estimate/step9'">Next →</button>
</div>

</body>
</html>
