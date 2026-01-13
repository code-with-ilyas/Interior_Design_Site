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
        margin: 0;
        padding: 50px;
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
        margin: 40px 0 30px;
        font-weight: 500;
        text-align: left;
    }

    /* OPTIONS */
    .options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .options input {
        display: none;
    }

    .option-box {
        background-color: #fff;
        border: 1px solid #d3d3d3;
        border-radius: 12px;
        padding: 30px 15px;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        transition: 0.3s ease;
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
        margin-top: 20px;
        color: #555;
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
    <p>Project Information — 3 / 5</p>
</div>

<!-- QUESTION -->
<p class="help-text">Which kitchen range would you like to install?</p>

<!-- OPTIONS -->
<form id="stepForm">
    <div class="options">

        <label>
            <input type="radio"
                   name="kitchen_range"
                   value="Essential"
                   title="Entry-level kitchen range"
                   aria-label="Essential kitchen range">
            <div class="option-box">Essential</div>
        </label>

        <label>
            <input type="radio"
                   name="kitchen_range"
                   value="Comfort"
                   title="Mid-range kitchen with better finishes"
                   aria-label="Comfort kitchen range">
            <div class="option-box">Comfort</div>
        </label>

        <label>
            <input type="radio"
                   name="kitchen_range"
                   value="Premium"
                   title="High-end premium kitchen"
                   aria-label="Premium kitchen range">
            <div class="option-box">Premium</div>
        </label>

        <label>
            <input type="radio"
                   name="kitchen_range"
                   value="No Change"
                   title="Keep existing kitchen"
                   aria-label="No kitchen change">
            <div class="option-box">I do not want to change my kitchen</div>
        </label>

    </div>
</form>

<p class="note">Learn more about our kitchen ranges.</p>

<!-- NAVIGATION -->
<div class="nav-buttons">
    <button class="secondary" onclick="goPrev()">← Previous</button>
    <button onclick="goNext()">Next →</button>
</div>

<script>
    function goNext() {
        const selected = document.querySelector('input[name="kitchen_range"]:checked');

        if (!selected) {
            alert('Please select an option to continue.');
            return;
        }

        // Save value for later steps
        sessionStorage.setItem('kitchen_range', selected.value);

        // Go to next step (JS only)
        window.location.href = '/estimate/step7'; // change if needed
    }

    function goPrev() {
        window.history.back();
    }
</script>

</body>
</html>
