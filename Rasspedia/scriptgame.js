const board = document.getElementById('game-board');
const restartButton = document.getElementById('restart-btn');
const cardValues = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

let cards = [];
let flippedCards = [];
let matchedCards = 0;


function startGame() {

    const shuffledValues = shuffle(cardValues);

   
    board.innerHTML = '';

    // Karten erstellen
    cards = [];
    matchedCards = 0;
    flippedCards = [];
    shuffledValues.forEach((value, index) => {
        const card = document.createElement('div');
        card.classList.add('card');
        card.setAttribute('data-id', index);
        card.setAttribute('data-value', value);
        card.textContent = value;
        card.addEventListener('click', flipCard);
        board.appendChild(card);
        cards.push(card);
    });
}

// Funktion zum Mischen der Karten
function shuffle(array) {
    return array.sort(() => Math.random() - 0.5);
}

// Funktion, um eine Karte umzudrehen und eine andere Farbe zu geben
function flipCard(event) {
    const card = event.target;


    if (card.classList.contains('flipped') || card.classList.contains('matched')) {
        return;
    }

    // Karte umdrehen und Farbe ändern
    card.classList.add('flipped');
    card.style.backgroundColor = '#f0f0f0';  
    flippedCards.push(card);

    
    if (flippedCards.length === 2) {
        checkMatch();
    }
}

// Überprüfen, ob die umgedrehten Karten ein Paar sind
function checkMatch() {
    const [card1, card2] = flippedCards;

    if (card1.getAttribute('data-value') === card2.getAttribute('data-value')) {
        
        card1.classList.add('matched');
        card2.classList.add('matched');
        card1.style.backgroundColor = '#00ff00';
        card2.style.backgroundColor = '#00ff00'; 
        matchedCards++;

        if (matchedCards === 8) {
            alert('Gewonnen! Das Spiel wird neu gestartet.');
            startGame();
        }
    } else {

        setTimeout(() => {
            card1.classList.remove('flipped');
            card2.classList.remove('flipped');
            card1.style.backgroundColor = ''; 
            card2.style.backgroundColor = ''; 
        }, 1000);
    }

    flippedCards = [];
}

// Neustart-Button
restartButton.addEventListener('click', startGame);

// Spiel starten
startGame();
