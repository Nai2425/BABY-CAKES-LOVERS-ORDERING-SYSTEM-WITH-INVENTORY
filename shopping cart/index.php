<?php
@include '../conn.php';
if (isset($_POST['add_to_cart'])) {

  header("Location: loginn.php?error=You must Login First");
}


?>

<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Baby's Cake</title>
  <link rel="stylesheet" href="css/style3.css">
  <link rel="stylesheet" href="css/message.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <?php include 'header2.php'; ?>


  <div class="slideshow-container" id="home">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="images/cake1.jpg" style="width:100%">
      <div class="text">"Indulge in the Sweetness"</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="images/cake2.jpg" style="width:100%">
      <div class="text">"Life is Short, Eat the Cake"</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="images/cake3.jpg" style="width:100%">
      <div class="text">"Celebrating Life's Sweet Moments"</div>
    </div>


  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>

  </div>
  <div class="centered">Welcome To Baby's Cake</div>

  <style>
    @media only screen and (max-width: 720px) {
      .top {
        display: none;

      }

      .centered {
        font-size: 50px;
      }

      .logoo {
        width: 150px;
        height: 200px;
      }

      .row {
        display: none;
      }

      .ourteam {
        display: none;
      }

      .wrapper {
        width: 100%;
      }

      #myBtn {
        visibility: hidden;
      }

      #buttontit {

        visibility: hidden;

      }

      #chatbot-popup {
        visibility: hidden;
      }

    }
  </style>

  <button onclick="topFunction()" id="myBtn" title="Go to top" class="top" name="topa">Top</button>

  <button onclick="openChatbot()" id="buttontit" class="flip-card" name="topak"><img src="images/Logo.png" width="200" height="200"></button>



  <div class="wrapper" id="chatbot-popup">
    <div class="title"><i class="fa fa-comments" style="float:left;margin-left:10px;font-size:30px;margin-top:15px;"></i> Baby's Cake Chat Bot <button onclick="closeChatbot()" class="close" style="background-color: transparent;color: white;font-size:30px;border: none;float:right; margin-top:15px;margin-right:10px;"><i class="fa fa-minus"></i></button></div>

    <div class="form">
      <div class="bot-inbox inbox">
        <div class="icon">
          <img src="images/Logo.png">
        </div>
        <div class="msg-header">
          <p>Hello there, Welcome to Baby's Cake how can I help you?</p>
        </div>

      </div>
    </div>
    <div id="suggested-questions-container">
      <hr>
      <p style="font-size:15px">Suggest Questions:</p>
      <hr>
      <?php
      $select_cart = mysqli_query($conn, "SELECT * FROM `chatbot` order by  RAND() limit 3");
      $grand_total = 0;
      if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
      ?>
          <button id="suggestions" class="suggestions" onclick="updateInputBox(value)" value="<?php echo $fetch_cart['queries']; ?>"><?php echo $fetch_cart['queries']; ?></button>
      <?php
        };
      };
      ?>
    </div>

    <div class="typing-field">
      <div class="input-data">
        <input id="data" type="text" placeholder="Type something here.." required>
        <button id="send-btn">Send<i class="fa fa-paper-plane"></i></button>
      </div>
    </div>

  </div>
  <br>
  <br>


  <div class="container">

    <section class="products" id="menu">


      <h1 class="heading">Cakes Menu</h1>



      <div class="box-container">

        <?php

        $select_products = mysqli_query($conn, "SELECT * FROM `product` where status = 'available'  order by  RAND() limit 6");
        if (mysqli_num_rows($select_products) > 0) {
          while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>

            <form action="" method="post" name="re">

              <div class="box">

                <?php echo '<img src="data:image;base64,' . base64_encode($fetch_product['image']) . '" style="width: 263px; height:170px;"class="img-fluid" >' ?>
                <h3><?php echo $fetch_product['product_name']; ?></h3>
                <div class="price">₱<?php echo $fetch_product['price']; ?></div>
                <input type="submit" class="btn" value="Buy Now" name="add_to_cart">

              </div>
            </form>

        <?php
          };
        };
        ?>

      </div>

    </section>

  </div>

  <div class="about-section" id="about">
    <h1>About Us</h1>
    <br>
    <p>In our company of cakes, we strive to create the most delicious and
      visually stunning desserts for our customers. We believe that every occasion
      deserves a special treat, and our team of expert bakers and decorators work tirelessly
      to create customized cakes that perfectly suit our customers' needs. From traditional
      birthday cakes to trendy wedding cakes, we offer a wide range of flavors and designs to
      choose from. We use only the highest quality ingredients and the latest baking techniques
      to ensure that every cake that leaves our bakery is not only beautiful but also absolutely
      delicious. At our company of cakes, we take pride in making every celebration a little sweeter
      with our delectable creations.</p>
    <br>
    <img src="../shopping cart/images/Logo.png" alt="Logo" height="200" width="200" class="logoo">
  </div>

  <h2 style="text-align:center;font-size:30px;margin-top:40px;" class="ourteam">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="../shopping cart/images/ron.jpg" alt="Ron" style="width:100%">
        <div class="container">
          <h2>Visperas, Ron Daryl R.</h2>
          <p class="title">Project Manager</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>rondaryl.visperas@gmail.com</p>
          <p><button class="button" onclick="copyToClipboard('rondaryl.visperas@gmail.com')">Contact</button></p>
          <div id="notification">Email copied!</div>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../shopping cart/images/sie.jpg" alt="Sie" style="width:100%">
        <div class="container">
          <h2>Sinohin, Sienna Celine Dimple</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>Sienna.sinohin@gmail.com</p>
          <p><button class="button" onclick="copyToClipboard('Sienna.sinohin@gmail.com')">Contact</button></p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../shopping cart/images/ange.jpg" alt="Ange" style="width:100%">
        <div class="container">
          <h2>Sarmiento, Angeline L.</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>angeline.sarmiento0303@gmail.com</p>
          <p><button class="button" onclick="copyToClipboard('angeline.sarmiento0303@gmail.com')">Contact</button></p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="carda">
        <img src="../shopping cart/images/kel.jpg" alt="Kel" style="width:100%">
        <div class="container">
          <h2>Ayap, Michael C.</h2>
          <p class="title">Programmer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>michaelayap22@gmail.com</p>
          <p><button class="button" onclick="copyToClipboard('michaelayap22@gmail.com')">Contact</button></p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="carda">
        <img src="../shopping cart/images/ian.jpg" alt="Ian" style="width:100%">
        <div class="container">
          <h2>Villadarez, Ian Beach M.</h2>
          <p class="title">Programmer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>ianbeach.villadarez025@gmail.com</p>
          <p><button class="button" onclick="copyToClipboard('ianbeach.villadarez025@gmail.com')">Contact</button></p>
        </div>
      </div>
    </div>
  </div>



  <!-- custom js file link  -->
  <script src="js/script.js"></script>
  <script>
    $(document).ready(function() {
      $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
          url: 'message.php',
          type: 'POST',
          data: 'text=' + $value,
          success: function(result) {
            $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="images/Logo.png"></div><div class="msg-header"><p>' + result + '</p></div></div>';
            $(".form").append($replay);
            // when chat goes down the scroll bar automatically comes to the bottom
            $(".form").scrollTop($(".form")[0].scrollHeight);
          }
        });
      });
    });
  </script>
  <script>
    window.onload = function() {
      var form = document.getElementById('chatbot-popup');
      form.style.display = 'none';
    };

    function openChatbot() {
      document.getElementById('chatbot-popup').style.display = 'block';
      document.getElementById('buttontit').style.display = 'none';
    }

    function closeChatbot() {
      document.getElementById('chatbot-popup').style.display = 'none';
      document.getElementById('buttontit').style.display = 'block';
    }
  </script>
  <script>
    function updateInputBox(value) {
      // Set the value of the input box to the clicked button's value
      document.getElementById('data').value = value;
    }
  </script>

  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
  </script>

  <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>

  <script>
    function copyToClipboard(text) {
      var dummy = document.createElement("textarea");
      document.body.appendChild(dummy);
      dummy.value = text;
      dummy.select();
      document.execCommand("copy");
      document.body.removeChild(dummy);
    }
  </script>

  <script>
    function copyToClipboard(text) {
      var dummy = document.createElement("textarea");
      document.body.appendChild(dummy);
      dummy.value = text;
      dummy.select();
      document.execCommand("copy");
      document.body.removeChild(dummy);

      var notification = document.getElementById("notification");
      notification.style.display = "block";
      setTimeout(function() {
        notification.style.display = "none";
      }, 2000);
    }
  </script>
  <script>
    // Get the container for the suggested questions
    const container = document.getElementById('suggested-questions-container');

    // Get the send button
    const sendBtn = document.getElementById('send-btn');

    // Attach a click event listener to the send button
    sendBtn.addEventListener('click', () => {
      // Send an AJAX request to fetch the updated suggested questions
      const xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch_suggested_questions.php');

      xhr.onload = () => {
        if (xhr.status === 200) {
          // Replace the suggested questions with the updated ones
          container.innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    });
  </script>

  </script>
  <BR>
  <br>
  <footer>

    <div class="bg-light py-4">
      <div class="container text-center">
        <p class="text-muted mb-0 py-2">© 2023 Baby's Cake Group 5 SBIT3E.</p>
      </div>
    </div>
  </footer>
</body>

</html>