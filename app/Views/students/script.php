<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    let page = 0;
    let isNext = true;

    function loadStudents(overwrite = false) {
        $.ajax({
            url: `/data/students?page=${page}`,
            data: {
                keyword: $('#keyword').val(),
                order: $('#order').val(),
            },
            method: 'POST',
            dataType: 'JSON',
            success(res) {
                const sWrapper = $('#student-wrapper');

                if (overwrite) sWrapper.empty();

                res.students.map((student) => {
                    sWrapper.append(`
                    <div class="col-md-4">
                        <div class="card mt-4 shadow-sm">
                            <div class="card-body row g-2 student-card">
                                <div class="col-3">
                                    <i data-feather="user" class="profile-icon"></i>
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title">
                                        <a href="#" data-id="${ student.id }" class="text-decoration-none text-light student-name">${ student.fullname }</a>
                                    </h5>
                                    <p class="card-text mb-0">
                                        <span class="text-muted">${ student.nim }</span>
                                        - ${ student.admission }
                                    </p>
                                    <div class="d-flex">
                                        <a href="https://registrasi.polije.ac.id/scan.php?jenis=7&nomor_pendaftar=${ student.regist_id }&ijasah_db=0" target="_blank" title="Ijazah"><i data-feather="image" class="detail-icon"></i></a>
                                        <a href="https://registrasi.polije.ac.id/pernyataan_taat_aturan.php?NoDaftar=${ student.regist_number }" target="_blank" title="Form PP" class="ms-2"><i data-feather="file-text" class="detail-icon"></i></a>
                                        <a href="https://api.whatsapp.com/send?phone=${ student.phone.replace(/^0/, '62') }" title="WhatsApp" class="ms-2"><i data-feather="message-square" class="detail-icon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
                });

                isNext = res.next;

                $('#student-loader').addClass('d-none');
                $('#total-results').text(`${res.total} data`);

                feather.replace();
            }
        });
    }

    function loadMore() {
        const scrollHeight = $(document).height();
        const scrollPosition = $(window).height() + $(window).scrollTop();

        if (scrollHeight - scrollPosition <= 5 && isNext) {
            ++page;

            $('#student-loader').removeClass('d-none');
            loadStudents();
        }
    }

    $('#keyword').keyup(function() {
        page = 0;

        $('#student-loader').removeClass('d-none');
        loadStudents(true);
    });

    $('#order').change(function() {
        page = 0;

        $('#student-loader').removeClass('d-none');
        loadStudents(true);
    });

    $(window).on('scroll', loadMore);
    $(document.body).on('touchmove', loadMore);

    loadStudents();
</script>
