$(document).ready(function(){
    // Populate Country dropdown
    $.getJSON('country.json', function(data){
        $.each(data.countries, function(key, entry){
            $('#country').append($('<option></option>').attr('value', entry.code).text(entry.name));
        });
    });

    function loadPhilippinesLocations() {
        $('#location-options').empty().append(
            '<div class="input-box">' +
            '<select name="region" id="region" required>' +
            '<option value="">Region</option>' +
            '</select>' +
            '</div>' +
            '<div class="input-box">' +
            '<select name="city" id="city" required>' +
            '<option value="">City/Municipality</option>' +
            '</select>' +
            '</div>' +
            '<div class="input-box">' +
            '<select name="barangay" id="barangay" required>' +
            '<option value="">Barangay</option>' +
            '</select>' +
            '</div>'
        );

        $.getJSON('philippines.json', function(data){
            $.each(data, function(regionId, region){
                $('#region').append($('<option></option>').attr('value', region.region_name).text(region.region_name));
            });
        });

        $('#location-options').on('change', '#region', function(){
            var regionName = $(this).val();
            $('#city').empty();
            $('#barangay').empty();

            $.getJSON('philippines.json', function(data){
                $.each(data, function(regionId, region){
                    if (region.region_name === regionName) {
                        $.each(region.province_list, function(provinceName, province){
                            $.each(province.municipality_list, function(cityName, city){
                                $('#city').append($('<option></option>').attr('value', cityName).text(cityName));
                            });
                        });
                    }
                });
            });
        });

        $('#location-options').on('change', '#city', function(){
            var cityName = $(this).val();
            $('#barangay').empty();

            $.getJSON('philippines.json', function(data){
                $.each(data, function(regionId, region){
                    $.each(region.province_list, function(provinceName, province){
                        $.each(province.municipality_list, function(municipalityName, municipality){
                            if (municipalityName === cityName) {
                                $.each(municipality.barangay_list, function(key, barangay){
                                    $('#barangay').append($('<option></option>').attr('value', barangay).text(barangay));
                                });
                            }
                        });
                    });
                });
            });
        });
    }

    function loadOtherCountryLocations() {
        $('#location-options').empty().append(
            '<div class="input-box">' +
            '<select name="state" id="state" required>' +
            '<option value="">Select State</option>' +
            '</select>' +
            '</div>' +
            '<div class="input-box">' +
            '<select name="city" id="city" required>' +
            '<option value="">Select City</option>' +
            '</select>' +
            '</div>'
        );

        $.getJSON('country.json', function(data){
            $.each(data.countries, function(key, entry){
                if (entry.code === $('#country').val()) {
                    $.each(entry.states, function(index, state){
                        $('#state').append($('<option></option>').attr('value', state.code).text(state.name));
                    });
                }
            });
        });

        $('#location-options').on('change', '#state', function(){
            var stateCode = $(this).val();
            $('#city').empty();

            $.getJSON('country.json', function(data){
                $.each(data.countries, function(key, entry){
                    if (entry.code === $('#country').val()) {
                        $.each(entry.states, function(index, state){
                            if (state.code === stateCode) {
                                $.each(state.cities, function(index, city){
                                    $('#city').append($('<option></option>').attr('value', city.id).text(city.name));
                                });
                            }
                        });
                    }
                });
            });
        });
    }

    $('#country').change(function(){
        var countryCode = $(this).val();
        $('#location-options').empty();

        if (countryCode === 'PH') {
            loadPhilippinesLocations();
        } else {
            loadOtherCountryLocations();
        }
    });

    $('#registerBtn').click(function(e) {
        e.preventDefault();
        console.log("Register button clicked"); // Check if click event is triggered
    
        // Check if password and confirm password match
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        if (password !== confirm_password) {
            displayNotification("Passwords do not match");
            return;
        }
    
        // Check for empty required fields and change border color to orange
        var requiredFields = ['last_name', 'first_name', 'phone', 'email', 'password', 'confirm_password', 'country'];
        var hasEmptyFields = false;
        requiredFields.forEach(function(field) {
            var fieldValue = $('#' + field).val().trim();
            if (fieldValue === '') {
                $('#' + field).addClass('orange-border');
                hasEmptyFields = true;
            } else {
                $('#' + field).removeClass('orange-border');
            }
        });
    
        if (hasEmptyFields) {
            displayNotification("Please fill in all required fields");
            return;
        }
    
        // Get form data
        var formData = $('#registrationForm').serialize();
    
        // Add additional fields based on selected country
        if ($('#country').val() === 'PH') {
            formData += '&region=' + $('#region').val();
            formData += '&city=' + $('#city').val();
            formData += '&barangay=' + $('#barangay').val();
        } else {
            formData += '&state=' + $('#state').val();
            formData += '&city=' + $('#city').val();
        }
    
        // Add lot, street, and phase_subdivision (Optional Address Fields)
        formData += '&lot=' + $('#lot').val();
        formData += '&street=' + $('#street').val();
        formData += '&phase_subdivision=' + $('#phase_subdivision').val();
    
        // Add country
        formData += '&country=' + $('#country').val();
    
        formData += '&register=register'; // Add register flag
    
        $.ajax({
            type: 'POST',
            url: 'check_email.php', // Assuming this is the URL to check if email is taken
            data: { email: $('#email').val() },
            success: function(response) {
                if (response.status === "taken") {
                    displayNotification("Email is already taken");
                } else {
                    // Proceed with registration
                    $.ajax({
                        type: 'POST',
                        url: 'register.php',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            window.location.href = 'login.php';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    
        // Scroll to top of page
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });
    
    // Function to display notification modal
    function displayNotification(message) {
        var modal = document.getElementById("notificationModal");
        var notificationMessage = document.getElementById("notificationMessage");
        notificationMessage.innerText = message;
        modal.style.display = "block";
    
        // Close the modal when the close button is clicked
        var closeBtn = document.getElementsByClassName("close")[0];
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }
    
        // Scroll to top of page with animation
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    
        // Hide the notification modal after 5 seconds
        setTimeout(function() {
            modal.style.display = "none";
        }, 5000);
    }
    
    // Remove orange border when required fields are filled
    $('.required-field').on('input', function() {
        if ($(this).val().trim() !== '') {
            $(this).removeClass('orange-border');
        } else {
            $(this).addClass('orange-border');
        }
    });
    
    // Function to remove orange border when field is being filled
    $('.required-field').on('input', function() {
        $(this).removeClass('orange-border');
    });
    
    
    

    $('#terms').change(function() {
        $('#registerBtn').prop('disabled', !this.checked);
    });

    $('#openModal').click(function(event) {
        event.preventDefault();
        $('#myModal').css('display', 'block');
    });

    $('.close').click(function() {
        $('#myModal').css('display', 'none');
    });

    $('#modal-terms').change(function() {
        $('.close').click();
    });

    $(window).click(function(event) {
        if (event.target === $('#myModal')[0]) {
            $('#myModal').css('display', 'none');
        }
    });

    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

});
