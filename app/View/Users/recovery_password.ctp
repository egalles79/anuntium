<div style="background-color:#fff;color:#000;margin:30px;padding:10px">
<h2>Here you can change your password. Please set the new password below and go to login page to restart your password.</h2>
<p>Put your new password</p>
<?php
echo $this->Form->create('User', array(
    'url' => array(
        'controller' => 'users',
        'action' => 'recoveryPassword'
    )
));
echo $this->Form->input('User.password');
echo $this->Form->input('User.check_password',array('type' => 'password'));
if (isset($userToken)) {
    echo $this->Form->input('User.id',array('value'=>$userToken['User']['id']));
}
$options = array(
    'label' => 'Reestablecer contraseña',
    'class' => 'success',
    'type' => 'submit'
);
echo $this->Form->end($options); ?>
</div></div>
<script>
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
</script>