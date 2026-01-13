<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H24 RENOVATION</title>
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
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .option-box {
            background-color: #fff;
            border: 1px solid #d3d3d3;
            border-radius: 12px;
            padding: 30px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
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
            transition: all 0.3s ease;
        }

        .nav-buttons button:hover {
            background-color: #002926;
        }

        @media(max-width: 900px) {
            .options {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .options {
                grid-template-columns: 1fr;
            }

            .header-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .help-text {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <div class="header-row">
        <h1>H24 RENOVATION</h1>
        <p>Project Information --- 2 --- 3</p>
    </div>

    <p class="help-text">What type of work would you like to carry out?</p>

    <div class="options">

        <a href="{{ route('estimate.step2') }}" class="option-box"> Partial Renovation </a>
        <a href="{{route('renovation.step1')}}" class="option-box">Complete Renovation</a>
        <a href="{{route('energy-renovation.step1')}}" class="option-box">Energy renovation</a>
        <a href="{{route('specific-works.step1')}}" class="option-box">Small Specific Works</a>
        <a href="{{route('elevations.step1')}}" class="option-box">Home elevation</a>
        <a  href="{{route('extensions.step1')}}" class="option-box">Home Extension</a>
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

        // Initial selection
        selectBox(0);

        // Click on grid
        boxes.forEach((box, index) => {
            box.addEventListener('click', () => {
                selectBox(index);
            });
        });

        // Next button
        document.getElementById('nextBtn').addEventListener('click', () => {
            if (currentIndex < boxes.length - 1) {
                selectBox(currentIndex + 1);
            } else {
                // If at last grid, go to next page
                window.location.href = '/estimates/step2'; // replace with your Blade route
            }
        });

        // Previous button
        document.getElementById('prevBtn').addEventListener('click', () => {
            if (currentIndex > 0) {
                selectBox(currentIndex - 1);
            } else {
                // If at first grid, go to home page
                window.location.href = '/renovate'; // replace with your home page URL
            }
        });
    </script>

</body>

</html>