function showSection(section) {
    switch (section) {
        case 'home':
            document.getElementById('home').style.display = 'inline';
            document.getElementById('book-display').style.display = 'none';
            document.getElementById('cart-display').style.display = 'none';
            break;
        case 'book-display':
            document.getElementById('home').style.display = 'none';
            document.getElementById('book-display').style.display = 'inline';
            document.getElementById('cart-display').style.display = 'none';
            break;
        case 'cart-display':
            document.getElementById('home').style.display = 'none';
            document.getElementById('book-display').style.display = 'none';
            document.getElementById('cart-display').style.display = 'inline';
            break;
    }
}



async function booksByCategory(event) {
    console.log('Event object:', event);

    event.preventDefault(); 
    console.log('Default action prevented');

    const categoryId = event.target.getAttribute('data-category-id');
    console.log('Category ID:', categoryId);

    try {
        const response = await fetch(`../controller/c_productListByCat.php?category=${encodeURIComponent(categoryId)}`);
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const books = await response.text();
        
        showSection('book-display');
        const categoryElement = document.getElementById('book-display');
        categoryElement.innerHTML = books;

    } catch (error) {
        console.error('Error fetching books:', error);
    }
}

async function listCategories(event) {
    console.log('Event object:', event);

    event.preventDefault(); 
    console.log('Default action prevented');

    try {
        const response = await fetch("../controller/c_categories.php");
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const categories = await response.text(); 
        console.log('Categories data fetched:', categories);

        showSection('home');
        const categoryElement = document.getElementById('home'); 
        categoryElement.innerHTML = categories;

        console.log('Category content updated');
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
}



async function fetchBookDetails(event) {

    console.log('Event object:', event);

    event.preventDefault(); 
    console.log('Default action prevented');

    
    const bookId = event.target.getAttribute('book-id');
    console.log('Book ID:', bookId);

    try {

        const response = await fetch(`../controller/c_product.php?book_id=${encodeURIComponent(bookId)}`);
        console.log('Response status:', response.status);

        if (!response.ok) throw new Error(`HTTP error: ${response.status}`);

        const books = await response.text(); 
        console.log('Book data fetched:', books);

        window.scrollTo({ top: 0}); 

        showSection('book-display');

        const categoryElement = document.getElementById('book-display');
        categoryElement.innerHTML = books; 

    } catch (error) {
        console.error('Error fetching books:', error);
    }
}


async function checkEmail() {

    const emailInput = document.getElementById("emailInput").value;
    
    var response = await fetch("../controller/c_checkEmail.php?email=" + emailInput);
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    if (responsetrim == "true") {
        window.location.href = "../loginPassword.php";
    } else {
        window.location.href = "../signup.php";
    }
}


async function checkPassword() {
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

    showSection('cart-display');

    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
}


async function updateCartBubble() {
    const response = await fetch('../controller/c_cartQuantity.php');
    const data = await response.json();

    const bubble = document.getElementById('cart-bubble');
    const itemCount = data.cartSize;

    if (itemCount > 0) {
        bubble.textContent = itemCount;
        bubble.style.visibility = 'visible';
    } else {
        bubble.style.visibility = 'hidden';
    }
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

    if (response.ok) {
        updateCartBubble();
    }

}

async function emptyCart() {
    var response = await fetch("../controller/c_emptyCart.php");
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    showSection('cart-display');

    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
}

async function removeFromCart(book_id) {
    var response = await fetch("../controller/c_removeFromCart.php?book_id=" + book_id);
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    showSection('cart-display');

    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
}

async function pay(user_id) {
    if (user_id == 0) {
        alert("Please log in to continue.");
        window.location.href = "../login.php";
    }
    else {
        var response = await fetch("../controller/c_pay.php?user_id=" + user_id);
        const responsetxt = await response.text();
        const responsetrim = responsetxt.trim();

        if (responsetrim == "true") {
            window.location.href = "../payment.php";
        }
        else {
            alert("Error processing payment. Please try again.");
        }
    }
}

async function configUser() {
    window.location.href = "../userModifyData.php";
}

async function logout() {
    var response = await fetch("../controller/c_logout.php");
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();
    alert(responsetrim);
    window.location.href = "../index.php";
}

async function getHistory() {
    var response = await fetch("../controller/c_history.php");
    const responsetxt = await response.text();
    const responsetrim = responsetxt.trim();

    showSection('cart-display');

    const cartElement = document.getElementById('cart-display');
    cartElement.innerHTML = responsetrim;
   
}

async function updateQuantity(book_id, currentQuantity, action) {
    var response = await fetch("../controller/c_handleProductQuantity.php?book_id=" + book_id + "&quantity=" + currentQuantity + "&more=" + action);
    const responsetxt = await response.text();
    console.log("Response text: ", responsetxt);
    const responsetrim = responsetxt.trim();
    console.log("Response trim: ", responsetrim);

    const spanElement = document.getElementById(`quantity-${book_id}`);
    console.log(spanElement);
    spanElement.innerHTML = responsetrim;

    if (responsetrim == "10") {
        const buttonElement = document.getElementById('button-more');
        buttonElement.disabled = true;
        buttonElement.style.backgroundColor = '#ff6161';
    }
    else {
        const buttonElement = document.getElementById('button-more');
        buttonElement.disabled = false;
        buttonElement.style.backgroundColor = '#a5d6e0c0';
    }
    
}