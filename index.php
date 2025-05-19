<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hostel Management Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: url(image.png) no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6); /* dark overlay */
      z-index: 0;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 40px;
      width: 90%;
      max-width: 600px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      position: relative;
      z-index: 1;
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      font-size: 2em;
    }

    .info p {
      margin: 10px 0;
      font-size: 1.05em;
    }

    .login-link {
      text-align: center;
      margin-top: 30px;
    }

    .login-link a {
      text-decoration: none;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      padding: 10px 25px;
      border: 1px solid white;
      border-radius: 30px;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .login-link a:hover {
      background: rgba(255, 255, 255, 0.35);
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <div class="glass-card">
    <h1>Welcome to Hostel</h1>
    <div class="info">
      <p><strong>📍 Location:</strong> waknaghat,Himachal Pradesh</p>
      <p><strong>👥 Capacity:</strong> 4000 Students</p>
      <p><strong>🏠 Facilities:</strong> WiFi, Mess, Laundry, Study Room, Gym</p>
      <p><strong>📞 Contact:</strong> +91 9876543210</p>
      <p><strong>📧 Email:</strong> https://www.juit.ac.in/</p>
    </div>
    <div class="login-link">
      <a href="/hostel/student/login.php">Login</a>
    </div>
  </div>

</body>
</html>
