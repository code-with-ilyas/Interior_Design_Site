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
    margin-bottom: 20px;
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
    margin: 30px 0 15px;
    font-weight: 500;
}

/* Center the form area */
.form-center-wrapper {
    display: flex;
    justify-content: center; /* horizontal center */
    align-items: center;     /* vertical center */
    height: 50vh;           /* full viewport height */
    flex-direction: column;  /* stack content vertically */
}

/* Options as boxes */
.options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
    max-width:1000px;
}

.options label {
    display: block;
    cursor: pointer;
}

.options input[type="radio"] {
    display: none;
}

.option-box {
    border: 2px solid #d3d3d3;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #fff;
}

.option-box:hover {
    border-color: #003f3a;
    background-color: #e6f0ef;
}

/* Checked state */
.options input[type="radio"]:checked + .option-box {
    border-color: #003f3a;
    background-color: #d1e7e2;
}

/* Buttons */
.nav-buttons {
    display: flex;
    justify-content: space-between;
    max-width: 500px;
    margin-top: 20px;
}

.nav-buttons button,
.nav-buttons a {
    padding: 12px 30px;
    border-radius: 50px;
    border: 2px solid #003f3a;
    background: #003f3a;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    display: inline-block;
    transition: opacity 0.3s ease;
}

.nav-buttons button:hover,
.nav-buttons a:hover {
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
    <h1>H24 RENOVATION</h1>
    <p>Project Information — 2 / 3</p>
</div>

<p class="help-text">Do you want to be assisted by an interior designer for the design?</p>

<div class="form-center-wrapper">
<form id="designerForm">
    <div class="options">
        <label>
            <input type="radio" name="designer_assist" value="yes">
            <div class="option-box">Yes</div>
        </label>

        <label>
            <input type="radio" name="designer_assist" value="no">
            <div class="option-box">No</div>
        </label>

        <label>
            <input type="radio" name="designer_assist" value="already_have">
            <div class="option-box">I already have one</div>
        </label>

        <label>
            <input type="radio" name="designer_assist" value="dont_know">
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
document.getElementById('designerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const selected = document.querySelector('input[name="designer_assist"]:checked');
    if (!selected) {
        alert("Please select an option to continue.");
        return;
    }

    localStorage.setItem('designerAssist', selected.value);
    window.location.href = '/elevations/step5';
});
</script>

</body>
</html>
