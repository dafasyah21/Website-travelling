window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) { 
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

document.addEventListener('DOMContentLoaded', () => {

    const infoItems = document.querySelectorAll('.info-item');
    const imageTrack = document.querySelector('.slider-images-track');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const currentSlideEl = document.querySelector('.current-slide');
    const totalSlidesEl = document.querySelector('.total-slides');
    const progressBar = document.querySelector('.progress');

    let currentSlide = 0;
    const totalSlides = infoItems.length;
    const autoplayInterval = 5000; 
    let autoplayTimer;

   
    function goToSlide(slideIndex) {
   
    currentSlide = (slideIndex + totalSlides) % totalSlides;

    infoItems.forEach((item, index) => {
        item.classList.remove('active');
        if (index === currentSlide) {
            item.classList.add('active');
        }
    });

   
    const slideWidth = 70; 
    const slideGap = 2;   
    const offset = (100 - slideWidth) / 2; 
   
    const transformValue = `calc(${offset}% - ${currentSlide * (slideWidth + slideGap)}%)`;
    imageTrack.style.transform = `translateX(${transformValue})`;

    updateNavigation();
}

    function updateNavigation() {

        currentSlideEl.textContent = String(currentSlide + 1).padStart(2, '0');
        totalSlidesEl.textContent = String(totalSlides).padStart(2, '0');

        const progressPercentage = ((currentSlide + 1) / totalSlides) * 100;
        progressBar.style.width = `${progressPercentage}%`;
    }

 
    function startAutoplay() {
        autoplayTimer = setInterval(() => {
            goToSlide(currentSlide + 1);
        }, autoplayInterval);
    }

    function resetAutoplay() {
        clearInterval(autoplayTimer);
        startAutoplay();
    }


    nextBtn.addEventListener('click', () => {
        goToSlide(currentSlide + 1);
        resetAutoplay();
    });

    prevBtn.addEventListener('click', () => {
        goToSlide(currentSlide - 1);
        resetAutoplay();
    });

 
    goToSlide(0); 
    startAutoplay(); 
});

document.addEventListener('DOMContentLoaded', () => {

    const destinationTitleElement = document.getElementById('destination-title');

    if (!destinationTitleElement) {
        console.error("Error: Elemen dengan id 'destination-title' tidak ditemukan. Pastikan tag <h1> memiliki id tersebut.");
        return;
    }


    const titleText = destinationTitleElement.textContent; 
    const destinationName = titleText.split(':')[1] ? titleText.split(':')[1].trim() : titleText.trim();
  
    const destinationKey = destinationName.toLowerCase().replace(/\s+/g, '_');


    const localStorageKey = `comments_${destinationKey}`;


    console.log(`Kunci penyimpanan untuk halaman ini adalah: ${localStorageKey}`);
    
    
    const commentForm = document.getElementById('comment-form');
    const nameInput = document.getElementById('name-input');
    const ratingInput = document.getElementById('rating-input');
    const commentInput = document.getElementById('comment-input');
    const commentsList = document.getElementById('comments-list');
    

    function loadComments() {
        const commentsData = localStorage.getItem(localStorageKey);
        const comments = commentsData ? JSON.parse(commentsData) : [];
        commentsList.innerHTML = '';
        comments.forEach(comment => {
            displayComment(comment);
        });
    }

    /**
     * Fungsi untuk menampilkan satu komentar ke dalam halaman HTML.
     * @param {object} comment - Objek komentar yang berisi nama, rating, dan teks.
     */
    function displayComment(comment) {
        const commentCard = document.createElement('div');
        commentCard.classList.add('comment-card');
        commentCard.innerHTML = `
            <div class="comment-header">
                <span class="comment-author">${escapeHTML(comment.name)}</span>
                <span class="comment-rating">⭐️ ${comment.rating} / 5</span>
            </div>
            <p class="comment-body">${escapeHTML(comment.text)}</p>
        `;
        commentsList.prepend(commentCard);
    }

    /**
     * Fungsi untuk menangani pengiriman formulir.
     * @param {Event} event - Objek event dari form submission.
     */
    function handleFormSubmit(event) {
        event.preventDefault();
        const name = nameInput.value.trim();
        const rating = ratingInput.value;
        const commentText = commentInput.value.trim();

        if (!name || !commentText) {
            
            return;
        }

        const newComment = { name: name, rating: rating, text: commentText };
        const commentsData = localStorage.getItem(localStorageKey);
        const comments = commentsData ? JSON.parse(commentsData) : [];
        comments.push(newComment);
        localStorage.setItem(localStorageKey, JSON.stringify(comments));

        displayComment(newComment);
        commentForm.reset();
    }

    function escapeHTML(str) {
        return str.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }


    commentForm.addEventListener('submit', handleFormSubmit);


    loadComments();
});