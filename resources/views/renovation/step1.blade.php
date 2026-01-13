<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
html, body {
    height: 100%;
    overflow: hidden;
}

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
    align-items: center;
    margin-bottom: 10px;
}

.header-row h1 {
    margin: 0;
    font-size: 28px;
}

.header-row p {
    margin: 0;
    color: #003f3a;
}

/* Help Text */
.help-text {
    margin-bottom: 40px;
    font-size: 18px;
}

/* Options */
.options {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    max-width: 800px;
    margin: 0 auto 40px;
}



/* Card style */
.option-box {
    background: #fff;
    border: 1px solid #d3d3d3;
    border-radius: 12px;
    padding: 30px 15px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
}

/* Hover */
.option-box:hover {
    border-color: #003f3a;
    background: #e6f0ef;
}

/* Selected */
.options input:checked + .option-box {
    border-color: #003f3a;
    background: #d1e7e2;
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

<p class="help-text">
    What budget would you like to assign to your renovation project?
</p>

<form>
<div class="options">

   <label>
    <input type="radio" name="budget" value="less_12000" onclick="goToStep3(this.value)">
    <div class="option-box">Less than €12,000</div>
</label>


    <label>
        <input type="radio" name="budget" value="12000_39000">
        <div class="option-box">Between €12,000 and €39,000</div>
    </label>

    <label>
        <input type="radio" name="budget" value="40000_59000">
        <div class="option-box">Between €40,000 and €59,000</div>
    </label>

    <label>
        <input type="radio" name="budget" value="60000_99000">
        <div class="option-box">Between €60,000 and €99,000</div>
    </label>

    <label>
        <input type="radio" name="budget" value="100000_200000">
        <div class="option-box">Between €100,000 and €200,000</div>
    </label>

    <label>
        <input type="radio" name="budget" value="more_200000">
        <div class="option-box">More than €200,000</div>
    </label>

</div>
</form>
<div class="nav-buttons">
    <a href="/estimate" class="prev">← Previous</a>
    <a href="/renovation/step2">Next →</a>
</div>