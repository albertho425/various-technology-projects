function updateClock(){

      var now = new Date();
      var dname = now.getDay(),
          month = now.getMonth(),
          day = now.getDate(),
          year = now.getFullYear(),
          hours = now.getHours(),
          minutes = now.getMinutes(),
          seconds = now.getSeconds(),
          ampm = "AM";


          if(hours >= 12){
            ampm = "PM";
          }
          if(hours == 0){
            hours = 12;
          }
          if(hours > 12){
            hours = hours - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

          var week = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];

          // same ids as in the span ids
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];

          var values = [week[dname], months[month], day.pad(2), year, hours.pad(2), minutes.pad(2), seconds.pad(2), ampm];

          for(var i = 0; i < ids.length; i++)

          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){

      updateClock();

      window.setInterval("updateClock()", 1);
    }
