<?php
include('includes/header2.php');
include('includes/header.php');
?>


<style>
  body {
    background: #f5f5f5;
    font-family: Arial, sans-serif;
  }

  .event-banner {
    width: 100%;
    height: auto;
    max-height: 300px; /* Adjust as needed */
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 20px;
  }
   .event-info-card {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.08);
  margin-bottom: 20px;
  gap: 20px;
}
.Speaker-img
{
    width:50px;
}
.social-icons {
  display: flex;
  justify-content: center; /* centers the icons horizontally */
  gap: 10px; /* space between icons */
  margin-bottom: 15px;
}

.social-icons a {
  font-size: 18px;
  color: #333;
  transition: color 0.3s;
}

.social-icons a:hover {
  color: #007bff; /* highlight color on hover */
}
.qr-image
{
    width:160px;
    
}

.info-item {
  flex: 1 1 30%;
  min-width: 150px;
}

.icon {
  font-size: 24px;
  color: #333;
  margin-bottom: 5px;
}

.label {
  font-weight: bold;
  font-size: 14px;
  text-transform: uppercase;
}

.value {
  font-size: 15px;
  color: #666;
}

  .section {
    margin-top: 30px;
  }

  .sidebar-box {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 20px;
  }

  .sidebar-title {
    font-weight: bold;
    margin-bottom: 10px;
  }

  .main-content {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  
  .share-event-box {
  background: #fff;
  padding: 30px 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  text-align: center;
  margin-top: 30px;
}

.share-title {
  font-weight: bold;
  margin-bottom: 15px;
  position: relative;
  display: inline-block;
}

.share-title::after {
  content: "";
  display: block;
  width: 40%;
  height: 3px;
  background: #000;
  margin: 5px auto 0;
}

.social-icons-share {
  margin-top: 15px;
  display: flex;
  justify-content: center;
  gap: 15px;
}

.social-icons-share a {
  color: white;
  font-size: 18px;
  padding: 10px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.social-icons-share .facebook { background: #3b5998; }
.social-icons-share .xing     { background: #cfd1d2; color: #333; }
.social-icons-share .linkedin { background: #0077b5; }
.social-icons-share .whatsapp { background: #25d366; }
.social-icons-share .email    { background: #ff5e5e; }



.map-embed {
  border-radius: 10px;
  overflow: hidden;
  margin-top: 20px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}.countdown-wrapper {
  background-color: #fff;
  padding: 30px 20px;
  border-radius: 10px;
  text-align: center;
  width: 100%;
  margin: 10px auto;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.countdown {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.time-segment {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.digit {
  font-size: 48px;
  background: #222;
  color: #fff;
  padding: 15px 10px;
  border-radius: 6px;
  min-width: 45px;
  font-family: monospace;
  transition: transform 0.5s;
}

.label {
  margin-top: 5px;
  font-weight: bold;
  font-size: 12px;
  color: #333;
}

.flip {
  animation: flip 0.5s ease-in-out;
}

@keyframes flip {
  0%   { transform: rotateX(0deg); }
  50%  { transform: rotateX(180deg); }
  100% { transform: rotateX(0deg); }
}

/* 🌐 Mobile View: Responsive Adjustments */
@media (max-width: 768px) {
  .event-info-card,
  .main-content,
  .sidebar-box,
  .share-event-box,
  .countdown-wrapper {
    padding: 15px;
  }

  .digit {
    font-size: 36px;
    min-width: 40px;
  }

  .countdown {
    flex-wrap: wrap;
    gap: 10px;
  }

  .info-item {
    flex: 1 1 100%;
    min-width: 100%;
    margin-bottom: 15px;
  }

  .qr-image {
    width: 120px;
  }

  .social-icons,
  .social-icons-share {
    flex-wrap: wrap;
    gap: 8px;
  }

  .sidebar-title {
    font-size: 16px;
  }

  .label, .value {
    font-size: 13px;
  }

  .event-banner {
    max-height: 180px;
  }
}

</style>
<!-- Style for tickets and stepper -->
<style>
  .ticket-row {
    display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;
  }

  .ticket-info {
    display: flex; align-items: center;
  }

  .ticket-icon {
    width: 35px; margin-right: 15px;
  }

  .ticket-title {
    font-weight: bold;
  }

  .ticket-price {
    font-size: 20px; font-weight: bold;
  }

  .step-circle {
    color: #999; border: 2px solid #ccc; border-radius: 50%; width: 25px; height: 25px; line-height: 23px; margin: auto;
  }

  .step-label {
    margin-top: 5px; color: #999;
  }

  .step-line {
    flex: 1; margin: 0 5px; border-top: 2px solid #ccc;
  }

  .active-step {
    background: #28c76f !important; color: #fff !important; border-color: #28c76f !important;
  }

  .active-step-text {
    color: #28c76f !important; font-weight: bold;
  }
</style>

<div class="container mt-4">
<?php
include 'config.php';

$sql = "SELECT image FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<p>
        <img src="./admin/uploads/' . htmlspecialchars($row['image']) . '" class="event-banner" alt="Sukahnazar Foundation Banner">
         
    </p>';
}
?>

  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="sidebar-box">
  <div class="sidebar-title"><i class="fa-solid fa-users"></i> ORGANIZER</div>
  <p><i class="fa-solid fa-users"></i> Sukahnazar Foundation</p>
  <p><i class="fas fa-envelope"></i> Email: info@socialhouse.in</p>
  <p><i class="fas fa-phone"></i> 
+91 96903 00527</p>

  <!-- Social Icons -->
  <div class="social-icons mb-3">
    <a href="#" class="me-2 text-dark"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="me-2 text-dark"><i class="fab fa-instagram"></i></a>
    <a href="#" class="me-2 text-dark"><i class="fab fa-twitter"></i></a>
    <a href="#" class="text-dark"><i class="fab fa-youtube"></i></a>
  </div>

  <a href="#" class="btn btn-dark w-100">Buy Tickets</a>
</div>


      <div class="sidebar-box">
        <div class="sidebar-title"><i class="fa fa-volume-high"></i> Speaker</div><?php
include 'config.php';

$sql = "SELECT hostname FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<p>
        <img src="https://img.freepik.com/premium-vector/person-with-blue-shirt-that-says-name-person_1029948-7040.jpg" class="Speaker-img">
        ' . htmlspecialchars($row['hostname']) . '
    </p>';
}
?>

        <hr>
        <small>Writer, Performer, Event Host</small>
      </div>

      <div class="sidebar-box">
        <div class="sidebar-title"><i class="fa-solid fa-location-dot"></i> Location</div>
        <?php
include 'config.php';

$sql = "SELECT  audience_price , performer_price , location FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<p>
        ' . htmlspecialchars($row['location']) . '
    </p>';
}
?>

      </div>

      <div class="sidebar-box">
        <div class="sidebar-title">Category</div>
        <p>Poetry & Storytelling</p>
      </div>

      <div class="sidebar-box">
        <div class="sidebar-title"><i class="fa-solid fa-arrow-right"></i> Next Occurrence</div>
        <hr>
        <p><i class="fa-regular fa-calendar-days"></i> Sun, Aug 02 2025<br><i class="fa-solid fa-clock"></i> 3:00 PM – 5:30 PM</p>
      </div>
      
      <div class="sidebar-box">
        <div class="sidebar-title"><i class="fa-solid fa-qrcode"></i> Scan For Website</div>
        <hr>
        <p><img src="assets/images/sukhanzar_booking_qr.png" class="qr-image"></p>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-8">
         <div class="event-info-card d-flex justify-content-between align-items-center flex-wrap">
  <div class="info-item text-center">
    <i class="fas fa-calendar-alt icon"></i>
    <div class="label">DATE</div>
    <div class="value"><?php
include 'config.php';

$sql = "SELECT event_date FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '
        ' . htmlspecialchars($row['event_date']) . '
    ';
}
?>
</div>
  </div>
  <div class="info-item text-center">
    <i class="fas fa-clock icon"></i>
    <div class="label">TIME</div>
    <div class="value"><?php
include 'config.php';

$sql = "SELECT event_time FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '
        ' . htmlspecialchars($row['event_time']) . '
    ';
}
?></div>
  </div>
  <div class="info-item text-center">
    <i class="fas fa-wallet icon"></i>
    <div class="label">STARTS FROM</div>
    <div class="value">₹299.00</div>
  </div>
</div>

      <div class="main-content">
          <?php
include 'config.php';

$sql = "SELECT heading FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<h3>' . htmlspecialchars($row['heading']) . '
    </h3>';
}
?>
        <p>Sukahnazar Foundation, New Delhi’s open mic platform for poetry, stories, and performances invites artists from all walks of life to express themselves.</p>
        <hr>

        <h5>Important Rules</h5>
        <ul>
          <li>Only 1 entry per artist per event is allowed.</li>
          <li>Content must be original. No hate speech.</li>
          <li>Languages allowed: Hindi, Urdu, English.</li>
        </ul>

        <h5>Performance Rules</h5>
        <ul>
          <li>Time limit is 3 minutes per performer.</li>
          <li>Props, music background, or mics will not be provided.</li>
        </ul>

        <h5>Recording Rules</h5>
        <p>All performances are recorded. Artists are allowed to use clips personally with permission.</p>

        <h5>Audience Etiquette</h5>
        <ul>
          <li>Be respectful.</li>
          <li>Refrain from disturbing performers or audience.</li>
        </ul>

        <h5>Submission Preferences</h5>
        <ul>
          <li>Submit your entry online through our official form.</li>
          <li>Categories: Storytelling / Poetry</li>
        </ul>
      </div>
      
      <div class="share-event-box">
  <h5 class="share-title">SHARE THIS EVENT</h5>
  <div class="social-icons-share">
    <a href="https://www.facebook.com/sharer/sharer.php?u=https://sukhanzarfoundation.com/booking.php" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="xing"><i class="fab fa-xing"></i></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://sukhanzarfoundation.com/booking.php" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
    <a href="https://wa.me/?text=https://sukhanzarfoundation.com/booking.php" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
    <a href="mailto:?subject=Check this out&body=https://sukhanzarfoundation.com/booking.php" class="email"><i class="fas fa-envelope"></i></a>
  </div>
</div>
<div class="map-embed">
<?php
include 'config.php';

$sql = "SELECT map_link FROM add_ticket ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<iframe 
        src="' . htmlspecialchars($row['map_link']) . '" 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>';
}
?>
</div>



<div class="countdown-wrapper">
  <div class="countdown">
    <div class="time-segment">
      <span class="digit" id="days">00</span>
      <span class="label">DAY</span>
    </div>
    <div class="time-segment">
      <span class="digit" id="hours">00</span>
      <span class="label">HRS</span>
    </div>
    <div class="time-segment">
      <span class="digit" id="minutes">00</span>
      <span class="label">MIN</span>
    </div>
    <div class="time-segment">
      <span class="digit" id="seconds">00</span>
      <span class="label">SEC</span>
    </div>
  </div>
</div>
<!--jjj-->
<div style="max-width: 800px; margin: auto; font-family: Arial, sans-serif; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

  <!-- Stepper -->
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;" id="stepper">
    <div style="text-align: center;" id="step1">
      <div class="step-circle active-step">1</div>
      <div class="step-label active-step-text">Select Ticket</div>
    </div>
    <hr class="step-line">
    <div style="text-align: center;" id="step2">
      <div class="step-circle">2</div>
      <div class="step-label">Attendees</div>
    </div>
    <hr class="step-line">
    <div style="text-align: center;" id="step3">
      <div class="step-circle">3</div>
      <div class="step-label">Payment</div>
    </div>
    <hr class="step-line">
    <div style="text-align: center;" id="step4">
      <div class="step-circle">4</div>
      <div class="step-label">Confirmation</div>
    </div>
  </div>
  <!--payment and - form-->

<!-- Step 1: Ticket Options -->
<div id="ticket-section">
  <label style="display: block; margin-bottom: 10px;">Select Date <span style="color: red">*</span></label>
  <input type="datetime-local" id="event-date" required style="padding: 10px; width: 100%; border-radius: 6px; border: 1px solid #ccc; margin-bottom: 20px;">

  <!-- Performance Ticket -->
  <div class="ticket-row">
    <div class="ticket-info">
      <img src="https://www.citypng.com/public/uploads/preview/hd-black-hand-to-hand-money-cash-payment-icon-transparent-png-701751694974663tfjsmuftvt.png" class="ticket-icon">
      <div>
        <div class="ticket-title">Performance Only</div>
        <div class="ticket-price">
          <?php
          include 'config.php';
          $sql = "SELECT performer_price FROM add_ticket ORDER BY id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if ($row = mysqli_fetch_assoc($result)) {
              echo "₹ " . htmlspecialchars($row['performer_price']);
              $price = $row['performer_price'];
          } else { echo "No ticket price"; $price = 0; }
          ?>
        </div>
      </div>
    </div>
    <select onchange="calculateTotal()" class="qty" data-price="<?php echo htmlspecialchars($price); ?>">
      <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
    </select>
  </div>

  <!-- Performance + Video -->
  <div class="ticket-row">
    <div class="ticket-info">
      <img src="https://www.citypng.com/public/uploads/preview/hd-black-hand-to-hand-money-cash-payment-icon-transparent-png-701751694974663tfjsmuftvt.png" class="ticket-icon">
      <div>
        <div class="ticket-title">Performance + Video</div>
        <div class="ticket-price">
          <?php
          $sql = "SELECT performer_price FROM add_ticket ORDER BY id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if ($row = mysqli_fetch_assoc($result)) {
              echo "₹ " . htmlspecialchars($row['performer_price']);
              $price = $row['performer_price'];
          } else { echo "No ticket price"; $price = 0; }
          ?>
        </div>
      </div>
    </div>
    <select onchange="calculateTotal()" class="qty" data-price="<?php echo htmlspecialchars($price); ?>">
      <option>0</option><option>1</option><option>2</option><option>3</option>
    </select>
  </div>

  <!-- Audience Ticket -->
  <div class="ticket-row">
    <div class="ticket-info">
      <img src="https://www.citypng.com/public/uploads/preview/hd-black-hand-to-hand-money-cash-payment-icon-transparent-png-701751694974663tfjsmuftvt.png" class="ticket-icon">
      <div>
        <div class="ticket-title">Audience Ticket</div>
        <div class="ticket-price">
          <?php
          $sql = "SELECT audience_price FROM add_ticket ORDER BY id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if ($row = mysqli_fetch_assoc($result)) {
              echo "₹ " . htmlspecialchars($row['audience_price']);
              $audience_price = $row['audience_price'];
          } else { echo "No ticket price"; $audience_price = 0; }
          ?>
        </div>
      </div>
    </div>
    <select onchange="calculateTotal()" class="qty" data-price="<?php echo htmlspecialchars($audience_price); ?>">
      <option>0</option><option>1</option><option>2</option><option>3</option>
    </select>
  </div>

  <div style="margin-top: 20px; font-size: 16px; text-align: right;">
    <strong>Total: ₹<span id="total">0</span></strong>
  </div>

  <div style="margin-top: 20px; text-align: right;">
    <button id="nextBtn" style="padding: 10px 25px; background: #444; color: #fff; border: none; border-radius: 5px;">Next ➜</button>
  </div>
