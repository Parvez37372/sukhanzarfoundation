<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submit Poetry</title>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
// Show SweetAlert if session message is set
if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
    $status = $_SESSION['status'];
    $message = $_SESSION['message'];
    echo "
    <script>
        Swal.fire({
            icon: '$status',
            title: '$message',
            confirmButtonText: 'OK'
        });
    </script>";
    unset($_SESSION['status']);
    unset($_SESSION['message']);
}
?>

<?php include('includes/header2.php'); ?>
<?php include('includes/header.php'); ?>

<style>
  body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    padding: 0;
    background: #fff;
  }

  .main-wrapper {
    display: flex;
    justify-content: center;
    gap: 60px;
    padding: 30px;
    flex-wrap: wrap;
  }

  .form-container {
    flex: 1;
    max-width: 700px;
  }

  .right-sidebar {
    flex: 0 0 250px;
  }

  h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  p.subheading {
    color: #333;
    font-size: 14px;
    margin-bottom: 30px;
  }

  ul.guidelines {
    list-style: decimal;
    padding-left: 20px;
    font-size: 14px;
    color: #444;
  }

  .form-group {
    margin: 15px 0;
  }

  .form-group input[type="text"],
  .form-group input[type="email"],
  .form-group select,
  .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 14px;
    border-radius: 4px;
    resize: vertical;
  }

  .category-select button {
    background: #eee;
    border: none;
    margin-right: 10px;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 600;
  }

  .category-select .active {
    background-color: #7a0a7a;
    color: white;
  }

  textarea {
    height: 150px;
  }

  .checkbox-group {
    margin-top: 15px;
    font-size: 14px;
  }

  .checkbox-group label {
    display: flex;
    align-items: center;
    gap: 10px;
    line-height: 1.5;
    cursor: pointer;
  }

  .checkbox-group input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: #008CFF;
    cursor: pointer;
  }

  .submit-btn {
    margin-top: 20px;
    background-color: #7a0a7a;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
  }

  .right-sidebar img {
    width: 100%;
    height: 400px;
    margin-bottom: 20px;
    border-radius: 8px;
    object-fit: cover;
  }
  .checkbox-icone{
      color:black;
      border:1px black solid;
  }
  .checkbox-icone:hover{
      color:green;
      border:1px solid black;
  }
  
.checkbox-custom {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  user-select: none;
}

.checkbox-custom input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkbox-custom .checkmark {
  position: absolute;
  left: 0;
  top: 0;
  height: 20px;
  width: 20px;
  border: 1px solid black;
  background-color: white;
  border-radius: 4px;
}

.checkbox-custom input:checked ~ .checkmark::after {
  content: "✓";
  position: absolute;
  left: 4px;
  top: 0px;
  font-size: 16px;
  color: green;
}

</style>

<div class="main-wrapper">

  <!-- Left: Form -->
  <div class="form-container">
    <h2>SUBMIT YOUR WORK ON SUKHANZAR</h2>
    <p class="subheading">Share your work with us. Upload your Poetry/Prose and get a chance to be featured on Sukhanzar.org</p>
    <ul class="guidelines">
      <li>Poetry submission is preferred in Devanagari and Urdu script</li>
      <li>Only one poetry can be submitted at a time</li>
      <li>Plagiarized work will not be accepted</li>
      <li>Sharing inappropriate content is strictly prohibited</li>
    </ul>

    <form action="submit_poetry.php" method="POST">
      <div class="form-group">
        <input type="text" name="name" placeholder="Full Name" required />
      </div>
      <div class="form-group">
        <input type="text" name="pen" placeholder="Pen Name (Takhallus)" required />
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="form-group">
        <label>Tell us what you are writing today</label><br><br>
        <div class="category-select">
          <button type="button" class="cat-btn active" data-value="Ghazal">Ghazal</button>
          <button type="button" class="cat-btn" data-value="Nazm">Nazm</button>
          <button type="button" class="cat-btn" data-value="Sher">Sher</button>
          <button type="button" class="cat-btn" data-value="Prose">Prose</button>
          <button type="button" class="cat-btn" data-value="Others">Others</button>
        </div>
        <input type="hidden" name="category" id="categoryInput" value="Ghazal">
      </div>

      <div class="form-group">
        <input type="text" name="title" placeholder="Poetry Title" required />
      </div>

      <div class="form-group">
        <textarea name="poetry" placeholder="Write your poetry here..." required></textarea>
      </div>

     <div class="checkbox-group">
  <label class="checkbox-custom">
    <input type="checkbox" name="consent" required />
    <span class="checkmark"></span>
    I acknowledge that Sukhanzar Foundation reserves the right to reproduce, communicate and use submitted poetry for commercial use.
  </label>
</div>


      <button class="submit-btn" type="submit">CONTINUE SUBMISSION</button>
    </form>
  </div>

  <!-- Right: Images/Sidebar -->
  <div class="right-sidebar">
    <img src="assets/images/s.png" alt="Image 1">
    <img src="assets/images/s.png" alt="Image 2">
  </div>
</div>

<script>
  const buttons = document.querySelectorAll('.cat-btn');
  const categoryInput = document.getElementById('categoryInput');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      categoryInput.value = btn.getAttribute('data-value');
    });
  });
</script>

<?php include('includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

