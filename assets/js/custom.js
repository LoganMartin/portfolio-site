/**
    custom.js

    Written By: Logan Martin
    Desc: Javascript additions to the site written by me.
*/


$(window).on('load', function() {
    $("#portModal").modal({
        show: false
    });
});

$(".carousel").carousel({
    interval: false
});


// Open a project when it's clicked, unless the external link is clicked.
$(".work-item").click(function(event) {
    if($(event.target).attr("class") !== "proj-link") {
        var projectNum = $(this).attr("id");
        //console.log($(event.target).attr("class"));
        var projectID = projectNum.split('_', 2)[1];

        /* NOW WE GET THE PROJECT DETAILS BASED ON WHICH PROJECT ID WE HAVE */
        $.ajax({
            type: "POST",
            url: "portfolio_c.php",
            data: {"action": "getProjectByID", "projID": projectID},
            success: function(data) {
                populateModal(data);
                $("#portModal").modal('show');
            },
            error: function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
});

$(".contact-field").click(function(event) {
    if($(this).hasClass("contact-field-warning")) {
        $(this).removeClass("contact-field-warning");
    }
});

function populateModal(data) {
    var projData = JSON.parse(data);
    //console.log(projData);
    updateCarousel(projData.proj_imgs, projData.imgPath);
    $("#portModalLabel").text(projData.proj_name);
    $("#modal-date").text(projData.proj_date);
    $("#modal-type").text(projData.proj_type);
    $("#modal-link").html("<a href='" + projData.proj_link+ "'>"+ projData.linkName +"</a>");
    $("#modal-desc-text").text(projData.proj_desc);
}

/**
*
*   @desc parses image filenames from a string, and formats them into html strings
*         which will be used to update our image carousel in our project modals.
*/
function updateCarousel(imgString, imgPath) {
    var images = imgString.split(' ');
    var imageCount = 0;
    var carIndicators = "";
    var carItems = "";
    for(var i=0; i<images.length; i++) {
        imageCount++;
        if(imageCount == 1) {
            carIndicators += '<li data-target="#image-carousel" data-slide-to="'+ i +'" class="active"></li>';
            carItems += '<div class="item active"><a href="'+ imgPath + images[i] +'" target="_blank"><img src="'+ imgPath + images[i] +'" alt="pic'+imageCount+'"></a></div>';
        }
        else {
            carIndicators += '<li data-target="#image-carousel" data-slide-to="'+ i +'"></li>';
            carItems += '<div class="item"><a href="'+ imgPath + images[i] +'" target="_blank"><img src="'+ imgPath + images[i] +'" alt="pic'+imageCount+'"></a></div>';
        }
    }
    $("#carousel-indicators").html(carIndicators);
    $("#carousel-items").html(carItems);
}

//If the "send message" button is clicked, verify it's a valid message, then send message and disable the button.
$("#contact-btn").click(function(event) {
    if(validMessage()) {
        if(!$(this).hasClass("disabled")) {
            $(this).addClass("disabled");
            sendMessage();
        }
    }
    else {
        displayAlert("Please fill out each field to send a message, Thanks!", "danger");
    }
});

function sendMessage() {
    var name = $("#contact-name").val();
    var email = $("#contact-email").val();
    var message = $("#contact-msg").val();

    $.ajax({
        type: "POST",
        url: "mailer.php",
        data: {"action": "sendMessage", "name": name, "email": email,
                "message": message},
        success: function(data) {
            if(data == 'success') {
                var confirmationMessage = "Thank You! Your message has been sent, I'll get back to you as soon as possible.";
                $("#contact-btn").addClass("success");
                $("#contact-btn").html('Message Sent!<span id="contact-chkmark" class="icon fa-check-circle"></span>');
                displayAlert(confirmationMessage, "success");
            }
            else {
                displayAlert(data, "danger");
                if($("#contact-btn").hasClass("disabled")) {
                    $("#contact-btn").removeClass("disabled");
                }
            }
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });

}

/*
function DebugOutput() {
    $.ajax({
        type: "POST",
        url: "portfolio_c.php",
        data: {"action": "ReadDirectory"},
        success: function(data) {
            alert(data);
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}
*/

//For now, simply ensures that there are no blank fields
function validMessage() {
    var valid = true;
    if($("#contact-name").val() === "") {
        $("#contact-name").addClass("contact-field-warning");
        valid =  false;
    }
    if($("#contact-email").val() === "") {
        $("#contact-email").addClass("contact-field-warning");
        valid =  false;
    }
    if($("#contact-msg").val() === "") {
        $("#contact-msg").addClass("contact-field-warning");
        valid =  false;
    }
    return valid;
}

function displayAlert(alertString, alertType) {
    var alertDOM = '<div class="anim-alert alert alert-'+ alertType+ ' alert-dismissible" role="alert">';
    alertDOM += '<button type="button" class="close alert-close-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    alertDOM += '<div id="alert-msg">' + alertString + '</div></div>';

    $("#alert-container").html(alertDOM);
}
