
let header = document.querySelector('header');
let menuBtn = document.querySelector('#menu-Btn');

menuBtn.addEventListener("click",()=>{
  header.classList.toggle('active');
  changeIcon()
})

window.onscroll = () =>{
  header.classList.remove('active');
  changeIcon()
}

function changeIcon() {

}


let tabs = document.querySelectorAll('.tabs li');
let content = document.querySelectorAll('.contentUserDetails .Content');
tabs.forEach((tab)=>{
  tab.addEventListener('click',handelActive)
  tab.addEventListener('click',mangeContent)
})
function handelActive() {
  tabs.forEach((tab)=>{
    tab.classList.remove('active');
    this.classList.add('active')
  })
}

function mangeContent() {
  content.forEach((con)=>{
    con.style.display = 'none' 
  });
  document.querySelectorAll(this.dataset.choose).forEach((el) =>{
    el.style.display = "block";
  })
}

document.addEventListener('DOMContentLoaded', () => {
  tabs.forEach((tab) => {
    if (tab.classList.contains('active')) {
      document.querySelectorAll(tab.dataset.choose).forEach((el)=>{
        el.style.display = "block";
      });
    }
  });
});

const imageInput = document.getElementById('imageInput');
const displayImage = document.getElementById('displayImage');

imageInput.addEventListener('change',(e)=>{
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e)=> {
        displayImage.src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
})

let passwords = document.querySelectorAll('.input_password')
let eyeIcons = document.querySelectorAll('.eyeicon');

eyeIcons.forEach((eyeIcon,index)=>{
  let inputPass = passwords[index];
  eyeIcon.addEventListener('click',()=>{
    if(inputPass.type == "password"){
      inputPass.type = "text"
      eyeIcon.setAttribute("src","../images/eye-open.png")
    }else{
      inputPass.type = "password";
      eyeIcon.setAttribute("src","../images/eye-close.png");
    }
  })
})


