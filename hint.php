<?php
    // include("../../login_verify/login_check_admin.php");
    include("connection.php");
    if(isset($_GET["rollno"]))
    {
        $rollno= filter_input(INPUT_GET,"rollno",FILTER_SANITIZE_NUMBER_INT);
        try
        {
            $res = $conn->query("SELECT volunteer_name FROM volunteer_profile WHERE rollno=$rollno");
            if($res->num_rows > 0)
            {
                $row = $res->fetch_array();
                print_r(json_encode(["name" => $row["volunteer_name"]]));
            }
            else
            {
                print_r(json_encode(["msg" => "Not Found"]));
            }
        }
        catch(Exception $e)
        {
            print_r(json_encode(["msg" => "Something went wrong ..."]));
        }
    }