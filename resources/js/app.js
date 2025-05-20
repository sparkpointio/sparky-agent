import './bootstrap'
import React from 'react';
import ReactDOM from 'react-dom/client';
import {createThirdwebClient, getContract, prepareContractCall, readContract} from "thirdweb";
import {ConnectButton, ThirdwebProvider, useActiveAccount, useSendTransaction} from "thirdweb/react";
import { arbitrum, arbitrumSepolia } from "thirdweb/chains";
import { QueryClient, QueryClientProvider } from 'react-query';
import { useEffect, useRef } from "react";

let appUrl;
let currentRouteName;

let pageOnload = async function() {
    await allOnload();

    if(currentRouteName === "register.index") {
        registerOnload();
    } else if(currentRouteName === "profile.index") {
        profileOnload();
    } else if(currentRouteName === "blog.content") {
        blogContentOnload();
    } else if(currentRouteName === "agents.index") {
        agentsOnload();
    } else if(currentRouteName === "agents.settings") {
        agentSettingsOnload();
    } else if(currentRouteName === "admin.users.index") {
        adminUsersOnload();
    } else if(currentRouteName === "admin.email-subscriptions.index") {
        adminEmailSubscriptionsOnload();
    } else if(currentRouteName === "admin.blogs.index") {
        adminBlogsOnload();
    } else if(currentRouteName === "admin.blogs.create") {
        adminBlogsCreateOnload();
    } else if(currentRouteName === "admin.blogs.edit") {
        adminBlogsCreateOnload();
    }
};
let allOnload = async function() {
    appUrl = $("input[name='app_url']").val();
    currentRouteName = $("input[name='route_name']").val();

    $(window).trigger('scroll');

    if($("#modal-success .title").html() !== "" && $("#modal-success .message").html() !== "") {
        $("#modal-success").modal("show");
    }
};

let homeOnload = function() {

};
let agentsOnload = function () {
    loadWallet();
};
let agentSettingsOnload = async function () {
    await loadWallet();

    let connectedWallet = localStorage.getItem('connectedWallet')
    if(!connectedWallet) {
        window.location.href = "/agents";
        return;
    }

    connectedWallet = JSON.parse(connectedWallet);

    tokenAccessPaymentContract = getContract({
        client,
        chain: networkEnv === "testnet" ? arbitrumSepolia : arbitrum,
        address: tokenAccessPaymentContractAddress
    });

    srkContract = getContract({
        client,
        chain: networkEnv === "testnet" ? arbitrumSepolia : arbitrum,
        address: srkContractAddress
    });

    currentAllowance = await readContract({
        contract: srkContract,
        method: "function allowance(address owner, address spender) returns (uint256)",
        params: [connectedWallet.address, tokenAccessPaymentContract.address],
    });
};
let registerOnload = function() {
    initializeAddressFields();
};
let profileOnload = function() {
    address = {
        province: '',
        city: '',
        barangay: '',
    }

    $('#region_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#province_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#city_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#barangay_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('input[name="street"]').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);

    $('input[name="street"]').attr('placeholder', 'House No., Street');

    $('.address-fields label').addClass(['font-size-90', 'mb-1']);

    $('#region_id').html('<option value="" selected>Select your region:</option>' + $('#region_id').html());
    $('#province_id').html('<option value="" selected>Select your province:</option>');
    $('#city_id').html('<option value="" selected>Select your city/municipality:</option>');
    $('#barangay_id').html('<option value="" selected>Select your barangay:</option>');
};

let numberFormat = function(x, decimal) {
    x = parseFloat(x);
    let parts = x;

    if(decimal !== false) {
        parts = parts.toFixed(decimal)
    }

    parts = parts.toString().split(".");

    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if(decimal !== 0) {
        return parts.join(".");
    } else {
        return parts[0];
    }
};
let formatDateTime = function(date, type) {
    date = new Date(date);

    if(type === 'llll') {
        const options = {
            weekday: 'short',
            month: 'short',
            day: 'numeric',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            timeZone: 'Asia/Manila',
            hour12: true
        };

        const formatter = new Intl.DateTimeFormat('en-US', options);

        return formatter.format(date);
    }
};
let initializeReloadButton = function(link) {
    let modalSuccess = $("#modal-success");

    modalSuccess.attr("data-bs-backdrop", "static");
    modalSuccess.attr("data-bs-keyboard", "false");

    modalSuccess.find("button").removeAttr("data-bs-dismiss");
    modalSuccess.find("button").addClass("reload-page");

    modalSuccess.find("button").attr("data-link", link);
};
let showSuccessModal = function(title = null, message = null) {
    // Success! Awesome! Great! Fantastic! Excellent! Superb! Wonderful! Amazing! Spectacular! Marvelous! Outstanding! Terrific! Brilliant! Phenomenal! Splendid! Remarkable! Magnificent! Glorious! Stellar! Impressive!

    $("#modal-success .title").html(title ? title : 'Great!');
    $("#modal-success .message").html(message ? message : 'Your request has been completed successfully.');

    $("#modal-success").modal("show");
};
let initializeDataTables = function() {
    $(".data-table").DataTable({
        aaSorting: [],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    if (column === 5) {
                        //need to change double quotes to single
                        data = data.replace( /"/g, "'" );
                        //split at each new line
                        let splitData = data.split('\n');
                        data = '';
                        for (let i=0; i < splitData.length; i++) {
                            //add escaped double quotes around each line
                            data += '\"' + splitData[i] + '\"';
                            //if its not the last line add CHAR(13)
                            if (i + 1 < splitData.length) {
                                data += ', CHAR(13), ';
                            }
                        }
                        //Add concat function
                        data = 'CONCATENATE(' + data + ')';
                        return data;
                    }
                    return data;
                }
            }
        }
    });
    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};
