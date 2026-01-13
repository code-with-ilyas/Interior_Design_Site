<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION - Project Information</title>

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
    align-items: center;
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

/* Question */
.help-text {
    font-size: 18px;
    margin: 30px 0;
    font-weight: 500;
}

/* Center form */
.form-center-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
    flex-direction: column;
}

/* Options */
.options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
}

.options label {
    cursor: pointer;
}

.options input {
    display: none;
}

.option-box {
    border: 2px solid #d3d3d3;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    background: #fff;
    transition: all 0.3s ease;
}

.option-box:hover {
    border-color: #003f3a;
    background: #e6f0ef;
}

input:checked + .option-box {
    border-color: #003f3a;
    background: #d1e7e2;
}

/* Buttons */
.nav-buttons {
    display: flex;
    gap: 20px;
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

@media (max-width: 500px) {
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

<p class="help-text">Would you like to have an expert by your side during the work?</p>

<div class="form-center-wrapper">
<form id="expertForm">

    <div class="options">
        <label>
            <input type="radio" name="expert" value="yes">
            <div class="option-box">Yes</div>
        </label>

        <label>
            <input type="radio" name="expert" value="no">
            <div class="option-box">No</div>
        </label>

        <label>
            <input type="radio" name="expert" value="unknown">
            <div class="option-box">I don’t know</div>
        </label>
    </div>

    <div class="nav-buttons">
        <button type="button" onclick="window.history.back()">← Previous</button>
        <button type="submit">Next →</button>
    </div>

</form>
</div>

<script>
document.getElementById('expertForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const selected = document.querySelector('input[name="expert"]:checked');
    if (!selected) {
        alert("Please select an option to continue.");
        return;
    }

    localStorage.setItem('expertSupport', selected.value);
    window.location.href = '/extensions/step6';
});
</script>

</body>
</html>
