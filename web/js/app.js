/* 
 * ablespecialist.com
 * Makhtar Diouf
 * $Id$
 */
var fadeTime = 2000;

function toggleLoginForm() {
    $("#username").attr('disabled', true);
    $("#username").css("color", "grey");
    $("#password").attr('disabled', true);

    // Watch out when changing the paths in security.yml and routing.yml
    $("#_submit").attr('value', "LOGOUT");
    $("#loginForm").attr('action', "account/logout");
    $("#loginForm").attr('method', "get");
}

function loadBackgroundImage() {
    // $(document).
    var windowWidth = $(document).outerWidth();
    if (windowWidth > 1500) {
        // $('body').css('backgroundImage', "../images/expert/experthome-bg1900px02.png");          
        // $('body').css('backgroundSize', 'cover');
        $('body').attr('class', 'expertpage');
    }
    console.log("Detected window width: " + windowWidth);

}

function fadeHeaders() {
    $('h4').fadeIn(fadeTime);
    $('h3').fadeIn(fadeTime);
    $('.panel-heading').fadeIn(fadeTime);

}

$(document).ready(function () {
   // fadeHeaders();
});

