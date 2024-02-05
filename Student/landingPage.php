<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Student Landing Page</title>
  </head>
  <body>
    <nav>
      <div class="nav__logo"><a href="#">TEACH - EASE</a></div>
      <ul class="nav__links">
        <li class="link"><a href="studash.php">Dashboard</a></li>
        <li class="link"><a href="../logout.php" class="nav__btn">Logout</a></li>
      </ul>
    </nav>
    <section class="container">
      <div class="content__container">
        <h1>
          Best Learning<br />
          <span class="heading__1">Education Platform</span><br />
          <span class="heading__2">in Sri Lanka</span>
        </h1>
        <p>
          Welcome to the first step of unlocking your fullest learning potential. Take the next step by Searching the courses you want to join below!
        </p>
        <form>
          <input type="text" placeholder="What do you want to learn" />
          <button type="submit">Search Course</button>
        </form>
      </div>
      <div class="image__container">
        <img src="assets/header-1.jpeg" alt="header" />
        <img src="assets/header-2.jpg" alt="header" />
        <div class="image__content">
          <ul>
            <li>Get 30% off on every 1st month</li>
            <li>Expert teachers</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="section__container booking__container">
      <div class="booking__nav">
        <span>Sinhala Medium</span>
        <span>English Medium</span>
        <span>Tamil Medium</span>
      </div>
      <form>
        <div class="form__group">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" />
              <label>Grade</label>
            </div>
            <p>Which Grade are you in?</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-user-3-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="number" />
              <label>Subject</label>
            </div>
            <p>Which Subject</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-calendar-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" />
              <label>Start Date</label>
            </div>
            <p>Add date</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-calendar-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" />
              <label>Preferable Time</label>
            </div>
            <p>TIme</p>
          </div>
        </div>
        <button class="btn">search</button>
      </form>
    </section>

    <section class="section__container plan__container">
      <p class="subheader">Educational SUPPORT</p>
      <h2 class="section__header">Plan your education with confidence</h2>
      <p class="description">
        Find the best tutors to help guide you during your O/level examinations.
      </p>
      <div class="plan__grid">
        <div class="plan__content">
          <span class="number">01</span>
          <h4>Top Qualified teachers</h4>
          <p>
            Our top-qualified teachers possess in-depth knowledge and expertise in the O/Level curriculum.
           With years of experience, they are well-versed in the intricacies of the subjects and are capable of delivering effective lessons that align with the examination requirements. 
          </p>
          <span class="number">02</span>
          <h4>Comprehensive Subject Coverage:</h4>
          <p>
            Access a wide range of O/level subjects, providing you with a comprehensive understanding of the curriculum. Whether you need assistance in mathematics, sciences, languages, or history, finding tutors who are well-versed in diverse subjects ensures that you receive well-rounded support
          </p>
          <span class="number">03</span>
          <h4>Continuous Progress Monitoring</h4>
          <p>
            Benefit from regular assessments and progress tracking provided by your tutors. Continuous monitoring allows you to gauge your improvement over time, identify areas that still need attention, and adjust your study plan accordingly.
          </p>
        </div>
        <div class="plan__image">
          <img src="assets/plan1.png" alt="plan" />
          <img src="assets/plan-2.jpg" alt="plan" />
          <img src="assets/plan-3.jpg" alt="plan" />
        </div>
      </div>
    </section>

    <section class="section__container travellers__container">
      <h2 class="section__header">Best Teachers of the month</h2>
      <div class="travellers__grid">
        <div class="travellers__card">
          <img src="assets/traveller-1.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-1.jpg" alt="client" />
            <h4>Nishani Siriwardhana</h4>
            <p>English</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="assets/traveller-2.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-2.jpg" alt="client" />
            <h4>Amal Abeysekara</h4>
            <p>Science</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="assets/traveller-3.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-3.jpg" alt="client" />
            <h4>Gayani Peiris</h4>
            <p>Math</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="assets/traveller-4.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-4.jpg" alt="client" />
            <h4>Roshan Perera</h4>
            <p>History</p>
          </div>
        </div>
      </div>
    </section>


    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>Teach Ease</h3>
          <p>
            Where Excellence Ignites Minds. With a steadfast commitment to academic success and a passion for learning, Teach- Ease offers unparalleled educational support and seamless journeys towards knowledge
          </p>
          <p>
            From inspiring educators to cutting-edge learning resources, we bridge the gaps in education, ensuring a nurturing, enriching, and unforgettable academic experience.
          </p>
        </div>
        <div class="footer__col">
          <h4>INFORMATION</h4>
          <p>Home</p>
          <p>About</p>
          <p>Offers</p>
        </div>
        <div class="footer__col">
          <h4>CONTACT</h4>
          <p>Support</p>
          <p>Media</p>
          <p>Socials</p>
        </div>
      </div>
        <div class="socials">
          <span><i class="ri-facebook-fill"></i></span>
          <span><i class="ri-twitter-fill"></i></span>
          <span><i class="ri-instagram-line"></i></span>
          <span><i class="ri-youtube-fill"></i></span>
        </div>
    </footer>
  </body>
</html>
