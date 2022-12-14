<section class="content_section" id="doctor_sessions_section">
    <div class="row my-3 ms-0 fs-4 fw-bold">My Sessions (8)</div>
    <form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>"  class="w-100 my-4 d-flex justify-content-around border align-items-center py-2 shadow-sm">
        <div class="w-75">
            <label for="session-date">Date : </label>
            <input type="text" hidden name='sessions'>
            <input type="date" class="rounded px-5 py-1 border-0 button1 w-50 ms-2" name="session-filter-date">
        </div>
        <button class="btn mycolor button1 px-5 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
    </form>
    <!-- table --> <!-- TODO not same margin as div before it -->
    <div class="table-responsive my-4" style="overflow: scroll;">
        <table class="table table-light" style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
            <thead>
                <tr class="" style="border-bottom: 2px #007A69 solid;">
                    <th class="mycolor fw-bold text-center">Session title</th>
                    <th class="mycolor fw-bold text-center">Scheduled Date & Time</th>
                    <th class="mycolor fw-bold text-center">Max Booking num</th>
                    <th class="mycolor fw-bold text-center">Events</th>
                </tr>
            </thead>
            <tbody>
                <?= show_sessions_rows() ?>
            </tbody>
        </table>
    </div>
    <!-- End table -->
</section>