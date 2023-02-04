<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    $file = fopen("feedback.txt", "a");
    fwrite($file, "Name: $name\n");
    fwrite($file, "Phone: $phone\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "Feedback: $feedback\n");
    fwrite($file, "-------------------------------\n");
    fclose($file);

    header("Location: feedback.php");
    exit;
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.html">Home</a>
      <a href="fileeditor.html">Write File</a>
      <a href="dashboard.html">Dashboard</a>
      <a href="index.html">Log Out</a>
    </nav>
    <h2>Hi there, I'd Love to hear your good thoughts about our effort</h2>
  </header>
  
  <!-- Trigger the modal with a button -->
  <h6>.</h6>
  <button id="feedback-btn">Give Feedback</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Submit Feedback</h1>
            <form action="feedback.php" method="post">
              <table>
                <tr>
                  <td>
                    <h2>I Love to hear from you, What you think about it??</h2>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type='text' name='name' placeholder='Your good Name' required><br>
                    <input type='text' name='phone' placeholder='Your Phone Optional'><br>
                    <input type='text' name='email' placeholder='Your Email Optional'><br>
                    <textarea name='feedback' id='feedback' cols='30' rows='10' placeholder='I love the design and concept of this website. . .'></textarea><br>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button id='submitBtn' type="submit">Give Feedback</button>
                  </td>
                </tr>
              </table>
            </form>
        </div>
    </div>

    <script>
  // Get the modal
  const modal = document.getElementById("myModal");

  // Get the button that opens the modal
  const btn = document.getElementById("feedback-btn");

  // Get the <span> element that closes the modal
  const span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<?php
  $file = fopen("feedback.txt", "r");

  while(!feof($file)) {
    $line = fgets($file);
    if (strpos($line, "Name: ") !== false) {
      $name = substr($line, strlen("Name: "));
      echo "<h3>$name</h3>";
    }
    elseif (strpos($line, "Feedback: ") !== false) {
      $feedback = substr($line, strlen("Feedback: "));
      echo "<p>$feedback</p>";
    }
  }

  fclose($file);
?>

</body>
</html>
    
    
