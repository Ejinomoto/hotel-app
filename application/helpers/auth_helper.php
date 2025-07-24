<?php
function check_role($role) {
    $CI =& get_instance();
    if ($CI->session->userdata('role') !== $role) {
        redirect('auth/login');
    }
}
?>
