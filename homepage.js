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
    
// CONTAINER SLIDER
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        imageS(this);
    }
};
xmlhttp.open("GET", "images.xml", true);
xmlhttp.send();

function imageS(xml) {
    var xmlDoc = xml.responseXML;
    var images = xmlDoc.getElementsByTagName("image");
    var slider = document.getElementById("slider");

    for (var i = 0; i < images.length; i++) {
        var imgUrl = images[i].getElementsByTagName("url")[0].childNodes[0].nodeValue;
        var imgAlt = images[i].getElementsByTagName("alt")[0].childNodes[0].nodeValue;

        var slide = document.createElement("div");
        slide.className = "slide";
        var img = document.createElement("img");
        img.src = imgUrl;
        img.alt = imgAlt;
        slide.appendChild(img);
        slider.appendChild(slide);
    }
}

// Automatic slider
var currentSlide = 0;
var slides = document.getElementsByClassName("slide");
setInterval(function() {
    currentSlide = (currentSlide + 1) % slides.length;
    slider.style.transform = "translateX(-" + currentSlide * 100 + "%)";
}, 4000);