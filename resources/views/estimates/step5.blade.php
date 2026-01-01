<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Bathroom Equipment</title>

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
        margin: 40px 0 30px;
        font-weight: 500;
    }

    .options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        max-width: 600px;
        margin: auto;
    }

    input[type="number"] {
        width: 100%;
        padding: 15px;
        border-radius: 12px;
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

    label {
        font-size: 16px;
        margin-bottom: 5px;
        display: block;
        font-weight: 500;
    }

    .note {
        text-align: center;
        margin-top: 20px;
        color: #555;
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
    <p>Project Information — 2 / 3</p>
</div>

<p class="help-text">Bathroom – Do you want to change any equipment?</p>

<div class="options">
    <div>
        <label for="shower">Shower</label>
        <input type="number" id="shower" name="shower" placeholder="0">
    </div>

    <div>
        <label for="bathtub">Bathtub</label>
        <input type="number" id="bathtub" name="bathtub" placeholder="0">
    </div>

    <div>
        <label for="single-vanity">Single Vanity Unit</label>
        <input type="number" id="single-vanity" name="single_vanity" placeholder="0">
    </div>

    <div>
        <label for="double-vanity">Double Vanity Unit</label>
        <input type="number" id="double-vanity" name="double_vanity" placeholder="0">
    </div>
</div>

<p class="note">Leave 0 if you do not want any equipment in your bathroom.</p>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
   <a href="/estimate/step6">Next →</a>
</div>

</body>
</html>
