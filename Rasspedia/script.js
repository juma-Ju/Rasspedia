// ToDo
//script datei aufteilen?
//@juma-Ju Verschiedene Designs hinzufügen


document.addEventListener("DOMContentLoaded", function () {
    const weaponMenu = document.getElementById("weaponMenu");
    weaponMenu.style.display = "none";

    let isAltPressed = false;

    document.addEventListener("keydown", function (event) {
        if (event.key === "Alt" && !isAltPressed) {
            isAltPressed = true;
            requestAnimationFrame(() => {
                weaponMenu.style.display = "grid";
            });
        }
    });

    document.addEventListener("keyup", function (event) {
        if (event.key === "Alt" && isAltPressed) {
            isAltPressed = false;
            requestAnimationFrame(() => {
                weaponMenu.style.display = "none";
            });
        }
    });
});

document.getElementById("startGameBtn").addEventListener("click", startGame);

function startGame() {
    document.getElementById("gameContainer").style.display = "block";
    document.getElementById("startGameBtn").style.display = "none";
    generateMemoryBoard();
}

function generateMemoryBoard() {
    const memoryBoard = document.getElementById("memoryBoard");
    memoryBoard.innerHTML = ""; // Board leeren

    const cards = createCards();
    shuffle(cards);

    cards.forEach(card => {
        const cardElement = document.createElement("div");
        cardElement.classList.add("card");
        cardElement.setAttribute("data-id", card.id);
        cardElement.addEventListener("click", flipCard);
        cardElement.dataset.flipped = false;
        cardElement.textContent = card.value;
        memoryBoard.appendChild(cardElement);
    });
}

function createCards() {
    const values = ["A", "B", "C", "D", "E", "F", "G", "H"];
    const cards = [...values, ...values]; // Doppelte Karten für das Spiel
    return cards.map((value, index) => ({ id: index, value }));
}

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

let flippedCards = [];

function flipCard(event) {
    const card = event.target;

    if (card.dataset.flipped === "true" || flippedCards.length === 2) {
        return;
    }

    card.classList.add("flipped");
    card.dataset.flipped = "true";

    flippedCards.push(card);

    if (flippedCards.length === 2) {
        checkMatch();
    }
}

function checkMatch() {
    const [firstCard, secondCard] = flippedCards;

    if (firstCard.textContent === secondCard.textContent) {
        flippedCards = [];
    } else {
        setTimeout(() => {
            firstCard.classList.remove("flipped");
            secondCard.classList.remove("flipped");
            firstCard.dataset.flipped = "false";
            secondCard.dataset.flipped = "false";
            flippedCards = [];
        }, 1000);
    }
}

document.getElementById("resetBtn").addEventListener("click", resetGame);

function resetGame() {
    document.getElementById("gameContainer").style.display = "none";
    document.getElementById("startGameBtn").style.display = "block";
}