</div>

<!-- Step 2: Attendee Info -->
<div id="attendee-section" style="display: none; margin-top: 30px;">
  <h3 style="margin-bottom: 15px;">Attendee Information</h3>
  <input type="text" id="fullname" placeholder="Full Name" style="padding: 10px; width: 100%; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
  <input type="email" id="email" placeholder="Email Address" style="padding: 10px; width: 100%; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
  <input type="text" id="contact" placeholder="Contact Number" style="padding: 10px; width: 100%; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">

  <div style="margin-top: 20px; display: flex; justify-content: space-between;">
    <button id="backBtn" style="padding: 10px 25px; background: #ccc; color: #000; border: none; border-radius: 5px;">⬅ Go Back</button>
    <button id="toPaymentBtn" style="padding: 10px 25px; background: #28c76f; color: #fff; border: none; border-radius: 5px;">Next ➜</button>
  </div>
</div>

<!-- Step 3: Payment -->
<div id="payment-section" style="display: none; margin-top: 30px;">
  <h3 style="margin-bottom: 15px;">Payment</h3>
  <p style="margin-bottom:15px; color:#666;">Click Pay Now and scan QR to complete payment</p>

  <div style="margin-top: 20px; text-align: right;">
    <button id="backToAttendeeBtn" style="padding: 10px 25px; background: #ccc; color: #000; border: none; border-radius: 5px;">⬅ Go Back</button>
    <button id="payNowBtn" style="padding: 10px 25px; background: #28c76f; color: #fff; border: none; border-radius: 5px;">Pay Now</button>
  </div>
