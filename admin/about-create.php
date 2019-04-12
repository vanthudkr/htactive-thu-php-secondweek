<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$icon = $title = $content = $id_link = "";
$icon_err = $title_err = $content_err = $id_link_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate icon
    $input_icon = trim($_POST["icon"]);
    if(empty($input_icon)){
        $icon_err = "Please enter a icon.";
    } elseif(!filter_var($input_icon, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $icon_err = "Please enter a valid icon.";
    } else{
        $icon = $input_icon;
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
    
    // Check input errors before inserting in database
    if(empty($icon_err) && empty($title_err) && empty($content_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO abouts (icon, title, content, id_link) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_icon, $param_title, $param_content, $param_id_link);
            
            // Set parameters
            $param_icon = $icon;
            $param_title = $title;
            $param_content = $content;
            $param_id_link = $id_link;
            
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
                        <div class="form-group <?php echo (!empty($icon_err)) ? 'has-error' : ''; ?>">
                            <label>Icon</label>
                            <input type="text" name="icon" class="form-control" value="<?php echo $icon; ?>">
                            <span class="help-block"><?php echo $icon_err;?></span>
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>