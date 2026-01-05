<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Floors</title>
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
        display: grid;
        gap: 20px;
        max-width: 400px;
        margin: auto;
    }

    .input-field {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    input[type="number"] {
        width: 100%;
        padding: 12px;
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

    .label-text {
        min-width: 180px;
        font-size: 16px;
        color: #003f3a;
    }

    .note {
        text-align: center;
        margin-top: 10px;
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
</style>
</head>
<body>

<div class="header-row">
    <h1>Little Worker</h1>
    <p>Project Information — 3 / 5</p>
</div>

<p class="help-text">Do you want to change your floors?</p>

<div class="input-group">
    <div class="input-field">
        <span class="label-text">Area for tiles</span>
        <input type="number" name="tiles_area" placeholder="0" value="10">
        <span>m²</span>
    </div>

    <div class="input-field">
        <span class="label-text">Area for parquet</span>
        <input type="number" name="parquet_area" placeholder="0" value="10">
        <span>m²</span>
    </div>
</div>

<p class="note">Leave 0 if you do not want to change any floor.</p>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
    <button onclick="window.location.href='/estimate/step11'">Next →</button>
</div>

</body>
</html>
