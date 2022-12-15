<?php

require_once __DIR__ . '/../autoloader.php';

if (isset($_POST['cancel-session'])) {
    $session_id = $_POST['session-to-cancel-id'];
    if(Session::cancel_session($session_id))
        $_SESSION['message'] = 'Session removed with success';
    else
        $_SESSION['error'] = 'Error removing the session';
    header('location: ../dashboard_doctor.php?sessions=');
}
// else if(isset($_POST['filter-sessions-by-date'])) {
//     $_SESSION['filter-sessions-by-date'] = $_POST['filter-sessions-by-date'];
//     header('location: ../dashboard_doctor.php?sessions=');
// }
function  get_count_data(){
    return user::count_data();
 }
function show_sessions_rows() {
    $filters = ['doctor' => $_SESSION['user_id']];
    if(isset($_GET['session-filter-date']) && !empty($_GET['session-filter-date']))
        $filters['exact_date'] = $_GET['session-filter-date'];
    $sessions = Session::view_sessions($filters);
    $table_rows = '';
    foreach ($sessions as $session) {
        $table_rows .= "
            <tr>
                <td class='text-dark text-center'>$session->title</td>
                <td class='text-dark text-center'>$session->start_time</td>
                <td class='text-dark text-center'>$session->max_num</td>
                <td class='text-dark text-center'>
                    <form method='POST' action='scripts/doctor_scripts.php'>
                        <input name='session-to-cancel-id' hidden value='$session->id'>
                        <button class='btn mycolor button1 rounded-pill'><i class='mycolor uil uil-eye pe-1'></i>View</button>
                        <button name='cancel-session' class='btn mycolor button1 rounded-pill'><i class='mycolor uil uil-trash pe-1'></i>Cancel</button>
                    </form>
                </td>
            </tr>
        ";
    }
    
    echo $table_rows;
}

function next_week_sessions() {
    $sessions = Session::week_sessions('doctor', $_SESSION['user_id']);
    $table_rows = '';
    foreach ($sessions as $session) {
        $date_time = new DateTime($session->start_time);
        $table_rows .= "
            <tr>
                <td class='text-dark text-center'>$session->title</td> <!-- TODO: make it a link to the session infos -->
                <td class='text-dark text-center'>{$date_time->format('Y-m-d')}</td>
                <td class='text-dark text-center'>{$date_time->format('H:i:s')}</td>
            </tr>
        ";
    }

    echo $table_rows;
}