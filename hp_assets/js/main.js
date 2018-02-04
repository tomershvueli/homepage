var menuHidden = true;
var randBgTimer = null;

// Simulates PHP's date function - http://jacwright.com/projects/javascript/date_format/
Date.prototype.format=function(e){var t="";var n=Date.replaceChars;for(var r=0;r<e.length;r++){var i=e.charAt(r);if(r-1>=0&&e.charAt(r-1)=="\\"){t+=i}else if(n[i]){t+=n[i].call(this)}else if(i!="\\"){t+=i}}return t};Date.replaceChars={shortMonths:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],longMonths:["January","February","March","April","May","June","July","August","September","October","November","December"],shortDays:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],longDays:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],d:function(){return(this.getDate()<10?"0":"")+this.getDate()},D:function(){return Date.replaceChars.shortDays[this.getDay()]},j:function(){return this.getDate()},l:function(){return Date.replaceChars.longDays[this.getDay()]},N:function(){return this.getDay()+1},S:function(){return this.getDate()%10==1&&this.getDate()!=11?"st":this.getDate()%10==2&&this.getDate()!=12?"nd":this.getDate()%10==3&&this.getDate()!=13?"rd":"th"},w:function(){return this.getDay()},z:function(){var e=new Date(this.getFullYear(),0,1);return Math.ceil((this-e)/864e5)},W:function(){var e=new Date(this.getFullYear(),0,1);return Math.ceil(((this-e)/864e5+e.getDay()+1)/7)},F:function(){return Date.replaceChars.longMonths[this.getMonth()]},m:function(){return(this.getMonth()<9?"0":"")+(this.getMonth()+1)},M:function(){return Date.replaceChars.shortMonths[this.getMonth()]},n:function(){return this.getMonth()+1},t:function(){var e=new Date;return(new Date(e.getFullYear(),e.getMonth(),0)).getDate()},L:function(){var e=this.getFullYear();return e%400==0||e%100!=0&&e%4==0},o:function(){var e=new Date(this.valueOf());e.setDate(e.getDate()-(this.getDay()+6)%7+3);return e.getFullYear()},Y:function(){return this.getFullYear()},y:function(){return(""+this.getFullYear()).substr(2)},a:function(){return this.getHours()<12?"am":"pm"},A:function(){return this.getHours()<12?"AM":"PM"},B:function(){return Math.floor(((this.getUTCHours()+1)%24+this.getUTCMinutes()/60+this.getUTCSeconds()/3600)*1e3/24)},g:function(){return this.getHours()%12||12},G:function(){return this.getHours()},h:function(){return((this.getHours()%12||12)<10?"0":"")+(this.getHours()%12||12)},H:function(){return(this.getHours()<10?"0":"")+this.getHours()},i:function(){return(this.getMinutes()<10?"0":"")+this.getMinutes()},s:function(){return(this.getSeconds()<10?"0":"")+this.getSeconds()},u:function(){var e=this.getMilliseconds();return(e<10?"00":e<100?"0":"")+e},e:function(){return"Not Yet Supported"},I:function(){var e=null;for(var t=0;t<12;++t){var n=new Date(this.getFullYear(),t,1);var r=n.getTimezoneOffset();if(e===null)e=r;else if(r<e){e=r;break}else if(r>e)break}return this.getTimezoneOffset()==e|0},O:function(){return(-this.getTimezoneOffset()<0?"-":"+")+(Math.abs(this.getTimezoneOffset()/60)<10?"0":"")+Math.abs(this.getTimezoneOffset()/60)+"00"},P:function(){return(-this.getTimezoneOffset()<0?"-":"+")+(Math.abs(this.getTimezoneOffset()/60)<10?"0":"")+Math.abs(this.getTimezoneOffset()/60)+":00"},T:function(){var e=this.getMonth();this.setMonth(0);var t=this.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/,"$1");this.setMonth(e);return t},Z:function(){return-this.getTimezoneOffset()*60},c:function(){return this.format("Y-m-d\\TH:i:sP")},r:function(){return this.toString()},U:function(){return this.getTime()/1e3}}

