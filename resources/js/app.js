import './bootstrap'

let appUrl;
let currentRouteName;

let pageOnload = async function() {
    await allOnload();

    if(currentRouteName === "admin.users.index") {
        adminUsersOnload();
    } else if(currentRouteName === "admin.email-subscriptions.index") {
        adminEmailSubscriptionsOnload();
    }
};
let allOnload = async function() {
    appUrl = $("input[name='app_url']").val();
    currentRouteName = $("input[name='route_name']").val();

    $(window).trigger('scroll');

    if(currentRouteName === "home.index") {
        // localStorage.removeItem('savedDate');

        let savedDate = localStorage.getItem('savedDate');
        let currentDate = new Date();

        if (!savedDate || (currentDate - new Date(savedDate)) > (24 * 60 * 60 * 1000)) {
            savedDate = currentDate.toString();
            localStorage.setItem('savedDate', savedDate);

            $("#modal-newsletter-subscription").modal("show");
        }
    }
};

let homeOnload = function() {

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

    $("#modal-success .title").text(title ? title : 'Great!');
    $("#modal-success .message").text(message ? message : 'Your request has been completed successfully.');

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
                    content += ' ' + error.response.data.errors[prop];
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

// Contact Form
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

// Authentication
$(document).on("submit", "#register-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Submitting');

    let data = new FormData($(this)[0]);
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

// Admin Users
let adminUsersTable;
let adminUsersOnload = function() {
    adminUsersTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#users-table").attr("data-url"),
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'date_time_registered', name: 'date_time_registered' },
            { data: 'user_role', name: 'user_role' },
            { data: 'actions' }
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
