<?php

    require_once('connection.php');

    // Insert Record Function
    function InsertRecord(){
        global $con;
        $List = $_POST['UName'];
        
        $query = "insert into list_record (List) values('$List')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo 'Your Record Has Been Saved In The Database';
        }else{
            echo 'Please Check Your Query';
        }
    }

    //Display Data Function
    function display_record(){
        global $con;
        $value = "";
        $value = '<ul class="nav flex-column list-group input-list shadow-lg" id="input-list">';
        $query = "select * from list_record ";
        $result = mysqli_query($con, $query);

        while ($row=mysqli_fetch_assoc($result)) {
            $value.= '<div class="clearfix">
                        <li class="nav-item border-bottom py-2">'.$row['List'].'</li>
                        <div class="float-right mt-n5">
                            <button class="ml-n5 mt-2 btn btn-danger" id="btn_delete" data-id='.$row['ID'].' >
                                <span class="fa fa-trash" aria-hidden="true">
                                </span> 
                            </button>
                            </div>
                    </div>';
        }

            $value.='</ul>';
            echo json_encode(['status'=>'success', 'html'=>$value]);
    }
    
    
    //Delete 
    function delete_record(){
        global $con;
        $Del_Id = $_POST['Del_ID'];
        $query = "delete from list_record where ID='$Del_Id' ";
        $result = mysqli_query($con, $query);

        if($result){
            echo ' Your Record Has Been Deleted ';
        }
        else{
            echo ' Please Check Your Query ';
        }
    }
?>