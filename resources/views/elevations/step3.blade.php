<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>H24 RENOVATION</title>

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
        margin: 40px 0 30px;
        font-weight: 500;
    }

    .options {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        max-width: 800px;
        margin: auto;
    }

    label {
        display: block;
        cursor: pointer;
    }

    input[type="checkbox"] {
        display: none;
    }

    .option-box {
        width: 100%;
        padding: 20px 15px;
        border-radius: 12px;
        border: 1px solid #d3d3d3;
        text-align: center;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input[type="checkbox"]:checked + .option-box {
        background-color: #d1e7e2;
        border-color: #003f3a;
    }

    .option-box:hover {
        border-color: #003f3a;
        background-color: #e6f0ef;
    }

    .note {
        text-align: center;
        margin-top: 20px;
        color: #555;
    }

    .nav-buttons {
        display: flex;
        justify-content: space-between;
        max-width: 500px;
        margin: 40px auto 0;
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

    @media (max-width: 700px) {
        .options {
            grid-template-columns: repeat(2, 1fr);
        }
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

<p class="help-text">Which types of rooms would you like to renovate? (Select one or more)</p>

<div class="options">
    <label>
        <input type="checkbox" name="rooms[]" value="Bathroom">
        <div class="option-box">Bathroom</div>
    </label>

    <label>
        <input type="checkbox" name="rooms[]" value="Kitchen">
        <div class="option-box">Kitchen</div>
    </label>

    <label>
        <input type="checkbox" name="rooms[]" value="Living Room">
        <div class="option-box">Living Room</div>
    </label>

    <label>
        <input type="checkbox" name="rooms[]" value="Bedroom">
        <div class="option-box">Bedroom</div>
    </label>

    <label>
        <input type="checkbox" name="rooms[]" value="Toilet">
        <div class="option-box">Toilet</div>
    </label>

    <label>
        <input type="checkbox" name="rooms[]" value="Other">
        <div class="option-box">Other</div>
    </label>
</div>

<p class="note">Select as many as needed.</p>

<div class="nav-buttons">
    <button onclick="window.history.back()">← Previous</button>
    <a href="/elevations/step4">Next →</a>
</div>





<script>
    document.getElementById('nextBtn').addEventListener('click', () => {
        const selected = document.querySelectorAll('input[name="rooms[]"]:checked');
        if(selected.length === 0){
            alert("Please select at least one room to continue.");
            return;
        }

        // Save selected values to localStorage or submit via form
        const rooms = Array.from(selected).map(r => r.value);
        localStorage.setItem('selectedRooms', JSON.stringify(rooms));

        // Go to step5 page
        window.location.href = '/elevations/step4'; // <-- adjust this URL to your step5 route
    });
</script>

</body>
</html>
