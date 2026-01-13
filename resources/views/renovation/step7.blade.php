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
            margin: 40px 0 10px;
            font-weight: 500;
        }

        .sub-text {
            margin-bottom: 30px;
            color: #444;
        }

        .form-wrapper {
            max-width: 500px;
            margin: auto;
        }

        .furniture-item {
            margin-bottom: 20px;
        }

        .furniture-item label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        input[type="number"] {
            width: 100%;
            padding: 15px 12px;
            border-radius: 10px;
            border: 1px solid #d3d3d3;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #003f3a;
            outline: none;
            background-color: #e6f0ef;
        }

        .note {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            max-width: 500px;
            margin: 40px auto 0;
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
        }

        .nav-buttons a {
            background: #003f3a;
            color: #ffffffff;
        }

    
    </style>
</head>

<body>

    <div class="header-row">
        <h1>H24 RENOVATION</h1>
        <p>Project Information — 4 / 8</p>
    </div>
    <p class="sub-text">Do you want to create custom furniture?</p>

    <form>

        <div class="form-wrapper">

            <div class="furniture-item">
                <label for="bookshelf">Bookshelf</label>
                <input type="number" id="bookshelf" name="bookshelf" value="0" min="0">
            </div>

            <div class="furniture-item">
                <label for="dressing">Dressing room</label>
                <input type="number" id="dressing" name="dressing" value="0" min="0">
            </div>

            <div class="furniture-item">
                <label for="laundry">Laundry unit</label>
                <input type="number" id="laundry" name="laundry" value="0" min="0">
            </div>

            <div class="furniture-item">
                <label for="wardrobe">Wardrobe</label>
                <input type="number" id="wardrobe" name="wardrobe" value="0" min="0">
            </div>

            <p class="note"><em>Leave 0 if you don't want any custom furniture.</em></p>
        </div>

        <div class="nav-buttons">
            <a href="/renovation/step6">← Previous</a>
            <a href="/renovation/step8">Next →</a>
        </div>

    </form>

</body>

</html>