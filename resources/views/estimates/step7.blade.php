<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
    * {
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        overflow: hidden;
    }

    body {
        font-family: 'Playfair Display', serif;
        background: #f9f9f9;
        padding: 50px;
        margin: 0;
    }

    /* HEADER */
    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }

    .header-row h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 500;
    }

    .header-row p {
        color: #003f3a;
        font-size: 16px;
        margin: 0;
    }

    /* TEXT */
    .help-text {
        font-size: 18px;
        margin: 40px 0 20px;
        font-weight: 500;
    }

    /* OPTIONS */
    .options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        max-width: 600px;
        margin: 0 auto 40px;
    }

    .options input {
        display: none;
    }

    .option-box {
        background-color: #fff;
        border: 1px solid #d3d3d3;
        border-radius: 12px;
        padding: 25px 15px;
        min-height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .option-box:hover {
        border-color: #003f3a;
        background-color: #e6f0ef;
    }

    .options input:checked + .option-box {
        border-color: #003f3a;
        background-color: #d1e7e2;
    }

    /* NOTE */
    .note {
        text-align: center;
        margin-top: 10px;
        color: #555;
        font-size: 14px;
    }

    /* NAV BUTTONS */
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
        background-color: #003f3a;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        font-family: 'Playfair Display', serif;
    }

    .nav-buttons button.secondary {
        background: transparent;
        color: #003f3a;
    }

    .nav-buttons button:hover {
        background-color: #002926;
    }

    .nav-buttons button.secondary:hover {
        background: #e6f0ef;
    }

    /* RESPONSIVE */
    @media (max-width: 700px) {
        body {
            padding: 30px 20px;
        }

        .options {
            grid-template-columns: 1fr;
        }

        .header-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
    }
</style>
</head>

<body>

<!-- HEADER -->
<div class="header-row">
    <h1>H24 RENOVATION</h1>
    <p>Project Information — 4 / 5</p>
</div>

<!-- QUESTION -->
<p class="help-text">Which appliance range would you like?</p>

<!-- OPTIONS -->
<form id="stepForm">
    <div class="options">

        <label>
            <input type="radio"
                   name="appliance_range"
                   value="Entry Level"
                   title="Basic appliances suitable for essential needs"
                   aria-label="Entry level appliances">
            <div class="option-box">Entry Level</div>
        </label>

        <label>
            <input type="radio"
                   name="appliance_range"
                   value="Mid Range"
                   title="Balanced performance and design"
                   aria-label="Mid range appliances">
            <div class="option-box">Mid Range</div>
        </label>

        <label>
            <input type="radio"
                   name="appliance_range"
                   value="High End"
                   title="Premium appliances with advanced features"
                   aria-label="High end appliances">
            <div class="option-box">High End</div>
        </label>

        <label>
            <input type="radio"
                   name="appliance_range"
                   value="No Appliances"
                   title="Keep existing appliances"
                   aria-label="No appliances">
            <div class="option-box">I do not want any appliances</div>
        </label>

    </div>
</form>

<p class="note">Learn more about our appliance ranges.</p>

<!-- NAVIGATION -->
<div class="nav-buttons">
    <button class="secondary" onclick="goPrev()">← Previous</button>
    <button onclick="goNext()">Next →</button>
</div>

<script>
    function goNext() {
        const selected = document.querySelector('input[name="appliance_range"]:checked');

        if (!selected) {
            alert('Please select an option to continue.');
            return;
        }

        // Store value for later steps
        sessionStorage.setItem('appliance_range', selected.value);

        // Next step (JS controlled)
        window.location.href = '/estimate/step8';
    }

    function goPrev() {
        window.history.back();
    }
</script>

</body>
</html>
