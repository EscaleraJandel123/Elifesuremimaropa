<!doctype html>
<html lang="en">

<head>
    <title>Calendar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




    <link rel="stylesheet" href="<?= base_url() ?>req/calendar-04/css/style.css">

</head>
<style>
    .contaner {
        padding: 0;
    }
</style>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content w-100">
                        <div class="calendar-container">
                            <div class="calendar">
                                <div class="year-header">
                                    <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                    <span class="year" id="label"></span>
                                    <span class="right-button fa fa-chevron-right" id="next"> </span>
                                </div>
                                <table class="months-table w-100">
                                    <tbody>
                                        <tr class="months-row">
                                            <td class="month">Jan</td>
                                            <td class="month">Feb</td>
                                            <td class="month">Mar</td>
                                            <td class="month">Apr</td>
                                            <td class="month">May</td>
                                            <td class="month">Jun</td>
                                            <td class="month">Jul</td>
                                            <td class="month">Aug</td>
                                            <td class="month">Sep</td>
                                            <td class="month">Oct</td>
                                            <td class="month">Nov</td>
                                            <td class="month">Dec</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="days-table w-100">
                                    <td class="day">Sun</td>
                                    <td class="day">Mon</td>
                                    <td class="day">Tue</td>
                                    <td class="day">Wed</td>
                                    <td class="day">Thu</td>
                                    <td class="day">Fri</td>
                                    <td class="day">Sat</td>
                                </table>
                                <div class="frame">
                                    <table class="dates-table w-100">
                                        <tbody class="tbody">
                                        </tbody>
                                    </table>
                                </div>
                                <button class="button" id="add-button">Create schedule</button>
                            </div>
                        </div>
                        <!-- <div class="events-container">
                        </div> -->
                        <div class="dialog" id="dialog" style="background-color: #1679AB">
                            <h2 class="dialog-header"> Schedule </h2>
                            <form action="/sched" method="POST" class="form" id="form">
                                <div class="form-container" align="center">
                                    <input type="hidden" id="selectedDateInput" name="selected_date">
                                    <input type="hidden" name="agent" value="<?= $agent ?>">
                                    <input type="hidden" name="plan" value="<?= $plan ?>">

                                    <!-- <label class="form-label" for="name">What Time</label>
                                    <input class="input" type="time" style="color: white"><br><br> -->

                                    <label class="form-label" for="name">What Time</label>
                                    <input class="input" type="time" style="color: white" name="schedule_time" required><br><br>

                                    <label class="form-label" for="meeting-type">Type of Meeting</label>
                                    <select class="input" id="meeting-type" name="meeting_type" style="color: white"
                                        required>
                                        <option value="" style="color: #000;">Type of meeting...</option>
                                        <option value="phone-call" style="color: #000;">Phone Call</option>
                                        <option value="office-meeting" style="color: #000;">Meeting in Office</option>
                                        <option value="zoom" style="color: #000;">Zoom Meeting</option>
                                    </select><br><br><br><br>

                                    <input type="button" value="Cancel" class="button" id="cancel-button">
                                    <input type="submit" value="OK" class="button button-white" id="ok-button">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <button id="yourButtonId">adss</button> -->
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url() ?>req/calendar-04/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>req/calendar-04/js/popper.js"></script>
    <script src="<?= base_url() ?>req/calendar-04/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>req/calendar-04/js/main.js"></script>
    <script>

        $("#yourButtonId").click(function () {
            var selectedDate = $("#selectedDateInput").val();
            console.log("Selected Date:", selectedDate);
            // Additional code here based on the selected date
        });

    </script>
</body>

</html>