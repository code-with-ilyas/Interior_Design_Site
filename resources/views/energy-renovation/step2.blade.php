<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION - Energy Assessment</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Playfair Display', serif;
    background-color: #f9f9f9;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 50px 20px;
}

/* Main container */
.page-wrapper {
    width: 100%;
    max-width: 600px;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    box-sizing: border-box;
}

/* Header */
.header-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header-row h1 {
    margin: 0;
    font-size: 28px;
}

.header-row p {
    margin: 0;
    color: #003f3a;
    font-size: 16px;
}

/* Text styles */
.help-text {
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 15px;
}

.sub-text {
    font-size: 14px;
    color: #555;
    text-align: center;
    margin-bottom: 25px;
    line-height: 1.5;
}

/* Input group */
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

/* Notes */
.note {
    font-size: 13px;
    color: #555;
    margin-top: 5px;
}

/* Links */
a {
    color: #003f3a;
    text-decoration: underline;
    cursor: pointer;
}

a:hover {
    color: #002926;
}

/* Buttons */
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
    transition: 0.3s;
}

.nav-buttons button:hover {
    opacity: 0.9;
}
</style>
</head>

<body>

<div class="">

    <div class="header-row">
        <h1>H24 RENOVATION</h1>
        <p>Energy Assessment</p>
    </div>

    <p class="help-text">Carry out an energy assessment</p>
    <p class="sub-text">
        With a simple DPE number, we prepare an energy renovation quote for you,
        including up to <strong>3 renovation scenarios</strong>.
    </p>

    <form class="input-group">

        <h3>DPE number of the property</h3>
        <div class="input-field">
            <label>DPE Number</label>
            <input type="text" name="dpe_number" placeholder="Enter 13-character DPE number">
            <span class="note">The number must contain 13 characters.</span>
        </div>
        <p class="note">
            <a href="#">Where can I find my DPE number?</a>
            <br>
            <br>
            <a href="#">Can’t find your DPE number?</a>
        </p>

        <h3>Your contact details</h3>

        <div class="input-field">
            <label>First Name</label>
            <input type="text" name="first_name" value="">
            <span class="note">Please enter your first name.</span>
        </div>

        <div class="input-field">
            <label>Last Name</label>
            <input type="text" name="last_name" value="">
            <span class="note">Please enter your last name.</span>
        </div>

        <div class="input-field">
            <label>Email Address</label>
            <input type="email" name="email" value="">
            <span class="note">Please enter your email address.</span>
        </div>

        <div class="input-field">
            <label>Mobile Phone Number</label>
            <input type="tel" name="phone" value="">
            <span class="note">Please enter your phone number.</span>
        </div>

        <h3>Project Location</h3>

        <div class="input-field">
            <label>Project Address</label>
            <input type="text" name="address" placeholder="Enter an address...">
            <span class="note">Please enter a valid address or manually enter one.</span>
        </div>

      

        <div class="nav-buttons">
            <button type="button" onclick="window.history.back()">← Previous</button>
            <button type="submit">Get my energy assessment →</button>
        </div>

    </form>

</div>

</body>
</html>