let showRequestError = function(error) {
    let content = '';

    if(error.response) {
        if(error.response.data) {
            content = error.response.data.message;

            for (let prop in error.response.data.errors) {
                if (Object.prototype.hasOwnProperty.call(error.response.data.errors, prop)) {
                    if(!content.includes(error.response.data.errors[prop])) {
                        content += ' ' + error.response.data.errors[prop];
                    }
                }
            }
        }
    }

    if(content === "Unauthenticated.") {
        $("#modal-login-warning").modal("show");
        return 0;
    }

    if(content !== '') {
        $("#modal-error .message").html(content);
    }

    $("#modal-error").modal("show");
};
function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

let loadWallet = function() {
    const queryClient = new QueryClient();
    const clientId = "6ab4691a82f30c256cb603d219cd1531";
    client = createThirdwebClient({
        clientId: clientId,
    });

    function App() {
        const account = useActiveAccount();
        const previousAccount = useRef(null);

        useEffect(() => {
            // Detect connect
            if (account && !previousAccount.current) {
                localStorage.setItem('connectedWallet', JSON.stringify(account));
            }

            // Detect disconnect
            if (!account && previousAccount.current) {
                localStorage.removeItem('connectedWallet');

                if(currentRouteName === "agents.settings") {
                    window.location.href = "/agents";
                }
            }

            previousAccount.current = account;
        }, [account]);

        const { mutate: sendTransaction } = useSendTransaction();

        useEffect(() => {
            sendTransactionGlobal = sendTransaction;
        }, [sendTransaction]);

        return React.createElement(
            'div',
            { className: 'text-center' },
            React.createElement(ConnectButton, {
                client: client,
                theme: 'light',
                connectButton: { label: 'Connect Wallet' }
            })
        );
    }

    const root = ReactDOM.createRoot(document.getElementById('wallet-container'));
    root.render(
        React.createElement(
            QueryClientProvider,
            { client: queryClient },
            React.createElement(
                ThirdwebProvider,
                {
                    clientId: clientId,
                    activeChain: "ethereum"
                },
                React.createElement(App, null)
            )
        )
    );
};

$(document).ready(function() {
    pageOnload();
});

$(window).on('scroll', function() {
    let navbar = $(".navbar");

    if($(this).scrollTop() > 0) {
        navbar.addClass("scrolled");
    } else {
        navbar.removeClass("scrolled");
    }
});

