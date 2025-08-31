
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SweetAlert2 Test</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Welcome to Sukhanzar Foundation</h1>

    <script>
        // Run when page fully loads
        window.onload = function () {
            if (!sessionStorage.getItem('maintenancePopupShown')) {
                Swal.fire({
                    title: '⚠️ Under Maintenance',
                    text: 'This website is under maintenance.',
                    icon: 'info',
                    confirmButtonText: 'Okay',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(() => {
                    // Set sessionStorage so it doesn’t show again
                    sessionStorage.setItem('maintenancePopupShown', 'true');
                });
            }
        };
    </script>
</body>
</html>
