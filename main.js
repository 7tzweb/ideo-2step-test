
//first function to load all task init website
function loadData() {
var action = 'all';
$.ajax({
  url: 'action.php',
  type: 'POST',
  data: {action:action},
  success:function(response){
    // alret(response);
    $("#myUL").hide(100);
    $("#myUL").html(response);
    $("#myUL").show(300);
  }
});
}
loadData();

//delete list
$(document).on('click','.close',function(){
  var action = 'delete';
  //console.log($( this ).attr('id'));
  var deleteid = $( this ).attr('id');
  $.ajax({
    url: 'action.php',
    type: 'POST',
    data: {id:deleteid,action:action},
    dataType:"json",
    success:function(data){
      // alret(response);
      if (data.smg.trim() =="nodelete") {
        alert('nodelete');
      }
      if (data.smg.trim() =="delete") {
        loadData();
      }
    }
  });
});


// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
if (ev.target.tagName === 'LI') {
  var hasClass ='';
   hasClass = $(ev.target).hasClass('checked');
  if (!hasClass) {
    //  console.log(ev.target.firstElementChild.id);

    console.log(hasClass);
    console.log('add check');
    // ajax add check
    var action = 'addcheck';
    var idupdate = ev.target.firstElementChild.id;
    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: {id:idupdate,action:action},
      dataType:"json",
      success:function(data){
        // alret(response);
        if (data.smg.trim() =="noaddcheck") {
          alert('noaddcheck');
        }
        if (data.smg.trim() =="addcheck") {
          loadData();
        }
      }
    });



  }else {
    //ajax remove check
    console.log('remove check');
    console.log(hasClass);

    var action = 'removecheck';
    var idupdate = ev.target.firstElementChild.id;
    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: {id:idupdate,action:action},
      dataType:"json",
      success:function(data){
        // alret(response);
        if (data.smg.trim() =="notremovecheck") {
          alert('notremovecheck');
        }
        if (data.smg.trim() =="removecheck") {
          loadData();
        }
      }
    });

  }
  ev.target.classList.toggle('checked');
}
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
var action = 'addToList';
var li = document.createElement("li");
var inputValue = document.getElementById("myInput").value;
var t = document.createTextNode(inputValue);
li.appendChild(t);
if (inputValue === '') {
  alert("You must write something!");
} else {
  //add ajax item to List
  $.ajax({
    url:"action.php",
    method:"POST",
    data:{text:inputValue,action:action},
    dataType:"json",
    success:function(data){
      if (data.smg.trim() =="notadd") {
        alert('notadd');
      }

       if (data.smg.trim() =="added") {
        loadData();
      }

    }
  });


  document.getElementById("myUL").appendChild(li);
}
document.getElementById("myInput").value = "";

var span = document.createElement("SPAN");
var txt = document.createTextNode("\u00D7");
span.className = "close";
span.appendChild(txt);
li.appendChild(span);

for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}
}
