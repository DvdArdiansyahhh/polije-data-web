<script>
    const detailModal = new bootstrap.Modal('#detail-modal');
    const detailModalEl = $('#detail-modal');

    function showStudentDetail(student) {
        Object.keys(student).forEach((prop, index) => {
            $(`#detail-modal #${prop}-text`).text(student[prop]);
        });

        detailModalEl.find('#loader').addClass('d-none');
        detailModalEl.find('#detail-data').removeClass('d-none');
    }

    $('#student-wrapper').on('click', '.student-name', function(e) {
        e.preventDefault();

        detailModalEl.find('#detail-data').addClass('d-none');
        detailModalEl.find('#loader').removeClass('d-none');
        detailModal.show();


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

                detailModal.hide();
            }
        });
    });
</script>
