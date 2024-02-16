<html>
<?php
$con = mysqli_connect("localhost", "root", "", "library_db") or die("db fail");
if (isset($_POST['submit'])) {
    $Number = mysqli_real_escape_string($con, $_POST['text']);
    $b_name = mysqli_real_escape_string($con, $_POST['txttext']);
    $author = mysqli_real_escape_string($con, $_POST['authortxt']);
    $Quantity = mysqli_real_escape_string($con, $_POST['qtxt']);
    $Category = mysqli_real_escape_string($con, $_POST['ctxt']);
    $Daraz= mysqli_real_escape_string($con, $_POST['daraz']);

  
    if (!ctype_digit($Number) || !is_numeric($Number)) {
        echo "<script>alert('Please enter a valid integer for book ID.')</script>";
    } else {
        
        if (!ctype_alpha(str_replace(' ', '', $b_name))) {
            echo "<script>alert('Please enter a valid book name containing only alphabets.')</script>";
        } else {
          if (!ctype_alpha(str_replace(' ', '', $author))) {
            echo "<script>alert('Please enter only alphabets for author name .')</script>";
          } else {
           
            if (!is_numeric($Quantity) || $Quantity < 0) {
                echo "<script>alert('Please enter a valid positive number for book quantity.')</script>";
            } else {
                $tbl = "INSERT INTO books(Number,Name,Authors,Quantity,Category,Daraz)
                    VALUES('$Number','$b_name','$author','$Quantity','$Category','$Daraz')";
                $rel = mysqli_query($con, $tbl);
                if ($rel) {
                    echo "insert successfully";
                    header("Daraz:Books.php");
                } else {
                    echo "wrong entry";
                    return false;
                }
            }
        }
    }
  }
}
?>
<body>
    <title>Adding Book</title>
    <form action="" method="POST">
        <input type="text" name="text" placeholder="enter book id" required>
        <input type="text" name="txttext" placeholder="enter book name" required>
        <input type="text" name="authortxt" placeholder="enter book's Author" required>
        <input type="text" name="qtxt" placeholder="enter book quantity" required>
        <select name="ctxt" required>
            <option value="" disabled selected>Select Category</option>
            <option value="BCA I">BCA I</option>
            <option value="BCA II">BCA II</option>
            <option value="BCA II">BCA III</option>
            <option value="BCA II">BCA IV</option>
            <option value="BCA II">BCA V</option>
            <option value="Others">Others</option>
         
        </select><br><br>


        <select name="daraz" required>
            <option value="" disabled selected>Select Place Daraz</option>
            <option value="Daraz1">Daraz 1</option>
            <option value="Daraz 2">Daraz 2</option>
            <option value="Daraz 3">Daraz 3</option>
            <option value="Daraz1">Daraz 4</option>
            <option value="Daraz 2">Daraz 5</option>
            <option value="others">Others</option>
       
        </select><br><br>

        <input type="submit" name="submit" value="submit">
        <input type="button" name="button" value="back" onclick="window.location.href ='Books.php'"><BR><BR>
    </form>
</body>
</html>
<style>
   
    body {
        background-color: #f7f7f7;
    }

    h1,
    h2 {
        font-family: Arial, sans-serif;
        color: #333;
    }

    
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid #4CAF50;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type=submit]:hover {
        background-color: #3e8e41;
    }

    input[type=button] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type=button]:hover {
        background-color: #3e8e41;
    }
    form {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #4CAF50;
    background-color: #fff;
    color: #333; 
    font-size: 16px; 
    border-radius: 4px; 
    cursor: pointer; 
    }

select:hover {
    border-color: #3e8e41; 
}


option:checked {
    background-color: #4CAF50; 
    color: #fff; 
}


option {
    background-color: #fff; 
    color: #333; 
}


option:hover {
    background-color: #f0f0f0; 
    color: #333;
}
</style>