<section class="content_section" id="doctor_appointements_section">
    <div class="row my-3 ms-0 fs-4 fw-bold">My Appointements (2)</div>
    <div class="w-100 my-4 d-flex justify-content-around border align-items-center py-2 shadow-sm">
        <div class="w-75">
            <label for="session-date">Date : </label>
            <input type="date" class="rounded px-5 py-1 border-0 button1 w-50 ms-2" name="session-date">
        </div>
        <button class="btn mycolor button1 px-5 rounded-pill"><i class="uil uil-filter me-2 mycolor"></i></i>Filter</button>
    </div>
    <!-- <div class="row border rounded-3 justify-content-end"> //my old filter
        <label class="col-1 align-self-center" for="">Date: </label>
        <input class="col-6 my-2 mx-4" type="date" name="" id="">
        <button class="col-2 btn-lg m-1 py-2 mycolor rounded-3" style="background-color: hsl(206, 77%, 91%); border-style: none;"><img src="./img/icons/filter-iceblue.svg"><span class="mx-2 fw-bold" >Filter</span></button>
    </div> -->

    <!-- table --> <!-- TODO not same margin as div before it -->
    <div class="table-responsive my-4" style="overflow: scroll;">
        <table class="table table-light"
            style="border: 0.5px solid rgb(230, 229, 229);border-radius: 20px;">
            <tr class="" style="border-bottom: 2px #007A69 solid;">
                <td class="mycolor fw-bold text-center">Patient name</td>
                <td class="mycolor fw-bold text-center">Appointement number</td>
                <td class="mycolor fw-bold text-center">Session title</td>
                <td class="mycolor fw-bold text-center">Session Date & Time</td>
                <td class="mycolor fw-bold text-center">Appointement Date</td>
                <td class="mycolor fw-bold text-center">Events</td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Lionel Messi</td>
                <td class="text-dark text-center">2</td>
                <td class="text-dark text-center">Test Session</td>
                <td class="text-dark text-center">2050-01-01 @18:00</td>
                <td class="text-dark text-center">2022-10-31</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-trash pe-1"></i>Cancel</button>
                </td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Lionel Messi</td>
                <td class="text-dark text-center">2</td>
                <td class="text-dark text-center">Test Session</td>
                <td class="text-dark text-center">2050-01-01 @18:00</td>
                <td class="text-dark text-center">2022-10-31</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-trash pe-1"></i>Cancel</button>
                </td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Albert Einstein</td>
                <td class="text-dark text-center">2</td>
                <td class="text-dark text-center">Test Session</td>
                <td class="text-dark text-center">2050-01-01 @18:00</td>
                <td class="text-dark text-center">2022-10-31</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-trash pe-1"></i>Cancel</button>
                </td>
            </tr>
            <tr class="">
                <td class="text-dark text-center">Cristiano Ronaldo</td>
                <td class="text-dark text-center">2</td>
                <td class="text-dark text-center">Test Session</td>
                <td class="text-dark text-center">2050-01-01 @18:00</td>
                <td class="text-dark text-center">2022-10-31</td>
                <td class="text-dark text-center">
                    <button class="btn mycolor button1 rounded-pill"><i class="mycolor uil uil-trash pe-1"></i>Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <!-- End table -->
</section>