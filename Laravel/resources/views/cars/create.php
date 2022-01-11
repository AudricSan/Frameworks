  
<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
        <div class="row">
            <h1><strong>Ajouter un item</strong></h1>
            <br>
            <form class="form" action="/cars/create" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="serial">Serial:</label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial" value="">
                    <span class="help-inline"><?php echo $serialError;?></span>
                </div>

                <div class="form-group">
                    <label for="power">Power:</label>
                    <input type="text" class="form-control" id="power" name="power" placeholder="Power" value="">
                    <span class="help-inline"><?php echo $powerError;?></span>
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Color" value="">
                    <span class="help-inline"><?php echo $colorError;?></span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                    <a class="btn btn-primary" href="/cars"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                </div>
            </form>
        </div>
    </div>   
</body>