$(document).on("click", ".reload-page", function() {
    $(this).prop("disabled", true);
    let link = $(this).attr("data-link");

    if(link) {
        $(this).text("Redirecting");
        window.location.href = link;
    } else {
        $(this).text("Reloading Page");
        window.location.reload();
    }
});

$(document).on("input", ".use-numeric-no-leading-zero-rule", function() {
    let value = $(this).val();

    if (value === null || value === 0 || value === undefined) return value

    let numericValue = value.replace(/[^0-9]/g, '')
    numericValue = numericValue.replace(/^0+/, '') || '1'

    $(this).val(numericValue);
});

$(document).on("input", ".numeric-only", function() {
    let inputValue = $(this).val();
    $(this).val(inputValue.replace(/[^0-9]/g, ''));
});

// Under Construction
$(document).on("submit", "#email-subscription-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('SUBMITTING');

    let data = new FormData($(this)[0]);
    let url = data.get("url").toString();

    axios.post(url, data)
        .then((response) => {
            form.find('input[type="text"]').val("");
            form.find('input[type="email"]').val("");

            showSuccessModal("Awesome!", "You're subscribed. Get ready for the latest launches, insider tips, and exclusive offers straight to your inbox.");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            $("#modal-newsletter-subscription").modal("hide");

            button.prop("disabled", false);
            button.html('KEEP ME POSTED!');
        });
});

// Contact
$(document).on("submit", "#contact-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('SUBMITTING');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='text']").val("");
            form.find("input[type='email']").val("");
            form.find('textarea').val("");

            $("#modal-success .message").html("Message sent! Please wait for our email. We’ll contact you the soonest.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('SUBMIT');
        });
});

// Register
$(document).on("submit", "#register-form", function(e) {
    e.preventDefault();

    if($('[name="country"]').val() !== 'ph') {
        if($('[name="gmaps_address"]').attr("data-value") === "") {
            $("#modal-error .message").html("Please input a correct address.");
            $("#modal-error").modal("show");

            return 0;
        }
    }

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Submitting');

    let data = new FormData($(this)[0]);
    data.append('gmaps_address', $('[name="gmaps_address"]').attr("data-value"));

    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            button.html('Redirecting');
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Submit');

            showRequestError(error);
        })
});

// Address Selection
let address;
let searchAddressTimeout;
let CancelToken = axios.CancelToken;
let source = CancelToken.source();

