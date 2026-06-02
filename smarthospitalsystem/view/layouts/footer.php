<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/CountUp.js/2.8.0/countUp.umd.min.js"></script>

<script src="public/js/app.js"></script>
<?php if(isset($_SESSION['success'])): ?>

    


<script>
Swal.fire({
    icon: 'success',
    title: '<?php echo $_SESSION['success']; ?>',
    timer: 2000,
    showConfirmButton: false
});
</script>

<?php unset($_SESSION['success']); ?>
<?php endif; ?>
</body>
</html>


