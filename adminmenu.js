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
        
        var motorDiv = document.createElement('div');
        motorDiv.classList.add('product');
        motorDiv.setAttribute('data-aos', 'fade-right');

        var imgElement = document.createElement('img');
        imgElement.src = motor.image;
        imgElement.alt = motor.name;
        motorDiv.appendChild(imgElement);

        var nameElement = document.createElement('p');
        nameElement.textContent = motor.name;
        nameElement.classList.add('nm');
        motorDiv.appendChild(nameElement);

        var descElement = document.createElement('p');
        descElement.textContent = motor.description;
        descElement.classList.add('pcc')
        motorDiv.appendChild(descElement);

        var priceElement = document.createElement('p');
        priceElement.textContent = 'P' + motor.price + ".00";
        priceElement.classList.add('pc');
        motorDiv.appendChild(priceElement);

        var availableElement = document.createElement('p');
        availableElement.textContent = motor.availability;
        availableElement.classList.add('av');
        motorDiv.appendChild(availableElement);

        // Append motorcycle div to div.gallery
        galleryDiv.appendChild(motorDiv);
    }

}

//SAVE OR ADD MOTOR
function saveMotorcycle() {
    var formData = new FormData(document.getElementById('addMotorcycleForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_motorcycle.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Motorcycle added successfully!');
            closeModal();
            searchMoto();
        } else {
            alert('An error occurred while adding the motorcycle.');
        }
    };
    xhr.send(formData);
}

//EDIT OR UPDATE MOTOR
function getMotorcycleDetails() {
    var selectedMotor = document.getElementById("motorSelect").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("motorcycleDetails").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "get_motor.php?motor=" + selectedMotor, true);
    xhttp.send();
}

function saveMotorcycleDetails() {
    var selectedMotor = document.getElementById("motorSelect").value;
    var name = document.getElementById('nameInput').value
    var brand = document.getElementById("brandInput").value;
    var description = document.getElementById("descriptionInput").value;
    var price = document.getElementById("priceInput").value;
    var availability = document.getElementById("availabilityInput").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Details updated successfully!");
        }
    };
    xhttp.open("POST", "saveUpdate_motor.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("motor=" + selectedMotor + "&name=" + name + "&brand=" + brand + "&description=" + description + "&price=" + price + "&availability=" + availability);
}