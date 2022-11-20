<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Add Gallery</title>


    <?php include '../theme/includes/head.php' ?>

</head>


<body class="nav-md">

<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">

            <?php include 'sidebar.php' ?>

        </div>


        <?php include '../theme/includes/header.php' ?>

        <!-- page content -->

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add Gallery</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                <button onclick="onclearform()" type="button" class="btn btn-primary pull-right"
                                        data-toggle="modal"
                                        data-target=".bs-example-modal-lg">Add Add Gallery
                                </button>

                                <p class="text-muted font-13 m-b-30">

                                </p>

                                <table id="vtypetable"
                                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Place Name</th>  
                                        <th>Place Image</th> 

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static"
             data-keyboard="false"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <form action="api.php" method="post" id="addvtypeform" data-parsley-validate
                          class="form-horizontal form-label-left">
                        <input type="hidden" name="_method" id="formmethod" value=""/>
                        <input type="hidden" name="action" id="actionId" value="addgallery"/>
                        <input type="hidden" name="id" id="id" value=""/>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add Gallery</h4>
                        </div>

                        <div class="modal-body">


                            <div id="repeatDivs">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                        Place Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         
 
 
                                               <select name="place_name" id="place_name"
                                                                                    style="width:100%;"
                                                                                    class="form-control" >
                                                                            </select>
                                    </div>
                                </div>




                                 
                                <div class="form-group" id="mg">
                                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            Last Uploaded Image


                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">


                                          <img src="" id="imgold" width="300px" height="100px">

                                          <input type="hidden" id="lastimg"  name="lastimg">



                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                       Place Image
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="image" name="image" 
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> 

                            </div>
                                
                               
                            
                          


                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="onclearform()" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                </div>

                </form>
            </div>
        </div>

        <!-- /page content -->


    </div>

</div>

<script>


    $(document).ready(function () {

        $("#mg").hide();

callDatatable();

 
getplacename();




    });


</script>


<?php include '../theme/includes/footer.php' ?>


<script type="text/javascript">

    function callDatatable() {

        var myTable = $('#vtypetable').DataTable({

        	"scrollX": true,

            dom: "Bfrtip",

            "bDestroy": true,

            "autoWidth": true,

            "ajax": {
                "url": "api.php?action=allgallery",
                dataSrc: ''
            },

            //"sAjaxSource": "api/adminapi.php?action=allpaymentsmodetype",

            "pageLength": 25,

            buttons: [

                {

                    extend: 'collection',

                    text: 'Export',

                    buttons: [

                        {

                            extend: 'copyHtml5',

                            exportOptions: {

                                columns: [0, ':visible']

                            }

                        },

                        {

                            extend: 'excelHtml5',

                            exportOptions: {

                                columns: [0, ':visible']

                            }

                        },

                        {

                            extend: 'pdfHtml5',

                            orientation: 'landscape',

                            pageSize: 'LEGAL',

                            exportOptions: {

                                columns: [0, ':visible']

                            }

                        },

                        {

                            extend: 'print',

                            exportOptions: {

                                columns: [0, ':visible']

                            }

                        },


                    ]


                }

                , 'colvis'

            ],

            "columns": [

                {"data": "srno"},

                {"data": "place_name"}, 
               
          




                        {
                            "data": "image",
                            "render": function (data, type, row, meta) {
                                if (type === 'display') {
                                    data = '<div class="text-center"><a href="'+data+'"><img src="'+data+'"width="100px" hight="100px"></a></div>';
                      }
                        return data;
                    }
                },
                


                {

                    "data": "id",

                    "render": function (data, type, row, meta) {

                        if (type === 'display') {

                            data = '<button type="button" onclick="onEdit(' + data + ');"  class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Edit </button><button type="button"  class="btn btn-danger btn-xs" onclick="ondelete(' + data + ');"  >Delete </button>';

                        }


                        return data;

                    }

                }


            ]

        });


        myTable

            .order([0, 'asc'])

            .draw();

    }
</script>


<script>

    function onclearform() {
        document.getElementById("addvtypeform").reset();
        $('#id').val("");
        $('#formmethod').val("post");

    }


    function ondelete(id) {
        var result = confirm("Are you sure u want to delete ?");
        if (result) {

            var formData = {action: "deletegallery", id: id};


            $.ajax({
                url: "api.php",
                type: "GET",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    //data - response from server
                    callDatatable();
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }

    }

    function onEdit(id) {

        $("#mg").show();
        $.getJSON("api.php?action=getgallery&id=" + id, function (data) {
 
               
                $('#place_name').val(data.name);  
                



                $('#image').text(data.image);
                $('#lastimg').val(data.image);
                $('#imgold').attr('src', ''+data.image);

                $('#actionId').val("updategallery");
                $('#id').val(id);

            }
        );
    }
</script>
<script type="text/javascript">
    var frm = $('#addvtypeform');

    frm.submit(function (e) {

        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            // data: frm.serialize(),
            data: formData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                console.log('Submission was successful.');
                let jsonObject = JSON.parse(data);
                if (jsonObject.code === true) {
                    // callDatatable();
//                    alert("Data Added successfully...!");
//                    location.reload();
                    callDatatable();
                    document.getElementById("addvtypeform").reset();


                    $("[data-dismiss=modal]").trigger({type: "click"});
                    $.notify(jsonObject.message, "success");
                    // $("#add").show();
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
</script>




<script type="text/javascript">


    function getplacename() {


        $.getJSON("api.php?action=allplaces", function (data) {

            var stringToAppend = "<option disabled selected> Select Place</option>";

            $.each(data, function (key, val) {

                stringToAppend += "<option value='" + val.id + "'>" + val.place_name + "</option>";
            });

            $("#place_name").html(stringToAppend);
        });
    }

 

</script>
 
</body>

</html>