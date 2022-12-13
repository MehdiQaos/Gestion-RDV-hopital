<nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4 pt-1 justify-content-between" id="">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle"></i>
                    <!-- <h2 class="fs-2 m-0"> </h2> -->
                    <form method="post" class="input-group ms-5">
                        <input name="search-doctor" type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button name="search-doctor-btn" type="submit" class="btn btn-secondary mycolor ms-2 rounded button1 border-0">search</button>
                      </form>
                </div>
            <div class="d-flex align-items-center ms-auto">
                <div class="pt-3 me-3">
                  <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                  <p class="fs-6 text-black fw-bold" id="current-date">
                    <?php 
                      echo date("d-m-Y");
                    ?>
                  </p>
                </div>
                <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
            </div>
</nav>