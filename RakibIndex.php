<?php

@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
};
?>

$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Graphic and web Design Services Website</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/Rakibstyle.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo"><img src="images/logo.png" alt=""></a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="#Designs">Designs</a>
         <a href="#gallery">gallery</a>
         <a href="#Images">Images</a>
         <a href="#contact">contact</a>
      </nav>

      <div id="Designs-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<div class="home-bg">

   <section class="home" id="home">

      <div class="content">
         <h3>M Rakib H</h3>
         <h4>Creative and Innovative WEB & GRAPHIC DESIGNER || Editor</h4>
         <p>This is Md Rakib Hossain. I am an Expert Graphic designer and Expert Photo Editor with in-depth working  knowledge of the Photoshop and Illustrator.</p>
         <a href="#about" class="btn">about me</a>
      </div>

   </section>

</div>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="image">
      <img src="images/Why-me.png" alt="">
   </div>

   <div class="content">
      <h3>Creative and Innovative WEB & GRAPHIC DESIGNER || Editor</h3>
      <p>This is Md Rakib Hossain ?Ra Kib?. I am an Expert Graphic Designer and Expert Photo Editor with in-depth working knowledge of the Photoshop, InDesign, illustrator & CorelDraw.</p>
      <a href="#Designs" class="btn">Services</a>
   </div>

</section>

<!-- about section ends -->

<!-- facility section starts  -->

<section class="facility">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>My service</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Ebook Cover Design</h3>
         <p>Ebook cover creates the first impression on readers. Therefore, a book cover design is one of the most important aspects of marketing a book.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Line Art drawings for Website</h3>
         <p>I have drawn four creative drawings to describe four steps of a transaction process. Thanks</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Logo Design & Branding</h3>
         <p>Logo grabs attention, makes a strong first impression, is the foundation of the brand identity.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Invitation card division</h3>
         <p>Invitation card helps maintain friendships and build a stronger connection.</p>
      </div>

   </div>

</section>

<!-- facility section ends -->
<!-- Designs section starts  -->

<section class="Designs" id="Designs">
   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>Some Designs</h3>
   </div>
      <div class="box-container">
         <div class="box">
         <img src="images/Designs-1.jpg" alt="">
         <h3>Logo</h3>
      </div>
      <div class="box">
         <img src="images/Designs-2.png" alt="">
         <h3>Menu</h3>
      </div>
      <div class="box">
         <img src="images/Designs-3.jpg" alt="">
         <h3>Logo</h3>
      </div>
      <div class="box">
         <img src="images/Designs-4.jpg" alt="">
         <h3>Engineers Logo Idea</h3>
      </div>
      <div class="box">
         <img src="images/Designs-5.png" alt="">
         <h3>Logo Concept</h3>
      </div>
      <div class="box">
         <img src="images/Designs-6.jpg" alt="">
         <h3>Tech Logo</h3>
      </div>
   </div>

</section>
<!-- Designs section ends -->
<!-- gallery section starts  -->
<section class="gallery" id="gallery">
   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our gallery</h3>
   </div>

   <div class="box-container">
            <img src="images/gallery-1.jpg" alt="">
            <img src="images/gallery-2.png" alt="">
            <img src="images/gallery-3.jpg" alt="">
            <img src="images/gallery-4.jpg" alt="">
            <img src="images/gallery-5.jpg" alt="">
            <img src="images/gallery-6.jpg" alt="">
        </div>

</section>

<!-- gallery section ends -->

<!-- Images section starts  -->

<section class="Images" id="Images">

        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>Some Images</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="images/Image-1.jpg" alt="">
                <h3>YouTube Cover</h3>
            </div>
            <div class="box">
                <img src="images/Image-2.jpg" alt="">
                <h3>Image Editing</h3>
            </div>
            <div class="box">
                <img src="images/Image-3.jpg" alt="">
                <h3>Color Correction</h3>
            </div>
            <div class="box">
                <img src="images/Image-4.jpg" alt="">
                <h3>Photo Manipulation</h3>
            </div>
            <div class="box">
                <img src="images/Image-5.jpg" alt="">
                <h3>Editing</h3>
            </div>
            <div class="box">
                <img src="images/Image-6.jpg" alt="">
                <h3>Sketch for Image</h3>
            </div>

        </div>

</section>

<!-- Images section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>contact me</h3>
        </div>

        <div class="row">

            <div class="image">
                <img src="images/Why-me.png" alt="">
            </div>

            <form action="" method="post">
                <h3>Get Your Designs</h3>
                <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name">
                <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false">
                <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many designs do you need" min="0" max="99" onkeypress="if(this.value.length == 2) return false">
                <input type="submit" name="send" value="send message" class="btn">
            </form>

        </div>

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>Contact via email</h3>
         <p>rakib.rocky@gmail.com<akib.rocky /p>
          <p>1731400@iub.edu.bd</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>Availability</h3>
         <p>Saturday to Thursday <br />
            From: 07:00am to 09:00pm (BDT)</p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>Location</h3>
         <p>Bashundhara R/a <br /> Dhaka-1229, Bangladesh</p>
      </div>

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Cell number</h3>
         <p>+880 1767983636</p>
         <p>+880 1924148241</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?= date('Y'); ?> by <span>mr. web designer</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/Rakibscript.js"></script>

</body>
</html>