<!-- menupage.xslt -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <!-- ito yung XQuery function to retrieve motorcycle data -->
    <xsl:variable name="motorcycles" select="document('sales.xml')//motorcycle"/>

    <xsl:template match="/">
        <html>
        <head>
            <title>Best Motorcycles</title>
        </head>
        <body>
            <h1>Our Best Motorcycles</h1>
            <div class="gallery">
                <xsl:apply-templates select="motorcycles/motorcycle"/>
            </div>
        </body>
        </html>
    </xsl:template>

    <xsl:template match="motorcycle">
        <div class="product" data-aos="fade-up">
            <img src="{path}" alt="{alteration}" id="picc"/>
            <div class="details">
                <p class="nm"><xsl:value-of select="name"/></p>
                <p class="pc"><xsl:value-of select="price"/>.00</p>
            </div>
        </div>
    </xsl:template>
</xsl:stylesheet>
