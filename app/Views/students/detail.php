<script>
    function showStudentDetail(student) {
        const modal = new bootstrap.Modal('#detail-modal');

        modal.show();
    }

    $('#student-wrapper').on('click', '.student-name', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/data/students/' + $(this).data('id'),
            method: 'POST',
            success(res) {
                showStudentDetail(res.student);
            },
            error(res) {
                let message = 'Terjadi kesalahan saat mendapatkan data';

                if (res.status == 404) message = 'Data mahasiswa tidak ditemukan';

                Swal.fire({
                    icon: 'error',
                    text: message,
                    timer: 1500,
                    showConfirmButton: false,
                });
            }
        });
    });
</script>
