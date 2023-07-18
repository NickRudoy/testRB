// Header
const burg = document.querySelector("#burg-nav");
const popup = document.querySelector("#popup-burg");
const body = document.body;
const menu = document.querySelector("#menu").cloneNode(1);

burg.addEventListener("click", burgHandler);

function burgHandler(e) {
    e.preventDefault();
    popup.classList.toggle("open");
    burg.classList.toggle("active");
    body.classList.toggle("noscroll");
    renderPopup();
}

function renderPopup() {
    popup.appendChild(menu);
}

const links = Array.from(menu.children);

links.forEach((link) => {
    link.addEventListener("click", closeOnClick);
});

function closeOnClick() {
    popup.classList.remove("open");
    burg.classList.remove("active");
    body.classList.remove("noscroll");
}

//Slider
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelector('.slides');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  const pagination = document.querySelector('.pagination');
  const slideCount = 4; // Total number of slides
  let slideIndex = 0;
  let touchStartX = 0;
  let touchEndX = 0;

  function showSlide() {
    // Reset the slides
    slides.style.transform = `translateX(-${slideIndex * 100}%)`;

    // Update the pagination
    const paginationText = `<span class="current-digit">${slideIndex + 1}</span><span class="slash">/</span><span class="total-slides">${slideCount}</span>`;
    pagination.innerHTML = paginationText;
  }

  // Event listener for the previous button
  prevButton.addEventListener('click', function() {
    slideIndex = (slideIndex - 1 + slideCount) % slideCount;
    showSlide();
  });

  // Event listener for the next button
  nextButton.addEventListener('click', function() {
    slideIndex = (slideIndex + 1) % slideCount;
    showSlide();
  });

  slides.addEventListener('touchstart', function(event) {
    touchStartX = event.touches[0].clientX;
  });

  slides.addEventListener('touchend', function(event) {
    touchEndX = event.changedTouches[0].clientX;
    handleSwipe();
  });

  // Function to handle swipe gestures
  function handleSwipe() {
    const swipeThreshold = 100;
    const swipeDistance = touchEndX - touchStartX;

    if (swipeDistance > swipeThreshold) {
      // Swipe right
      slideIndex = (slideIndex - 1 + slideCount) % slideCount;
    } else if (swipeDistance < -swipeThreshold) {
      // Swipe left
      slideIndex = (slideIndex + 1) % slideCount;
    }

    showSlide();
  }

  // Initial slide display
  showSlide();
});



//PopUp
document.addEventListener("DOMContentLoaded", function() {
  const overlay = document.getElementById("popup-overlay");
  const closeBtn = document.getElementById("popup-close");
  const form = document.getElementById("popup-form");
  const body = document.querySelector("body");
  const openBtn = document.getElementById("check-open");
  const openBtnSlider = document.getElementById("open-slider");

  
  closeBtn.addEventListener("click", function() {
    closePopup();
  });

  openBtn.addEventListener("click", function() {
   openPopup();
  });

  openBtnSlider.addEventListener("click", function() {
    openPopup();
   });
  
  form.addEventListener("submit", function(e) {
    e.preventDefault();
    
    closePopup();
  });
  
  overlay.addEventListener("click", function(e) {
    if (e.target === overlay) {
      openPopup();
      closePopup();
    }
  });

  
  openPopup()
  
  function openPopup() {
    overlay.style.display = "flex";
    body.classList.add("open-popup");
  }
  function closePopup() {
    overlay.style.display = "none";
    body.classList.remove("open-popup");
  }
});

let selector = document.querySelectorAll('input[type="tel"]');
let im = new Inputmask('+7 (999) 999-99-99');
im.mask(selector);

let selector2 = document.querySelector('input[type="tel"]');

selector2.addEventListener('input', function(){
	console.log(selector2.value)


	const re = /^\d*(\.\d+)?$/

	console.log(selector2.value.match(/[0-9]/g).length)


	console.log(selector2.value.replace(/[0-9]/g, "0"));
	
});


let validateForms = function(selector, rules, successModal, yaGoal) {
	new window.JustValidate(selector, {
		rules: rules,
		submitHandler: function(form) {
			let formData = new FormData(form);

			let xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4) {
					if (xhr.status === 200) {
						console.log('Отправлено');
					}
				}
			}

			xhr.open('POST', './config/sendmail.php', true);
			xhr.send(formData);

			form.reset();

		
		}
	});
}

validateForms('.form', { email: {required: true, email: true}, tel: {required: true} }, '.thanks-popup', 'send goal');