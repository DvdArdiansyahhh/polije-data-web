<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    let page = 0;

    function loadStudents(overwrite = false) {
        $.ajax({
            url: `/data/students?page=${page}`,
            method: 'POST',
            dataType: 'JSON',
            success(res) {
                const sWrapper = $('#student-wrapper');

                res.students.map((student) => {
                    sWrapper.append(`
                    <div class="col-md-4">
                        <div class="card mt-4">
                            <div class="card-body row g-2 student-card">
                                <div class="col-3">
                                    <i data-feather="user" class="profile-icon"></i>
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title">${ student.fullname }</h5>
                                    <p class="card-text mb-0">
                                        <span class="text-muted">${ student.nim }</span>
                                        - ${ student.admission }
                                    </p>
                                    <div class="d-flex">
                                        <a href="" title="Ijazah"><i data-feather="image" class="detail-icon"></i></a>
                                        <a href="" title="Form PP" class="ms-2"><i data-feather="file-text" class="detail-icon"></i></a>
                                        <a href="https://api.whatsapp.com/send?phone=${ student.phone.replace(/^0/, '62') }" title="WhatsApp" class="ms-2"><i data-feather="message-square" class="detail-icon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);

                    $('#student-loader').addClass('d-none');
                    feather.replace();
                });
            }
        });
    }

    function loadMore() {
        const scrollHeight = $(document).height();
        const scrollPosition = $(window).height() + $(window).scrollTop();

        if (scrollHeight - scrollPosition <= 5) {
            ++page;

            $('#student-loader').removeClass('d-none');
            loadStudents();
        }
    }

    $(window).on('scroll', loadMore);
    $(document.body).on('touchmove', loadMore);

    loadStudents();
</script>
