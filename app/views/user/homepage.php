<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Welcome to Our Website</h1>
            <p>Discover amazing content and explore our services.</p>
        </section>

        <section class="features">
            <h2>Our Features</h2>
            <div class="feature">
                <h3>Feature 1</h3>
                <p>Details about feature 1.</p>
            </div>
            <div class="feature">
                <h3>Feature 2</h3>
                <p>Details about feature 2.</p>
            </div>
            <div class="feature">
                <h3>Feature 3</h3>
                <p>Details about feature 3.</p>
            </div>
        </section>

        <section class="testimonials">
            <h2>What Our Users Say</h2>
            <blockquote>
                <p>"This website is amazing! I found everything I needed."</p>
                <cite>- Happy User</cite>
            </blockquote>
            <blockquote>
                <p>"Great services and support. Highly recommend!"</p>
                <cite>- Satisfied Customer</cite>
            </blockquote>
        </section>

        <!-- Render popup messages dynamically -->
        <?php foreach ($popups as $popup): ?>
            <?php echo $popup['message']; ?>
        <?php endforeach; ?>
    </main>

    <footer>
        <p>&copy; 2025 Our Website. All rights reserved.</p>
    </footer>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
            background: #f4f4f4;
        }

        .features {
            padding: 20px;
            background: #fff;
        }

        .features .feature {
            margin-bottom: 20px;
        }

        .testimonials {
            padding: 20px;
            background: #f9f9f9;
        }

        blockquote {
            margin: 20px 0;
            padding: 10px 20px;
            border-left: 5px solid #ccc;
            background: #fff;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #333;
            color: #fff;
        }
    </style>
</body>
</html>