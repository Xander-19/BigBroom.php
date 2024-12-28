function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
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
            document.getElementById("products").appendChild(resultDocument);
        }
    };
    xslDoc.open("GET", "homepage.xslt", true);
    xslDoc.send();
}

document.getElementById('logOutBtn').addEventListener('click', function() {
    fetch('logout.php')
        .then(response => {
            if (response.ok) {
                window.location.href = 'index.php';
            }
        });
});