</div>

<!-- QR Popup Modal -->
<div id="qrModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center; z-index:9999;">
  <div style="background:#fff; padding:20px; border-radius:10px; text-align:center; max-width:400px; position:relative;">
    <span onclick="document.getElementById('qrModal').style.display='none'" 
          style="position:absolute; top:10px; right:15px; cursor:pointer; font-size:20px;">✖</span>
    <h3>Scan & Pay</h3>
    <img src="qr.jpg" alt="QR Code" style="width:250px; margin:20px 0;">
    <p style="color:#666;">Pay ₹<span id="finalAmount">0</span> using UPI</p>
  </div>
</div>

    <!-- end-->
  </div>
</div>



      <br>
       <br>
      
      
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<br>
<?php
include('includes/footer.php');
?>
<script>
  const targetDate = new Date("2025-08-15T15:30:00").getTime(); // change your event date & time here

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance < 0) {
      document.querySelector(".countdown").innerHTML = "<h3>Event Started</h3>";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    document.getElementById("days").innerText = String(days).padStart(2, '0');
    document.getElementById("hours").innerText = String(hours).padStart(2, '0');
    document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
    document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
  }

  setInterval(updateCountdown, 1000);
  updateCountdown();
</script>


<script>
  function calculateTotal() {
    let total = 0;
    document.querySelectorAll('.qty').forEach(function(select) {
      const price = parseInt(select.getAttribute('data-price'));
      const qty = parseInt(select.value);
      total += price * qty;
    });
    document.getElementById('total').innerText = total;
  }
