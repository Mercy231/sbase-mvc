function validate (username, password) {
    let error = false
    if (username.length < 4) {
        $("#username").css('border', 'solid red 2px')
        alert('Username min length 4')
        error = true
    }
    if (!username.match(/^[a-zA-Z0-9]*$/)) {
        $("#username").css('border', 'solid red 2px')
        alert('Username only letters or numbers')
        error = true
    }
    if (password.length < 6) {
        $("#password").css('border', 'solid red 2px')
        alert('Password min length 6')
        error = true
    }
    return !error;
}