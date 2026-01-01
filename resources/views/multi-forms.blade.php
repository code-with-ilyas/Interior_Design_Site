<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Worker - Project Info</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Playfair Display', serif;
            background-color: #f9f9f9;
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
            font-weight: 500;
            font-size: 28px;
        }

        .header-row p {
            margin: 0;
            font-size: 16px;
            color: #003f3a;
        }

        .help-text {
            margin-bottom: 40px;
            font-size: 18px;
            font-weight: 500;
            text-align: left;
        }

        .options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 700px;
            margin: 0 auto 40px;
        }

        .option-box {
            background-color: #fff;
            border: 1px solid #d3d3d3;
            border-radius: 12px;
            padding: 30px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
            min-height: 120px;
            text-align: center;
        }

        .option-box:hover {
            border-color: #003f3a;
            background-color: #e6f0ef;
        }

        .option-box.selected {
            border-color: #003f3a;
            background-color: #d1e7e2;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            max-width: 500px;
            margin: 0 auto;
        }

        .nav-buttons button {
            padding: 12px 30px;
            border: 2px solid #003f3a;
            border-radius: 50px;
            background-color: #003f3a;
            color: #fff;
            cursor: pointer;
            font-family: 'Playfair Display', serif;
            font-size: 16px;
        }

        .nav-buttons button:hover {
            background-color: #002926;
        }

        @media (max-width: 900px) {
            .options {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .options {
                grid-template-columns: 1fr;
            }

            .header-row {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <div class="header-row">
        <h1>Little Worker</h1>
        <p>Project Information --- 2 --- 3</p>
    </div>

    <p class="help-text">How can we help you?</p>

    <div class="options">
        <div class="option-box">I need a quote</div>
        <a href="{{ route('estimate.step1') }}" style="text-decoration:none;color:inherit;">
            <div class="option-box">I would like an estimate</div>
        </a>




        <div class="option-box">I am looking for a company</div>
        <div class="option-box">I want to improve the energy performance rating (DPE)</div>
        <div class="option-box">I am looking for inspiration</div>
        <div class="option-box">Other</div>
    </div>

    <div class="nav-buttons">
        <button id="prevBtn">&larr; Previous</button>
        <button id="nextBtn">Next &rarr;</button>
    </div>

    <script>
        const boxes = document.querySelectorAll('.option-box');
        let currentIndex = 0;

        function selectBox(index) {
            boxes.forEach(b => b.classList.remove('selected'));
            boxes[index].classList.add('selected');
            currentIndex = index;
        }

        // Default selected
        selectBox(0);

        // Click selection
        boxes.forEach((box, index) => {
            box.addEventListener('click', () => {
                selectBox(index);
            });
        });

        // Next button
        document.getElementById('nextBtn').addEventListener('click', () => {
            if (currentIndex < boxes.length - 1) {
                selectBox(currentIndex + 1);
            }
        });

        // Previous button
        document.getElementById('prevBtn').addEventListener('click', () => {
            if (currentIndex > 0) {
                selectBox(currentIndex - 1);
            } else {
                // 🔥 Redirect to REAL HOME PAGE
                window.location.href = "/";
                // Laravel Blade option:
                // window.location.href = "{{ url('/') }}";
            }
        });
    </script>

</body>

</html>