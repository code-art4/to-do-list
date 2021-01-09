<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO LIST</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css" id="mooncss">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" id="mooncss">

    <style type="text/css">
        h3:nth-child(n+1) {
            letter-spacing: 8px;
        }
        
        li {
            cursor: pointer;
        }
        
        .clicked {
            color: blue;
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        .clicked:hover,
        .clicked:focus {
            background-color: rgba(0, 0, 0, 0.1);
            color: black;
        }
        
        .dropdown-item:active {
            background-color: rgba(0, 0, 255, 0.4);
            outline: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center p-5 To-do">
        <div class="container clearfix">
            <h3 class="float-left" id="Schedule" style="cursor: pointer;">TO-DO</h3>
            <a class="float-right btn">
                <img src="css/images/icon-moon.svg" alt="Moon" id="moon">
                <img src="css/images/icon-sun.svg" alt="Sun" id="sun" class="sun">
            </a>
        </div>
        <div class="input-group input-group mb-3">
            <form name="schedule-form" class="input-group mt-3 mt-sm-5 input-group-form" id="postForm">
                <input type="text" name="text-input" placeholder="Create a new todo..." class="ml-n1 pl-4 border-left-0 todo-input" id="list">
                <div class="input-group-append">
                    <button type="button" name="button" class="btn btn-light submit" style="border-radius: 30%; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                  <span>
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </span>
                </button>
                    <div class="close-submit" id="closeSubmit">
                    </div>
                </div>
            </form>
        </div>
        <div class="message_box" style="font-size: 105%;">
            <p id="message" class="text-danger"></p>
            <p id="delete-message" class="text-danger"></p>
        </div>
        
        <div class="input-group" id="list_output">
            
        </div>


        <!--Delete Modal-->
    <div class="modal fade"id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-dark">Delete Record</h3>
                </div>
                <div class="modal-body text-dark">
                <p>Do You Want To Delete The Record ?</p>
                <button class="btn btn-success" type="button" data-dismiss="modal" id="btn_delete_record">Delete Now</button>
                <button class="btn btn-danger" type="button" data-dismiss="modal" id="btn_close">Close</button>
                </div>
            </div>

        </div>
    </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/myjs.js"></script>

        <!--Main Javascript file-->
        <script type="text/javascript">
            //Dark mode and Light Mode

            {
                document.getElementById("sun").onclick = function() {
                    document.getElementById("moon").style = "opacity : 1";
                    document.getElementById("sun").style = "opacity : 0";
                    document.getElementById("mooncss").setAttribute("href", "css/default.css");
                }

                document.getElementById("moon").onclick = function() {
                    document.getElementById("sun").style = "opacity : 1";
                    document.getElementById("moon").style = "opacity : 0";
                    document.getElementById("mooncss").setAttribute("href", "css/moon.css");
                }
            }


            //Make the night mode occur automatically with night time

            {
                let date = new Date();
                let dateHours = date.getHours();

                if (dateHours > 18 || dateHours < 6) {
                    document.getElementById("mooncss").setAttribute("href", "css/moon.css");
                    document.getElementById("sun").style = "opacity : 1";
                    document.getElementById("moon").style = "opacity : 0";
                }

            }
        </script>

</body>
</html>