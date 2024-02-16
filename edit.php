<?php
    $con =  mysqli_connect("localhost","root","","library_db");
    $id=$_GET['book_id'];
    $sel="SELECT * FROM books WHERE Number='$id'";
     $result= mysqli_query($con,$sel); 
     $sql=mysqli_fetch_assoc($result);
     if(isset($_POST['submit'])){
            $number=$_POST['bookid'];
            $name=$_POST['bookname'];
            $author=$_POST['bookauthor'];
            $quantity=$_POST['quantity'];
            $cat=$_POST['category'];
            $daraz=$_POST['daraz'];
            if (!ctype_digit($number) || !is_numeric($number) ) {
                echo "<script>alert('Please enter a valid integer for book ID.')</script>";
            } else {
                
                if (!ctype_alpha(str_replace(' ', '', $name))) {
                    echo "<script>alert('Please enter a valid book name containing only alphabets.')</script>";
                } else {
                  if (!ctype_alpha(str_replace(' ', '', $author))) {
                    echo "<script>alert('Please enter only alphabets for author name .')</script>";
                  } else {
                   
                    if (!is_numeric($quantity) || $quantity < 0) {
                        echo "<script>alert('Please enter a valid positive number for book quantity.')</script>";
                    } else {
            $update_query="UPDATE books
            SET Number = '$number', Name = '$name', Authors = '$author', Quantity = '$quantity', Category = '$cat', Daraz = '$daraz'
            WHERE Number = '$id'";
            $update=mysqli_query($con,$update_query);
            if($update){
                echo"update sucessfully";
              header("Location:Books.php");
            }
            else{
                echo"Error";
            }
        }
    }
}
            }
     }
?>
<html>
    <head>
        <title>
</title>
<style>
    table{
        color:white;
        border_radius:20px;
    }
    #button{
        background-color:green;
        color:white;
        height:32px;
        width:125px;
        border-radius:25px;
        font-size:16px;
    }
    body{
        background:linear-gradient(red,blue);

    }
    select {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 100%; /* Adjust width as needed */
    margin-bottom: 10px;
}
    </style>
    </head>
    <body>
        <br><br><br><br><br><br><br>
        <form action="" method="POST">
            <table border="0" bgcolor:"black" align="center" cellspacing="20">
                <tr>
                    <td>Book Id</td>
                    <td><input type="text" value="<?php echo $sql['Number'];?>" name="bookid" required></td></tr>
                    <tr>
                    <td>Name</td>
                    <td><input type="text" value="<?php echo $sql['Name'];?>" name="bookname" required></td></tr>
                    <tr>
                    <td>Author</td>
                    <td><input type="text" value="<?php echo $sql['Authors'];?>" name="bookauthor" required></td></tr>

                    <tr>
                    <td>Quantity</td>
                    <td><input type="text" value="<?php echo $sql['Quantity'];?>"name="quantity" required></td></tr>

                    <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="BCA I"<?php if ($sql['Category'] == "BCA I") echo " selected"; ?>>BCA I</option>
                            <option value="BCA II"<?php if ($sql['Category'] == "BCA II") echo " selected"; ?>>BCA II</option>
                            <option value="BCA III"<?php if ($sql['Category'] == "BCA III") echo " selected"; ?>>BCA III</option>
                            <option value="BCA IV"<?php if ($sql['Category'] == "BCA IV") echo " selected"; ?>>BCA IV</option>
                            <option value="BCA V"<?php if ($sql['Category'] == "BCA V") echo " selected"; ?>>BCA V</option>
                
                         
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <td>Daraz</td>
                    <td>
                        <select name="daraz" required>
                            <option value="">Select Daraz</option>
                            <option value="1"<?php if ($sql['Daraz'] == "1") echo " selected"; ?>>1</option>
                            <option value="2"<?php if ($sql['Daraz'] == "2") echo " selected"; ?>>2</option>
                            <option value="3"<?php if ($sql['Daraz'] == "3") echo " selected"; ?>>3</option>
                            <option value="4"<?php if ($sql['Daraz'] == "4") echo " selected"; ?>>4</option>
                            <option value="5"<?php if ($sql['Daraz'] == "5") echo " selected"; ?>>5</option>
                        </select>
                    </td>
                    </tr>
    <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Update Details">
    <td colspan="2" align="center"><input type="button" id="button" name="back" onclick="window.location.href='Books.php'" value="Back">
</a></td>