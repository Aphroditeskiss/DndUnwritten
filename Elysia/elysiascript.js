document.addEventListener('DOMContentLoaded', () => {
    const roomView   = document.getElementById('room-view');
    const leftArrow  = document.getElementById('left-arrow');
    const rightArrow = document.getElementById('right-arrow');

    const views = [
        'portraitdiary.png',   
        'bedroom.png',         
        'closet.png'           
    ];

    let currentView = 0;

    function updateView() {
        roomView.style.backgroundImage = `url(${views[currentView]})`;

        if (currentView === 0) {
            leftArrow.style.display  = 'block';
            rightArrow.style.display = 'block';
            leftArrow.innerHTML  = '&larr;';
            rightArrow.innerHTML = '&rarr;';
        } 
        else if (currentView === 1) {
            leftArrow.style.display  = 'none';
            rightArrow.style.display = 'block';
            rightArrow.innerHTML = '&rarr;';  // or you can use '&larr;' if you prefer the direction feel
        } 
        else if (currentView === 2) {
            leftArrow.style.display  = 'block';
            rightArrow.style.display = 'none';
            leftArrow.innerHTML  = '&larr;';
        }
    }

    updateView();

    leftArrow.addEventListener('click', () => {
        if (currentView === 0) {
            currentView = 1;           
        } else if (currentView === 2) {
            currentView = 0;           
        }
        updateView();
    });

    rightArrow.addEventListener('click', () => {
        if (currentView === 0) {
            currentView = 2;           
        } else if (currentView === 1) {
            currentView = 0;           
        }
        updateView();
    });
});