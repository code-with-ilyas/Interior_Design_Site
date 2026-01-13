<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Estimate</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Playfair Display', serif;
    background: #f9f9f9;
    margin: 0;
    padding: 50px;
}

/* Header */
.header-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-row h1 {
    margin: 0;
    font-size: 28px;
}

.header-row p {
    margin: 0;
    color: #003f3a;
}

/* Titles */
.help-text {
    font-size: 20px;
    margin: 25px 0 10px;
    font-weight: 500;
}

.estimate-amount {
    font-size: 22px;
    color: #003f3a;
    margin-bottom: 25px;
}

/* Centered form */
.form-center {
    display: flex;
    justify-content: center;
}

.form-box {
    max-width: 500px;
    width: 100%;
}

/* Inputs */
.input-field {
    margin-bottom: 18px;
}

.input-field input {
    width: 100%;
    padding: 15px;
    border-radius: 12px;
    border: 1px solid #d3d3d3;
    font-size: 15px;
    transition: 0.3s;
}

.input-field input:focus {
    border-color: #003f3a;
    background: #e6f0ef;
    outline: none;
}

/* Note */
.note {
    font-size: 14px;
    color: #555;
    margin: 20px 0;
    line-height: 1.5;
}

/* Buttons */
.nav-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
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

.nav-buttons button:hover {
    opacity: 0.9;
}
</style>
</head>
<body>

<div class="header-row">
    <h1>Little Worker</h1>
    <p>Personal Information — 1 / 3</p>
</div>

<p class="help-text">Your estimate is ready!</p>
<p class="estimate-amount">Estimated amount<br><strong>Between €___ and €___</strong></p>

<p>Enter your details to receive your personalized estimate:</p>

<div class="form-center">
    <form class="form-box">

        <div class="input-field">
            <input type="email" placeholder="Your email address">
        </div>

        <div class="input-field">
            <input type="tel" placeholder="Your French mobile phone number">
        </div>

        <div class="input-field">
            <input type="text" placeholder="Postal code of your worksite">
        </div>

        <p class="note">
            We use this information to contact you and send you your documents.
            We will never share it with anyone outside your project.
        </p>

        <div class="nav-buttons">
            <button type="button" onclick="window.history.back()">← Previous</button>
            <button type="submit">Validate</button>
        </div>

    </form>
</div>

</body>
</html>
