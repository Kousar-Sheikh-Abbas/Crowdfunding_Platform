<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrowdSpark</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">CrowdSpark</a>
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#campaign" class="nav-link">Campaign</a></li>
                <li class="nav-item"><a href="#projects" class="nav-link">Projects</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="slider">
        <video autoplay muted loop class="background-video">
            <source src="video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="slide">
            <div class="slide-content">
                <h1>Turn Ideas into Reality: <br> Create a Campaign Now</h1>
                <p>Explore inspiring campaigns, support innovative ideas, or start your own journey now!</p>
                <button>Start Campaign</button>
                <button class="btn">Explore Our Projects</button>
            </div>
        </div>
    </div>
    <section class="hero-section">
     <h2>Empower Ideas, Transform Lives: Start Your Campaign Today!</h2>
    <div class="hero-content">
        <div class="hero-left">
            <form action="submit_campaign.php" method="POST">
                <label for="title">Campaign Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="goal">Funding Goal:</label>
                <input type="number" id="goal" name="goal" required>

                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="Technology">Technology</option>
                    <option value="Art">Art</option>
                    <option value="Education">Education</option>
                </select>

                <input type="submit" value="Create Campaign">
            </form>
        </div>
</section>



</body>
</html>