let initializeAddressFields = function() {
    address = {
        province: '',
        city: '',
        barangay: '',
    }

    $('#region_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#province_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#city_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('#barangay_id').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);
    $('input[name="street"]').addClass(['py-2', 'mb-3', 'tw-h-[45px]']);

    $('input[name="street"]').attr('placeholder', 'House No., Street');

    $('#address-fields label').addClass("d-none");

    $('#region_id').html('<option value="" selected>Select your region:</option>' + $('#region_id').html());
    $('#province_id').html('<option value="" selected>Select your province:</option>');
    $('#city_id').html('<option value="" selected>Select your city/municipality:</option>');
    $('#barangay_id').html('<option value="" selected>Select your barangay:</option>');
};

$(document).on('change', '#region_id', function () {
    if(!this.value) {
        return 0;
    }

    $.getJSON('/api/address/provinces/' + this.value, function (data) {
        var options = '<option value="">Select your province:</option>';
        $.each(data, function (index, data) {
            var selected = '';
            if (data.province_id == address.province) {
                selected = ' selected ';
            }
            options += '<option value="' + data.province_id + '"' + selected + '>' + data.name + '</option>';
        });
        $('#province_id').html(options);
        $('#province_id').change();

        $('#city_id').html('<option value="" selected>Select your city/municipality:</option>');
        $('#barangay_id').html('<option value="" selected>Select your barangay:</option>');
    });
});

$(document).on('change', '#province_id', function () {
    if(!this.value) {
        return 0;
    }

    $.getJSON('/api/address/cities/' + this.value, function (data) {
        var options = '<option value="">Select your city/municipality:</option>';
        $.each(data, function (index, data) {
            var selected = '';
            if (data.city_id == address.city) {
                selected = ' selected ';
            }
            options += '<option value="' + data.city_id + '"' + selected + '>' + data.name + '</option>';
        });
        $('#city_id').html(options);
        $('#city_id').change();

        $('#barangay_id').html('<option value="" selected>Select your barangay:</option>');
    });
});

$(document).on('change', '#city_id', function () {
    if(!this.value) {
        return 0;
    }

    $.getJSON('/api/address/barangays/' + this.value, function (data) {
        var options = '<option value="">Select your barangay:</option>';
        $.each(data, function (index, data) {
            var selected = '';
            if (data.code == address.barangay) {
                selected = ' selected ';
            }
            options += '<option value="' + data.code + '"' + selected + '>' + data.name + '</option>';
        });
        $('#barangay_id').html(options);
        $('#barangay_id').change();
    });
});

$(document).on('change', '[name="country"]', function () {
    let showPHAddressFields = $(this).val() === 'ph';

    let gmapsAddress = $("[name='gmaps_address']");
    gmapsAddress.attr("data-value", "");
    gmapsAddress.val("");

    if(showPHAddressFields) {
        $("#ph-address-selection").removeClass("d-none");
        $("#gmaps-places-api-input").addClass("d-none");
    } else {
        $("#ph-address-selection").addClass("d-none");
        $("#gmaps-places-api-input").removeClass("d-none");

        $("#address-is-valid").addClass("d-none");
    }

    $('#region_id').attr('required', showPHAddressFields);
    $('#province_id').attr('required', showPHAddressFields);
    $('#city_id').attr('required', showPHAddressFields);
    $('#barangay_id').attr('required', showPHAddressFields);
    $('input[name="street"]').attr('required', showPHAddressFields);

    $('[name="gmaps_address"]').attr('required', !showPHAddressFields);
    $('[name="street_2"]').attr('required', !showPHAddressFields);
});

$(document).on('input', '[name="gmaps_address"]', function () {
    let spinner = $(this).closest("#gmaps-places-api-input").find(".spinner");
    spinner.removeClass("d-none");

    $("[name='gmaps_address']").attr("data-value", "");

    $("#address-is-valid").addClass("d-none");
    $("#search-address-result").addClass("d-none");

    let input = $(this).val();
    let url = $(this).attr("data-url");

    clearTimeout(searchAddressTimeout);

    if(input) {
        let data = new FormData();
        data.append('input', input);
        data.append('country', $('[name="country"]').val());

        searchAddressTimeout = setTimeout(function() {
            axios.post(url, data, {
                cancelToken: source.token
            }).then(response => {
                if(response.data.result) {
                    let content = '';

                    response.data.result.predictions.map((data, index, arr) => {
                        let isLastItem = index === arr.length - 1;

                        content += '<button type="button" class="list-group-item list-group-item-action select-address" style="' + (!isLastItem ? 'border-bottom:1px solid #222222' : '') + '"><span class="d-none">' + JSON.stringify(data) + '</span><div>' + data.description + '</div></button>'
                    });

                    if(content === '') {
                        content += '<div class="list-group-item text-center font-size-90">No result found.</div>'
                    }

                    $("#search-address-result .list-group").html(content);
                    $("#search-address-result").removeClass("d-none");
                }
            }).catch((error) => {
                if (!axios.isCancel(error)) {
                    showRequestError(error);
                }
            }).then(() => {
                spinner.addClass("d-none");
            });
        }, 2000);
    } else {
        spinner.addClass("d-none");
    }
});

$(document).on('click', '.select-address', function () {
    let gmapsAddress = $("[name='gmaps_address']");

    gmapsAddress.attr("data-value", $(this).find("span").html());
    gmapsAddress.val($(this).find("div").html());

    $("#search-address-result").addClass("d-none");
    $("#address-is-valid").removeClass("d-none");
});

$(document).on('click', '#close-address-result', function () {
    $("#search-address-result").addClass("d-none");
});

// Login
$(document).on("click", ".toggle-password-show", function() {
    let input = $(this).closest(".position-relative").find("input");
    let icon = $(this).find("i");

    if(input.attr("type") === "text") {
        input.attr("type", "password");

        icon.addClass('fa-eye');
        icon.removeClass('fa-eye-slash');
    } else {
        input.attr("type", "text");

        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
    }
});

$(document).on("submit", "#user-login-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Logging In');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            button.html('Redirecting');
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Log In');

            showRequestError(error);
        })
});

