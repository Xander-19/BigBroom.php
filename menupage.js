function searchMoto() {
    var searchTerm = document.getElementById('Search').value.toLowerCase();
    var brandCategory = document.getElementById('brand').value.toLowerCase();
    var sortType = document.getElementById('Sort').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            displayResults(this.responseXML, searchTerm, brandCategory, sortType);
        }
    };
            
    xhr.open("GET", "sales.xml", true);
    xhr.send();
}

function displayResults(xml, searchTerm, brandCategory, sortType) {
    var resultsDiv = document.querySelector('#products'); 

    resultsDiv.innerHTML = '';

    var Motors = xml.getElementsByTagName('motorcycle');
    var motorArray = [];

    for (var i = 0; i < Motors.length; i++) {
        var name = Motors[i].getElementsByTagName('name')[0].textContent.toLowerCase();
        var description = Motors[i].getElementsByTagName('description')[0].textContent.toLowerCase(0);
        var brand = Motors[i].getElementsByTagName('brand')[0].textContent.toLowerCase();
        var availability = Motors[i].getElementsByTagName('availability')[0].textContent.toLowerCase();
        var digitsRegex = /\d+/g;

        // Convert to string the price
        var priceDigits = Motors[i].getElementsByTagName('price')[0].textContent.match(digitsRegex);
        
        // Join to form the price string and to make price into digits
        var price = parseFloat(priceDigits.join(''));
        var image = Motors[i].getElementsByTagName('path')[0].textContent;

        // Filtering the brand of motor
        if ((searchTerm === '' || name.includes(searchTerm)) &&
            (brandCategory === '' || brand === brandCategory)) {
                motorArray.push({ image, name, description, brand, price, availability }); 
        }
    }

    // Sorting Area
    motorArray.sort(function(a, b) {
        return (sortType === 'Lowest-Highest') ? a.price - b.price : b.price - a.price;
    });

    var galleryDiv = document.createElement('div');
    galleryDiv.classList.add('gallery');
    resultsDiv.appendChild(galleryDiv);

    // Append motorcycle details inside div.gallery
    for (var j = 0; j < motorArray.length; j++) { 
        var motor = motorArray[j];
        
        // div.product to hold motorcycle details
        var motorDiv = document.createElement('div');
        motorDiv.classList.add('product');
        motorDiv.setAttribute('data-aos', 'fade-right');

        // Motor image element
        var imgElement = document.createElement('img');
        imgElement.src = motor.image;
        imgElement.alt = motor.name;
        motorDiv.appendChild(imgElement);

        // motor name element
        var nameElement = document.createElement('p');
        nameElement.textContent = motor.name;
        nameElement.classList.add('nm');
        motorDiv.appendChild(nameElement);

        // motor description element
        var descElement = document.createElement('p');
        descElement.textContent = motor.description;
        descElement.classList.add('pcc')
        motorDiv.appendChild(descElement);

        // motor price element
        var priceElement = document.createElement('p');
        priceElement.textContent = 'P' + motor.price + ".00";
        priceElement.classList.add('pc');
        motorDiv.appendChild(priceElement);

        // motor availability element
        var availableElement = document.createElement('p');
        availableElement.textContent = motor.availability;
        availableElement.classList.add('av');
        motorDiv.appendChild(availableElement);

        // button loan and cash element
        var applyLoanButton = document.createElement('button');
        applyLoanButton.classList.add('button');
        applyLoanButton.style.verticalAlign = 'middle';
        var loanSpanElement = document.createElement('span');
        loanSpanElement.textContent = 'Apply for Loan';
        applyLoanButton.appendChild(loanSpanElement);
        applyLoanButton.addEventListener("click", applyForLoan);

        var applyCashButton = document.createElement('button');
        applyCashButton.classList.add('button');
        applyCashButton.style.verticalAlign = 'middle';
        var cashSpanElement = document.createElement('span');
        cashSpanElement.textContent = 'Apply for Cash';
        applyCashButton.appendChild(cashSpanElement);
        applyCashButton.addEventListener("click", applyForCash);

        motorDiv.appendChild(applyLoanButton);
        motorDiv.appendChild(applyCashButton);

        // Append motorcycle div to div.gallery
        galleryDiv.appendChild(motorDiv);
    }
    // Go to loan or cash page with option in query parameter.
    function applyForLoan() {
        window.location.href = "loan.php?option=loan";
    }

    function applyForCash() {
        window.location.href = "loan.php?option=cash";
    }

}
