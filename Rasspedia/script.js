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