// Reset Password
$(document).on("submit", "#forgot-password-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='email']").val("");

            $("#modal-success .message").html("Password Reset Email Successfully Sent");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('Send Password Reset Email');

            $("#modal-forgot-password").modal("hide");
        });
});

$(document).on("submit", "#password-update-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='email']").val("");
            form.find("input[type='password']").val("");
            form.find("input[type='text']").val("");

            initializeReloadButton(response.data.redirect);

            $("#modal-success .message").html("Password Successfully Updated");
            $("#modal-success").modal("show");
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Reset Password');

            showRequestError(error);
        })
});

// Profile
$(document).on("click", "#update-profile", function() {
    $("#update-profile").addClass("d-none");
    $("#save-profile").removeClass("d-none");
    $("#cancel-update-profile").removeClass("d-none");

    let formattedBirthdate = $("#birthdate").val();
    $("#birthdate").val($("#birthdate").attr("data-value"));
    $("#birthdate").attr("data-value", formattedBirthdate);
    $("#birthdate").attr("type", "date");

    $("#address-display").addClass("d-none");
    $("#address-update-input").removeClass("d-none");

    $("#profile-form input").prop("disabled", false);

    $('[name="country"]').change();
});

$(document).on("click", "#cancel-update-profile", function() {
    $("#update-profile").removeClass("d-none");
    $("#save-profile").addClass("d-none");
    $("#cancel-update-profile").addClass("d-none");

    let birthdate = $("#birthdate").val();
    $("#birthdate").attr("type", "text");
    $("#birthdate").val($("#birthdate").attr("data-value"));
    $("#birthdate").attr("data-value", birthdate);

    $("#address-display").removeClass("d-none");
    $("#address-update-input").addClass("d-none");

    $("#profile-form input").prop("disabled", true);
});

$(document).on("submit", "#profile-form", function(e) {
    e.preventDefault();

    if($('[name="country"]').val() !== 'ph') {
        if($('[name="gmaps_address"]').attr("data-value") === "") {
            $("#modal-error .message").html("Please input a correct address.");
            $("#modal-error").modal("show");

            return 0;
        }
    }

    let button = $(this).find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    data.append('gmaps_address', $('[name="gmaps_address"]').attr("data-value"));

    let url = data.get("url").toString();

    axios.post(url, data)
        .then((response) => {
            $("#birthdate").attr("type", "text");
            $("#birthdate").val(response.data.formattedBirthdate);
            $("#birthdate").attr("data-value", response.data.birthdate);

            $("#address").val(response.data.address);

            $("#address-display").removeClass("d-none");
            $("#address-update-input").addClass("d-none");

            $("#profile-form input").prop("disabled", true);

            $("#update-profile").removeClass("d-none");
            $("#save-profile").addClass("d-none");
            $("#cancel-update-profile").addClass("d-none");

            showSuccessModal("Nice!", "You have successfully updated your profile.");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('Save Changes');
        });
});

// Profile Photo
$(document).on("click", "#select-user-photo", function() {
    $("[name='photo']").trigger("click");
});

$(document).on("change", "[name='photo']", function() {
    let input = $(this)[0];
    let reader = new FileReader();

    reader.onload = function(event) {
        let img = new Image();

        img.onload = function() {
            $("#profile-photo").css("background-image", "url('" + img.src + "')");

            $("#update-profile-photo-actions").removeClass("d-none");
        };

        img.src = event.target.result;
    };

    reader.readAsDataURL(input.files[0]);
});

$(document).on("click", "#cancel-update-profile-photo", function() {
    $("[name='photo']").val("");
    $("#update-profile-photo-actions").addClass("d-none")
    $("#profile-photo").css("background-image", "url('" + $("#profile-photo").attr("data-value") + "')");
});

$(document).on("click", "#save-profile-photo", function() {
    let button = $(this);
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($("#update-user-photo-form")[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            $("#profile-photo").attr("data-value", response.data.photo);
            $("#user-photo").css("background-image", "url('" + response.data.photo + "')");

            $("[name='photo']").val("");
            $("#update-profile-photo-actions").addClass("d-none")

            showSuccessModal("Nice!", "You have successfully updated your profile photo.");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('Save Photo');
        });
});

