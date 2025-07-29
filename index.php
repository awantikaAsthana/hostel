<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Management Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffb6f0, #cdb4ff, #a0e7ff);
      background-size: 300% 300%;
      animation: candyflow 10s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
      color: #4a2f52;
      overflow: hidden;
    }

    @keyframes candyflow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .shape {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.25);
      animation: float 6s ease-in-out infinite;
      z-index: 0;
    }
    .shape.small { width: 80px; height: 80px; background: rgba(255,182,240,0.3);} 
    .shape.medium { width: 150px; height: 150px; background: rgba(160,231,255,0.3);} 
    .shape.large { width: 250px; height: 250px; background: rgba(205,180,255,0.3);} 

    @keyframes float {
      0% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-20px) rotate(180deg); }
      100% { transform: translateY(0) rotate(360deg); }
    }

    .glass-card {
      position: relative;
      z-index: 2;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(15px);
      padding: 40px;
      width: 90%;
      max-width: 600px;
      border-radius: 25px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      border: 1px solid rgba(255,255,255,0.2);
      text-align: center;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 2.2em;
      text-shadow: 0 2px 6px rgba(255,255,255,0.6);
    }

    .info p {
      margin: 10px 0;
      font-size: 1.05em;
      color: #4a2f52;
      font-weight: 500;
    }

    .info a {
      color: #6b3488;
      text-decoration: underline;
    }

    .login-link {
      margin-top: 30px;
    }

    .login-link a {
      display: inline-block;
      text-decoration: none;
      background: linear-gradient(45deg, #ffb6f0, #cdb4ff, #a0e7ff);
      color: #4a2f52;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: 600;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .login-link a:hover {
      background: linear-gradient(45deg, #a0e7ff, #ffb6f0);
      color: #fff;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- Floating shapes -->
  <div class="shape small" style="top: 10%; left: 15%; animation-delay: 0s;"></div>
  <div class="shape medium" style="top: 65%; left: 80%; animation-delay: 2s;"></div>
  <div class="shape large" style="top: 30%; left: 50%; animation-delay: 4s;"></div>

  <div class="glass-card">
    <h1>Welcome to Hostel</h1>
    <div class="info">
      <p><strong>📍 Location:</strong> Waknaghat, Himachal Pradesh</p>
      <p><strong>👥 Capacity:</strong> 4000 Students</p>
      <p><strong>🏠 Facilities:</strong> WiFi, Mess, Laundry, Study Room, Gym</p>
      <p><strong>📞 Contact:</strong> +91 9876543210</p>
      <p><strong>📧 Website:</strong> <a href="https://www.juit.ac.in/" target="_blank">www.juit.ac.in</a></p>
    </div>
    <div class="login-link">
      <a href="/hostel/student/login.php">Login</a>
    </div>
  </div>

</body>
</html>
