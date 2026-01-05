<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Little Worker - Personal Information</title>
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
        margin: auto 0 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input[type="text"], input[type="email"], input[type="tel"], input[type="number"] {
        width: 100%;
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #d3d3d3;
        font-size: 14px;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    input:focus {
        border-color: #003f3a;
        outline: none;
        background-color: #e6f0ef;
    }

    .note {
        text-align: center;
        color: #555;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .nav-buttons {
        display: flex;
        justify-content: center;
        max-width: 500px;
        margin: 20px auto 0;
    }

    .nav-buttons button {
        padding: 12px 30px;
        border-radius: 50px;
        border: 2px solid #003f3a;
        background: #003f3a;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }

    .quote-amount {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        margin: 20px 0;
        color: #003f3a;
    }
</style>
</head>
<body>

<div class="header-row">
    <h1>Little Worker</h1>
    <p>Personal Information — 3 / 3</p>
</div>

<p class="help-text">Get your detailed quote</p>

<p class="quote-amount">Quote Amount: <strong>€</strong></p>

<p class="note">
    Enter your details to receive your precise quote by email.  
    We only ask for your information to send your documents and contact you if needed. Your data remains confidential.
</p>

<div class="input-group">
    <input type="text" name="first_name" placeholder="First Name" value="John">
    <input type="text" name="last_name" placeholder="Last Name" value="Doe">
    <input type="email" name="email" placeholder="Email Address" value="john.doe@littleworker.fr">
    <input type="tel" name="phone" placeholder="Mobile Number" value="+33 06 01 23 45 67">
</div>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
    <button onclick="alert('Your detailed quote will be sent!')">Receive my detailed quote →</button>
</div>

</body>
</html>
