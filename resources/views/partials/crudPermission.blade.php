<div id="crudPermissionContent">
    <div class="form-group" id="crudPermissionTypeControl">
        <label for="resource" class="col-md-4 col-form-label">Resource</label>
        <input id="resource" type="text" class="form-control" placeholder="The name of the txtResource permission is being set to. Ex: Posts or Users" name="resource" required>
    </div>

    <div class="row">
        <div class="form-group col-md-2" id="crudPermissionTypeControl">
            <div class="crudSelected">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="create" value="create" name="permission_value"><label class="form-check-label" for="create">Create</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="read" value="read" name="permission_value"><label class="form-check-label" for="read">Read </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="update" value="update" name="permission_value"><label class="form-check-label" for="update">Update</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="delete" value="delete" name="permission_value"><label class="form-check-label" for="delete">Delete</label>
                </div>
            </div>

            {{-- <div class="form-group mt-3">
                <button type="submit" class="btn btn-secondary btn-sm" name="generate_permissions">Generate <i class="fa fa-caret-right"></i></button>
            </div> --}}
        </div>

        

        <input type="hidden" name="crud_selected" value="crudSelected" id="crud_selected">

        <div class="col-md-8 ml-auto" id="crudPermissionTypeControl">
            <table class="table table-striped table-responsive-md" id="permissionsTable">
                <thead>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                </thead>
                <tbody id="tableBody">
                    
                </tbody>
            </table>
        </div>
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


        //Functionalities (CRUD Permissions)
         $(".crudSelected").on("change", "[name=permission_value]", function(){
            var mode = $(this).val();
         
            const rowTemp = `<tr data-mode=${mode}>
            <td><span style="text-transform: capitalize;">${mode} ${txtResource.val().substr(0,1).toUpperCase() + txtResource.val().substr(1)}</span></td>
            <td><span style="text-transform: lowercase;">${mode}</span>-${txtResource.val().toLowerCase()}</td>
            <td>Allows user to <span style="text-transform: uppercase;">${mode} </span> ${txtResource.val().substr(0,1).toUpperCase() + txtResource.val().substr(1)}</td>
            </tr>`;

            if($(this).is(":checked")) {
                $("#tableBody").append(rowTemp)
            }else{    
            $("[data-mode='"+ mode +"']").remove();
            }
        });

        checkboxes.on('change', function() {
            $('#crud_selected').val(
                checkboxes.filter(':checked').map(function(item) {
                    return this.value;
                }).get().join(', ')
             );
        });
    });
</script>