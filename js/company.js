function show_form() {
    document.getElementById('form-right').style.display = "block";
}
$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

function show_update_form(){
  document.getElementById('updateform').style.display="block";
document.getElementById('profileform').style.display="none";
document.getElementById('updatepic').style.display="none";
}
function triggerClick(e) {
  document.querySelector('#changepic').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#displaypic').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}