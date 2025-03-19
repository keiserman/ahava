jQuery(document).ready(function ($) {
  // Filter drop down
  if (sessionStorage.getItem("copyReasons")) {
    let reason_string = sessionStorage.getItem("copyReasons");
    let cleaned = reason_string.replace(/"|\]|\[/g, "");
    let reason_arr = cleaned.split(",");
    let clean_arr = [];

    reason_arr.forEach((item) => {
      clean_arr.push(item.trim());
    });

    var cLocation = sessionStorage
      .getItem("copyLocation")
      .replace(/"|\]|\[/g, "");
    console.log(cLocation);

    setTimeout(() => {
      filterDoctorsReasons(clean_arr, cLocation);
    }, 2000);
  }

  $(window).click(function () {
    $(".select_option_field").removeClass("filter-drop-open");
  });
  $(".select_wrap .select_option_field").click(function (event) {
    event.stopPropagation();
    event.preventDefault();

    let radioGroup = $('[name="radio-group"]').is(":checked");
    let urgent_care = $('[name="reason"]').is(":checked");
    let radio_dr = $('[name="radio_dr"]').is(":checked");
    var target = $(event.target);

    if (
      target.is(
        ".select_wrap #location_filter, .select_wrap #location_filter .select_option, .select_wrap #location_filter .select_option span, .select_wrap #location_filter .select_option h4, select_wrap #location_filter .select_choose .select_icon img, .select_wrap #location_filter .select_option label"
      )
    ) {
      $(this)
        .toggleClass("filter-drop-open")
        .siblings()
        .removeClass("filter-drop-open");

      let expanded = "true";
      if (
        $(this).find("button.select_option").attr("aria-expanded") == "true"
      ) {
        expanded = "false";
      }
      $("button.select_option").attr("aria-expanded", "false");
      $(this).find("button.select_option").attr("aria-expanded", expanded);
    } else if (
      target.is(
        ".select_wrap #reason_filter, .select_wrap #reason_filter .select_option, .select_wrap #reason_filter .select_option span, .select_wrap #reason_filter .select_option h4, select_wrap #reason_filter .select_choose .select_icon img, .select_wrap #reason_filter .select_option label"
      ) &&
      radioGroup
    ) {
      var location = $(
        '#location_filter input[name="radio-group"]:checked'
      ).val();
      filterDoctors(location);
      filterReasons(location);

      $(this)
        .toggleClass("filter-drop-open")
        .siblings()
        .removeClass("filter-drop-open");

      let expanded = "true";
      if (
        $(this).find("button.select_option").attr("aria-expanded") == "true"
      ) {
        expanded = "false";
      }
      $("button.select_option").attr("aria-expanded", "false");
      $(this).find("button.select_option").attr("aria-expanded", expanded);
    } else if (
      target.is(
        ".select_wrap #doctor_filter, .select_wrap #doctor_filter .select_option, .select_wrap #doctor_filter div.select_option span, .select_wrap #doctor_filter .select_option h4, select_wrap #doctor_filter .select_choose .select_icon img, .select_wrap #doctor_filter .select_option label"
      ) &&
      urgent_care
    ) {
      $(this)
        .toggleClass("filter-drop-open")
        .siblings()
        .removeClass("filter-drop-open");

      let expanded = "true";
      if (
        $(this).find("button.select_option").attr("aria-expanded") == "true"
      ) {
        expanded = "false";
      }
      $("button.select_option").attr("aria-expanded", "false");
      $(this).find("button.select_option").attr("aria-expanded", expanded);
    } else if (
      target.is(
        ".time_calendar, .select_wrap #timeslot_filter, .select_wrap #timeslot_filter .select_option, .select_wrap #timeslot_filter .select_option span, .select_wrap #timeslot_filter .select_option h4, select_wrap #timeslot_filter .select_choose .select_icon img, .select_wrap #timeslot_filter .select_option label"
      ) &&
      urgent_care
    ) {
      $(this)
        .toggleClass("filter-drop-open")
        .siblings()
        .removeClass("filter-drop-open");

      let expanded = "true";
      if (
        $(this).find("button.select_option").attr("aria-expanded") == "true"
      ) {
        expanded = "false";
      }
      $("button.select_option").attr("aria-expanded", "false");
      $(this).find("button.select_option").attr("aria-expanded", expanded);
    } else {
      alert("Previous box must be checked first!");
    }
  });

  $(".choose_option").click(function (e) {
    e.stopPropagation();

    // If location selected, filter doctors
    if ($(this).closest("#location_filter").length) {
      var location = $(
        '#location_filter input[name="radio-group"]:checked'
      ).val();

      filterDoctors(location);
      filterReasons(location);
    }

    if ($(this).closest("#reason_filter").length) {
      var reasons_arr = [];

      var location = $(
        '#location_filter input[name="radio-group"]:checked'
      ).val();

      $('#reason_filter input[name="reason"]:checked').each(function () {
        reasons_arr.push($(this).val().trim());
      });

      filterDoctorsReasons(reasons_arr, location);
    }
  });

  function filterDoctors(location) {
    $("#doctor_filter .choose_option li").removeClass("hidden");
    $("#doctor_filter .choose_option li input").each(function () {
      if ($(this).data("location")) {
        var locations = $(this).data("location");

        if (!locations.includes(location)) {
          $(this).closest("li").addClass("hidden");
        }
      }
    });
  }

  // Filter doctors by specialty
  function filterDoctorsReasons(reasons, location) {
    console.log(location);
    $("#doctor_filter .choose_option li").removeClass("hidden");
    $("#doctor_filter .choose_option li input").each(function () {
      if ($(this).data("reason") && $(this).data("location")) {
        var locations = $(this).data("location");
        var reason_arr = $(this).data("reason");

        if (
          !containsReasons(reason_arr, reasons) ||
          !locations.includes(location)
        ) {
          $(this).closest("li").addClass("hidden");
        }
      }
    });
  }

  // Check if reasons match
  function containsReasons(reasons, reasons_res) {
    return reasons.some((item) => reasons_res.includes(item));
  }

  function filterReasons(location) {
    $("#reason_filter .choose_option li").removeClass("hidden");
    $("#reason_filter .choose_option li input").each(function () {
      if ($(this).data("locations")) {
        var locations = $(this).data("locations");
        if (!locations.includes(location)) {
          $(this).closest("li").addClass("hidden");
        }
      }
    });
  }

  //Filter drop down submit
  function CopyValuesToInputFields() {
    //Add location in the location input field
    let copyLocation = document.querySelector('[name="radio-group"]:checked');
    let getLocationUrl = document.querySelector('[name="radio-group"]:checked')
      .dataset.url;
    console.log(getLocationUrl);
    //Paste url to iframe
    document
      .querySelector(".request_app_left iframe")
      .setAttribute("src", getLocationUrl);
    let pasteLocation = document.querySelector('[name="the_location"]');
    pasteLocation.value = copyLocation?.value;
    if (getLocationUrl == "#") {
      $(".request_app_left iframe")
        .hide()
        .after(
          '<img src="https://ahavamedical.com/wp-content/uploads/2022/06/Screen-Shot-2022-05-03-at-3.12.35-PM.png" />'
        );
    } else {
      $(".request_app_left iframe").show();
      $(".request_app_left img").remove();
    }

    filterDoctors(pasteLocation.value);

    //Add reasons in the reason input field
    let copyReason = document.querySelectorAll('[name="reason"]');
    let listOfReasons = "";
    //Add reasons to string
    for (var i = 0; i <= copyReason.length - 1; i++) {
      //listOfReasons += copyReason[i].value;
      if (copyReason[i]?.checked === true) {
        listOfReasons += copyReason[i]?.value + ", ";
      }
    }

    //Paste reasons in the reason input field
    let pasteReason = document.querySelector('[name="reason_items"]');
    pasteReason.value = listOfReasons;

    //Add doctor to doctor input field
    let copyDoctor = document.querySelector('[name="radio_dr"]:checked');
    let pasteDoctor = document.querySelector('[name="doctor"]');
    pasteDoctor.value = copyDoctor?.value;

    let to_email = "chavy@ahavamedical.com";
    let cc_emails = [];
    let cc_email = "";
    console.log(pasteLocation.value);
    switch (pasteLocation.value) {
      case "Williamsburg, NY":
        if (pasteReason.value.includes("Dentistry")) {
          cc_emails.push("mfigueroa@ahavamedical.com");
        }
        if (
          pasteReason.value.includes("Optometry") ||
          pasteReason.value.includes("Opthamology") ||
          pasteReason.value.includes("Vision")
        ) {
          cc_emails.push("vision@ahavamedical.com");
        }
        break;
      case "Liberty, NY":
        to_email = "dsimpson@ahavamedical.com";
        break;
      case "Flatbush, NY":
        to_email = "amarcelin@ahavamedical.com";
        break;
      case "Five Towns":
        to_email = "chani@ahavamedical.com";
        break;
      default:
        break;
    }
    let to_email_input = document.querySelector('[name="to-email"]');
    to_email_input.value = to_email;

    let cc_email_input = document.querySelector('[name="cc-email"]');
    cc_email_input.value = cc_emails.join();

    //Add timeslot to doctor input fieldf
    let selectActiveMonth = document.querySelector(
      ".pointer.center.monthname"
    )?.innerText;
    let selectActiveDate = document.querySelector(
      ".group.calendar-body .active"
    )?.innerText;
    let selectActiveTime = document.querySelector(
      ".time_calendar.active_time label"
    )?.innerText;
    let timeslotSchedule =
      "I would like to book an appointment on " +
      selectActiveDate +
      " " +
      selectActiveMonth +
      " between " +
      selectActiveTime;
    let pasteTimeslot = document.querySelector('[name="timeslot"]');
    pasteTimeslot.value = timeslotSchedule;
  }
  //Checks if all fileds are populated
  function openEmailBox(checkedTrue) {
    if (checkedTrue) {
      document.querySelector(".fillInToContinue").style.display = "none";
      document.querySelector(".request_app").style.display = "block";
      let modalBox = document.querySelector(".mediaotg_modal-content");
      modalBox ? (modalBox.style.display = "none") : "";
      //document.querySelector(".mediaotg_modal-content").style.display = "none";
      CopyValuesToInputFields();
    } else {
      document.querySelector(".fillInToContinue").style.display = "block";
      document.querySelector(".request_app").style.display = "none";
      alert("Previous box must be checked first!");
    }
  }
  //Set session storage
  function setSessionStorageRA() {
    //Get Locationa
    let copyLocation = document.querySelector(
      '[name="radio-group"]:checked'
    ).value;
    sessionStorage.setItem("copyLocation", JSON.stringify(copyLocation));

    //Get Reasons
    let copyReason = document.querySelectorAll('[name="reason"]');
    let listOfReasons = [];

    //Add reasons to string
    for (var i = 0; i <= copyReason.length - 1; i++) {
      //listOfReasons += copyReason[i].value;
      if (copyReason[i]?.checked === true) {
        listOfReasons.push(copyReason[i]?.value);
      }
    }
    sessionStorage.setItem("copyReasons", JSON.stringify(listOfReasons));

    //Add TimeSlot
    let selectActiveMonth = document.querySelector(
      ".pointer.center.monthname"
    )?.innerText;
    let selectActiveDate = document.querySelector(
      ".group.calendar-body .active"
    )?.innerText;
    if (!selectActiveDate) {
      selectActiveDate = document.querySelector(
        ".group.calendar-body .today"
      )?.innerText;
    }
    let selectActiveTime = document.querySelector(
      ".time_calendar.active_time label"
    )?.innerText;
    sessionStorage.setItem("ActiveMonth", JSON.stringify(selectActiveMonth));
    sessionStorage.setItem("ActiveDate", JSON.stringify(selectActiveDate));
    sessionStorage.setItem("ActiveTime", JSON.stringify(selectActiveTime));
  }

  // Fill sellected on load

  function addToArrayOnload(target, values) {
    let inputParent = target ? target.closest("div") : false;
    //console.log(inputParent);
    if (values && inputParent) {
      var labels = $(inputParent)
        .find(":checked")
        .map(function () {
          return $(this).val();
        })
        .get();

      //console.log(labels);
      var labelsString = labels.toString();
      //console.log(labelsString);
      var result = labelsString.substring(0, 17);
      //console.log(result);
      inputParent.querySelector(".select_option_field span").innerHTML =
        labelsString.length <= 0
          ? ""
          : labelsString.length <= 17
          ? result
          : result + "...";
      // inputParent.querySelector(".filter-drop-open span").className = "newClass";
    } else {
      labels = getDateAndTime();
      result = labels.substring(0, 17);
      //console.log(result);
      document.querySelector("#timeslot_filter span").innerHTML =
        labels.length <= 0 ? "" : labels.length <= 17 ? result : result + "...";
      //inputParent.querySelector(".filter-drop-open span").className = "newClass";
    }

    function getDateAndTime() {
      let resMonth = $(".monthname").text();
      resMonth = resMonth.substring(0, 3);
      let resDate = $(".calendar-body .active").not(".today").text();
      if (!resDate) {
        resDate = $(".calendar-body .today").text();
      }
      let resTime = $(".preferred_time .active_time label").text();
      let ReservationDateIs = resMonth + " " + resDate + ", " + resTime;
      return ReservationDateIs;
    }
  }

  //checkAll will check all chekboxes in: location
  function checkAll(cLocation, name) {
    var findLocation = document.querySelectorAll('[name="radio-group"]');
    if (cLocation != null) {
      for (let i = 0; i <= findLocation.length; i++) {
        let oldLoc = '"' + findLocation[i]?.value + '"';
        if (oldLoc == cLocation) {
          findLocation[i].setAttribute("checked", "");
          addToArrayOnload(findLocation[i]);
          addToArrayOnload(findLocation[i], name[i]);
        }
      }
    }
  }

  //checkAllReasons will check all chekboxes in: reasons
  function checkAllReasons(cReason, name) {
    var findReason = name;
    for (let i = 0; i <= cReason.length; i++) {
      for (let l = 0; l <= findReason.length; l++) {
        if (findReason[l]?.value == cReason[i]) {
          findReason[l]?.setAttribute("checked", "");
          addToArrayOnload(findReason[l], cReason[i]);
        }
      }
    }
  }

  //checkAllTimeSlot will mark active slots
  function checkAllTimeSlot(cMonth, cDate) {
    //alert(cTime);
    //Set month
    document.querySelector(".pointer.center.monthname").innerText = cMonth;
    //Set date
    let findAllDays = document.querySelectorAll(".group.calendar-body li");
    for (var i = 0; i < findAllDays.length; i++) {
      if (findAllDays[i].innerText == cDate) {
        findAllDays[i].classList.add("active");
      }
    }
  }
  //Check time
  function checkTime(cTime) {
    //Set time
    //document.querySelectorAll('.time_calendar').className += " active"")
    let findTime = document.querySelectorAll(".time_calendar label");
    let findtime_calendar = document.querySelectorAll(".time_calendar");
    let findtime_calendar_input = document.querySelectorAll(
      ".time_calendar input"
    );
    let findactive_time = document.querySelector(".active_time");
    let findInput = document.querySelector(".active_time input");
    findInput.removeAttribute("checked");
    findactive_time.classList.remove("active_time");

    for (var a = 0; a < findTime.length; a++) {
      //alert(findTime[a].innerText + "--" + cTime);

      if (findTime[a].innerText == cTime) {
        //alert(findTime[a].innerText + "--" + cTime);
        findtime_calendar[a].classList.add("active_time");
        findtime_calendar_input[a].setAttribute("checked", "");
      }
    }
    addToArrayOnload();
  }
  //This will load values from season storage whne windows loads
  window.onload = function () {
    if (document.querySelector("#location")) {
      var findLocation = document.querySelectorAll('[name="radio-group"]');
      var cLocation = sessionStorage.getItem("copyLocation");
      checkAll(cLocation, findLocation);

      //Get reasons
      var findReason = document.querySelectorAll('[name="reason"]');
      var cReason = JSON.parse(sessionStorage.getItem("copyReasons"));
      cReason ? checkAllReasons(cReason, findReason) : "";
      //var findReason = document.querySelectorAll('[name="reason"]');
      //alert(cReason[0] + "-"+ findReason[0].value);

      //GetTimeSLots
      var cMonth = JSON.parse(sessionStorage.getItem("ActiveMonth"));
      var cDate = JSON.parse(sessionStorage.getItem("ActiveDate"));
      cMonth && cDate ? checkAllTimeSlot(cMonth, cDate) : "";
      //Check time
      var cTime = JSON.parse(sessionStorage.getItem("ActiveTime"));

      //alert(cTime);
      cTime ? checkTime(cTime) : "";

      //Open email box
      let checkIfSectionExists = document.querySelector(".request_app");

      setTimeout(() => {
        if (cReason != null && checkIfSectionExists != null) {
          openEmailBox(true);
        }
      }, 500);
    } else {
      sessionStorage.removeItem("copyLocation");
      sessionStorage.removeItem("copyReasons");
      sessionStorage.removeItem("ActiveMonth");
      sessionStorage.removeItem("ActiveDate");
      sessionStorage.removeItem("ActiveTime");
    }
  };
  //Click to submit
  document
    .querySelector(".select_wrap div.filter_btn input")
    .addEventListener("click", function (event) {
      let urgent_care = document.querySelectorAll('[name="reason"]');
      let checkIfSectionExists = document.querySelector(".request_app");
      let getRAurl = document.querySelector("#customBookingSubmit");
      let checkedTrue = false;
      for (let i = 0; i <= urgent_care.length; i++) {
        if (urgent_care[i]?.checked === true) {
          checkedTrue = true;
        }
        if (i === urgent_care.length - 1 && checkIfSectionExists != null) {
          openEmailBox(checkedTrue);
        }
        //console.log(checkedTrue);
      }

      setSessionStorageRA();
      if (checkIfSectionExists === null) {
        window.open(getRAurl.dataset.raurl);
      }
    });

  // active time on calendar

  $(".preferred_time .time_calendar").click(function () {
    $(".time_calendar").removeClass("active_time");
    $(this).addClass("active_time");
  });

  //Add selected text to location, reason for visit doctor and timeslot
  function addToList() {
    function addToArray() {
      var labels = $(
        ".select_wrap .filter-drop-open input:checked,.filter-drop-open .active_, .select_wrap .filter-drop-open .active_time label"
      )
        .map(function () {
          return $(this).val() ? $(this).val() : getDateAndTime();
        })
        .get();
      var message = document.querySelector(".filter-drop-open span")?.dataset
        .message;

      var labelsString = labels.toString();
      if (message == "Select a date & timeslot") {
        labelsString = labels[0].toString();
      }
      var result = labelsString.substring(0, 17);

      if (document.querySelector(".filter-drop-open span"))
        document.querySelector(".filter-drop-open span").innerHTML =
          labelsString.length <= 0
            ? message
            : labelsString.length <= 17
            ? result
            : result + "...";
      if (document.querySelector(".select_wrap .filter-drop-open span"))
        labelsString.length <= 0
          ? document
              .querySelector(".select_wrap .filter-drop-open span")
              .classList.remove("newClass")
          : document
              .querySelector(".select_wrap .filter-drop-open span")
              .classList.add("newClass");
      $(".select_option_field")
        .not("#reason_filter")
        .removeClass("filter-drop-open");

      switch (message) {
        case "Choose a location":
          document.querySelector("#reason_filter").click();
          break;
        case "Any specific doctor?":
          document.querySelector("#timeslot_filter").click();
          break;
        default:
          break;
      }

      if (document.querySelector("#location")) {
        switch (message) {
          case "Choose a location":
            document.querySelector("#location").value = labelsString;
            break;
          case "How can we help you?":
            document.querySelector("#reason_items").value = labelsString;
            break;
          case "Any specific doctor?":
            document.querySelector("#doctor").value = labelsString;
            break;
          case "Select a date & timeslot":
            document.querySelector("#timeslot").value = labelsString;
            break;
          default:
            break;
        }
      }
    }

    function getDateAndTime() {
      let resMonth = $(".monthname").text();
      resMonth = resMonth.substring(0, 3);
      let resDate = $(".calendar-body .active").not(".today").text();
      if (resDate == undefined) {
        resDate = $(".calendar-body .active").text();
      }
      let resTime = $(".preferred_time .active_time label").text();
      let ReservationDateIs = resMonth + " " + resDate + ", " + resTime;
      return ReservationDateIs;
    }

    $(
      ".select_wrap .choose_option input, .preferred_time .time_calendar"
    ).click(function (event) {
      //event.stopPropagation();
      addToArray();
    });
  }
  addToList();

  // Contact form label

  $(".custom-form input,.custom-form textarea").val("");
  $(".form-group input, .form-group textarea").focusout(function () {
    var text_val = $(this).val();
    if (text_val === "") {
      $(this).removeClass("has-value");
    } else {
      $(this).addClass("has-value");
    }
  });

  // Calendar

  var d = new Date();

  var Calendar = {
    themonth: d.getMonth(), // The number of the month 0-11
    theyear: d.getFullYear(), // This year
    today: [d.getFullYear(), d.getMonth(), d.getDate()], // adds today style
    selectedDate: null, // set to today in init()
    years: [], // populated with last 10 years in init()
    months: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ],

    init: function () {
      this.selectedDate = this.today;
      // Populate the list of years in the month/year pulldown
      var year = this.theyear;
      for (var i = 0; i < 10; i++) {
        this.years.push(year--);
      }

      this.bindUIActions();
      this.render();
    },

    bindUIActions: function () {
      // Create Years list and add to ympicker
      for (var i = 0; i < this.years.length; i++)
        $("<li>" + this.years[i] + "</li>").appendTo(
          ".calendar-ympicker-years"
        );
      this.selectMonth();
      this.selectYear(); // Add active class to current month n year

      // Slide down year month picker
      $(".monthname").click(function () {
        $(".calendar-ympicker").css("transform", "translateY(0)");
      });

      // Close year month picker without action
      $(".close").click(function () {
        $(".calendar-ympicker").css("transform", "translateY(-100%)");
      });

      // Move calander to today
      $(".today").click(function () {
        Calendar.themonth = d.getMonth();
        Calendar.theyear = d.getFullYear();
        Calendar.selectMonth();
        Calendar.selectYear();
        Calendar.selectedDate = Calendar.today;
        Calendar.render();
        $(".calendar-ympicker").css("transform", "translateY(-100%)");
      });

      // Click handlers for ympicker list items
      $(".calendar-ympicker-months li").click(function () {
        Calendar.themonth = $(".calendar-ympicker-months li").index($(this));
        Calendar.selectMonth();
        Calendar.render();
        $(".calendar-ympicker").css("transform", "translateY(-100%)");
      });
      $(".calendar-ympicker-years li").click(function () {
        Calendar.theyear = parseInt($(this).text());
        Calendar.selectYear();
        Calendar.render();
        $(".calendar-ympicker").css("transform", "translateY(-100%)");
      });

      // Move the calendar pages
      $(".minusmonth").click(function (e) {
        e.preventDefault();
        Calendar.themonth += -1;
        Calendar.changeMonth();
      });
      $(".addmonth").click(function (e) {
        e.preventDefault();
        Calendar.themonth += 1;
        Calendar.changeMonth();
      });
    },

    // Adds class="active" to the selected month/year
    selectMonth: function () {
      $(".calendar-ympicker-months li").removeClass("active");
      $(
        ".calendar-ympicker-months li:nth-child(" + (this.themonth + 1) + ")"
      ).addClass("active");
    },
    selectYear: function () {
      $(".calendar-ympicker-years li").removeClass("active");
      $(
        ".calendar-ympicker-years li:nth-child(" +
          (this.years.indexOf(this.theyear) + 1) +
          ")"
      ).addClass("active");
    },

    // Makes sure that month rolls over years correctly
    changeMonth: function () {
      if (this.themonth == 12) {
        this.themonth = 0;
        this.theyear++;
        this.selectYear();
      } else if (this.themonth == -1) {
        this.themonth = 11;
        this.theyear--;
        this.selectYear();
      }
      this.selectMonth();
      this.render();
    },

    // Helper functions for time calculations
    TimeCalc: {
      firstDay: function (month, year) {
        var fday = new Date(year, month, 1).getDay(); // Mon 1 ... Sat 6, Sun 0
        if (fday === 0) fday = 7;
        return fday - 1; // Mon 0 ... Sat 5, Sun 6
      },
      numDays: function (month, year) {
        return new Date(year, month + 1, 0).getDate(); // Day 0 is the last day in the previous month
      },
    },

    render: function () {
      var days = this.TimeCalc.numDays(this.themonth, this.theyear), // get number of days in the month
        fDay = this.TimeCalc.firstDay(this.themonth, this.theyear), // find what day of the week the 1st lands on
        daysHTML = "",
        i;

      $(".calendar p.monthname").text(
        this.months[this.themonth] + "  " + this.theyear
      ); // add month name and year to calendar
      for (i = 0; i < fDay; i++) {
        // place the first day of the month in the correct position
        daysHTML += '<li class="noclick">&nbsp;</li>';
      }
      // write out the days
      for (i = 1; i <= days; i++) {
        if (
          this.today[0] == this.selectedDate[0] &&
          this.today[1] == this.selectedDate[1] &&
          this.today[2] == this.selectedDate[2] &&
          this.today[0] == this.theyear &&
          this.today[1] == this.themonth &&
          this.today[2] == i
        )
          daysHTML +=
            '<li class="today"><button aria-label="day of month: ' +
            i +
            '">' +
            i +
            "</button></li>";
        else if (
          this.today[0] == this.theyear &&
          this.today[1] == this.themonth &&
          this.today[2] == i
        )
          daysHTML +=
            '<li class="today"><button aria-label="day of month: ' +
            i +
            '">' +
            i +
            "</button></li>";
        else if (
          this.selectedDate[0] == this.theyear &&
          this.selectedDate[1] == this.themonth &&
          this.selectedDate[2] == i
        )
          daysHTML +=
            '<li class="active"><button aria-label="day of month: ' +
            i +
            '">' +
            i +
            "</button></li>";
        else
          daysHTML +=
            "<li><button aria-label='day of month: " +
            i +
            "'>" +
            i +
            "</button></li>";

        $(".calendar-body").html(daysHTML); // Only one append call
      }

      // Adds active class to date when clicked
      $(".calendar-body li").click(function (e) {
        e.preventDefault();

        // toggle selected dates
        if (!$(this).hasClass("noclick")) {
          $(".calendar-body li").removeClass("active");
          $(this).addClass("active");
          Calendar.selectedDate = [
            Calendar.theyear,
            Calendar.themonth,
            $(this).text(),
          ]; // save date for reselecting
        }
      });
    },
  };

  Calendar.init();
});
