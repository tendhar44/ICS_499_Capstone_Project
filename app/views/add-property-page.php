
<script src="/home_maintenance_manager/public/js/imageValidationAndPreview.js" type="text/javascript"></script>

<div class="container">
    <a href="/home_maintenance_manager/public">Home</a>
    >
    <a href="/home_maintenance_manager/public/propertycontroller/<?php echo $_SESSION['userid'] ?>">Property</a>

    <br><br>
    <h3>Create A Property</h3>
    <hr>
    <br>
    <form action="/Home_Maintenance_Manager/public/propertycontroller/<?php echo $data['uId']; ?>" method="post" enctype="multipart/form-data">
        Property Name:<span class="reqAsk">*</span><br> <input type="text" name="propertyname" required><br><br>
        Address:<br> <input type="text" name="address"><br><br>
        Description:<br> <input type="text" name="propertydes"><br><br>

        <input id="browse" name="imgSelector[]" type="file" onchange="previewFiles()" multiple accept="image/*">
        <div id="preview"></div>

            <br><br>
            <input type="hidden" name="ownerid" value="<?php echo $data['uId']; ?>">
            <input type="submit" value="Submit">
        </form>

        <div>
            <br><br><br><br>
            <span class="reqAsk">*</span> = required
        </div>
    </div>

    <script>
        $(function() {
            $("#imgupload").on('change', function(){
            });
        });    
    </script>