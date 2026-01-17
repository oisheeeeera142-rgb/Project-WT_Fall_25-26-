function goPage(page) {
    const pages = {
        rooms: "../View/roomslisth.php"
    };

    if (pages[page]) {
        window.location.href = pages[page];
    } else {
        alert("Page not found!");
    }
}

function logout() {
    window.location.href = "../landingh.php";
}
