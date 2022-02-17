//navbar on mobile
let nav = document.querySelector('.navbar-menu');
let burger =document.querySelector('.navbar-burger');
let navbrand = document.querySelector('.navbar-brand');
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements



  burger.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = burger.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        burger.classList.toggle('is-active');
        $target.classList.toggle('is-active');

  }
  );

});

//modal
let open=false;
document.addEventListener('DOMContentLoaded', () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
      open=false;
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);
    console.log($target);

    $trigger.addEventListener('click', () => {
      openModal($target);
      open=true;

    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
    const $target = $close.closest('.modal');

    $close.addEventListener('click', () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) { // Escape key
      closeAllModals();
    }
  });
});
let bounce = document.querySelector('.bouncer');
bounce.async=true;

window.addEventListener('DOMContentLoaded',()=>{
  document.querySelector('.bouncer').style.display="none";  
});