// Valid ID
$(document).on("click", "#select-valid-id", function() {
    $("[name='valid_id']").trigger("click");
});

$(document).on("change", "[name='valid_id']", function() {
    let input = $(this)[0];
    let reader = new FileReader();

    reader.onload = function(event) {
        let img = new Image();

        img.onload = function() {
            $("#valid-id-display").css("background-image", "url('" + img.src + "')");
            $("#attach-valid-id-label").addClass("d-none");

            $("#update-valid-id-actions").removeClass("d-none");
        };

        img.src = event.target.result;
    };

    reader.readAsDataURL(input.files[0]);
});

$(document).on("click", "#cancel-update-valid-id", function() {
    $("[name='valid_id']").val("");
    $("#update-valid-id-actions").addClass("d-none");

    if($("#valid-id-display").attr("data-value")) {
        $("#valid-id-display").css("background-image", "url('" + $("#valid-id-display").attr("data-value") + "')");
    } else {
        $("#valid-id-display").css("background-image", "initial");
        $("#attach-valid-id-label").removeClass("d-none");
    }
});

$(document).on("click", "#save-valid-id", function() {
    let button = $(this);
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($("#update-valid-id-form")[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            $("#profile-photo").attr("data-value", response.data.photo);

            $("[name='valid_id']").val("");
            $("#update-valid-id-actions").addClass("d-none")

            showSuccessModal("Excellent!", "You have successfully updated your Valid&nbsp;ID.");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('Save Valid ID');
        });
});

// Blog
let blogContentOnload = function() {
    $("#blog-body p").each(function() {
        if($(this).html() === "<br>") {
            $(this).remove();
        } else {
            // if($(this).find("img").length) {
            //     let content = ' <div class="row justify-content-center py-4">';
            //     content += '        <div class="col-md-10 col-lg-9">';
            //     content += '            <img src="' +  $(this).find("img").attr("src") + '" class="w-100" alt="" />';
            //     content += '        </div>';
            //     content += '    </div>';
            //
            //     $(this).html(content);
            // } else {
            //     $(this).addClass(["text-black", "h-custom-4", "text-justify", "mb-4"]);
            // }
        }
    });
};

// Agent
const networkEnv = import.meta.env.VITE_NETWORK_ENV;
const tokenAccessPaymentContractAddress = import.meta.env.VITE_TOKEN_ACCESS_PAYMENT_CONTRACT_ADDRESS;
const srkContractAddress = import.meta.env.VITE_SRK_CONTRACT_ADDRESS;
const paymentPrice = import.meta.env.VITE_PAYMENT_PRICE;

let client = null;
let tokenAccessPaymentContract = null;
let srkContract = null;
let currentAllowance = null;
let sendTransactionGlobal = null;

const approveTransaction = async () => {
    $("#modal-srk-approval").modal("show");

    const approveTx = prepareContractCall({
        contract: srkContract,
        method: "function approve(address spender, uint256 value)",
        params: [
            tokenAccessPaymentContractAddress,
            BigInt(paymentPrice) * BigInt("1000000000000000000")
        ],
        value: BigInt(0),
    });

    console.log("Prepared approval transaction:", approveTx);

    const approveReceipt = await sendTransactionGlobal(approveTx, {
        onError: (error) => {
            console.error(error);
            $("#modal-srk-approval").modal("hide");
        },
        onSuccess: () => {
            console.log("Transaction successfully executed!");
            $("#modal-srk-approval").modal("hide");
            proceedWithPayment();
        },
    });

    console.log("Approval transaction receipt:", approveReceipt);
};

