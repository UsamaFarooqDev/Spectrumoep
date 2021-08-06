function hide_sidebar(){
   document.getElementById('sidebar').style.display="none";
    document.getElementById('sidebar').style.transition = "1s";
    const element = document.getElementById('sidebar');
    
   element.classList.add('animate__animated' , 'animate__fadeInLeft');
  
    
}
function show_sidebar(){
  document.getElementById('sidebar').style.display="block";
    document.getElementById('sidebar').style.transition = "1s";
   const element = document.getElementById('sidebar');
  
   element.classList.add('animate__animated' , 'animate__fadeInLeft');
}

function show_update_form(){
   document.getElementById('updateform').style.display="block";
document.getElementById('profileform').style.display="none";
document.getElementById('updatepic').style.display="none";
}
function change_pic(){
   document.getElementById('updateform').style.display="none";
   document.getElementById('profileform').style.display="none";
   document.getElementById('updatepic').style.display="block";
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