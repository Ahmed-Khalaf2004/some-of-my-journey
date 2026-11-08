<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<!-- Form with fields: Name, Email, Subject (dropdown: Inquiry / Complaint / Suggestion), Message 
(textarea).  -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Contact Us</title>
  </head>
  <body>
    <h1>Contact Us</h1>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main>
      <form id="contact-form" action="../../Backend/contact_process.php" method="post">
        <input name="name" type="text" placeholder="Your Name" />
        <input name="email" type="email" placeholder="Your Email" />
        <select name="subject">
          <option value="inquiry">Inquiry</option>
          <option value="complaint">Complaint</option>
          <option value="suggestion">Suggestion</option>
        </select>
        <textarea name="message" placeholder="Your Message"></textarea>
        <input type="submit" value="Send" />
        <!-- php:
                        if submit then take the values from POST array,
                        and save this message in contact database as the type that was selected.
                -->
        <!-- Submit – sends data to a PHP script (contact_process.php) that inserts the message into 
                the contacts table and shows a success message. -->
      </form>
    </main>
    <aside>
      <h2>Contact Information</h2>
      <p>Address: Palestine, Gaza Strip</p>
      <p>Phone: +9724141397</p>
      <p>Email: ahmed.amjad20222004@gmail.com</p>
    </aside>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>
