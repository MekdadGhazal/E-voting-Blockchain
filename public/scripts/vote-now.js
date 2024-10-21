var csrfToken = $('meta[name="csrf-token"]').attr('content');

function startVote() {
    step = 0;
    keys = [];
    value = 0;
    candidate = $(".vote-candidate").val();
    download();
    bitcoinPriv = '';
    bitcoinAddress = '';
    hashSig = 'Error';
    item_id = $(".item_id").val();
}

function download() {
    step = 1;
    showCMD(step, "Downloading all public keys of other voters");
    $.getJSON("/api/publickey", {"item_id": $(".item_id").val(), "code": $(".code").val()}, function (result) {
        if (result.success === '1') {
            $.each(result.content, function (key, value) {
                keys.push(new JSEncryptRSAKey(value.public_key));
            });
            showCMD(step, 'Got and fetch ' + (keys.length + 1) + ' public keys, including yours');
            fetchPrivateKey();
        } else {
            showCMD(step, "Please check your network, 3 second");
            setTimeout(download, 3000);
        }
    });
}


function trim(vStr) {
    return vStr.replace(/(^\s+)|(\s+$)/g, "");
}

function fetchPrivateKey() {
    step = 2;
    var privateKeyText = $(".private-key-area").val();
    if (!privateKeyText) {
        showCMD(step, "Error: Private key is empty or invalid.");
        return;
    }
    try {
        privkey = new JSEncryptRSAKey(privateKeyText);
        validatePrivateKey();
    } catch (e) {
        showCMD(step, "Error: Failed to initialize private key. Please check your input.");
        console.error("Private key initialization error: ", e);
    }
}

function validatePrivateKey() {
    step = 3;
    showCMD(step, "Validating your private key with your public key");

    var pubkey = $(".public-key-area").val();

    try {
        var privPublicKey = privkey.getPublicKey();
        if (!privPublicKey) {
            showCMD(step, "Error: Could not retrieve public key from the private key.");
            return;
        }

        if (trim(pubkey) !== trim(privPublicKey)) {
            showCMD(step, "Error: It's not a pair of keys, please check your private key.");
        } else {
            showCMD(step, "Validated");
            fetchCandidate();
        }

        console.log(privPublicKey);
        console.log($(".public-key-area").val());
        console.log($(".public-key-area").val() === privPublicKey);

    } catch (e) {
        showCMD(step, "Error: Validation failed. Please check your keys.");
        console.error("Public key validation error: ", e);
    }
}

function fetchCandidate() {
    step = 3;
    showCMD(step, "Fetching your candidate from the voting list");
    candidate = $(".vote-candidate").val();
    showCMD(step, "Fetched successfully, your vote number is: " + candidate);
    ringSig();
}

function postSig(sig) {
    var data = {
        sig: sig,
        _token: csrfToken, // Add this line to include the CSRF token
        csrf_name: $("input[name='csrf_name']").val(),
        csrf_value: $("input[name='csrf_value']").val()
    }
    $.post("/api/sigpairs", data, function (result) {
        // console.log(result.success);
        showCMD(step, result.content);
    })
}

function ringSig() {
    step = 4;
    showCMD(step, "Generating your unique ring signature");
    keys = keys.sort(randomsort);
    z = Math.floor(Math.random() * (keys.length + 1));
    keys.splice(z, 0, privkey);
    init(keys);
    console.log(candidate);
    sig = sign(candidate, z);
    hashSig = Sha1.hash(JSON.stringify(sig));
    console.log(JSON.stringify(sig));
    console.log('hash:' + hashSig);
    showText(JSON.stringify(sig));
    showCMD(step, 'Generated successfully, hash: ' + hashSig);
    createAndDownloadFile($(".code").val() + 'sig.txt', JSON.stringify(sig));
    postSig(JSON.stringify(sig));
    fetchBitcoinPrivateKey();
}

function fetchBitcoinPrivateKey() {
    step = 5;
    showCMD(step, "Fetching your bitcoin address information");

    var bitcoinAddress = $(".bitcoin-address-box").val();
    var code = $(".code").val();
    var signature = sign($(".vote-candidate").val(), Math.floor(Math.random() * (keys.length + 1)));

    $.post("/api/bitcoinkey", {
        "bitcoin_address": bitcoinAddress,
        "code": code,
        "_token": csrfToken, // Include the CSRF token here
        "sig": signature
    }, function (result) {
        // console.log("RESULT IS: " + JSON.stringify(result));
        if (result.success === '1') {
            wif = result.content.bitcoin_private_key;
            network = Bitcoin.networks.testnet;
            keyPair = Bitcoin.ECPair.fromWIF(wif, network);
            bitcoinAddress = keyPair.getAddress();
            $.getJSON("https://chain.so/api/v2/get_tx_unspent/BTCTEST/" + bitcoinAddress, function (result) {
                var txb = new Bitcoin.TransactionBuilder(network);

                var last = result.data.txs.length - 1;
                unspent_txid = result.data.txs[last].txid;
                unspent_vout = result.data.txs[last].output_no;
                txb.addInput(unspent_txid, unspent_vout);
                value = Number(result.data.txs[last].value * 100000000);
                address = $(".eaaddress").val();
                // address = 'n4Kc1AwFos3aZRvD3Tc9imzeMeA8E9DEUr';
                pay = 0.01 * 100000000;
                fee = 0.01 * 100000000;
                change = parseInt(value - pay - fee);

                console.log(value);

                var commit = new Buffered(hashSig + padding(candidate, 3) + padding(item_id, 3));
                var dataScript = Bitcoin.script.nullData.output.encode(commit);

                txb.addOutput(dataScript, 0);
                txb.addOutput(address, change);

                txb.sign(0, keyPair);

                var txRaw = txb.build();
                var txHex = txRaw.toHex();

                console.log('hex', txHex);
                postdata = {tx_hex: txHex};
                $.post("https://chain.so/api/v2/send_tx/BTCTEST/", postdata, function (result) {
                    showCMD(step, result.status);
                    showCMD(step, result.data.txid);
                    window.open("https://www.blocktrail.com/tBTC/tx/" + result.data.txid);
                });
            });
        }
    });
    showCMD(step, "Your code has been revoked now, DO NOT CLOSE THIS PAGE OR YOU WILL LOST THE LAST CHANCE TO VOTE");
}

function showCMD(step, txt) {
    $(".cmd-box").val($(".cmd-box").val() + '\n' + step + ' : ' + txt)
}

function showText(txt) {
    $(".cmd-box").val($(".cmd-box").val() + '\n' + step + ' : ' + txt)
}

