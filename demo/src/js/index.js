 $(function() {
     $("#myImage").on('load', function() {
         $.get("./getType.php", function(data) {
             $("#tips").html("请依次点击图中的 '" + data[0] + "' 和 '" + data[1] + "'");
             init();
         }, 'json');
     });
 })

 function init() {
     xy = new Array();
     i = 0;
 }

 function test(e) {
     e = e || window.event;
     var offsetX = e.pageX - $("#myImage").offset().left;
     var offsetY = e.pageY - $("#myImage").offset().top;
     xy[i++] = new Array(offsetX, offsetY);
     if (i == 2) {
         $(function() {
             $.post("verify.php", {
                 "array": [{
                     "x": xy[0][0],
                     "y": xy[0][1]
                 }, {
                     "x": xy[1][0],
                     "y": xy[1][1]
                 }]
             }, function(data) {
                 if (data.status == 200) {
                     alert("Pass");
                 } else {
                     alert("False");
                 }
                 $("#myImage").attr("src", "img.php?num=" + Math.random());
             }, 'json');
         })
     }
 }