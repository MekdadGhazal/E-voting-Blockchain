$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    // Event listener for the update key button
    $(".btn-updatekey").on('click', function () {
        // Get the public key and code values
        var public_key = btoa($(".public-key-area").val()); // Encode public key in Base64
        // let public_key = $(".public-key-area").val(); // Encode public key in Base64
        let code = $("#coded").val();

        // Basic validation for inputs
        // if (!public_key || !code) {
        //     return swal("Error", "Please enter both the public key and code.", "error");
        // }

        console.log("Code being sent:", code);
        console.log("public KEY being sent:", public_key);

        $.ajax({
            url: "/api/postpubkey",
            type: "POST",
            dataType: "json",
            data: {
                "public_key": public_key,
                "code": code,
            },
            success: function (result) {
                console.log("Raw response:", result); // Log raw response

                if (result.success === '1') {
                    console.log(result);
                    swal({
                        title: "Good Job",
                        text: result.content,
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn-success",
                                closeModal: true
                            }
                        }
                    });
                    // Redirect after a slight delay
                    setTimeout(() => {
                        window.location.href = "start?code=" + code;
                    }, 2000);
                } else {
                    swal("Oops...", result.content, "error");
                }
            },
            error: function (xhr, status, error) {
                // Log the error for debugging
                console.error("AJAX error:", status, error);
                // Show error alert
                swal("Error", "An error occurred: " + error, "error");
            }
        });
    });

    // Event listener for the generate key button
    $(".btn-generate").on('click', function () {
        generateKeys();
    });
});

// Function to generate keys and download them
function generateKeys() {
    var keySize = 1024;
    var crypt = new JSEncrypt({ default_key_size: keySize });
    crypt.getKey();
    $('.private-key-area').val(crypt.getPrivateKey());
    $('.public-key-area').val(crypt.getPublicKey());
    createAndDownloadFile($(".code").val() + '_private_key.txt', crypt.getPrivateKey());
}

// Function to create and download a file
function createAndDownloadFile(fileName, content) {
    const blob = new Blob([content], { type: 'text/plain' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    link.click();
}
