var button = document.getElementById("button");

function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove("hidden");
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.add("hidden");
}

function showMenu() {
  var dropMenu = document.getElementById('dropdownMenu');
  var arrow = document.getElementById('arrow')
  arrow.classList.toggle('-rotate-90')
  dropMenu.classList.toggle("hidden");        
}

function openSidebar() {
  var sidebar = document.getElementById('sidebar')
  sidebar.classList.toggle("hidden");   
}

function descProduct() {
  var descProduct = document.getElementById('descProduct');
  var desc = document.getElementById('desc');
  var panah = document.getElementById('panah');
  descProduct.classList.toggle('hidden')
  desc.classList.toggle('text-primary')
  panah.classList.toggle('rotate-180')
}

function authentic() {
  var authentic = document.getElementById('authentic');
  var authenticText = document.getElementById('authenticText');
  var panahAuth = document.getElementById('panahAuth');
  authentic.classList.toggle('hidden')
  authenticText.classList.toggle('text-primary')
  panahAuth.classList.toggle('rotate-180')
}

function closeAlert() {
  const alert = document.getElementById("alert");
  alert.classList.add("hidden");
}

function checkInput() {
  var radioOptions = document.getElementsByName('size');

  var submitButton = document.getElementById('submitButton');

  var isRadioSelected = false;
  for (var i = 0; i < radioOptions.length; i++) {
    if (radioOptions[i].checked) {
      isRadioSelected = true;
      break;
    }
  }

  if (isRadioSelected) {
    submitButton.classList.remove('pointer-events-none');
    submitButton.classList.add('hover:bg-primary', 'text-white', 'bg-primary')
    submitButton.innerHTML= 'BUY NOW'
  } else {
    submitButton.classList.add('pointer-events-none');
  }
}


window.onload = function() {
  if(localStorage.getItem('halaman') === 'password' ) {
    password()
  }
};

function general() {
  var general = document.getElementById('general');
  var password = document.getElementById('password');
  var buttonPassword = document.getElementById('buttonPassword');
  var buttonGeneral = document.getElementById('buttonGeneral');
  general.classList.remove('hidden')
  password.classList.add('hidden')
  buttonGeneral.classList.add('bg-white/80', 'text-primary')
  buttonGeneral.classList.remove('text-white')
  buttonPassword.classList.remove('bg-white/80', 'text-primary')
  buttonPassword.classList.add('text-white')
  localStorage.removeItem('halaman')
}

function password() {
  var password = document.getElementById('password');
  var buttonPassword = document.getElementById('buttonPassword');
  var buttonGeneral = document.getElementById('buttonGeneral');
  var general = document.getElementById('general');
  password.classList.remove('hidden')
  general.classList.add('hidden')
  buttonPassword.classList.remove('text-white')
  buttonPassword.classList.add('bg-white/80', 'text-primary')
  buttonGeneral.classList.remove('bg-white/80', 'text-primary')
  buttonGeneral.classList.add('text-white')
  localStorage.setItem('halaman', 'password')
}