Mousetrap.bind($.config.unlock_pattern, function() {
  toggleMenu();
});

Mousetrap.bind('esc', function() {
  setMenuVisibility(false);
});

Mousetrap.bind('r', function() {
  clearTimeout(randBgTimer);
  setBgImg();
  setTimeout(setBgImg, $.config.time_to_refresh_bg);
});

Mousetrap.bind('1', function() {
  if (!menuHidden) {
    var link = $(".link:eq(0) a").attr("href");
    window.location = link;
  }
});

Mousetrap.bind('2', function() {
  if (!menuHidden) {
    var link = $(".link:eq(1) a").attr("href");
    window.location = link;
  }
});

Mousetrap.bind('3', function() {
  if (!menuHidden) {
    var link = $(".link:eq(2) a").attr("href");
    window.location = link;
  }
});

Mousetrap.bind('4', function() {
  if (!menuHidden) {
    var link = $(".link:eq(3) a").attr("href");
    window.location = link;
  }
});

Mousetrap.bind('5', function() {
  if (!menuHidden) {
    var link = $(".link:eq(4) a").attr("href");
    window.location = link;
  }
});

Mousetrap.bind('6', function() {
  if (!menuHidden) {
    var link = $(".link:eq(5) a").attr("href");
    window.location = link;
  }
});

function toggleMenu() {
  if (menuHidden) {
    setMenuVisibility(true);
  } else {
    setMenuVisibility(false);
  }
}

function setMenuVisibility(visible) {
  if (visible) {
    $(".menu-item").fadeIn();
    $("body").addClass("menu-shown");
    menuHidden = false;
  } else {
    $(".menu-item").fadeOut();
    $("body").removeClass("menu-shown");
    menuHidden = true;
  }
}

// Set random background image
function setBgImg() {
  var bg = "";

  $.getJSON("hp_assets/lib/ajax_get_image.php").done(function(data) {
    if (data['success']) {
      let unsplashUtmPostfix = "?utm_source=homepage&utm_medium=referral";

      bg = data['url'];
      if (bg != "" && bg != null) {
        preloadimages([bg]).done(function(images) {
          $("#homepage").css("background-image", "url(" + bg + ")").css("background-size", "cover");
          $("#pic-info-wrap").removeClass("hidden");
          $("#pic-info-url").attr("href", `${data['image_user_url']}${unsplashUtmPostfix}`).text(data['image_user_name']);
        });
      }
    }
  });
}

// http://www.javascriptkit.com/javatutors/preloadimagesplus.shtml
function preloadimages(arr){
  var newimages=[], loadedimages=0
  var postaction=function(){}
  var arr=(typeof arr!="object")? [arr] : arr
  function imageloadpost(){
    loadedimages++
    if (loadedimages==arr.length){
      postaction(newimages) //call postaction and pass in newimages array as parameter
    }
  }
  for (var i=0; i<arr.length; i++){
    newimages[i]=new Image()
    newimages[i].src=arr[i]
    newimages[i].onload=function(){
        imageloadpost()
    }
    newimages[i].onerror=function(){
      imageloadpost()
    }
  }
  return { //return blank object with done() method
    done:function(f){
      postaction=f || postaction //remember user defined callback functions to be called when images load
    }
  }
}

if ($.config.idle_timer) {
  var inactivityTime = function () {
    var t;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress  = resetTimer;
    document.onmousedown = resetTimer;

    function hideMenu() {
      setMenuVisibility(false);
    }

    function resetTimer() {
      clearTimeout(t);
      t = setTimeout(hideMenu, $.config.idle_timer)
    }
  };

  inactivityTime();
}

// Update the clock
function updateClock () {
  // Update the time display
  document.getElementById("clock").textContent = new Date().format($.config.clock_format);
}

$(function() {
  $("#mobile-menu-wrap a").click(function(e) {
    e.preventDefault();
    toggleMenu();
  });

  setBgImg();
  randBgTimer = setInterval(setBgImg, $.config.time_to_refresh_bg);

  updateClock();
  setInterval('updateClock()', 5000);
});