</script>
<script>
  function calculateTotal() {
    let total = 0;
    document.querySelectorAll('.qty').forEach(select => {
      let price = parseInt(select.getAttribute('data-price')) || 0;
      let qty = parseInt(select.value) || 0;
      total += price * qty;
    });
    document.getElementById('total').innerText = total;
  }

  document.getElementById('nextBtn').addEventListener('click', function () {
    let total = parseInt(document.getElementById('total').innerText);
    if (total === 0) {
      alert("Please select at least one ticket.");
      return;
    }
    document.getElementById('ticket-section').style.display = "none";
    document.getElementById('attendee-section').style.display = "block";
    document.querySelector('#step2 .step-circle').classList.add('active-step');
    document.querySelector('#step2 .step-label').classList.add('active-step-text');
  });

  document.getElementById('backBtn').addEventListener('click', function () {
    document.getElementById('attendee-section').style.display = "none";
    document.getElementById('ticket-section').style.display = "block";
    document.querySelector('#step2 .step-circle').classList.remove('active-step');
    document.querySelector('#step2 .step-label').classList.remove('active-step-text');
  });

  document.getElementById('toPaymentBtn').addEventListener('click', function () {
    document.getElementById('attendee-section').style.display = "none";
    document.getElementById('payment-section').style.display = "block";
    document.querySelector('#step3 .step-circle').classList.add('active-step');
    document.querySelector('#step3 .step-label').classList.add('active-step-text');
  });

  document.getElementById('backToAttendeeBtn').addEventListener('click', function () {
    document.getElementById('payment-section').style.display = "none";
    document.getElementById('attendee-section').style.display = "block";
    document.querySelector('#step3 .step-circle').classList.remove('active-step');
    document.querySelector('#step3 .step-label').classList.remove('active-step-text');
  });
