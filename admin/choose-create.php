<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$class = $id_link = $title = $content = $image = "";
$class_err = $id_link_err = $title_err = $content_err = $image_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate class
    $input_class = trim($_POST["class"]);
    if(empty($input_class)){
        $class_err = "Please enter a class.";
    } else{
        $class = $input_class;
    }
    
    // Validate title
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter an title.";     
    } else{
        $title = $input_title;
    }
    
    // Validate content
    $input_content = trim($_POST["content"]);
    if(empty($input_content)){
        $content_err = "Please enter the content amount.";     
    } elseif(!ctype_digit($input_content)){
        $content_err = "Please enter a positive integer value.";
    } else{
        $content = $input_content;
    }

    // Validate id link
    $input_id_link = trim($_POST["id_link"]);
    if(empty($input_id_link)){
        $id_link_err = "Please enter an id link.";     
    } else{
        $title = $input_title;
    }

    // Validate id link
    $input_image = trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please enter an image.";     
    } else{
        $image = $input_image;
    }





        // Check if file was uploaded without errors
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("upload/" . $filename)){
                    echo $filename . " is already exists.";
                } else{
                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $filename);
                    echo "Your file was uploaded successfully.";
                } 
            } else{
                echo "Error: There was a problem uploading your file. Please try again."; 
            }
        } else{
            echo "Error: " . $_FILES["image"]["error"];
        }
    
    




    
    // Check input errors before inserting in database
    if(empty($class_err) && empty($title_err) && empty($content_err) && empty($image_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO choose (class, title, content, id_link, image) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_class, $param_title, $param_content, $param_id_link, $param_image);
            
            // Set parameters
            $param_class = $class;
            $param_title = $title;
            $param_content = $content;
            $param_id_link = $id_link;
            $param_image = $image;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($class_err)) ? 'has-error' : ''; ?>">
                            <label>Class</label>
                            <input type="text" name="class" class="form-control" value="<?php echo $class; ?>">
                            <span class="help-block"><?php echo $class_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <textarea name="title" class="form-control"><?php echo $title; ?></textarea>
                            <span class="help-block"><?php echo $title_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                            <label>Content</label>
                            <input type="text" name="content" class="form-control" value="<?php echo $content; ?>">
                            <span class="help-block"><?php echo $content_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_link_err)) ? 'has-error' : ''; ?>">
                            <label>ID Link</label>
                            <input type="text" name="id_link" class="form-control" value="<?php echo $id_link; ?>">
                            <span class="help-block"><?php echo $id_link_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <div>
                            <form action="upload-manager.php" method="post" enctype="multipart/form-data">
                                <label for="fileSelect">Image</label>
                                <input type="file" name="photo" id="fileSelect">
                                <input type="submit" name="submit" value="Upload">
                                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                            </form>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>