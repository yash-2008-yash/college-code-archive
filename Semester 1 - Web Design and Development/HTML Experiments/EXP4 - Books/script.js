//Book Information
const books = {
    1: {
        title: "<b>The Great Gatsby</b>",
        author: "F. Scott Fitzgerald",
        year: 1925,
        description: "A novel about the American dream and the roaring twenties.",
    },
    2: {
        title: "<b>To Kill a Mockingbird</b>",
        author: "Harper Lee",
        year: 1960,
        description: "A story of racial injustice and childhood innocence.",
    },
    3: {
        title: "<b>1984</b>",
        author: "George Orwell",
        year: 1949,
        description: "A dystopian novel about surveillance and control.",
    },
};

//Function for index.html -> redirect to book.html
function showBook(id) {
    window.location.href = "book.html?id=" + id;
}

//If we are on book.html -> show details
if (window.location.pathname.includes("book.html")) {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id"); //get book id from url
    const book = books[id];
    const details = document.getElementById("book-details");

    if (book) {
        details.innerHTML =
            "<h2>" + book.title + "</h2>" +
            "<p><b>Author: </b>" + book.author + "</p>" +
            "<p><b>Year: </b>" + book.year + "</p>" +
            "<p><b>Description: </b>" + book.description + "</p>";
    } else {
        details.innerHTML = "<p><i>Book not found!</i></p>";
    }
}