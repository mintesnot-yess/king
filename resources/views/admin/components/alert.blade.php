@if (session('success') || session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '{{ session('success') ? 'success' : 'error' }}',
            title: '{{ session('success') ? 'Success!' : 'Error!' }}',
            text: '{{ session('success') ?? session('error') }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#f8f9fa',
            iconColor: '{{ session('success') ? '#28a745' : '#dc3545' }}',
            color: '#343a40'
        });
    });
</script>
@endif
