<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullscreen Slider</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .slides {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .slide {
            flex: 0 0 auto;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease;
            object-fit: cover; /* Tam ekran kaplaması */
        }

        .active {
            opacity: 1;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1000;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .start-btn {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            font-size: 24px; /* Başlık boyutunu büyüttük */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="slides">
            <div class="slide active">
                <img src="dist/img/advvv.jpeg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="dist/img/powerpuff.jpeg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="dist/img/minions.jpeg" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="dist/img/Scooby.png" alt="Slide 4">
            </div>
            <!-- Diğer slaytları buraya ekle -->
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <button class="start-btn" onclick="redirectToIndex()">Let's Start!!</button>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            const slides = document.getElementsByClassName("slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].classList.add("active");
            setTimeout(showSlides, 5000); // 5 saniyede bir slaytı değiştir
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function redirectToIndex() {
            window.location.href = "http://localhost/ibpwebsite-main/index.php";
        }
    </script>
</body>
</html>
