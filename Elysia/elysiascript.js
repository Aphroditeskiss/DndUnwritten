document.addEventListener('DOMContentLoaded', () => {
    const roomView   = document.getElementById('room-view');
    const leftArrow  = document.getElementById('left-arrow');
    const rightArrow = document.getElementById('right-arrow');
    const modal = document.getElementById('info-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalBody = document.getElementById('modal-body');
    const closeModal = document.querySelector('.close-modal');
    
    const views = [
        'portraitdiary.png',   
        'bedroom.png',         
        'closet.png'           
    ];

    let currentView = 0;

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    const hotspots = {
    'hotspot-book': {
        title: 'Diary',
        content: `
            <p>Elysia's secret diary. DO NOT OPEN!!</p>
            <img src="diarypage.png" alt="Diary page" style="max-width:100%; border-radius:8px;">
        `
        },
        'hotspot-portrait': {
            isImage: true,
            imageSrc: 'portrait.png',
            faces: [
                {
                    id: 'ronan',
                    title: 'Ronan Vahlos, The King of War',
                    content: `<p>Ronan is the ambitious leader...</p>`,
                    style: 'left:45%; top:5%; width:20%; height:20%;'
                },
                {
                    id: 'ildria',
                    title: 'Princess Ildria Vahlos, The face of Akros',
                    content: `<p>Princess Ildria is the jewel...</p>`,
                    style: 'left:11%; top:30%; width:20%; height:20%;'
                },
                {
                    id: 'elysia',
                    title: 'Lady Elysia Vahlos, The light of Akros',
                    content: `<p>The gifted child...</p>`,
                    style: 'left:30%; top:46%; width:18%; height:14%;'
                }  
            ]
        },
        

        'hotspot-bed': {
            title: 'My cozy bed',
            content: `
                <p>A mimir...........</p>        `
        }
};

document.querySelectorAll('.hotspot').forEach(spot => {
    spot.addEventListener('click', () => {
        const info = hotspots[spot.id];
        if (!info) return;

        modalTitle.style.display = 'none';
        modalBody.innerHTML = '';

        if (info.isImage) {
            modalBody.innerHTML = `
                <img src="${info.imageSrc}" class="full-pop" alt="Portrait">
            `;

            
            if (info.faces) {
                info.faces.forEach(face => {
                    const faceDiv = document.createElement('div');
                    faceDiv.className = 'face-hotspot';
                    faceDiv.style = face.style;
                    faceDiv.dataset.faceId = face.id;

                
                    faceDiv.addEventListener('click', (e) => {
                        e.stopPropagation(); 
                        modalTitle.textContent = face.title;
                        modalTitle.style.display = 'block';
                        modalBody.innerHTML = face.content; 
                    });

                    modalBody.appendChild(faceDiv);
                });
            }
        } else {
            if (info.title) {
                modalTitle.textContent = info.title;
                modalTitle.style.display = 'block';
            }
            modalBody.innerHTML = info.content;
        }

        modal.style.display = 'flex';
    });
});

  function updateView() {
    roomView.style.backgroundImage = `url(${views[currentView]})`;

    const hotspots = document.querySelectorAll('.hotspot');
    
    hotspots.forEach(spot => {
        const shouldShow = spot.dataset.view === String(currentView);
        
        spot.style.display = shouldShow ? 'block' : 'none';
        
    });
       
        if (currentView === 0) {
            leftArrow.style.display  = 'block';
            rightArrow.style.display = 'block';
            leftArrow.innerHTML  = '&larr;';
            rightArrow.innerHTML = '&rarr;';
        } 
        else if (currentView === 1) {
            leftArrow.style.display  = 'none';
            rightArrow.style.display = 'block';
            rightArrow.innerHTML = '&rarr;';  
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