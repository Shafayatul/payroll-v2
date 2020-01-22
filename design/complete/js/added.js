
 $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
                $(".boxs").hide();
                $("#" + optionValue).show();
        });
    }).change();
});

var room = 1;

$('#copy').click(function() {


    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row"><div class="col-md-5 nopadding"><div class="form-group"><div class="input-group"> <select class="form-control select-chosen" ><option value="id">ID</option><option value="first_name">First name</option> <option value="last_name">Last name</option> <option value="email">Email</option> <option value="position">Position</option> <option value="gender">Gender</option> <option value="status">Status</option> <option value="employment_type">Employment type</option> <option value="termination_type">Termination type</option> <option value="termination_reason">Termination reason</option> <option value="termination_date">Termination date</option> <option value="termination_at">Notice pronounced</option></select><div class="input-group-append col-md-5"> </div></div></div></div><div class="clear"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button></div></div>';
    objTo.appendChild(divtest)
  
});

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
$(".education_fields").select2({
    placeholder: "Select a state",
    allowClear: true
});


$(document).ready(function(){ 
  $(".show").click(function(){
    $("#reminder").show();
  });
   $(".d-hide").click(function(){
    $("#reminder").hide();
  });
});


 
     
 var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
          $("#demoform").submit(function() {
            alert($('[name="duallistbox_demo1[]"]').val());
            return false;
          });
          var demo2 = $('.demo2').bootstrapDualListbox({
              nonSelectedListLabel: 'Non-selected',
              selectedListLabel: 'Selected',
              preserveSelectionOnMove: 'moved',
              moveOnSelect: false,
              nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
            });
            // Material Select Initialization   



$(".select-chosen").select2({
    placeholder: "What type of attribute is this?",
    allowClear: true,
});