const proceedWithPayment = async () => {
    $("#modal-srk-payment").modal("show");

    const paymentTx = prepareContractCall({
        contract: tokenAccessPaymentContract,
        method: "function pay()",
        params: [],
        value: BigInt(0),
    });

    console.log("Prepared payment transaction:", paymentTx);

    const paymentReceipt = await sendTransactionGlobal(paymentTx, {
        onError: (error) => {
            $("#modal-srk-payment").modal("show");
            console.error(error);
        },
        onSuccess: async (tx) => {
            $("#modal-srk-payment").modal("hide");

            $("#modal-success .message").html("Payment successfully received.");
            $("#modal-success").modal("show");

            console.log("Transaction sent! Hash:", tx.transactionHash);
        },
    });

    console.log("Payment transaction receipt:", paymentReceipt);
};

$(document).on("click", "#create-agent-redirect", function() {
    let connectedWallet = localStorage.getItem('connectedWallet')
    if(connectedWallet) {
        window.location.href = "/agents/settings";
    } else {
        $("#wallet-container .tw-connect-wallet").trigger("click");
    }
});

$(document).on("keydown", ".agent-input input", function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        $(this).prop("disabled", true);

        e.preventDefault();

        let value = $(this).val().trim();

        if(value !== "") {
            let content = ' <div class="tw-bg-[#eeeeee] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">';
            content += '        <div>';
            content += '            <p class="mb-0">' + value + '</p>';
            content += '        </div>';
            content += '        <div class="ps-3 mb-0">';
            content += '            <i class="fa-solid fa-times cursor-pointer remove"></i>';
            content += '        </div>';
            content += '    </div>';

            $(this).closest(".agent-input").find(".values").append(content);
            $(this).val("");

            $(this).closest(".agent-input").find(".values").removeClass("d-none");
            $(this).closest(".agent-input").find(".values").addClass("d-flex");
        }

        $(this).prop("disabled", false);
    }
});

$(document).on("click", ".agent-input .remove", function() {
    let valuesContainer = $(this).closest(".values");

    $(this).closest(".value").remove();

    if(valuesContainer.html().trim() === "") {
        valuesContainer.addClass("d-none")
        valuesContainer.removeClass("d-flex")
    }
});

$(document).on("submit", "#agent-form", function(e) {
    e.preventDefault();

    let form = $(this);

    let button = $(this).find("[type='submit']");
    button.prop("disabled", true);
    button.html('Saving Changes');

    let data = new FormData(form[0]);
    let url = data.get("url").toString();

    data.append("address", JSON.parse(localStorage.getItem('connectedWallet')).address);

    $(".agent-input").each(function() {
        let variable = $(this).attr("data-input") + "[]";

        $(this).find(".value").each(function() {
            let value = $(this).find("p").html().trim();

            if(value !== "") {
                data.append(variable, value);
            }
        });
    });

    axios.post(url, data)
        .then((response) => {
            if(response.data.redirect) {
                initializeReloadButton(response.data.redirect);
            }

            $("#modal-success .message").html("Agent successfully saved.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled",false);
            button.html("Save Changes");
        });
});

$(document).on("click", ".toggle-agent", function() {
    $("#modal-agent-payment").modal("show");
    return;

    let button = $(this);
    let isEnabled = button.html() !== "Start Agent";

    button.prop("disabled", true);
    button.html(isEnabled ? 'Stopping Agent' : 'Starting Agent');

    let data = new FormData();
    let url = button.attr("data-url");

    axios.post(url, data)
        .then((response) => {
            button.html(isEnabled ? 'Start Agent' : 'Stop Agent');
            button.addClass(isEnabled ? 'btn-custom-2' : 'btn-custom-4');
            button.removeClass(isEnabled ? 'btn-custom-4' : 'btn-custom-2');

            $("#modal-success .message").html("Agent successfully " + (isEnabled ? "stopped" : "started") + ".");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
            button.html(isEnabled ? 'Stop Agent' : 'Start Agent');
        }).then(() => {
            button.prop("disabled",false);
        });
});

$(document).on("click", "#make-payment", async function() {
    $("#modal-agent-payment").modal("hide");

    if (currentAllowance > BigInt(0) && currentAllowance >= BigInt(paymentPrice) * BigInt("1000000000000000000")) {
        await proceedWithPayment();
    } else {
        await approveTransaction();
    }
});

