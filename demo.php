<?php
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$name) $errors[] = "Name is required.";
    if (!$email) $errors[] = "A valid email is required.";
    if (!$message) $errors[] = "Message is required.";

    if (empty($errors)) {
        $to = "yourname@email.com";
        $email_subject = "Contact Form: $subject";
        $email_body = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";

        if (mail($to, $email_subject, $email_body, $headers)) {
            $success = "Thank you, $name! Your message has been sent.";
        } else {
            $errors[] = "Sorry, something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Portfolio</title>
  <link rel="stylesheet" href="demo.css" />
</head>
<body>
  <header class="Header">
    <div class="Header-left">
      <h1>IT PORTFOLIO</h1>
    </div>
    <div class="Header-right">
      <a href="#profile">PROFILE</a>
      <a href="#achievements">ACHIEVEMENTS</a>
      <a href="#projects">PROJECTS</a>
      <a href="#contact">CONTACT</a>
    </div>
  </header>

  <div class="Profile">
    <h1>Joel Shoniwa</h1>
    <p>IT Student At NHL Stenden</p>
    <div><p><img src="" alt="">Joined September 2025</p></div>
    <div><p><img src="" alt="">Emmen, Netherlands</p></div>
    <div><p>XP EARNED</p></div>
    <div><p>Projects</p></div>
    <div><p>Achievements</p></div>
    <div><p>YEARS EXP</p></div>
  </div>

  <section id="profile" class="about">
    <h2>About Me</h2>
    <p>I am a full stack developer with a passion for creating dynamic and responsive web applications...</p>
    <ul class="skills">
      <li>JavaScript</li>
      <li>React</li>
      <li>Node.js</li>
      <li>MongoDB</li>
      <li>Express.js</li>
    </ul>
  </section>

  <section id="achievements" class="achievements">
    <h2>Achievements</h2>
    <div class="level-bar">Level 12</div>
    <div class="achievement-cards">
      <div class="card">First Deployment</div>
      <div class="card">100 Commits</div>
      <div class="card">Open Source Contributor</div>
      <div class="card">Bug Squasher</div>
      <div class="card">UI/UX Designer</div>
      <div class="card">API Integrator</div>
      <div class="card">Team Collaborator</div>
      <div class="card">Code Reviewer</div>
    </div>
  </section>

  <section id="projects" class="projects">
    <h2>Projects</h2>
    <div class="project-cards">
      <div class="project">
        <h3>Cloud Management Dashboard</h3>
        <p>A cloud management dashboard built with React and Node.js...</p>
      </div>
      <div class="project">
        <h3>Remote Work Portfolio</h3>
        <p>A portfolio showcasing remote work setups...</p>
      </div>
      <div class="project">
        <h3>UI/UX App Framework</h3>
        <p>A framework for building mobile and web UI/UX applications...</p>
      </div>
      <div class="project">
        <h3>Advanced Coding Dashboard</h3>
        <p>An advanced coding dashboard that integrates multiple tools...</p>
      </div>
    </div>
  </section>

  <section id="contact" class="contact">
    <h2>Contact</h2>
    <div class="contact-info">
      <p>Address: 123 Developer Lane, Code City, CA 90210</p>
      <p>Phone: (123) 456-7890</p>
      <p>Email: yourname@email.com</p>
      <p>Website: www.yourportfolio.com</p>
    </div>

    <form class="contact-form" method="POST" action="">
      <input type="text" name="name" placeholder="Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="tel" name="phone" placeholder="Phone Number" />
      <input type="text" name="subject" placeholder="Subject" />
      <textarea name="message" placeholder="Message" required></textarea>
      <button type="submit">SEND MESSAGE</button>

      <?php if (!empty($errors)): ?>
        <div class="form-errors">
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if (!empty($success)): ?>
        <div class="form-success">
          <p><?php echo htmlspecialchars($success); ?></p>
        </div>
      <?php endif; ?>
    </form>
  </section>

  <footer class="footer">
    <p>© 2023 Your Name. All Rights Reserved.</p>
  </footer>
</body>
</html>