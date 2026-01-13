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
    background-color: #f9f9f9;
    padding: 50px;
    margin: 0;
}

/* Header */
.header-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.header-row h1 {
    font-size: 28px;
    margin: 0;
}

.header-row p {
    color: #003f3a;
    margin: 0;
}

/* Help Text */
.help-text {
    font-size: 20px;
    margin: 40px 0;
}

/* Input Card */
.input-wrapper {
    max-width: 400px;
    margin: 0 auto 50px;
}

.input-box {
    background: #fff;
    border: 2px solid #d3d3d3;
    border-radius: 14px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.input-box input {
    border: none;
    outline: none;
    font-size: 20px;
    width: 100%;
    font-family: 'Playfair Display', serif;
}

.unit {
    font-size: 18px;
    color: #003f3a;
}

/* Buttons */
.nav-buttons {
    display: flex;
    justify-content: space-between;
    max-width: 500px;
    margin: 0 auto;
}

.nav-buttons a {
    padding: 12px 30px;
    border-radius: 50px;
    background: #003f3a;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
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
    <p>Project Information — 2 / 3</p>
</div>

<p class="help-text">What is the surface area to renovate?</p>

<form>
    <div class="input-wrapper">
        <div class="input-box">
            <input type="number" name="surface" placeholder="Surface" min="1">
            <span class="unit">m²</span>
        </div>
    </div>
</form>

<div class="nav-buttons">
    <a href="/specific-works/step1" class="prev">← Previous</a>
    <a href="/specific-works/step3">Next →</a>
</div>

</body>
</html>
