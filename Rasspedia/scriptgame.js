const board = document.getElementById('game-board');
const restartButton = document.getElementById('restart-btn');

// Jedes Bild hat den passenden Text als Paar
const cardValues = [
    { type: 'image', value: 'Angela_Davis', src: 'Bilder/Angela_Davis.jpg' },
    { type: 'text', value: 'Angela_Davis', text: 'Angela Davis - Bürgerrechtlerin' },
    { type: 'image', value: 'Berthold_Brecht', src: 'Bilder/Berthold_Brecht.jpg' },
    { type: 'text', value: 'Berthold_Brecht', text: 'Berthold Brecht - Dramatiker und Dichter' },
    { type: 'image', value: 'Emmiline_Pankhurst', src: 'Bilder/Emmiline_Pankhurst.jpg' },
    { type: 'text', value: 'Emmiline_Pankhurst', text: 'Emmeline Pankhurst - Suffragetten-führerin' },
    { type: 'image', value: 'Mahatma_Ghandi', src: 'Bilder/Mahatma_Ghandi.jpg' },
    { type: 'text', value: 'Mahatma_Ghandi', text: 'Mahatma Gandhi - Führer der indischen Unabhängigkeit' },
    { type: 'image', value: 'Malcom_X', src: 'Bilder/Malcom_X.jpg' },
    { type: 'text', value: 'Malcom_X', text: 'Malcolm X - Menschenrecht-saktivist' },
    { type: 'image', value: 'Martin_Luther_King', src: 'Bilder/Martin_Luther_King.jpg' },
    { type: 'text', value: 'Martin_Luther_King', text: 'Martin Luther King - Bürgerrechtsführer' },
    { type: 'image', value: 'Nelson_Mandela', src: 'Bilder/Nelson_Mandela.jpg' },
    { type: 'text', value: 'Nelson_Mandela', text: 'Nelson Mandela - Anti-Apartheid-Revolutionär' },
    { type: 'image', value: 'Rosa_parks', src: 'Bilder/Rosa_parks.jpg' },
    { type: 'text', value: 'Rosa_parks', text: 'Rosa Parks - Mutter der Bürgerrechts-bewegung' }
];

let cards = [];
let flippedCards = [];
let matchedCards = 0;

function startGame() {
    const shuffledValues = shuffle(cardValues);

    board.innerHTML = '';

    cards = [];
    matchedCards = 0;
    flippedCards = [];

    shuffledValues.forEach((item, index) => {
        const card = document.createElement('div');
        card.classList.add('card');
        card.setAttribute('data-id', index);
        card.setAttribute('data-value', item.value);

        if (item.type === 'image') {
            card.style.backgroundImage = `url('${item.src}')`;
            card.style.backgroundSize = 'cover';
            card.style.backgroundPosition = 'center';
        } else if (item.type === 'text') {
            card.textContent = item.text;
            card.style.backgroundColor = '#ddd';
            card.style.color = '#333';
            card.style.padding = '10px';
            card.style.fontSize = '12px';
            card.style.textAlign = 'center';
        }

        card.addEventListener('click', flipCard);
        board.appendChild(card);
        cards.push(card);
    });
}

function shuffle(array) {
    return array.sort(() => Math.random() - 0.5);
}

function flipCard(event) {
    const card = event.target;

    if (card.classList.contains('flipped') || card.classList.contains('matched')) {
        return;
    }

    card.classList.add('flipped');
    flippedCards.push(card);

    if (flippedCards.length === 2) {
        checkMatch();
    }
}

function checkMatch() {
    const [card1, card2] = flippedCards;

    if (card1.getAttribute('data-value') === card2.getAttribute('data-value')) {
        card1.classList.add('matched');
        card2.classList.add('matched');
        matchedCards++;

        if (matchedCards === 8) {
            alert('Gewonnen! Das Spiel wird neu gestartet.');
            startGame();
        }
    } else {
        setTimeout(() => {
            card1.classList.remove('flipped');
            card2.classList.remove('flipped');
        }, 1000);
    }

    flippedCards = [];
}

restartButton.addEventListener('click', startGame);

startGame();
