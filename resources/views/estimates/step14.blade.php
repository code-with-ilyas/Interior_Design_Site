<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
    /* Disable scrolling */
    html, body {
        height: 100%;
        overflow: hidden;
    }

    body {
        font-family: 'Playfair Display', serif;
        background: #f9f9f9;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Main container */
    .page-wrapper {
        width: 100%;
        max-width: 600px;
        padding: 30px;
        box-sizing: border-box;
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
        margin: 30px 0 15px;
        font-weight: 500;
        text-align: center;
    }

    .quote-amount {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        margin: 15px 0;
        color: #003f3a;
    }

    .note {
        text-align: center;
        color: #555;
        font-size: 14px;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .input-field {
        display: flex;
        flex-direction: column;
    }

    .input-field label {
        font-size: 14px;
        margin-bottom: 6px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #d3d3d3;
        font-size: 14px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #003f3a;
        outline: none;
        background-color: #e6f0ef;
    }

    .nav-buttons {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    .nav-buttons button {
        flex: 1;
        padding: 12px 20px;
        border-radius: 50px;
        border: 2px solid #003f3a;
        background: #003f3a;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .nav-buttons button:first-child {
                background: #003f3a;
 
        color: #ffffffff;
    }

    .nav-buttons button:hover {
        opacity: 0.9;
    }
</style>
</head>
<body>

<div class="page-wrapper">

    <div class="header-row">
        <h1>H24 RENOVATION</h1>
        <p>Personal Information — 3 / 3</p>
    </div>

    <p class="help-text">Get your detailed quote</p>
    
    <p class="note">
        Enter your details to receive your precise quote by email.  
        We only ask for your information to send your documents and contact you if needed.
        Your data remains confidential.
    </p>

    <div class="input-group">

        <div class="input-field">
            <label>First Name</label>
            <input type="text" name="first_name">
        </div>

        <div class="input-field">
            <label>Last Name</label>
            <input type="text" name="last_name">
        </div>

        <div class="input-field">
            <label>Email Address</label>
            <input type="email" name="email">
        </div>

        <div class="input-field">
            <label>Mobile Number</label>
            <input type="tel" name="phone">
        </div>

    </div>

    <div class="nav-buttons">
        <button onclick="window.history.back()">← Previous</button>
        <button onclick="alert('Your detailed quote will be sent!')">
            Receive my detailed quote →
        </button>
    </div>

</div>

</body>
</html>