</script>


<script>
  document.getElementById('payNowBtn').addEventListener('click', function () {
    // Show QR modal instead of processing card
    document.getElementById('qrModal').style.display = "flex";
  });
</script>
<script>
function calculateTotal(){
  let qtys=document.querySelectorAll('.qty');
  let total=0;
  qtys.forEach(q=>{
    total += parseInt(q.value)*parseInt(q.getAttribute("data-price"));
  });
  document.getElementById("total").innerText=total;
}

// Steps navigation
document.getElementById("nextBtn").onclick=()=>{
  document.getElementById("ticket-section").style.display="none";
  document.getElementById("attendee-section").style.display="block";
};
document.getElementById("backBtn").onclick=()=>{
  document.getElementById("attendee-section").style.display="none";
  document.getElementById("ticket-section").style.display="block";
};
document.getElementById("toPaymentBtn").onclick=()=>{
  document.getElementById("attendee-section").style.display="none";
  document.getElementById("payment-section").style.display="block";
};
document.getElementById("backToAttendeeBtn").onclick=()=>{
  document.getElementById("payment-section").style.display="none";
  document.getElementById("attendee-section").style.display="block";
};

// Pay Now + Save to DB
document.getElementById("payNowBtn").onclick=()=>{
  let total=document.getElementById("total").innerText;
  let name=document.getElementById("fullname").value;
  let email=document.getElementById("email").value;
  let contact=document.getElementById("contact").value;

  if(name=="" || email=="" || contact==""){
    alert("Please fill all details!");
    return;
  }

  document.getElementById("finalAmount").innerText=total;
  document.getElementById("qrModal").style.display="flex";

  // Save booking in DB via AJAX
  let xhr=new XMLHttpRequest();
  xhr.open("POST","save_booking.php",true);
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  xhr.send(
    "name="+encodeURIComponent(name)+
    "&email="+encodeURIComponent(email)+
    "&contact="+encodeURIComponent(contact)+
    "&amount="+encodeURIComponent(total)
  );
};
</script>



