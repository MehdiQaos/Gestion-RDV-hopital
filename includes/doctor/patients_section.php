<section class="content_section" id="doctor_sessions_section">
    <div class="row my-3 ms-0 fs-4 fw-bold">My Patients (8)</div>
    <div class="w-100 my-4 d-flex justify-content-around border align-items-center py-2 shadow-sm">
        <div class="w-75">
            <label for="session-date">Show Details About: </label>
            <select class="rounded ps-2 pe-5 py-1 border-0 button1 w-50 ms-2" name="session-date">
                <option value="">My patients only</option>
            </select>
        </div>
        <button class="btn mycolor button1 px-5 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
    </div>
    <!-- table --> <!-- TODO not same margin as div before it -->
    <div class="table-responsive my-4" style="overflow: scroll;">
        <table class="table table-light"
            style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
            <tr class="" style="border-bottom: 2px #007A69 solid;">
                <td class="mycolor fw-bold text-center">Name</td>
                <td class="mycolor fw-bold text-center">CIN</td>
                <td class="mycolor fw-bold text-center">Telephone</td>
                <td class="mycolor fw-bold text-center">Email</td>
                <td class="mycolor fw-bold text-center">Date of Birth</td>
                <td class="mycolor fw-bold text-center">Events</td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Hanane Hanane</td>
                <td class="text-dark text-center">S242421</td>
                <td class="text-dark text-center">0623536394</td>
                <td class="text-dark text-center">aaa@gmail.com</td>
                <td class="text-dark text-center">2000-05-10</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-eye pe-1"></i>View</button>
                </td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Hanane Hanane</td>
                <td class="text-dark text-center">S242421</td>
                <td class="text-dark text-center">0623536394</td>
                <td class="text-dark text-center">aaa@gmail.com</td>
                <td class="text-dark text-center">2000-05-10</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-eye pe-1"></i>View</button>
                </td>
            </tr>
        </table>
    </div>
    <!-- End table -->
</section>