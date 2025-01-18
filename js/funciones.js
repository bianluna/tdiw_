// Generar dinámicamente los libros
async function booksByCategory(event) {
    // Log the event object for debugging
    console.log('Event object:', event);

    event.preventDefault(); // Prevent the default link behavior
    console.log('Default action prevented');

    // Get the data-category-id attribute from the clicked anchor
    const categoryId = event.target.getAttribute('data-category-id');
    console.log('Category ID:', categoryId);

    try {
        // Fetch the data from the server
        const response = await fetch(`../controller/c_productListByCat.php?category=${encodeURIComponent(categoryId)}`);
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const books = await response.text(); // Get the response as text
        console.log('Books data fetched:', books);

        //Update the content of bookByCat
        const headerElement = document.getElementById('home');
        headerElement.style.display = 'none';
        const cartElement = document.getElementById('cart-display');
        cartElement.style.display = 'none';

        // Update the content in the #category element
        const categoryElement = document.getElementById('book-display');
        categoryElement.style.display = 'inline';
        console.log('Category element:', categoryElement);
        categoryElement.innerHTML = books; // Update the content
        console.log('Category content updated');
    } catch (error) {
        console.error('Error fetching books:', error);
    }
}

// Generar dinámicamente las cards de categoria
async function listCategories(event) {
    // Log the event object for debugging
    console.log('Event object:', event);

    event.preventDefault(); // Prevent the default link behavior
    console.log('Default action prevented');

    try {
        // Fetch the data from the server
        const response = await fetch("../controller/c_categories.php");
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const categories = await response.text(); // Get the response as text
        console.log('Categories data fetched:', categories);

        // Update the content in the #category element
        const categoryElement = document.getElementById('home');  //('category'); //('book-display');
        console.log('Category element:', categoryElement);
        categoryElement.innerHTML = categories; // Update the content
        categoryElement.style.display = 'inline';

        const bookElement = document.getElementById('book-display');
        bookElement.style.display = 'none';
        const cartElement = document.getElementById('cart-display');
        cartElement.style.display = 'none';

        console.log('Category content updated');
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
}

// Generar dinámicamente los detalles de los libros
async function getBook(event) {
    // Log the event object for debugging
    console.log('Event object:', event);

    event.preventDefault(); // Prevent the default link behavior
    console.log('Default action prevented');

    // Get the data-category-id attribute from the clicked anchor
    const bookId = event.target.getAttribute('book-id');
    console.log('Book ID:', bookId);

    try {
        // Fetch the data from the server
        const response = await fetch(`../controller/c_product.php?book_id=${encodeURIComponent(bookId)}`);
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const books = await response.text(); // Get the response as text
        console.log('Book data fetched:', books);

        //Update the content of bookByCat
        const headerElement = document.getElementById('home');
        headerElement.style.display = 'none';
        const cartElement = document.getElementById('cart-display');
        cartElement.style.display = 'none';

        // Update the content in the #category element
        const categoryElement = document.getElementById('book-display');
        categoryElement.style.display = 'inline';
        console.log('Category element:', categoryElement);
        categoryElement.innerHTML = books; // Update the content
        console.log('Category content updated');

    } catch (error) {
        console.error('Error fetching books:', error);
    }
}

async function checkEmail() {
    // Retrieve the email input value
    const emailInput = document.getElementById("emailInput").value;
    //console.log("Email entered: ", emailInput);
    var response = await fetch("../controller/c_checkEmail.php?email=" + emailInput);
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    if (responsetrim == "true") {
        //alert("Email already exists. Please log in.");
        window.location.href = "../loginPassword.php";
    } else {
        window.location.href = "../signup.php";
        //alert("Email not found. Creating a new account.");
    }
}

async function checkPassword() {
    // Retrieve the email input value
    const passwordInput = document.getElementById("input-password").value;
    var response = await fetch("../controller/c_checkPassword.php?password=" + passwordInput);
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    if (responsetrim == "true") {
        window.location.href = "../index.php";
    } else {
        alert("Incorrect password. Please try again.");
    }
}

async function showCart() {
    var response = await fetch("../controller/c_cart.php");
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();
    const homeElement = document.getElementById('home');
    homeElement.style.display = 'none';
    const bookElement = document.getElementById('book-display');
    bookElement.style.display = 'none';
    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
    cartElement.style.display = 'inline';
}

async function addToCart(book_id) {
    var title = document.getElementById("title").textContent;
    var response = await fetch("../controller/c_buy.php?book_id=" + book_id + "&title=" + title);
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();
    alert(responsetrim);

    var summary = await fetch("../controller/c_visibleCart.php");
    const summarytxt = await summary.text();
    const summarytrim = summarytxt.trim();

    const cartSummary = document.getElementById('cart-footer-content');
    cartSummary.innerHTML = summarytrim;
}

async function emptyCart() {
    var response = await fetch("../controller/c_emptyCart.php");
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();
    const homeElement = document.getElementById('home');
    homeElement.style.display = 'none';
    const bookElement = document.getElementById('book-display');
    bookElement.style.display = 'none';
    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
    cartElement.style.display = 'inline';
}

async function pay(user_id) {
    if (user_id == 0) {
        alert("Please log in to continue.");
        window.location.href = "../login.php";
    }
    else {
        console.log("User ID: ", user_id);
        alert("Your are user ID: " + user_id);
        
        var response = await fetch("../controller/c_pay.php?user_id=" + user_id);
        const responsetxt = await response.text();
        const responsetrim = responsetxt.trim();

        if (responsetrim == "true") {
            window.location.href = "../paymentCompleted.php";
        }
        else {
            alert("Error processing payment. Please try again.");
        }
    }


}