
<script src="/home_maintenance_manager/public/js/imageValidationAndPreview.js" type="text/javascript"></script>

<div class="container">

    <div class="row">
        <div class="col">

            <a href="/home_maintenance_manager/public">Home</a>
            >
            <a href="/home_maintenance_manager/public/propertycontroller/<?php echo $_SESSION['userid'] ?>">Property</a>

            <br><br>
            <h3>Update Property</h3>
            <hr>
            <br>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <form id="cssForm" action="#" method="post">
                Property Name:<br> <input class="form-control" type="text" name="propertyname" value="<?php echo $_SESSION['propertyid' . $data["pn"]]['name'] ?>"><br>
                Address:<br> <input class="form-control" type="text" name="address" value="<?php echo $_SESSION['propertyid' . $data["pn"]]['address'] ?>"><br>
                Description:<br> <textarea class="form-control" type="text" name="propertydes" value="decription"><?php echo $_SESSION['propertyid' . $data["pn"]]['description'] ?></textarea><br>
                <div class="form-group"> 
                    <button class="btn btn-md btn-secondary" type="submit" name="updateProperty" value="updateProperty">Submit</button>
                </div>
            </form>
        </div>

        <div class="col-sm-12 col-md-6">
            <form id="cssForm" action="#" method="post" enctype="multipart/form-data"> 

                <div class="form-group">
                    <label for="sel1">Select Image Alt:</label>
                    <select name="altSelector" class="form-control" id="sel1">
                        <option>Front</option>
                        <option>Side</option>
                        <option>Back</option>
                        <option>MISC</option>
                    </select>
                </div>

                <div class="form-group"> 
                    <label>Add Image:
                    </label>
                    <input class="form-control" id="browse"  name="imgSelector[]" type="file" onchange="previewFiles()" required accept="image/*">

                    <div id="preview"></div>
                </div>

                <div class="form-group"> 
                    <button type="submit" name="addImg" value="AddTask" class="btn btn-md btn-secondary">Submit</button>
                </div>
            </form>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="imgEnlarge">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>

        </div>
    </div>

    <div class='row'>
        <?php 

        if($data["img"] != null){
                // var_dump($data["img"]);

            foreach ($data["img"] as $image) {

                echo '
                <div class="img-wrap">
                <img id="myImg" class="imgPreview deletable" data-buttonId="'.$image["id"].'" src="/home_maintenance_manager/public/img/' . $image["name"] . '" alt="'. explode( '_', $image["name"] )[1] .'" width="150" height="150">
                <div class="caption text-center">
                <p>'. $image["altText"] .'</p>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="imgId" value="'.$image["id"] .'">
                <button id="delete'.$image["id"].'" type="submit" name="deleteImage" value="deleteImage" class="btn">x</button>
                </form>

                </div>


                ';
            }
        }
        ?>
    </div>

</div>

<script src="/home_maintenance_manager/public/js/jqueryImg.js"></script>