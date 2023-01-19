<?php
    if(isset($_SESSION["first_name"])) {

        include_once 'includes/dbConfig.inc.php';
        $clientID = $_SESSION['client_id'];

        $sql = "SELECT first_name, last_name, email_address FROM clients WHERE client_id='$clientID';";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {

            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email_address = $row['email_address'];

            $table = 
            "<table class=\"userInfoTable\">
                <tr>
                    <td><b>First Name </b></td>
                    <td> $first_name </td>
                </tr>
                <tr>
                    <td><b>Last Name </b></td>
                    <td> $last_name </td>
                </tr>
                <tr>
                    <td><b>Email Address </b></td>
                    <td> $email_address </td>
                </tr>
                <tr>
                    <td> <button type=\"button\" class=\"filterBtn\">Edit Info</button> </td>
                    <td> <button type=\"button\" class=\"filterBtn\">Change Password</button> </td>
                </tr>
            </table>";
    
        }
    }
    else {

        include_once 'includes/dbConfig.inc.php';
        $supplierID = $_SESSION['supplier_id'];

        $sql = "SELECT company_name, company_address, email_address, phone_number FROM suppliers WHERE supplier_id='$supplierID';";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {

            $company_name = $row['company_name'];
            $company_address = $row['company_address'];
            $email_address = $row['email_address'];
            $phone_number = $row['phone_number'];
            
            $table = 
            "<table class=\"userInfoTable\">
                <tr>
                    <td><b>Company Name </b></td>
                    <td>  $company_name </td>
                </tr>
                <tr>
                    <td><b>Company Address </b></td>
                    <td>  $company_address </td>
                </tr>
                <tr>
                    <td><b>Email Address </b></td>
                    <td>  $email_address </td>
                </tr>
                <tr>
                    <td><b>Phone Number </b></td>
                    <td>  $phone_number </td>
                </tr>
                <tr>
                    <td> <button type=\"button\" class=\"filterBtn\">Edit Info</button> </td>
                    <td> <button type=\"button\" class=\"filterBtn\">Change Password</button> </td>
                </tr>
            </table>";
        }
    } 

    echo $table;
?>
