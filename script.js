const SignUpButton = document.getElementById('SignUpButton');
const SignInButton = document.getElementById('SignInButton');
const SignInForm = document.getElementById('signin');
const SignUpForm = document.getElementById('signup');

SignUpButton.addEventListener('click', function(){
    SignInForm.style.display="none";
    SignUpForm.style.display="block";
})

SignInButton.addEventListener('click', function(){
    SignInForm.style.display="block";
    SignUpForm.style.display="none";
})