<?php
/*
----- Christian Akpan--------

Deep thoughts!!!!

$encrypted_text = "qnHWqq1mElDqW2RCepH14VriPf5s2Q==";
$cipher = "BF-CBC ";
$key = "Christian Akpan";
$iv = "3453762527273732, 1232434565432123";
$original_text = openssl_decrypt ($encrypted_text, $cipher, $key, $options = 0, $iv);
echo $original_text;

But then, let's consider:

Using the Cryptography Extensions called OpenSSL function for encrypt and decrypt.
openssl_encrypt() function: to encrypt the data.
openssl_decrypt() function: to decrypt the data.
------------------------------------------------------
*/
 // First, read inputs from input device  for variability and store the input string into the variable
// Then encrypt the data read

if(isset($_POST['encrypt_decrypt_btn'])){
$input_text = $_POST['input_text'];

}
// Display the original text

  
//cipher method to store inputted data
$cipher = "AES-128-CTR";
  
// OpenSSl encryption method
$iv_length = openssl_cipher_iv_length($cipher);
$options= 0;
  
// A random_bytes() function which gives to randomly generate 16 digit values
$encryption_iv = random_bytes($iv_length);
  
// Recall "DEEP THOUGHTS!!!, we can use any 16 digit characters or numeric for iv
$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
  
//---------------------------------------------------------------------------------------------------------
// Let's start our encryption here
$encryption = openssl_encrypt($input_text, $cipher,
        $encryption_key, $options, $encryption_iv);
  
// Display the encrypted string

//---------------------Encryption ends here-----------------------------------------------------------------

// ------- Decryption process starts here using a random_bytes() which gives randomly 16 digit values--------

$decryption_iv = random_bytes($iv_length);
  
// Store the decryption key to a variable---------------------------------------------------------------------
$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
  
//Let's start descrypting the input text now by calling the decrypt function and supply all parameters
$decryption = openssl_decrypt ($encryption, $cipher,
            $decryption_key, $options, $encryption_iv);
  
// Display the decrypted string

  
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> Genesystech Test </title>
</head>

<body style=" text-align: center;">
<h1>Encryption and Decryption Programme </h1>
    <hr>
        <p> This program is developed to help you encrypt input and decrypt input at the same time. <br>
        This will help you decide when to store your encrypted data separately and when to decrypt it when neeeded.</p>
    <hr>
<?php
    echo "<h3>Inputted Text: " . $input_text . "<br>";
    echo "Encrypted Input: " . $encryption . "<br>";
    echo "Decrypted Input: " . $decryption. "</h3>";
?>
    <center> Copyright (c) 2022. Genesys Internship Test. All rights reserved. </center>
</body>
    </html>