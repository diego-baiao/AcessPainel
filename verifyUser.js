
function checkname() {
  var name = document.getElementById("UserName").value;
  if (name.length > 3) {
    $.ajax({
      type: 'post',
      url: 'CheckUser.php',
      data: {
        username: name,  /* nome do post que chegará no checkuser.php */
      },
      success: function(response) {
        $('#name_status').html(response);
        if (response == "OK") {
          return true;
        } else {
          return false;
        }
      }
    });
  } else {
    $('#name_status').html("");
    return false;
  }
}

function checkall()
{
 var namehtml=document.getElementById("name_status").innerText;
 alert(namehtml);

 if(namehtml=="OK")
 {
  return true;
 }
 else
 {
  return false;
 }
}





















// function checkname() {
//     var name = document.getElementById("UserName").value;
//     if (name.length > 3) {
//       $.ajax({
//         type: 'post',
//         url: 'Customize/backend/ajax/checkuser.php',
//         data: {
//           username: name,  /* nome do post que chegará no checkuser.php */
//         },
//         success: function(response) {
//           $('#name_status').html(response);
//           if (response == "OK") {
//             return true;
//           } else {
//             return false;
//           }
//         }
//       });
//     } else {
//       $('#name_status').html("");
//       return false;
//     }
  
//   }
  
//   function checkall() {
//     alert("12345");
//     var namehtml = document.getElementById("name_status").innerText;
//     alert(namehtml);
  
//     if (namehtml == "OK") {
//       return true;
//     } else {
//       return false;
//     }
//   }