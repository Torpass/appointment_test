<?php include_once '../../templates/header.php' ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Appointments</title>
        <link rel="stylesheet" type="text/css" href="../../css/step-form.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-8">
                    <form id="myForm" action="store-data.php" method="POST">
                        <h4 class="text-center">Make an appointment</h4>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step">1</span>
                            <span class="step">2</span>
                            <span class="step">3</span>
                            <span class="step">4</span>
                        </div>


                        <!-- One "tab" for each step in the form: -->
                            <!-- First tab: select service and subservice -->
                        <div class="tab">Select a service:
                            <p>
                                <select name="service"  id="service" class="form-control" onchange="updateCards()">
                                    <option value="taxes">Taxes</option>
                                    <option value="boxmailing">Boxmailing</option>
                                    <option value="realstate">Real state</option>
                                </select>
                            </p>
                            <div id="cardsContainer" class="row">
                                <!-- Cards will be dynamically inserted here -->
                             </div>
                        </div>

                            <!-- Select schedule -->
                        <div class="tab">Select Schedule:
                            <p>
                                <label for="schedule_date">Select a day:</label>
                                <input type="date" id="schedule_date" name="schedule_date" class="form-control" onchange="updateHours()">
                            </p>
                            <div id="hoursContainer" class="row">
                                <!-- Hour cards will be dynamically inserted here -->
                            </div>
                        </div>


                        <div class="tab">Birthday:
                            <p><input placeholder="dd" name="date" class="form-control"></p>
                            <p><input placeholder="mm" name="month" class="form-control"></p>
                            <p><input placeholder="yyyy" name="year" class="form-control"></p>
                        </div>
                        <div class="tab">Login Info:
                            <p><input placeholder="Username" name="username" class="form-control"></p>
                            <p><input placeholder="Password" name="password" type="password" class="form-control"></p>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right; margin-top: 5px;">
                                <button type="button" class="previous btn-primary">Previous</button>
                                <button type="button" class="next btn-primary">Next</button>
                                <button type="button" class="submit btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="../../js/custom.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $.validator.addMethod('username', function (value, element, param) {
                    var nameRegex = /^[a-zA-Z0-9]+$/;
                    return value.match(nameRegex);
                }, 'Only a-z, A-Z, 0-9 characters are allowed');

                var val = {
                    // Specify validation rules
                    rules: {
                        fname: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            digits: true
                        },
                        date: {
                            date: true,
                            required: true,
                            minlength: 2,
                            maxlength: 2,
                            digits: true
                        },
                        month: {
                            month: true,
                            required: true,
                            minlength: 2,
                            maxlength: 2,
                            digits: true
                        },
                        year: {
                            year: true,
                            required: true,
                            minlength: 4,
                            maxlength: 4,
                            digits: true
                        },
                        username: {
                            username: true,
                            required: true,
                            minlength: 4,
                            maxlength: 16,
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            maxlength: 16,
                        }
                    },
                    // Specify validation error messages
                    messages: {
                        fname: "First name is required",
                        email: {
                            required: "Email is required",
                            email: "Please enter a valid e-mail",
                        },
                        phone: {
                            required: "Phone number is requied",
                            minlength: "Please enter 10 digit mobile number",
                            maxlength: "Please enter 10 digit mobile number",
                            digits: "Only numbers are allowed in this field"
                        },
                        date: {
                            required: "Date is required",
                            minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                            maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                            digits: "Date should be a number"
                        },
                        month: {
                            required: "Month is required",
                            minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                            maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                            digits: "Only numbers are allowed in this field"
                        },
                        year: {
                            required: "Year is required",
                            minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                            maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                            digits: "Only numbers are allowed in this field"
                        },
                        username: {
                            required: "Username is required",
                            minlength: "Username should be minimum 4 characters",
                            maxlength: "Username should be maximum 16 characters",
                        },
                        password: {
                            required: "Password is required",
                            minlength: "Password should be minimum 8 characters",
                            maxlength: "Password should be maximum 16 characters",
                        }
                    }
                }
                $("#myForm").multiStepForm(
                        {
                            // defaultStep:0,
                            beforeSubmit: function (form, submit) {
                                console.log("called before submiting the form");
                                console.log(form);
                                console.log(submit);
                            },
                            validations: val,
                        }
                ).navigateTo(0);
            });
        </script>
        <script>
            function updateCards() {
                var service = document.getElementById("service").value;
                var cardsContainer = document.getElementById("cardsContainer");

                // Clear existing cards
                cardsContainer.innerHTML = '';

                // Define card options based on the selected service
                var options = {
                    taxes: [
                        { value: 'income_tax', text: 'Income Tax' },
                        { value: 'sales_tax', text: 'Sales Tax' },
                        { value: 'property_tax', text: 'Property Tax' }
                    ],
                    boxmailing: [
                        { value: 'standard_box', text: 'Standard Box' },
                        { value: 'express_box', text: 'Express Box' },
                        { value: 'international_box', text: 'International Box' }
                    ],
                    realstate: [
                        { value: 'residential', text: 'Residential' },
                        { value: 'commercial', text: 'Commercial' },
                        { value: 'industrial', text: 'Industrial' }
                    ]
                };

                // Add new cards based on the selected service
                if (service && options[service]) {
                    options[service].forEach(function(option) {
                        var card = document.createElement('div');
                        card.className = 'col-md-4';
                        card.innerHTML = `
                            <div class="card mb-4 shadow-sm" onclick="selectCard(this, '${option.value}')">
                                <div class="card-body">
                                    <h5 class="card-title">${option.text}</h5>
                                    <input type="radio" name="subservice" value="${option.value}" style="display: none;">
                                </div>
                            </div>
                        `;
                        cardsContainer.appendChild(card);
                    });
                }
            }
            function selectCard(card, value) {
                // Deselect all cards
                var cards = document.querySelectorAll('#cardsContainer .card');
                cards.forEach(function(c) {
                    c.classList.remove('selected');
                    c.querySelector('input[type="radio"]').checked = false;
                });

                // Select the clicked card
                card.classList.add('selected');
                card.querySelector('input[type="radio"]').checked = true;

                console.log('Selected card:', value);
            }

            var style = document.createElement('style');
            style.innerHTML = `
                .card.selected {
                    border: 2px solid #007bff;
                }
            `;
            document.head.appendChild(style);
        </script>

        <script>
            function updateHours() {
                var scheduleDate = document.getElementById("schedule_date").value;
                var hoursContainer = document.getElementById("hoursContainer");

                // Clear existing hour cards
                hoursContainer.innerHTML = '';

                // Define hour options based on the selected day
                var options = {
                    monday: [
                        { value: '08:00', text: '08:00 AM - 08:25 AM' },
                        { value: '09:00', text: '09:00 AM - 09:25 AM' },
                        { value: '10:00', text: '10:00 AM' }
                    ],
                    tuesday: [
                        { value: '11:00', text: '11:00 AM' },
                        { value: '12:00', text: '12:00 PM' },
                        { value: '13:00', text: '01:00 PM' }
                    ],
                    // Add more days and hours as needed
                };

                // Get the day of the week from the selected date
                var date = new Date(scheduleDate);
                var dayOfWeek = date.getUTCDay();
                var days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                var dayName = days[dayOfWeek];
                console.log(dayName);

                // Add new hour cards based on the selected day
                if (dayOfWeek && options[dayName]) {
                    options[dayName].forEach(function(option) {
                        var card = document.createElement('div');
                        card.className = 'col-md-4';
                        card.innerHTML = `
                            <div class="card mb-4 shadow-sm" onclick="selectHour(this, '${option.value}')">
                                <div class="card-body">
                                    <h5 class="card-title">${option.text}</h5>
                                    <input type="radio" name="hour" value="${option.value}" style="display: none;">
                                </div>
                            </div>
                        `;
                        hoursContainer.appendChild(card);
                    });
                }
            }

            function selectHour(card, value) {
                // Deselect all hour cards
                var cards = document.querySelectorAll('#hoursContainer .card');
                cards.forEach(function(c) {
                    c.classList.remove('selected');
                    c.querySelector('input[type="radio"]').checked = false;
                });

                // Select the clicked hour card
                card.classList.add('selected');
                card.querySelector('input[type="radio"]').checked = true;

                // Log the selected hour value
                console.log('Selected hour value:', value);
            }

            // Add some CSS to style the selected card
            var style = document.createElement('style');
            style.innerHTML = `
                .card.selected {
                    border: 2px solid #007bff;
                }
            `;
            document.head.appendChild(style);
        </script>
    </body>
</html>

<?php include_once '../../templates/footer.php' ?>