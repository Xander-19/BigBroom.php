<?php 
    $page_title = "Loan";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="img/iconBSM.jpg">
    <title>
        <?php if(isset($page_title)) { echo "$page_title"; } ?> - BigBroom Shop
    </title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="termsCondition.css">
</head>
<body onload="loadXMLDoc()">
    <div class="container">
        <header>
            <div class="modal-content">
                <h2>Terms and Conditions</h2>
                <div class="terms-text">
                    <p>Last Updated: May 24, 2024</p>
                    <p>Welcome to BigBroom Shop. These Terms and Conditions govern your use of our website and services related to loaning or purchasing motorcycles (big bikes). By accessing or using our website, you agree to comply with and be bound by these Terms and Conditions.</p>
                    <h3>1. Acceptance of Terms</h3>
                    <p>By using our website and services, you accept and agree to these Terms and Conditions. If you do not agree with any part of these terms, you must not use our services.</p>
                    <h3>2. Eligibility</h3>
                    <p>You must be at least 18 years old to apply for a loan or purchase a motorcycle through our website. By applying, you represent and warrant that you meet this eligibility requirement.</p>
                    <h3>3. Services Provided</h3>
                    <p>We offer the following services:</p>
                    <ul>
                        <li>Loan applications for purchasing motorcycles.</li>
                        <li>Cash purchase options for motorcycles.</li>
                    </ul>
                    <h3>4. Application Process</h3>
                    <p>a. <strong>Loan Application</strong>: To apply for a loan, you must complete and submit the online application form, providing accurate and complete information. Incomplete applications may be rejected.</p>
                    <p>b. <strong>Cash Purchase</strong>: To purchase a motorcycle with cash, you must complete the purchase process as outlined on our website.</p>
                    <h3>5. Required Documentation</h3>
                    <p>For both loan applications and cash purchases, you are required to submit the following documents:</p>
                    <ul>
                        <li>Valid government-issued identification (e.g., passport, driver’s license).</li>
                        <li>Proof of income or employment.</li>
                        <li>Proof of address.</li>
                        <li>Additional documentation as required by our team for verification purposes.</li>
                    </ul>
                    <h3>6. Payment Methods</h3>
                    <p>a. <strong>Loans</strong>: Upon approval, loan repayment terms will be provided, including interest rates, repayment schedule, and any applicable fees.</p>
                    <p>b. <strong>Cash Purchases</strong>: Payment must be made in full via the accepted payment methods listed on our website.</p>
                    <h3>7. Privacy Policy</h3>
                    <p>Your privacy is important to us. Please review our Privacy Policy, which explains how we collect, use, and protect your personal information.</p>
                    <h3>8. User Conduct</h3>
                    <p>You agree not to:</p>
                    <ul>
                        <li>Provide false or misleading information during the application process.</li>
                        <li>Use our services for any unlawful purpose.</li>
                        <li>Violate any applicable laws or regulations.</li>
                    </ul>
                    <h3>9. Intellectual Property</h3>
                    <p>All content on our website, including text, graphics, logos, and images, is the property of [Your Company Name] or its content suppliers and is protected by intellectual property laws. Unauthorized use of this content is prohibited.</p>
                    <h3>10. Limitation of Liability</h3>
                    <p>To the fullest extent permitted by law, [Your Company Name] shall not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with the use of our services.</p>
                    <h3>11. Dispute Resolution</h3>
                    <p>Any disputes arising from these Terms and Conditions or your use of our services shall be resolved through binding arbitration in accordance with the rules of the [Relevant Arbitration Association]. You agree to waive any right to a trial by jury.</p>
                    <h3>12. Governing Law</h3>
                    <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of laws principles.</p>
                    <h3>13. Changes to Terms</h3>
                    <p>We reserve the right to modify these Terms and Conditions at any time. Any changes will be effective immediately upon posting on our website. Your continued use of our services constitutes acceptance of the revised terms.</p>
                    <h3>14. Contact Us</h3>
                    <p>If you have any questions or concerns about these Terms and Conditions, please contact us at:</p>
                    <p>[BigBroom Shop]<br>[Bustos Bulacan]<br>[bigbroom@gmail.com]<br>[09123455432]</p>
                </div>
            </div>
        </div>

    </div>

    <script src="loan.js"></script>
    <script src="paymentmodal.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>