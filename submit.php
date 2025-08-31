<?php if (isset($_SESSION['status']) && isset($_SESSION['message'])): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  icon: '<?php echo $_SESSION['status'] === "success" ? "success" : "error"; ?>',
  title: '<?php echo $_SESSION["message"]; ?>',
  confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['status'], $_SESSION['message']); endif; ?>
