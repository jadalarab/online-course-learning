(function ($) {
	var monstart=[], monend=[] ,monmar=0;var str0 = 0 ,str1 = 0, str2 = 0 ,str3=0,str4=0; var endr = 0 ;
		var tuesempty=[];
	var tuesstart=[],  tuesend=[] ,tuesmar=0,tuesmar=[];
	var wedstart=[],wedend =[],wedmar=0,wedmar=[];
	var thursstart=[],thursend=[],thursmar=0,thursmar=[];
	var fristart=[],friend=[],frimar=0,frimar=[];
	var mar=0;
	var colors = [];var colorin = 0 ;


	for(var i = 0 ; i < 13 ; i++){
monstart[i] = tuesstart[i] = wedstart[i] = thursstart[i] = fristart[i] =  tuesempty[i]="" ;
monend[i] = tuesend[i] = wedend[i] = thursend[i] = friend[i] =  "" ;
tuesmar[i]="";

}

 var labs =[]; 

  var xmlhttp = new XMLHttpRequest();
	var url = "labslist.php";
	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   labs = JSON.parse(this.responseText);
	for(var i = 0 ; i < labs.length ; i++){
	createcolor();
}
   console.log(colors);



	}
	
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function createcolor(){
var found=false;
var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
for(var i = 0 ; i < colorin ; i++ ){
if(colors[i]==hue){
found=true;
break;
}
}
if(found==true){
createcolor();
}
else{
colors[colorin] = hue;
colorin++;
}
}

  var defaultSettings = {
    // Data attributes
    headers: [],  // String[] - Array of column headers
    tasks: [],    // Task[] - Array of tasks. Required fields: 
    // id: number, startTime: number, duration: number, column: number
	labsrooms:["114","208","209","201A"],

    // Card template - Inner content of task card. 
    // You're able to use ${key} inside template, where key is any property from task.
    cardTemplate: '<div></div>',

    // OnClick event handler
    onClick: function (e, task) { },

    // Css classes
    containerCssClass: 'skeduler-container',
    headerContainerCssClass: 'skeduler-headers',
    schedulerContainerCssClass: 'skeduler-main',
    taskPlaceholderCssClass: 'skeduler-task-placeholder',
    cellCssClass: 'skeduler-cell',

    lineHeight: 30,      // height of one half-hour line in grid
    borderWidth: 1,      // width of board of grid cell

    debug: false
  };
  var settings = {};

  /**
   * Convert double value of hours to zero-preposited string with 30 or 00 value of minutes
   */
  function toTimeString(value) {
    return (value < 10 ? '0' : '') + Math.floor(value) + (Math.ceil(value) > Math.floor(value) ? ':30' : ':00');
  }

  /**
   * Return height of task card based on duration of the task
   * duration - in hours
   */
  function getCardHeight(duration) {
    return (settings.lineHeight + settings.borderWidth) * (duration * 2) - 1;
  }

  /**
   * Return top offset of task card based on start time of the task
   * startTime - in hours
   */
  function getCardTopPosition(startTime) {
    return (settings.lineHeight + settings.borderWidth) * (startTime * 2);
  }

  /**
  * Render card template
  */
  function renderInnerCardContent(task) {
    var result = settings.cardTemplate;
    for (var key in task) {
      if (task.hasOwnProperty(key)) {
        // TODO: replace all
        result = result.replace('${' + key + '}', task[key]);
      }
    }

    return $(result);
  }

  /**
   * Generate task cards
   */
  function appendTasks(placeholder, tasks) {
    var findCoefficients = function () {
      var coefficients = [];
      for (var i = 0; i < tasks.length - 1; i++) {
        var k = 0;
        var j = i + 1;
        while (j < tasks.length && tasks[i].startTime < tasks[j].startTime
          && tasks[i].startTime + tasks[i].duration > tasks[j].startTime) {
          k++;
          j++;
        }

        coefficients.push(k);
      }

      coefficients.push(0);
      return coefficients;
    };

    var normalize = function (args) {
      var indexes = {};
      for (var i = 0; i < args.length; i++) {
        var start = i;
        var count = 0;
        while (args[i] != 0) {
          i++;
          count++;
        }
        var end = i;
        if (count) {
          count++;
        }

        var index = 0;
        for (var j = start; j <= end; j++) {
          args[j] = count;
          indexes[j] = index++;
        }
      }

      return {args: args, indexes: indexes};
    };

    var args =
      normalize(
        findCoefficients()
      );

    for (var i = 0; i < args.args.length; i++) {
      var width = 194 / (args.args[i] || 1);
		if(tasks.length > i){
      tasks[i].width = width;
      tasks[i].left = (args.indexes[i] * width) || 4;
    }
	}
    tasks.forEach(function (task, index) {
      var innerContent = renderInnerCardContent(task);
      var top = getCardTopPosition(task.startTime) + 2;
      var height = getCardHeight(task.duration);
      var width = task.width || 194;
      var left = task.left || 4;
	  
	  var val = found(task,0);
	  //document.writeln(val);
			var x = Math.max(monmar , tuesmar  ,wedmar , thursmar , frimar)+86;
			
			  /*$(".skeduler-headers > div").css("flex",'0 0 ' +x+'px');

			$(".skeduler-main-body > div > div.skeduler-cell").css("flex",'0 0 ' +x+'px');*/

		  
		  
	  //document.writeln(monmar);

var index = 0 ; 
for(var i = 0 ; i < labs.length ; i++){

if(labs[i].lab == task.name){
index= i ;
break;
}
}

	  
	 
      var card = $('<div></div>')
        .attr({
          style: 'top: ' + (top-498) + 'px; height: ' + (height) + 'px; ' + 'width: ' + (width - 100) + 'px; margin-left: ' + (val+10) + 'px ; background-color : ' + colors[index] + ' ;border-radius : 1em',
			class:"card"
		  
        });
card.click(function(){
		alert("Description :\n Starttime :" + task.startTime + ", Duration : " + task.duration);
			
    });
	var span = $('<span></span>');

		span.html(task.title);
		span.appendTo(card);
      card.on('click', function (e) { settings.onClick && settings.onClick(e, task) });
      card.append(innerContent)
        .appendTo(placeholder);
    }, this);

 

  }

  /**
  * Generate scheduler grid with task cards
  * options:
  * - headers: string[] - array of headers
  * - tasks: Task[] - array of tasks
  * - containerCssClass: string - css class of main container
  * - headerContainerCssClass: string - css class of header container
  * - schedulerContainerCssClass: string - css class of scheduler
  * - lineHeight - height of one half-hour cell in grid
  * - borderWidth - width of border of cell in grid
  */
  $.fn.skeduler = function (options) {
    settings = $.extend(defaultSettings, options);

    if (settings.debug) {
      console.time('skeduler');
    }

    var skedulerEl = $(this);

    skedulerEl.empty();
    skedulerEl.addClass(settings.containerCssClass);

    var div = $('<div></div>');
	
    var divlab = $('<div></div>');
	

    // Add headers
    var headerContainer = div.clone().addClass(settings.headerContainerCssClass);
	
    settings.headers.forEach(function (element) {
	var div = $('<div></div>');
	var pday = $('<p></p>');
	pday.html(element);
	pday.appendTo(div);
	pday.append("</br>");
		pday.append("</br>");


    div.appendTo(headerContainer);
	  for(var i = 0 ; i < settings.labsrooms.length ; i++){
			var p = $('<span></span>');
			p.html(settings.labsrooms[i]);
						if(i!=0){

			p.addClass("labs");
						}
			pday.append(p);
			 
			pday.appendTo(div);
			
	  }
		 
    }, this);
    skedulerEl.append(headerContainer);

    // Add schedule
    var scheduleEl = div.clone().addClass(settings.schedulerContainerCssClass);
    var scheduleTimelineEl = div.clone().addClass(settings.schedulerContainerCssClass + '-timeline');
    var scheduleBodyEl = div.clone().addClass(settings.schedulerContainerCssClass + '-body');

    var gridColumnElement = div.clone();

    for (var i = 8; i < 24; i++) {
      // Populate timeline
      div.clone()
        .text(toTimeString(i))
        .appendTo(scheduleTimelineEl);
      div.clone().appendTo(scheduleTimelineEl);

      gridColumnElement.append(div.clone().addClass(settings.cellCssClass));
      gridColumnElement.append(div.clone().addClass(settings.cellCssClass));
    }

    // Populate grid
    for (var j = 0; j < settings.headers.length; j++) {
      var el = gridColumnElement.clone();

      var placeholder = div.clone().addClass(settings.taskPlaceholderCssClass);
      appendTasks(placeholder, settings.tasks.filter(function (t) { return t.column == j }));

      el.prepend(placeholder);
      el.appendTo(scheduleBodyEl);
    }

    scheduleEl.append(scheduleTimelineEl);
    scheduleEl.append(scheduleBodyEl);

    skedulerEl.append(scheduleEl);

    if (settings.debug) {
      console.timeEnd('skeduler');
    }

    return skedulerEl;
  };
  
function found(task,margin){


	if(task.room == "114"){
		 var margins = mar;
		 mar = 30;
	}
	else if(task.room == "208"){
		 mar = 170;
	}
	else if(task.room == "209"){
		 mar = 320;
	}
	else if(task.room == "210A"){
		 mar = 460;
	}

	 return mar;
	 
	 
 }







function firstIndex(arr,num){
	 for(var i = 0 ; i < arr.length ; i++){
		if(arr[i] == num){
			return i ;
			break;
		}
	}
	return 0 ;
}

function occurences(arr,num){
var ct = 0 ;
 for(var i = 0 ; i < arr.length ; i++){
		if(arr[i] == num){
			ct++;
		}
	}
	return ct;
}
function indexofrow(arr, num,i){
var ct = 0 ;
for(var z = 0 ; z <= i ; z++){
if(arr[z] == num){
ct++;
}
}
return ct;
}




}(jQuery));