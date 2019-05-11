<div id="basicPermissionContent">
    <div class="form-group row" id="basicPermissionTypeControl">
        <div class="col-md-6">
            <label for="verb" class="col-md-4 col-form-label">Verb (Action)</label>
            <input id="verb" type="text" class="form-control" name="verb" placeholder="eg: CREATE " required autofocus>
        </div>
        <div class="col-md-6">
            <label for="nameResource" class="col-md-4 col-form-label">Resource</label>
            <input id="nameResource" type="text" class="form-control" name="name_resource" placeholder="eg: POSTS" required>
        </div>
        <div class="col-md-6">
            <label for="display_name" class="col-md-4 col-form-label">Display Name</label>
            <input type="text" class="form-control" id="display_name" name="display_name">
        </div>
    

        <div class="form-group col-md-6" id="basicPermissionTypeControl">
            <label for="slug" class="col-md-4 col-form-label">Slug</label>
            <input id="slug" type="text" class="form-control" name="name" placeholder="eg: create-posts" required>
        </div>

    </div>

    <div class="form-group" id="basicPermissionTypeControl">
        <label for="description" class="col-md-4 col-form-label">Description</label>
        <input id="description" type="text" class="form-control" name="description" placeholder="Describe what this permission does." required>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        //Variable Definitions
        var rdBasicValue = $('input[value="basic"]');
        var rdCrudValue = $('input[value="crud"]');
        var txtDisplayNameVerb = $('input[name="verb"]');
        var txtDisplayNameResource = $('input[name="name_resource"]');
        var txtDisplayName = $('input[name="display_name"]');
        var txtSlug = $('input[name="name"]');
        var checked = [];
        var crudSelected = $('input[name="crud_selected"]');
        var checkboxes = $("input:checkbox[name='permission_value']"); //$('input[type="checkbox"]');
        var checkedCheckboxes = $("input:checkbox[name='permission_value']:checked");
        var radioButtons = $("input:radio[name='permission_type']");
        var txtResource = $("input[name='resource']");

        //Pre-Defined Functionalities
        //$("div#crudPermissionTypeControl").hide();
        rdBasicValue.prop('checked', true);
        //checkboxes.prop('checked', true);

        //Functionalities (Basic Permissions)
        txtDisplayNameVerb.on('keyup', function() {
            txtSlug.val(txtDisplayNameVerb.val().toLowerCase() + "-" + txtDisplayNameResource.val().toLowerCase());
            txtDisplayName.val( txtDisplayNameVerb.val().substr(0,1).toUpperCase() + txtDisplayNameVerb.val().substr(1) +  " " + txtDisplayNameResource.val().substr(0,1).toUpperCase() + txtDisplayNameResource.val().substr(1) );
            txtDisplayNameResource.on('blur', function() {
                txtDisplayName.val( txtDisplayNameVerb.val().substr(0,1).toUpperCase() + txtDisplayNameVerb.val().substr(1) +  " " + txtDisplayNameResource.val().substr(0,1).toUpperCase() + txtDisplayNameResource.val().substr(1) );
                txtSlug.val(txtDisplayNameVerb.val().toLowerCase() + "-" + txtDisplayNameResource.val().toLowerCase());
            });
        });

        txtDisplayNameResource.on('keyup', function() {
            txtSlug.val(txtDisplayNameVerb.val().toLowerCase() + "-" + txtDisplayNameResource.val().toLowerCase());
            txtDisplayName.val( txtDisplayNameVerb.val().substr(0,1).toUpperCase() + txtDisplayNameVerb.val().substr(1) +  " " + txtDisplayNameResource.val().substr(0,1).toUpperCase() + txtDisplayNameResource.val().substr(1) );
            txtDisplayNameResource.on('blur', function() {
                txtDisplayName.val( txtDisplayNameVerb.val().substr(0,1).toUpperCase() + txtDisplayNameVerb.val().substr(1) +  " " + txtDisplayNameResource.val().substr(0,1).toUpperCase() + txtDisplayNameResource.val().substr(1) );
                txtSlug.val(txtDisplayNameVerb.val().toLowerCase() + "-" + txtDisplayNameResource.val().toLowerCase());
            });
        });
    });
</script>