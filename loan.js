var salesXML;

function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            salesXML = this.responseXML;
            displayXML(this);
        }
    };
    xhttp.open("GET", "sales.xml", true);
    xhttp.send();
}

//Function to display products from XML
function displayXML(xml) {
    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(xml.responseText, "text/xml");
    
    var bestMotorcycles = [
        "Yamaha YZF R1",
        "Ducati Superleggera V4",
        "Kawasaki ZX-10RR",
        "2024 BMW S 1000 RR"
    ];

    var resultXml = '<motorcycles>';
    for (var i = 0; i < bestMotorcycles.length; i++) {
        var motorcycleName = bestMotorcycles[i];
        var motorcycleNode = xmlDoc.evaluate('//motorcycle[name="' + motorcycleName + '"]', xmlDoc, null, XPathResult.ANY_TYPE, null).iterateNext();
        if (motorcycleNode) {
            resultXml += motorcycleNode.outerHTML;
        }
    }
    resultXml += '</motorcycles>';

    // Transform filtered XML data using XSLT
    var xsltProcessor = new XSLTProcessor();
    var xslDoc = new XMLHttpRequest();
    xslDoc.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            xsltProcessor.importStylesheet(this.responseXML);
            var resultDocument = xsltProcessor.transformToFragment(parser.parseFromString(resultXml, "text/xml"), document);
            var productsElement = document.getElementById("products");
            
            // Clear existing content before appending
            productsElement.innerHTML = '';
            productsElement.appendChild(resultDocument);
        }
    };
    xslDoc.open("GET", "homepage.xslt", true);
    xslDoc.send();
}

// Function to update motorcycle price based on selected unit
function updateMotorcyclePrice() {
    var selectedUnit = document.getElementById('motorUnit').value;
    var motorcycleNode = salesXML.evaluate('//motorcycle[name="' + selectedUnit + '"]', salesXML, null, XPathResult.ANY_TYPE, null).iterateNext();
    var motorcyclePriceInput = document.getElementById('motorPrice');
    var motorcycleDPInput = document.getElementById('motorDp');
    if (motorcycleNode) {
        var price = motorcycleNode.getElementsByTagName('price')[0].textContent;
        motorcyclePriceInput.value = price;
    } else {
        motorcyclePriceInput.value = '';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var motorcycleUnitSelect = document.getElementById('motorUnit');
    motorcycleUnitSelect.addEventListener('change', updateMotorcyclePrice);
});

document.addEventListener("DOMContentLoaded", function() {
    var option = new URLSearchParams(window.location.search).get('option');

    // Check ang button base sa option
    if (option === 'loan') {
        document.getElementById('loan').checked = true;
    } else if (option === 'cash') {
        document.getElementById('cash').checked = true;
    }
});