// Admin Users
let adminUsersTable;
let adminUsersOnload = function () {
    adminUsersTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#users-table").attr("data-url"),
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'date_time_registered', name: 'date_time_registered'},
            {data: 'user_role', name: 'user_role'},
            {data: 'actions'}
        ]
    });

    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};

// Admin Email Subscriptions
let adminEmailSubscriptionsTable;
let adminEmailSubscriptionsOnload = function() {
    adminEmailSubscriptionsTable = $('#email-subscriptions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#email-subscriptions-table").attr("data-url"),
        columns: [
            { data: 'email', name: 'email' },
            { data: 'name', name: 'name' },
            { data: 'date_time_subscribed', name: 'date_time_subscribed' }
        ],
        buttons: [
            {
                text: 'Export to Excel',
                action: function (e, dt, node, config) {
                    $.ajax({
                        url: '/export/excel', // Replace with your server-side export endpoint
                        method: 'GET',
                        success: function (response) {
                            // Handle the Excel file received from the server
                            // For example, you can prompt the user to download it
                            // or handle it according to your application's needs
                        },
                        error: function (xhr, status, error) {
                            console.error('Error exporting Excel:', error);
                        }
                    });
                }
            }
        ]
    });

    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};

// Admin Blogs
let adminBlogsTable;
let quill;
let adminBlogsOnload = function() {
    adminBlogsTable = $('#blogs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#blogs-table").attr("data-url"),
        columns: [
            { data: 'date_time', name: 'date_time' },
            { data: 'title', name: 'title' },
            { data: 'status', name: 'status' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};
let adminBlogsCreateOnload = function() {
    quill = new Quill('#blog-body', {
        modules: {
            toolbar: [
                [{ 'header': [2, 3, 4, 5, false] }],
                ['bold', 'italic', 'underline'],
                ['link', 'image']
            ],
            imageResize: {
                modules: ['Resize', 'DisplaySize']
            }
        },
        theme: 'snow',
        placeholder: 'Compose blog...',
    });


    if($("#blog-body-content").length) {
        quill.root.innerHTML = $("#blog-body-content").html();
    }

    $(".editor-container").removeClass("d-none");

    $("#categories").select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    });

    $("#categories").removeClass("d-none");
};

$(document).on("click", "#attach-blog-banner", function() {
    $("input[name='banner']").trigger("click");
});

$(document).on("change", "input[name='banner']", function() {
    let reader = new FileReader();

    let container = $("#attach-blog-banner");

    reader.onload = function(event) {
        let img = new Image();

        img.onload = function() {
            container.find("div").addClass("d-none");
            container.css("background-image", "url('" + img.src + "')");
        };

        img.src = event.target.result;
    };

    if($(this)[0].files.length) {
        reader.readAsDataURL($(this)[0].files[0]);
    }
});

$(document).on("submit", "#blog-form", function(e) {
    e.preventDefault();

    let form = $(this);

    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    let url = data.get("url").toString();

    // Get the HTML content of the editor
    let htmlContent = quill.root.innerHTML;

    // Iterate through all images in the editor
    let images = quill.root.querySelectorAll('img');
    images.forEach(function(image, index) {
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        canvas.width = image.width;
        canvas.height = image.height;
        ctx.drawImage(image, 0, 0, image.width, image.height);
        var dataURI = canvas.toDataURL('image/png');

        var newImage = new Image();
        newImage.src = dataURI;

        image.parentNode.replaceChild(newImage, image);
    });

    if(htmlContent === '<p><br></p>' || htmlContent === '') {
        try {
            throw new Error('Blog body is required.');
        } catch (error) {
            showRequestError(error);

            button.prop("disabled",false);
            button.html("Save Blog");

            return 0;
        }
    }

    data.append('body', htmlContent);

    axios.post(url, data)
        .then((response) => {
            initializeReloadButton(response.data.redirect);

            if(data.get("id") && !isNaN(parseInt(data.get("id").toString()))) {
                $("#modal-success .message").html("Blog Successfully Updated");
            } else {
                $("#modal-success .message").html("Blog Successfully Created");
            }

            $("#modal-success").modal("show");
        }).catch((error) => {
        showRequestError(error);
    }).then(() => {
        button.prop("disabled",false);
        button.html("Save Blog");
    });
});
