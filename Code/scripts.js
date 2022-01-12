function check_pass() {
    if (document.getElementById('pass').value ==
        document.getElementById('confirm_pass').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
function check_update_pass() {
    if (document.getElementById('password').value ==
        document.getElementById('confirm_pass_update').value) {
        document.getElementById('submit_pw').disabled = false;
    } else {
        document.getElementById('submit_pw').disabled = true;
    }
}