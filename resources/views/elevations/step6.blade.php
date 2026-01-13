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
    height: 55vh;
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
    padding: 30px 1px;          /* ⬆ more vertical & horizontal space */
    border-radius: 14px;
    text-align: center;
    background: #fff;
    transition: all 0.3s ease;
    font-size: 18px;
    min-height: 100px;           /* ⬆ taller boxes */
    display: flex;               /* center text vertically */
    align-items: center;
    justify-content: center;
}


.option-box:hover {
    border-color: #003f3a;
    background-color: #e6f0ef;
}

input:checked + .option-box {
    border-color: #003f3a;
    background-color: #d1e7e2;
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

<p class="help-text">What is your current situation?</p>

<div class="form-center-wrapper">
<form id="situationForm">

    <div class="options">
        <label>
            <input type="radio" name="situation" value="owner">
            <div class="option-box">I am a homeowner</div>
        </label>

        <label>
            <input type="radio" name="situation" value="offer_accepted">
            <div class="option-box">I have an accepted purchase offer</div>
        </label>

        <label>
            <input type="radio" name="situation" value="searching">
            <div class="option-box">I am looking for a property</div>
        </label>

        <label>
            <input type="radio" name="situation" value="curious">
            <div class="option-box">I am just curious</div>
        </label>
    </div>

    <div class="nav-buttons">
        <button type="button" onclick="window.history.back()">← Previous</button>
        <button type="submit">Next →</button>
    </div>

</form>
</div>

<script>
document.getElementById('situationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const selected = document.querySelector('input[name="situation"]:checked');
    if (!selected) {
        alert("Please select an option to continue.");
        return;
    }

    localStorage.setItem('currentSituation', selected.value);
    window.location.href = '/elevations/step7';
});
</script>

</body>
</html>
