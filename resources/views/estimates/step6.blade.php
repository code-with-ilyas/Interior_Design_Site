<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Kitchen Range</title>
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

    .options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        max-width: 600px;
        margin: auto 0 40px;
    }

    label {
        display: block;
        cursor: pointer;
    }

    input[type="radio"] {
        display: none;
    }

    .option-box {
        width: 100%;
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #d3d3d3;
        font-size: 14px;
        text-align: center;
        box-sizing: border-box;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    input[type="radio"]:checked + .option-box {
        border-color: #003f3a;
        background-color: #d1e7e2;
    }

    .option-box:hover {
        border-color: #003f3a;
        background-color: #e6f0ef;
    }

    .note {
        text-align: center;
        margin-top: 20px;
        color: #555;
        font-size: 14px;
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

    @media (max-width: 700px) {
        .options {
            grid-template-columns: 1fr;
        }
    }
</style>
</head>
<body>

<div class="header-row">
    <h1>Little Worker</h1>
    <p>Project Information — 3 / 5</p>
</div>

<p class="help-text">Which kitchen range would you like to install?</p>

<div class="options">
    <label>
        <input type="radio" name="kitchen_range" value="Essential">
        <div class="option-box">Essential</div>
    </label>

    <label>
        <input type="radio" name="kitchen_range" value="Comfort">
        <div class="option-box">Comfort</div>
    </label>

    <label>
        <input type="radio" name="kitchen_range" value="Premium">
        <div class="option-box">Premium</div>
    </label>

    <label>
        <input type="radio" name="kitchen_range" value="No Change">
        <div class="option-box">I do not want to change my kitchen</div>
    </label>
</div>

<p class="note">Learn more about our kitchen ranges.</p>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
    <button onclick="window.location.href='/estimate/step7'">Next →</button>
</div>

</body>
</html>
