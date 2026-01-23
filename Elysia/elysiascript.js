document.addEventListener('DOMContentLoaded', () => {
    const roomView   = document.getElementById('room-view');
    const leftArrow  = document.getElementById('left-arrow');
    const rightArrow = document.getElementById('right-arrow');
    const modal      = document.getElementById('info-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalBody  = document.getElementById('modal-body');
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
                    content: `
                        <p>Ronan is the ambitious leader of the Akroan army and an important part of the council. He is seen as the symbol of Akroan strength, being a man who rose from the ranks through sheer will and intellect, now standing at the right hand of the king himself.</p>
                        <p>People say he is the perfect heir to the throne; which he is most likely to inherit, thanks to his marriage to the princess of Akros.</p>
                    `,
                    style: 'left:40%; top:8%; width:20%; height:18%;'
                },
                {
                    id: 'ildria',
                    title: 'Princess Ildria Vahlos, The face of Akros',
                    content: `
                        <p>Princess Ildria is the jewel of Akros. She represents the royal family, supports public projects, and maintains ties with nobles and commoners.</p>
                        <p>While she doesn't have much power herself, she's often sent to other cities to negotiate and improve the image of Akros.</p>
                    `,
                    style: 'left:10%; top:30%; width:20%; height:20%;'
                },
                {
                    id: 'elysia',
                    title: 'Lady Elysia Vahlos, The light of Akros',
                    content: `
                        <p>The gifted child, they called her. Bringing blessings and love to a world full of coldness and cruelty.</p>
                        <p>Young Elysia was thought of as a gift from the gods themselves, but over the years, she has fallen out of the public eye as her father, Ronan, got more power.</p>
                        <p>Will she make a comeback? Who knows.</p>
                    `,
                    style: 'left:30%; top:45%; width:17%; height:15%;'
                }
            ]
        },
        'hotspot-bed': {
            title: 'My cozy bed',
            content: `<p>A mimir...........</p>`
        }
    };

    document.querySelectorAll('.hotspot').forEach(spot => {
        spot.addEventListener('click', () => {
            const info = hotspots[spot.id];
            if (!info) return;

            modalTitle.style.display = 'none';
            modalBody.innerHTML = '';

            if (info.isImage) {
                modalBody.innerHTML = `<img src="${info.imageSrc}" class="full-pop" alt="Portrait">`;

                if (info.faces) {
                    info.faces.forEach(face => {
                        const faceDiv = document.createElement('div');
                        faceDiv.className = 'face-hotspot';
                        faceDiv.style = face.style;

                        faceDiv.addEventListener('click', (e) => {
                            e.stopPropagation();

                            let sidebar = modalBody.querySelector('.info-sidebar');
                            if (sidebar) sidebar.remove();

                            sidebar = document.createElement('div');
                            sidebar.className = 'info-sidebar';
                            sidebar.innerHTML = `<h2>${face.title}</h2>${face.content}`;
                            modalBody.appendChild(sidebar);
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

        document.querySelectorAll('.hotspot').forEach(spot => {
            spot.style.display = spot.dataset.view === String(currentView) ? 'block' : 'none';
        });

        if (currentView === 0) {
            leftArrow.style.display = 'block';
            rightArrow.style.display = 'block';
            leftArrow.innerHTML = '&larr;';
            rightArrow.innerHTML = '&rarr;';
        } else if (currentView === 1) {
            leftArrow.style.display = 'none';
            rightArrow.style.display = 'block';
            rightArrow.innerHTML = '&rarr;';
        } else if (currentView === 2) {
            leftArrow.style.display = 'block';
            rightArrow.style.display = 'none';
            leftArrow.innerHTML = '&larr;';
        }
    }

    updateView();

    leftArrow.addEventListener('click', () => {
        if (currentView === 0) currentView = 1;
        else if (currentView === 2) currentView = 0;
        updateView();
    });

    rightArrow.addEventListener('click', () => {
        if (currentView === 0) currentView = 2;
        else if (currentView === 1) currentView = 0;
        updateView();
    });
});