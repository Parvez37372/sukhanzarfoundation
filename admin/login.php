<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login_Dashboard</title>
</head>
<style>

body {
  display: flex;
  min-height: 100vh;
  background-color: #f5f5f5;
}

.container {
  display: flex;
  width: 100%;
  max-width: 800px;
  margin: auto;
  background: white;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  min-height: 30vh;
  border-radius: 8px;
}

.image-section {
  flex: 1;
  position: relative;
  overflow: hidden;
}

.image-section img {
  width: 100%;
  height: 80%;
  object-fit: cover;
  border-bottom-left-radius: 8px;
  border-top-left-radius: 8px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.login-section {
  flex: 1;
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.login-header h1 {
  font-size: 1.5rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-align: center;
}

.form-group {
  margin-bottom: 25px;
}

.form-group input {
  width: 93%;
  padding: 12px;
  border: none;
  font-size: 1rem;
  margin-top: 8px;
  border: 1px solid #f0f0f0;
  border-radius: 3px;
  box-shadow: rgba(197, 201, 205, 0.2) 0px 2px 2px;
}

.form-group label {
  font-size: 1rem;
  color: #666;
}

.submit-btn {
  background: #183b4a;
  color: white;
  border: none;
  padding: 12px;
  width: 100%;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s ease;
  border-radius: 3px;

}

.submit-btn:hover {
  background:rgb(0, 0, 0);
}


@media (max-width: 768px) {
  .image-section {
    display: none;
  }

  .login-section {
    padding: 30px;
  }
}

</style>
<body>
<div class="container">
  <div class="image-section">
    <img src="assets/img/images.jpeg" alt="African woman in headwrap">
  </div>
  <div class="login-section">
    <p>Sukhanzar Foundation
    <br>
    سکھنجر فاؤنڈیشن
    </p>
    <div class="login-header">
      <h1>LOG IN</h1>
    </div>
    <form id="#" method="POST" action="login1.php">
      <div class="form-group">
        <label for="username">User name</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="submit-btn">SUBMIT</button>
    </form>
  </div>
</div>

<script>
 // document.getElementById("login-form").addEventListener("submit", function (e) {
//  e.preventDefault();
  // Add your login logic here
 // const username = document.getElementById("username").value;
 // const password = document.getElementById("password").value;
 // console.log("Login attempted with:", { username, password });
});

</script>
</body>
</html>