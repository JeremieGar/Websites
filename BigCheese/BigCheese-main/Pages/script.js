$(document).ready(()=>{
    var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var password = '';
    var confirmedPassword = '';
    var email = '';
  $('.account-create').click(function(){
    password = $('.first-password').val();
    confirmedPassword =  $('.password-confirmation').val();

    email = $('.email').val();
    if(email.match(regex) && password === confirmedPassword){
      alert('Account created succesfully!. ')
    }else if (confirmedPassword !== password){
      alert('Wrong password combination!')
    $('.first-password').val('');
    $('.password-confirmation').val('');
      
    }else {
      alert('Please insert an appropriate Email account. \n Must contain: xxxx ');
    }

  });

  



});


